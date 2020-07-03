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

class KeyboardButton extends TelegramObject{
    protected $fields =  [
        'text'              => "",
        'request_contact'   => false,
        'request_location'  => false,
        'request_poll'      => KeyboardButtonPollType::class,
    ];
}



