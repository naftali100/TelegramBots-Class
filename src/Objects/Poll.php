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

class Poll extends TelegramObject{
    protected $fields =  [
        'id'                      => "",
        'question'                => "",
        'options'                 => [PollOption::class],
        'total_voter_count'       => null,
        'is_closed'               => false,
        'is_anonymous'            => false,
        'type'                    => "",
        'allows_multiple_answers' => false,
        'correct_option_id'       => null,
        'explanation'             => "",
        'explanation_entities'    => MessageEntity::class,
        'open_period'             => null,
        'close_date'              => null,
    ];
}


