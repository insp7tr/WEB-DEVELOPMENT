"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const config = {
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
exports.default = config;
//# sourceMappingURL=ormconfig.js.map