<?php

use App\Services\MessageReceiverService;

require_once 'vendor/autoload.php';

$service = new MessageReceiverService();

$service->process();
