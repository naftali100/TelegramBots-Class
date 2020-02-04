<?

define('BOT_CLASS');

$files = array(
    "init.php", 
    "helpers.php", 
    "update.php", 
    "BotClass.php"
);

foreach($files as $file){
    if(file_exists($file))
        require_once($file);
    else
        throw new Exception ($file.' not found');
}

/*

// uncomment this function to get the php errors in telegram
set_exception_handler(array('Helpers', 'error_handler'));

or: 

set_exception_handler('error_handler');
function error_handler($e){
    global $bot;
    $r["file"] = $e->getFile();
    $r["error"] = $e->getMessage();
    $r["line"] = $e->getLine();
    $bot->sendMessage(WEBMASTER_TG_ID, $r);
}
*/


$bot = new Bot(BOT['token'], BOT['debug']);
Helpers::SetBot($bot);

if(isset($chatType) && isset($chatId))
    $bot->SaveID($chatId, $chatType);
