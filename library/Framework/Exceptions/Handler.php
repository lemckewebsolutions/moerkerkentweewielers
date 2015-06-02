<?php
abstract class Framework_Exceptions_Handler
{
	public static function handleException(Exception $exception)
	{
		$receiver = "wouterlemcke@gmail.com";
		$subject = "Er is een fout opgetreden op moerkerkentweewielers.nl";
		$message = "Er is een fout opgetreden op moerkerkentweewielers.nl. \r\n";
		$message .= "\r\n";
		$message .= "Url: " . $_SERVER["REQUEST_URI"] . "\r\n";
		$message .= "Foutmelding: " . $exception->getMessage() . "\r\n";
		$message .= "Trace: " . $exception->getTraceAsString();
		$headers = 'From: webmaster@moerkerkentweewielers.nl' . "\r\n";
		$headers .= 'Reply-To: contact@lemckewebsolutions.nl' . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();

		mail($receiver, $subject, $message, $headers);
	}
}