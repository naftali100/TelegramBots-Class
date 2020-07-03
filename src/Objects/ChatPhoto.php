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

class ChatPhoto extends TelegramObject{
    protected $fields =  [
        'small_file_id'        => "",
        'small_file_unique_id' => "",
        'big_file_id'          => "",
        'big_file_unique_id'   => "",
    ];
}



