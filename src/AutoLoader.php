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

spl_autoload_register(function($className) {
	if (file_exists(dirname(__FILE__) . '/' . $className . '.php')) {
		include dirname(__FILE__) . '/' . $className . '.php';
    }
    elseif(file_exists(dirname(__FILE__) . 'Objects/' . $className . '.php')){
        include dirname(__FILE__) . 'Objects/' . $className . '.php';
    }
    elseif(file_exists(dirname(__FILE__) . '/Exception/' . $className . '.php')){
        include dirname(__FILE__) . '/Exception/' . $className . '.php';
    }
    else{
        throw new Exception("Class '$className' does not exist");
    }
});

