<?php

if(isset($_GET)||$_GET["input-1"]) {

?>

<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Example</title>
        <link rel="stylesheet" href="src/css/list.styles.css" />
        
    </head>

    <body>
<?php
    echo "<h1>Values for Name - ".$_GET["input-1"]."</h1>";
    echo "<form method='GET' action='index.php' target='_parent'>";
    echo "<ul>";
    $list = array("1","2","3");
    foreach($list as $li) {
        echo "<li><p><input type='radio' name='input-2' value='$li' /><label>$li</label></p></li>";
    }
    echo "</ul>";
    echo "<input type='submit' value='Select' />";
    echo "</form>";
?>

    </body>
</html>
<?php

} else if( isset($_POST["part"])) {
    header("Location: list.php");
} else {
    
}
?>