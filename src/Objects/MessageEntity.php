<?php

/**
 * This file is part of the TelegramBots-Class package.
 *
 * (C) Yehuda Eisenberg
 * This file can be used under the MIT license.
 * 
 * @link https://github.com/PHP-Telegram-Bots/TelegramBots-Class
 * @package TelegramBots-Class
 * 
 */

namespace YehudaEi\TelegramBots\Objects;

class MessageEntity extends TelegramObject{
    protected $fields =  [
        'type'     => "",
        'offset'   => null,
        'length'   => null,
        'url'      => "",
        'user'     => User::class,
        'language' => ""
    ];
}



