"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var __param = (this && this.__param) || function (paramIndex, decorator) {
    return function (target, key) { decorator(target, key, paramIndex); }
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.UsersService = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const typeorm_2 = require("typeorm");
const user_entity_1 = require("./entities/user.entity");
const bcrypt = require("bcrypt");
let UsersService = class UsersService {
    constructor(usersRepository) {
        this.usersRepository = usersRepository;
    }
    async create(createUserDTO) {
        try {
            const salt = await bcrypt.genSalt();
            const user = new user_entity_1.User();
            user.username = createUserDTO.username;
            user.useremail = createUserDTO.useremail;
            user.userpassword = await bcrypt.hash(createUserDTO.userpassword, salt);
            const userData = await this.usersRepository.save(user);
            return userData;
        }
        catch (error) {
            return error;
        }
    }
    findAll() {
        try {
            return this.usersRepository.find();
        }
        catch (error) {
            return error;
        }
    }
    async findOne(id) {
        try {
            const user = await this.usersRepository.findOneBy({ id: id.toString() });
            if (!user) {
                throw new common_1.NotFoundException('User not found');
            }
            return user;
        }
        catch (error) {
            return error;
        }
    }
    async findOneByEmail(useremail) {
        try {
            const user = await this.usersRepository.findOneBy({
                useremail: useremail,
            });
            if (!user) {
                throw new common_1.NotFoundException('User does not exist');
            }
            return user;
        }
        catch (error) {
            return error;
        }
    }
    async update(id, updateUserDto) {
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
            }
            else {
                throw new common_1.NotFoundException('User not found');
            }
        }
        catch (error) {
            throw error;
        }
    }
    async remove(id) {
        try {
            const user = await this.usersRepository.findOneByOrFail({
                id: id.toString(),
            });
            if (user) {
                this.usersRepository.remove(user);
                return 'User Deleted Successfully';
            }
            else {
                throw new common_1.NotFoundException('User not found');
            }
        }
        catch (error) {
            return error;
        }
    }
};
UsersService = __decorate([
    (0, common_1.Injectable)(),
    __param(0, (0, typeorm_1.InjectRepository)(user_entity_1.User)),
    __metadata("design:paramtypes", [typeorm_2.Repository])
], UsersService);
exports.UsersService = UsersService;
//# sourceMappingURL=users.service.js.map