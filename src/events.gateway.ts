import {MessageBody, SubscribeMessage, WebSocketGateway} from "@nestjs/websockets";

@WebSocketGateway(80, { namespace: 'events' })
export class WebSocketGatewayClass {

    @SubscribeMessage('sessions/events')
    handleEvent(@MessageBody() data: string): string {
        return data;
    }
}
