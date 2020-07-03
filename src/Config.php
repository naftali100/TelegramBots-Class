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

namespace YehudaEi\TelegramBots;

use YehudaEi\TelegramBots\Exception\TelegramException;

class Config{
    private $token = false;
    private $username = false;
    private $webhookUrl = false;
    private $webmasterTgId = false;
    private $logging = false;

    private $notification = false;
    private $webPagePreview = false;
    private $parseMode = false;

    public function __get($fieldName){
        if(isset($this->$fieldName)){
            return $this->$fieldName;
        }
        else{
            throw new TelegramException("Field '$fieldName' not defined");
        }
    }

    public function __set($fieldName, $value){
        if(isset($this->$fieldName)){
            $this->$fieldName = $value;
        }
        else{
            throw new TelegramException("Field '$fieldName' not defined");
        }
    }
}


