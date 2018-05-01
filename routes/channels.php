<?php

use Illuminate\Notifications\Channels\BroadcastChannel;

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

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

// Broadcast::channel('tasks.{project}', function($user, \App\Project $project){
//     if($project->participants->contains($user)){
//         return ['name'=>$user->name];
//     };
// });
Broadcast::channel('tasks.{project}', \App\Broadcasting\ProjectChannel::class);