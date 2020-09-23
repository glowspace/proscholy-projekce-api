<?php

namespace App\Http\Controllers;

use App\Events\SessionStatusUpdated;
use App\Models\Session;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SessionController extends Controller
{
    /**
     * Create new session.
     *
     * @param Request $request
     *
     * @return Application|ResponseFactory|Response
     */
    public function store(Request $request)
    {
        $session       = new Session();
        $session->name = $request->name;
        $session->code = $this->findNewCode();
        $session->save();

        return response($session, Response::HTTP_CREATED);
    }


    /**
     * Try to find session by its code.
     *
     * @param $code
     *
     * @return Application|ResponseFactory|Response
     */
    public function show($code)
    {
        $session = Session::where('code', $code)->firstOrFail();

        return response($session);
    }


    /**
     * Update session current data.
     *
     * @param         $id
     * @param Request $request
     *
     * @return Application|ResponseFactory|Response
     */
    public function update($id, Request $request)
    {
        // Update session current data
        $session = Session::findOrFail($id);

        $session->current_song_id = $request->current_song_id;
        $session->song_part_id    = $request->song_part_id;

        $session->save();

        // Pull update to clients (using WebSocket)
        event(new SessionStatusUpdated($session));

        return response($session, Response::HTTP_ACCEPTED);
    }


    /**
     * @return int
     */
    private function findNewCode()
    {
        $code = rand(10000, 99999);

        if (Session::where('code', $code)->count())
        {
            return $this->findNewCode();
        }

        return $code;
    }
}
