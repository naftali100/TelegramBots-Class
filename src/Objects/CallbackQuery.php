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

class CallbackQuery extends TelegramObject{
    protected $fields =  [
        'id'                => "",
        'from'              => User::class,
        'message'           => Message::class,
        'inline_message_id' => "",
        'chat_instance'     => "",
        'date'              => "",
        'game_short_name'   => ""
    ];
}



