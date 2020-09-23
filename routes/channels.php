<?php

use App\Models\Session;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

/**
 * Projection session WebSocket broadcast channel.
 *
 * Push changes on every session update.
 */
Broadcast::channel('Session.{id}', function ($user, $id)
{
    return Session::findOrFail($id)->with('songs', 'devices');
});
