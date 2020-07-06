<?php

// Credit to Yehuda Eisenberg - https://gist.github.com/YehudaEi/c0ae248fae39020ab4aabc1047984902

$ERROS_COUNTER = 0;

function ReportError($ErrorId, $ErrorMes, $ErrorFile, $ErrorLine, $t,  $fathernum = 0){
    global $ERROS_COUNTER;
    $ERROS_COUNTER++;
    
    echo "\n<div dir='ltr'>\n\t";
    if($ErrorId == E_USER_ERROR || $ErrorId == E_ERROR || $ErrorId == E_CORE_ERROR || $ErrorId == E_COMPILE_ERROR)
        echo "<span style='font-weight:bold; color:red;'>Fatal Error !</span> [".$ErrorId."]<br>";
    elseif($ErrorId == E_USER_WARNING || $ErrorId == E_WARNING || $ErrorId == E_CORE_WARNING || $ErrorId == E_COMPILE_WARNING)
        echo "<span style='font-weight:bold; color:orange;'>Warning!</span> [".$ErrorId."]<br>";
    elseif($ErrorId == E_USER_NOTICE || $ErrorId == E_NOTICE)
        echo "<span style='font-weight:bold; color:blue;'>Note!</span> [".$ErrorId."]<br>";
    elseif($ErrorId == E_PARSE)
        echo "<span style='font-weight:bold; color:red;'>Syntax error!</span> [".$ErrorId."]<br>";
    else
        echo "<span style='font-weight:bold; color:green;'>Unknown error!</span> [".$ErrorId."]<br>";
    
    //var_dump(debug_backtrace());
    
    echo "<table style='padding-left: 2em;'>
    <tr>
        <td><span style='font-weight:bold;'>• More details: </span></td>
        <td dir='ltr'>"./* htmlspecialchars */($ErrorMes)."</td>
    </tr>
    <tr>
        <td><span style='font-weight:bold;'>• File location: </span></td>
        <td dir='ltr'>"./* htmlspecialchars */($ErrorFile)."</td>
    </tr>
    <tr>
        <td><span style='font-weight:bold;'>• Line: </span></td>
        <td dir='ltr'>".$ErrorLine."</td>
    </tr>
    <tr>
        <td><span style='font-weight:bold;'>• Google: </span></td>
        <td dir='ltr'><a target='_blank' href='https://www.google.com/search?q=php error ".urlencode(htmlspecialchars_decode($ErrorMes))."'>Search in Google</a></td>
    </tr>
    
    <tr>
        <td><span style='font-weight:bold;'>• StackOverflow: </span></td>
        <td dir='ltr'><a target='_blank' href='https://stackoverflow.com/search?q=php error ".urlencode(htmlspecialchars_decode($ErrorMes))."'>Search in StackOverflow</a></td>
    </tr>
</table></div><br>";
    return NULL;
}
set_error_handler("ReportError");

function exceptionHandler($exception){
    var_dump($exception);
}
set_exception_handler('exceptionHandler');

function shutdown(){
    if(error_reporting() && !empty(error_get_last()) && error_get_last()['type']){
        $tmp = error_get_last();
        ReportError($tmp['type'], $tmp['message'], $tmp['file'], $tmp['line'], null);
        error_clear_last();
    }
    
    global $ERROS_COUNTER;
    if($ERROS_COUNTER > 0){
        echo "\n\n<h2>Total Errors: ".$ERROS_COUNTER."</h2>";
    }
}
register_shutdown_function('shutdown');

error_reporting(-1);
ini_set('display_errors', 'Off');

?>