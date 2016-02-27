<?php

session_set_cookie_params( "0", dirname( $_SERVER["SCRIPT_NAME"] ) );
session_name( "PHPSESSID".sha1( dirname( $_SERVER["SCRIPT_NAME"] ) ) );
session_start();
if(isset($_SERVER["REMOTE_USER"])) $_SESSION[session_name()] = $_SERVER["REMOTE_USER"] ;
else if (isset($_SERVER["REDIRECT_REMOTE_USER"])) $_SESSION[session_name()] = $_SERVER["REDIRECT_REMOTE_USER"] ;
else $_SESSION[session_name()] = "Unknown";

if(!isset($_POST["input-1"])||!$_POST["input-1"]) {

?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Example</title>
        <link rel="stylesheet" href="src/css/error.styles.css" />
        
    </head>

    <body>
        <h1>Errors</h1>
<?php
    echo "<p>You have to set 'Name' field before.</p>";
    echo "<p><a href='help.html'>Read the help carefully!</a></p>";
?>

    </body>
</html>
<?php

} else if( isset($_POST["part"])) {
    $_SESSION["input-1"] = $_POST["input-1"];
    header("Location: list.php?input-1=".$_POST["input-1"]);
} else if(isset($_POST["full"])) {
    $_SESSION["input-1"] = $_POST["input-1"];
    $_SESSION["input-2"] = $_POST["input-2"];
?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Example</title>
        <link rel="stylesheet" href="src/css/result.styles.css" />
        
    </head>

    <body>
        <h1>Ok!</h1>
<?php
    echo "<p>You have set 'Name' as '".$_SESSION["input-1"]."'</p>";
    echo "<p>You have set 'Value' as '".($_SESSION["input-2"]?$_SESSION["input-2"]:'empty')."'</p>";
    echo "<p><a href='index.php?reset=1' target='_parent'>go to the new one</a></p>";
    unset($_SESSION["input-1"]);
    unset($_SESSION["input-2"]);
}
?>

    </body>
</html>