<?php

/*******************************************
 * 
 * https://t.me/returnJson_MYBOT
 * 
 * Created by @YehudaEisenberg
 *  
*******************************************/

require_once('src/AutoLoader.php');

use YehudaEi\TelegramBots;

$config = new Config();
$config->token = "<TOKEN>";
$config->username = "<USERNAME>";
$config->webhookUrl = "<WEBHOOK_URL>";
$config->logging = true;
$config->parseMode = "html";

$bot = new TelegramBots($config);
$bot->setUpdate();

$user = $bot->getUpdate()->user;
$text = $bot->getUpdate()->message->text;

$bot->sendMessage($user, $text);
