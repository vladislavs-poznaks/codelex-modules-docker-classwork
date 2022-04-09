<?php

namespace App\Redis;

use Predis\Client;

class RedisClient
{
    private static array $params = [
        'scheme' => 'tcp',
        'host'   => 'redis',
        'port'   => 6379,
    ];

    public static function client()
    {
        return new Client(self::$params);
    }
}