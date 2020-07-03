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

use YehudaEi\TelegramBots\Exception\TelegramException;

class KeyboardMarkup extends TelegramObject{
    protected $fields = [
        'keyboard' => null
    ];

    public function __set($fieldName, $value){
        if(isset($this->fields[$fieldName])){
            $validKeyboards = array("ReplyKeyboardRemove", "InlineKeyboardMarkup", "ReplyKeyboardMarkup", "ForceReply");
            if(!in_array(get_class($value), $validKeyboards)){
                $this->fields[$fieldName] = $value;
            }
            else{
                throw new TelegramException("\$keyboard must be a ".substr(implode(" or ", $validKeyboards), 0, -3));
            }
        }
        else{
            throw new TelegramException("Field '$fieldName' not defined");
        }
    }
}



