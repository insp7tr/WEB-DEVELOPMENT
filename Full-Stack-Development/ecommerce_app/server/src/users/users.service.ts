import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import { Repository } from 'typeorm';
import { CreateUserDto } from './dto/create-user.dto';
import { UpdateUserDto } from './dto/update-user.dto';
import { User } from './entities/user.entity';
import * as bcrypt from 'bcrypt';

@Injectable()
export class UsersService {
  constructor(
    @InjectRepository(User)
    private usersRepository: Repository<User>,
  ) {}

  async create(createUserDTO: CreateUserDto) {
    try {
      const salt = await bcrypt.genSalt();

      const user = new User();
      user.username = createUserDTO.username;
      user.useremail = createUserDTO.useremail;
      user.userpassword = await bcrypt.hash(createUserDTO.userpassword, salt);

      const userData = await this.usersRepository.save(user);

      return userData;
    } catch (error) {
      return error;
    }
  }

  findAll() {
    try {
      return this.usersRepository.find();
    } catch (error) {
      return error;
    }
  }

  async findOne(id: number) {
    try {
      const user = await this.usersRepository.findOneBy({ id: id.toString() });
      if (!user) {
        throw new NotFoundException('User not found');
      }
      return user;
    } catch (error) {
      return error;
    }
  }

  async findOneByEmail(useremail: string) {
    try {
      const user = await this.usersRepository.findOneBy({
        useremail: useremail,
      });

      if (!user) {
        throw new NotFoundException('User does not exist');
      }

      return user;
    } catch (error) {
      return error;
    }
  }

  async update(id: number, updateUserDto: UpdateUserDto) {
    try {
      const user = await this.usersRepository.findOneByOrFail({
        id: id.toString(),
      });

      if (user) {
        user.useremail = updateUserDto.useremail;
        user.username = updateUserDto.username;
        user.userpassword = updateUserDto.userpassword;

        this.usersRepository.save(user);

        return 'User updated successfully';
      } else {
        throw new NotFoundException('User not found');
      }
    } catch (error) {
      throw error;
    }
  }

  async remove(id: number) {
    try {
      const user = await this.usersRepository.findOneByOrFail({
        id: id.toString(),
      });

      if (user) {
        this.usersRepository.remove(user);

        return 'User Deleted Successfully';
      } else {
        throw new NotFoundException('User not found');
      }
    } catch (error) {
      return error;
    }
  }
}
