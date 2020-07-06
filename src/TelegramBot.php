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

class TelegramBot{

    public function __construct($config){
        if (PHP_SAPI === 'cli'){
            print "cli mode. using getUpdates method"; #TODO add async heandling

        }else{
            // using webhook method

        }
    }

    public function setUpdate($update){
        if(gettype($update) == "string" || gettype($update) == "array"){
            $this->update = new Parser($update);
        }
    }

    public function getUpdate(){
        return $this->update->updateObject;
    }
}


class Bot{
    private $config = Config::class;

    private static $methods = [
        'SendMessage' => [
            'args' => [User::class, Message::class],
            'data' => ['chat_id' => [1, 'id']]
        ],
    ];

    public function __call($functionName, $args){
        
    }

    public function sendMessage($user, $message){
        if(get_class($user) !== "User")
            throw new TelegramException("\$user must be a User");
        if(get_class($message) !== "Message")
            throw new TelegramException("\$message must be a Message");
        
        $data = array();
        $data["chat_id"] = $user->id;
        $data["text"] = $message->text;
        $data["parse_mode"] = $message->parse_mode;
        $data["disable_web_page_preview"] = $this->bot->config->webPagePreview;
        $data["disable_notification"] = $this->bot->config->notification;
        
        if(!empty($message->reply_to_message->message_id))
            $data["reply_to_message_id"] = $message->reply_to_message->message_id;
        
        if(!empty($message->reply_markup->keyboard))
            $data["reply_markup"] = $message->reply_markup->keyboard;
        
        return $this->exec("sendMessage", $data);
    }
    public function forwardMessage($destChat, $fromChat, $message){
        if(get_class($destChat) !== "User")
            throw new TelegramException("\$destChat must be a User");
        if(get_class($fromChat) !== "User")
            throw new TelegramException("\$fromChat must be a User");
        if(get_class($message) !== "Message")
            throw new TelegramException("\$message must be a Message");
        
        $data = array();
        $data["chat_id"] = $destChat->id;
        $data["from_chat_id"] = $fromChat->id;
        $data["disable_notification"] = $this->bot->config->notification;
        $data["message_id"] = $message->message_id;
        return $this->exec("forwardMessage", $data);
    }
}
