<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use App\Models\AuditoriaLogin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSuccessfulLogin
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // $user = $event->user;
        // $ipAddress = request()->ip();
        // $eventTime = now();
        $requestData = new Request();
        $requestData['id_usuario'] = $event->user->id;
        $requestData['IP'] = request()->ip();
        $requestData['data'] = now();

        AuditoriaLogin::create($requestData->all());
        // dd($user, $ipAddress, $eventTime);
    }
}
