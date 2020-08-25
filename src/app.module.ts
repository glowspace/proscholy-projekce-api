import { Module } from '@nestjs/common';
import { AppController } from './app.controller';
import { AppService } from './app.service';
import { SessionsController } from './sessions/sessions.controller';

@Module({
  imports: [],
  controllers: [AppController, SessionsController],
  providers: [AppService],
})
export class AppModule {}
