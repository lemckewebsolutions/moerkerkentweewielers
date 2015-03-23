<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Moerkerken Tweewielers login</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>

		<div id="formContainer">
			<form id="login" method="post" action="../login.php?actie=inloggen">
				<a href="#" id="flipToRecover" class="flipLink">Vergeten?</a>
				<input type="text" name="username" id="loginEmail" onFocus="if(this.value=='Gebruikersnaam'){this.value=''}" onBlur="if(this.value==''){this.value='Gebruikersnaam'}" placeholder="Gebruikersnaam"/>
				<input type="password" name="password" id="loginPass" onFocus="if(this.value=='Wachtwoord'){this.value=''}" onBlur="if(this.value==''){this.value='Wachtwoord'}" placeholder="wachtwoord"/>
				<input type="submit" name="submit" value="Login" />
			</form>
			<form id="recover" method="post" action="../sendRecovery.php">
				<a href="#" id="flipToLogin" class="flipLink">Vergeten?</a>
				<input type="text" name="recoverEmail" id="recoverEmail" onFocus="if(this.value=='Emailadres'){this.value=''}" onBlur="if(this.value==''){this.value='Emailadres'}" value="Emailadres" />
				<input type="submit" name="submit" value="Stuur op" />
			</form>
		</div>        
        <!-- JavaScript includes -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="assets/js/script.js"></script>

    </body>
</html>

