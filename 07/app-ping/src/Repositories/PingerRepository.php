<?php

namespace App\Repositories;

use App\Redis\RedisClient;

class PingerRepository
{
    private $client;
    
    public function __construct()
    {
        $this->client = RedisClient::client();
    }

    public function update()
    {
        $count = $this->client->get('count') ?? 0;

        $this->client->set('count', ++$count);
    }
}