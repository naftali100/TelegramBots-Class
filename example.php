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

$update = [
    "update_id"=> 343150141,
    "message"=>[
        "message_id"=> 4043,
        "from"=>[
            "id"=> 1007128729,
            "is_bot"=> false,
            "first_name"=> "Rodrigo",
            "last_name"=> "Aoyagui",
            "username"=> "rodaoy",
            "language_code"=> "en"
        ],
        "chat"=>[
            "id"=> 1007128729,
            "first_name"=> "Rodrigo",
            "last_name"=> "Aoyagui",
            "username"=> "rodaoy",
            "type"=> "private"
        ],
        "date"=> 1593719868,
        "text"=> "/start",
        "entities"=> [
            [
                "offset"=> 0,
                "length"=> 6,
                "type"=> "bot_command"
            ]
        ]
    ]
];

$config = new Config();
$config->token = "<TOKEN>";
$config->username = "<USERNAME>";
$config->webhookUrl = "<WEBHOOK_URL>";
$config->logging = true;
$config->parseMode = "html";

$bot = new TelegramBot($config);

$bot->setUpdate($update);

print $bot->getUpdate()->update_id;

var_dump($bot->getUpdate()->message);

// $bot->sendMessage($user, $text);

