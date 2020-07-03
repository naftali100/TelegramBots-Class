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

class Request{
    private static $bot = TelegramBot::class;

    public function __construct($bot){
        if(get_class($bot) !== "TelegramBot")
            throw new TelegramException("\$bot must be a TelegramBot");
        
        $this->bot = $bot;
    }

    public function exec($method, $data = array()){
        $BaseUrl = "https://api.telegram.org/bot".$this->bot->getBotToken()."/".$method;
    	
        $ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL, $BaseUrl);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	curl_setopt($ch ,CURLOPT_POSTFIELDS, $data);
        
        $res = curl_exec($ch);
        if(curl_error($ch)){
            curl_close($ch);
            if($this->bot->config->Logging){
                Logger::Request(false, $method, $data, curl_error($ch));
            }
        }else{
            curl_close($ch);
            $res = json_decode($res, true);
            if($this->bot->config->Logging){
                Logger::Request(true, $method, $data, $res);
            }
            return $res;
        }
    }
}

