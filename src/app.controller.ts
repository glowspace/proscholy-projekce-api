import {Controller, Get} from '@nestjs/common';
import {AppService} from './app.service';
import {WebSocketGateway} from "@nestjs/websockets";

@Controller()
export class AppController {
    constructor(private readonly appService: AppService) {
    }

    @Get()
    getHello(): string {
        return this.appService.getHello();
    }
}