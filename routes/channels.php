<?php

use App\Models\Municipality;
use App\Models\Province;
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

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('requestSend.{id}', function($user, $id){
    return $user->municipality_id === Municipality::find($id)->id;
});

Broadcast::channel('MtoPtransaction.{id}', function($user, $id){
    return $user->province_id === Province::find($id)->id;
 });
 
 Broadcast::channel('toAdmin.{role}', function($user, $role){
    return $user->role === $role;
 });