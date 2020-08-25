import {Controller, Get, Patch, Post} from '@nestjs/common';
import {AppService} from "../app.service";

@Controller('sessions')
export class SessionsController {
    constructor(private readonly appService: AppService) {

    }

    /**
     * Store new session.
     */
    @Post()
    storeSession() {
        return {
            id: 15,
            name: 'Chvály',
        };
    }

    /**
     * Join existing session.
     */
    @Get('join')
    joinSession() {
        return {
            id: 15,
            code: 4538,

            name: 'Chvály',
            place: 'Dolany u Olomouce',
            date: '25.8.2020 19:00',

            // Selected songs
            songs: [
                {
                    id: 15,
                    name: 'Ať srdce mé Tebe vídá',
                    lyrics: 'Ať srdce mé Tebe vídá, ať srdce mé tebe zná.'
                },
                {
                    id: 25,
                    name: 'Hospodin je můj pastýř',
                    lyrics: 'Ať srdce mé Tebe vídá, ať srdce mé tebe zná.'
                },
                {
                    id: 45,
                    name: 'Náš Bůh a Pán',
                    lyrics: 'Ať srdce mé Tebe vídá, ať srdce mé tebe zná.'
                },
                {
                    id: 11,
                    name: 'Hospodine, kdo je podobný Tobě',
                    lyrics: 'Ať srdce mé Tebe vídá, ať srdce mé tebe zná.'
                }
            ],

            current_song: {
                id: 15,
                name: 'Ať srdce mé Tebe vídá',
                lyrics: 'Ať srdce mé Tebe vídá, ať srdce mé tebe zná.'
            },
            current_preview: {
                id: 15,
                name: 'Ať srdce mé Tebe vídá',
                lyrics: 'Ať srdce mé Tebe vídá, ať srdce mé tebe zná.'
            },
            current_song_part: 2,

            clients: [
                {
                    id: 15,
                    name: 'Michael notebook'
                },
                {
                    id: 156,
                    name: 'Kostel plátno'
                },
                {
                    id: 86,
                    name: 'Mira Š. mobil'
                },
            ]
        };
    }

    /**
     * Update current song and part of the session
     */
    @Patch('change')
    updateSongAndPart() {
        return
    }
}