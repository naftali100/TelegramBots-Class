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

spl_autoload_register(function($class) {
    $className = basename($class);

    $ds = DIRECTORY_SEPARATOR;

	if (file_exists(dirname(__FILE__) . $ds . $className . '.php')) {
		include dirname(__FILE__) . $ds . $className . '.php';
    }
    elseif(file_exists(dirname(__FILE__) . $ds . 'Objects' . $ds . $className . '.php')){
        include dirname(__FILE__) . $ds . 'Objects' . $ds . $className . '.php';
    }
    elseif(file_exists(dirname(__FILE__) . $ds . 'Exception' . $ds . $className . '.php')){
        include dirname(__FILE__) . $ds . 'Exception' . $ds . $className . '.php';
    }
    else{
        throw new Exception("Class '$className' does not exist");
    }
});

