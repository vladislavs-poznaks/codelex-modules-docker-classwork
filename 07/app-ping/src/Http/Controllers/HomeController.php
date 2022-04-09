<?php

namespace App\Http\Controllers;

use App\Services\MessageSenderService;

class HomeController
{
    public function home()
    {
        header('Location: /ping');
    }

    public function ping()
    {
        $service = new MessageSenderService();

        $service
            ->withMsg('Ping!')
            ->process();
    }
}