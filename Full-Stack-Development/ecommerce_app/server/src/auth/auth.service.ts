import {
  Injectable,
  NotFoundException,
  UnauthorizedException,
} from '@nestjs/common';
import { JwtService } from '@nestjs/jwt';
import { UsersService } from 'src/users/users.service';
import * as bcrypt from 'bcrypt';

@Injectable()
export class AuthService {
  constructor(
    private usersService: UsersService,
    private jwtService: JwtService,
  ) {}

  async validateUser(useremail: string, pass: string): Promise<any> {
    try {
      const user = await this.usersService.findOneByEmail(useremail);

      if (!user) {
        throw new NotFoundException('User does not exist');
      }

      const isMatch = await bcrypt.compare(pass, user.userpassword);

      if (user && isMatch) {
        // eslint-disable-next-line @typescript-eslint/no-unused-vars
        const { userpassword, ...result } = user;
        return result;
      } else {
        throw new UnauthorizedException('Password does not match');
      }
    } catch (error) {
      return error;
    }
  }

  async login(user: any) {
    try {
      const payload = { useremail: user.useremail, sub: user.id };

      if (user.id) {
        return {
          authorized: true,
          access_token: this.jwtService.sign(payload),
        };
      } else {
        return {
          authorized: false,
        };
      }
    } catch (error) {
      return error;
    }
  }
}
