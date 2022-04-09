<?php

namespace App\Http\Controllers;

use App\Repositories\PingerRepository;

class HomeController
{
    public function home()
    {
        header('Location: /pong');
    }

    public function pong()
    {
        $repository = new PingerRepository();

        echo $repository->get();
    }
}