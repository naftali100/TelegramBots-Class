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

class Logger{
    private static $logPath = "bot.log";

    public static function Request($success, $method, $callData, $result){
        $line = str_pad(date('Y-m-d H:i:s'), 20) . 
            "Request: " . str_pad($method, 20) . 
            "CallData:" . str_replace(["\n","\t"], ["", ""], var_export($callData, true)) . 
            "Result:" . str_replace(["\n","\t"], ["", ""], var_export($result, true)) . 
            "\n";

        self::put($line);
    }

    public static function Update($update){
        $line = str_pad(date('Y-m-d H:i:s'), 20) . 
            "Update:" . str_replace(["\n","\t"], ["", ""], var_export($update, true)) . 
            "\n";

        self::put($line);
    }

    public static function Log(... $args){
        $line = str_pad(date('Y-m-d H:i:s'), 20) . 
            "Log:" . str_replace(["\n","\t"], ["", ""], var_export($args, true)) . 
            "\n";

        self::put($line);
    }

    private static function put($data){
        file_put_contents(self::$logPath, $data, FILE_APPEND | LOCK_EX);
    }
}


