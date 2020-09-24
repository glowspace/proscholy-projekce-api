<?php

namespace App\Http\Controllers;

use App\Events\SessionStatusUpdated;
use App\Models\Session;
use App\Models\Song;
use GraphQL\Client;
use GraphQL\Query;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use stdClass;

class SessionSongController extends Controller
{
    public function store(Request $request)
    {
        // Check if session exist
        $session = Session::findOrFail($request->session_id);

        // Pull song data from Regenschori API
        $regenschori_record = $this->pullSongFromRegenschori($request->song_id);

        // Create song
        $song                 = new Song();
        $song->session_id     = $session->id;
        $song->regenschori_id = $request->song_id;
        $song->name           = $regenschori_record->name;
        $song->order          = 1;
        $song->lyrics         = $regenschori_record->lyrics_no_chords;
        $song->save();

        // Pull update to clients (using WebSocket)
        event(new SessionStatusUpdated($session));

        return response($song, Response::HTTP_CREATED);
    }


    private function pullSongFromRegenschori($song_id): stdClass
    {
        $client = new Client(
            'https://zpevnik.proscholy.cz/graphql'
        );

        $gql = (new Query('song_lyric'))
            ->setArguments(['id' => $song_id])
            ->setSelectionSet(
                [
                    'name',
                    'lyrics',
                    'lyrics_no_chords',
                ]
            );


        $res = $client->runQuery($gql);

        return $res->getResults()->data->song_lyric;
    }
}
