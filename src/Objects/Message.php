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

class Message extends TelegramObject{
    protected $fields = [
        'message_id'                => -1,
        'from'                      => User::class,
        'date'                      => -1,
        'chat'                      => Chat::class,
        'forward_from'              => User::class,
        'forward_from_chat'         => Chat::class,
        'forward_from_message_id'   => -1,
        'forward_signature'         => "",
        'forward_sender_name'       => "",
        'forward_date'              => -1,
        'reply_to_message'          => Message::class,
        'media_group_id'            => "",
        'author_signature'          => "",
        'text'                      => "",
        'entities'                  => [MessageEntity::class],
        'caption'                   => "",
        'caption_entities'          => [MessageEntity::class],
        'audio'                     => Audio::class,
        'document'                  => Document::class,
        'animation'                 => Animation::class,
        'photo'                     => [PhotoSize::class],
        'sticker'                   => Sticker::class,
        'video'                     => Video::class,
        'voice'                     => Voice::class,
        'video_note'                => VideoNote::class,
        'contact'                   => Contact::class,
        'location'                  => Location::class,
        'venue'                     => Venue::class,
        'poll'                      => Poll::class,
        'dice'                      => Dice::class,
        'new_chat_members'          => [User::class],
        'left_chat_member'          => User::class,
        'new_chat_title'            => "",
        'new_chat_photo'            => [PhotoSize::class],
        'delete_chat_photo'         => false,
        'group_chat_created'        => false,
        'supergroup_chat_created'   => false,
        'channel_chat_created'      => false,
        'migrate_to_chat_id'        => -1,
        'migrate_from_chat_id'      => -1,
        'pinned_message'            => Message::class,
        'connected_website'         => "",
        'reply_markup'              => KeyboardMarkup::class,
    ];

    public function getType(){
        $types = [
            'text',
            'audio',
            'animation',
            'document',
            'game',
            'photo',
            'sticker',
            'video',
            'voice',
            'video_note',
            'contact',
            'location',
            'venue',
            'poll',
            'new_chat_members',
            'left_chat_member',
            'new_chat_title',
            'new_chat_photo',
            'delete_chat_photo',
            'group_chat_created',
            'supergroup_chat_created',
            'channel_chat_created',
            'migrate_to_chat_id',
            'migrate_from_chat_id',
            'pinned_message',
            'invoice',
            'successful_payment',
            'passport_data',
            'reply_markup',
        ];

        foreach ($types as $type) {
            if ($this->$type !== -1) {
                return $type;
            }
        }

        return 'message';
    }
}
