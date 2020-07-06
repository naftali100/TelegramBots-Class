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

class User extends TelegramObject{
    protected $fields =  [
        'id'                          => -1,
        'is_bot'                      => false,
        'first_name'                  => "",
        'last_name'                   => "",
        'username'                    => "",
        'language_code'               => "",
        'can_join_groups'             => false,
        'can_read_all_group_messages' => false,
        'supports_inline_queries'     => false
    ];
}

