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

class Chat extends TelegramObject{
    protected $fields =  [
        'id'                  => -1,
        'type'                => "",
        'is_bot'              => false,  
        'title'               => "",
        'username'            => "",
        'language_code'       => "",
        'first_name'          => "",
        'last_name'           => "",
        'photo'               => ChatPhoto::class,
        'description'         => "",
        'invite_link'         => "",
        'pinned_message'      => Message::class,
        'permissions'         => ChatPermissions::class,
        'slow_mode_delay'     => -1,
        'sticker_set_name'    => "",
        'can_set_sticker_set' => false,  
    ];
}



