<?php
include_once "../lib/Database.class.php";

$db = new Database();


session_start();
$url = $_GET['url'];

//---------------------------------- INLOGGEN -----------------------------------\\
if($_GET['actie'] == 'inloggen'){

        $result = $db->execute("SELECT * FROM users WHERE username ='".$db->escapeString($_POST['username'])."'");

	$tel = $db->execute("SELECT COUNT(*) FROM users WHERE username ='".$db->escapeString($_POST['username'])."'");
	if ($tel == 0){
		echo'De username komt niet voor in de datebase';
	}
	elseif ($tel > 0){
		$login = mysql_fetch_object($result);

		if (md5($db->escapeString($_POST['password'])) == $login->password){
			$_SESSION['username'] = $db->escapeString($_POST['username']);
			$_SESSION['user_id'] = $login->id;
                        $_SESSION['rights'] = $login->rights;
			$_SESSION['ingelogd'] = true;
?>
    <html>
        <head>
            <script type="text/javascript">
                <!--
                function delayer(){
                    window.location = "index.php"
                }
                //-->
            </script>
        </head>
        <body onLoad="setTimeout('delayer()', 2000)">
            <h2>Inloggen gelukt!</h2>
            <p>U wordt doorgestuurd.</p>
        </body>
    </html>
<?
		}
		else
                {
?>
    <html>
        <head>
            <script type="text/javascript">
                <!--
                function delayer(){
                    window.location = "login/index.php"
                }
                //-->
            </script>
        </head>
        <body onLoad="setTimeout('delayer()', 2000)">
            <h2>Inloggen mislukt</h2>
        </body>
    </html>
<?
                        
		}
	}
}
?>
