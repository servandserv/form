<?php

session_set_cookie_params( "0", dirname( $_SERVER["SCRIPT_NAME"] ) );
session_name( "PHPSESSID".sha1( dirname( $_SERVER["SCRIPT_NAME"] ) ) );
session_start();
if(isset($_SERVER["REMOTE_USER"])) $_SESSION[session_name()] = $_SERVER["REMOTE_USER"] ;
else if (isset($_SERVER["REDIRECT_REMOTE_USER"])) $_SESSION[session_name()] = $_SERVER["REDIRECT_REMOTE_USER"] ;
else $_SESSION[session_name()] = "Unknown";
    
$sl = new \ArrayObject();
$sl['DEFAULT_REPLACE_PAIRS'] = function() use ( $sl ) {
    return array(
        "\r" => '', //браузер для совместимости добавляет долбаный вендовый перевод строки - вырезаем его
        "&" => '&amp;', //экранировать амперсанд
        "&#8470;" => 'N', //русский "номер" заменить на N
        "&#171;" => '"', //заменить ковычки << на "
        "&#187;" => '"', //заменить ковычки >> на "
        "&#8211;" => '-', //заменить "длинное тире" на -
        "&#8212;" => '-', //заменить "длинное тире" на -
        "–" => '-',
        "—" => '-',
        "―" => '-',
        "«" => '"',
        "»" => '"',
        "№" => 'N',
    );
};
