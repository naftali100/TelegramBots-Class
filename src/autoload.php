<?php

define('BOT_CLASS', 1);

$dir = dirname(__FILE__);

$files = array(
    $dir."/init.php", 
    $dir."/helpers.php", 
    $dir."/methods.php", 
    $dir."/update.php"
);

foreach($files as $file){
    if(file_exists($file))
        require_once($file);
    else
        throw new Exception ($file.' not found');
}

$bot = new Update(BOT['token'], $update, BOT['debug'] ?? false);
Helpers::SetBot($bot);

if(isset($bot->chatType) && isset($bot->chatId))
    $bot->SaveID($bot->chatId, $bot->chatType);
