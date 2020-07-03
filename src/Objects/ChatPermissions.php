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

class ChatPermissions extends TelegramObject{
    protected $fields =  [
        'can_send_messages'         => false,
        'can_send_media_messages'   => false,
        'can_send_polls'            => false,
        'can_send_other_messages'   => false,
        'can_add_web_page_previews' => false,
        'can_change_info'           => false,
        'can_invite_users'          => false,
        'can_pin_messages'          => false,
    ];
}



