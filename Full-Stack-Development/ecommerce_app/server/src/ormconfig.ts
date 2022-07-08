import { PostgresConnectionOptions } from 'typeorm/driver/postgres/PostgresConnectionOptions';

const config: PostgresConnectionOptions = {
  type: 'postgres',
  host: 'localhost',
  port: 5432,
  username: 'postgres',
  password: 'helloworld1',
  database: 'postgres',
  entities: ['dist/**/*.entity.js'],
  synchronize: true,
  dropSchema: false,
  migrationsRun: true,
  logging: false,
  logger: 'debug',
  migrations: ['dist/src/db/migrations/*.js'],
};

export default config;
