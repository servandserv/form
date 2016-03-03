<?php

function bb_media_json($json_str, $schema = null)
{
    $json = json_decode($json_str);
    if(($json != $json_str) && $json) {
        return $json;
    }
    return null;
}

function bb_media_xml($xml_str, $schema = null) 
{
    // http://phpclub.ru/talk/threads/xml-%D1%84%D0%B0%D0%B9%D0%BB-isvalid.59122/
    /*
    $xml_regex = '{
    ^(
    (?: <(\w++) [^>]*+ (?<!/)> (?1) </\2> # matched pair of tags
        | [^<>]++                                       # non-tag stuff
        | <\w[^>]*+/>                                   # self-closing tag
        | <!--.*?-->                                    # comment
        | <!\[CDATA\[.*?]]>                             # cdata block
        | <\?.*?\?>                                     # processing instruction
        | <![A-Z].*?>                                   # Entity declaration, etc.
    )*+
    )$
    }sx';
    if (preg_match($xml_regex, $xml_str)) {
        $xr = new XMLReader();
        $xr->XML($xml_str);
        return $xr;
    }
    */
    try {
        $dom = new DOMDocument("1.0", "UTF-8");
        $dom->loadXML($xml_str);
        if(!$schema || ( $schema && $dom->schemaValidate( $schema ) ) ) {
            return $dom;
        }
    } catch (\Exception $e) {
        // doing nothing
    }
    
    return null;
}