<?php

/*******************************************
 * 
 * https://t.me/returnJson_MYBOT
 * 
 * Created by @YehudaEisenberg
 *  
*******************************************/

namespace YehudaEi\TelegramBots;

require_once('src/AutoLoader.php');

$config = new Config();
$config->token = "<TOKEN>";
$config->username = "<USERNAME>";
$config->webhookUrl = "<WEBHOOK_URL>";
$config->logging = true;
$config->parseMode = "html";

$bot = new TelegramBot($config);
$bot->setUpdate($update);

$user = $bot->getUpdate()->user;
$text = $bot->getUpdate()->message->text;

$bot->sendMessage($user, $text);

