<?php

namespace App\Services;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class MessageSenderService
{
    private AMQPStreamConnection $connection;
    private AMQPMessage $msg;

    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('rabbit-mq', 5672, 'guest', 'guest');
    }

    public function withMsg(string $body): self
    {
        $this->msg = new AMQPMessage($body);

        return $this;
    }

    public function process(): void
    {
        $channel = $this->connection->channel();

        $channel->queue_declare('hello', false, false, false, false);

        $channel->basic_publish($this->msg, '', 'hello');

        echo " [x] Sent '{$this->msg->body}'\n";

        $channel->close();

        $this->connection->close();
    }
}