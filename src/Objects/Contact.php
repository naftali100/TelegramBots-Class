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

class Contact extends TelegramObject{
    protected $fields =  [
        'phone_number'  => "",
        'first_name'    => "",
        'last_name'     => "",
        'duration'      => -1,
        'vcard'         => "",
    ];
}



