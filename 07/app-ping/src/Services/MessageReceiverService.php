<?php

namespace App\Services;

use App\Repositories\PingerRepository;
use PhpAmqpLib\Connection\AMQPStreamConnection;

class MessageReceiverService
{
    private AMQPStreamConnection $connection;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('rabbit-mq', 5672, 'guest', 'guest');
    }

    public function process(): void
    {
        $channel = $this->connection->channel();

        $channel->queue_declare('hello', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            $repository = new PingerRepository();

            $repository->update();

            echo ' [x] Received ', $msg->body, "\n";
        };

        $channel->basic_consume('hello', '', false, true, false, false, $callback);

        while ($channel->is_open()) {
            $channel->wait();
        }

        $channel->close();

        $this->connection->close();
    }
}