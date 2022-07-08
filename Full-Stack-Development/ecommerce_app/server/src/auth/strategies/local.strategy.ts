import { Strategy } from 'passport-local';
import { PassportStrategy } from '@nestjs/passport';
import { Injectable, NotFoundException } from '@nestjs/common';
import { AuthService } from '../auth.service';

@Injectable()
export class LocalStrategy extends PassportStrategy(Strategy) {
  constructor(private authService: AuthService) {
    super({ usernameField: 'useremail', passwordField: 'userpassword' });
  }

  async validate(useremail: string, password: string): Promise<any> {
    try {
      const user = await this.authService.validateUser(useremail, password);

      if (!user) {
        throw new NotFoundException('User does not exist');
      }
      return user;
    } catch (error) {
      return error;
    }
  }
}
