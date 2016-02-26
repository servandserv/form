<?php
    session_set_cookie_params( "0", dirname( $_SERVER["SCRIPT_NAME"] ) );
    session_name( "PHPSESSID".sha1( dirname( $_SERVER["SCRIPT_NAME"] ) ) );
    session_start();
    if(isset($_SERVER["REMOTE_USER"])) $_SESSION[session_name()] = $_SERVER["REMOTE_USER"] ;
    else if (isset($_SERVER["REDIRECT_REMOTE_USER"])) $_SESSION[session_name()] = $_SERVER["REDIRECT_REMOTE_USER"] ;
    else $_SESSION[session_name()] = "Unknown";
    
    $input1 = isset($_SESSION["input-1"]) ? $_SESSION["input-1"] : "";
    $input2 = isset($_GET["input-2"]) ? $_GET["input-2"] : (isset($_SESSION["input-2"])?$_SESSION["input-2"]:"");
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Example</title>
        <link rel="stylesheet" href="src/css/styles.css" />
        
    </head>

    <body>
        <h1>Framed form control flow (no js)</h1>
        <div>
            <div>
                <form method="POST" action="controller.php" target="iframe">
                    <div>
                        <label for="input-1">Name</label>
                        <input type="text" id="input-1" name="input-1" value="<?php echo $input1; ?>" placeholder="set name" />
                    </div>
                    <div>
                        <label for="input-2">Value</label>
                        <input type="text" id="input-2" name="input-2" value="<?php echo $input2; ?>" placeholder="choose from list" />
                        <input type="submit" name="part" value="List" />
                    </div>
                    <div>
                        <input type="submit" name="full" value="Submit" />
                    </div>
                </form>
            </div>
            <div>
                <iframe id="iframe" name="iframe" src="help.html" width="100%" height="100%">;</iframe>
            </div>
        </div>
        <!--script type="text/javascript" src="src/js/iframemediator.js">;</script>
        <script type="text/javascript">
            var sc = document.getElementById('child-selection');
            var iframe1 = window.iframeMediator.createFrame(document.getElementById('iframe1'),{
                'setSelect': function(args) {
                    sc.innerHTML = args;
                    console.log('frame1',args);
                }
            }, false);
            iframe1.init();
                
            var iframe2 = window.iframeMediator.createFrame(document.getElementById('iframe2'),{
                'setSelect': function(args) {
                    sc.innerHTML = args;
                    console.log('frame2',args);
                }
            }, true);
            iframe2.init();
        </script-->
    </body>
</html>