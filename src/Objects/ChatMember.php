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

class ChatMember extends TelegramObject{
    protected $fields =  [
        'user'                      => User::class,
        'status'                    => "",
        'custom_title'              => "",
        'until_date'                => null,
        'can_be_edited'             => false,
        'can_post_messages'         => false,
        'can_edit_messages'         => false,
        'can_delete_messages'       => false,
        'can_restrict_members'      => false,
        'can_promote_members'       => false,
        'can_change_info'           => false,
        'can_invite_users'          => false,
        'can_pin_messages'          => false,
        'is_member'                 => false,
        'can_send_messages'         => false,        
        'can_send_media_messages'   => false,        
        'can_send_polls'            => false,        
        'can_send_other_messages'   => false,        
        'can_add_web_page_previews' => false,        
    ];
}



