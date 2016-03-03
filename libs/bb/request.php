<?php

define("BB_REQUEST_CONTENT_UNKNOWN",0);
define("BB_REQUEST_CONTENT_JSON",1);
define("BB_REQUEST_CONTENT_XML",2);
define("BB_REQUEST_CONTENT_FORM_DATA",3);

function bb_request_raw_post_data() {
    if ( !isset( $GLOBALS["HTTP_RAW_POST_DATA"] ) ) {
        $GLOBALS["HTTP_RAW_POST_DATA"] = file_get_contents("php://input");
    }
    return $GLOBALS["HTTP_RAW_POST_DATA"];
}

function bb_request_content() {
    if($_SERVER["REQUEST_METHOD"] == "POST" &&
        array_key_exists("CONTENT_TYPE", $_SERVER) &&
        strpos($_SERVER["CONTENT_TYPE"], "/json") !== FALSE ) {
        return BB_REQUEST_CONTENT_JSON;
    } else if($_SERVER["REQUEST_METHOD"] == "POST" &&
        array_key_exists("CONTENT_TYPE", $_SERVER) &&
        strpos($_SERVER["CONTENT_TYPE"], "/xml") !== FALSE) {
        return BB_REQUEST_CONTENT_XML;
    } else {
        return BB_REQUEST_CONTENT_FORM_DATA;
    }
}

/**
* Подчищает входные данные - лишние пробелы, переносы и пр.
* @param string $value
* @param array $replace_pairs массив замен символов, передать array() чтобы отключить замену
* @return string
*/
function bb_request_cleanup($value, $replace_pairs) {
    return trim(strtr($value, $replace_pairs));
}