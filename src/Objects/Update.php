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

class Update extends TelegramObject{
    protected $fields = [
        'message'              => Message::class,
        'edited_message'       => Message::class,
        'channel_post'         => Message::class,
        'edited_channel_post'  => Message::class,
        'inline_query'         => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query'       => CallbackQuery::class,
        'poll'                 => Poll::class,
        'poll_answer'          => PollAnswer::class,
    ];
}


 