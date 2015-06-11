<?php
include_once 'Database.class.php';
class Visiting
{
    private $currentTime;
    private $openTime;
    private $closeTime;
    private $todayClosed = false;
    private $db;
    
    function __construct()
    {
	 $this->currentTime = time();
	 
	 include_once 'connect.php';
	 
	 $this->setOpeningsTimes($this->currentTime);
	 
	 if(isset($_GET['closetime']))
	 {
	     $this->closeTime = strtotime($_GET['closetime']);
	 }
    }
    
    /**
     * zet de openingstijden vanuit huidige timestamp
     * 
     * @param timestamp $currentTime
     */
    function setOpeningsTimes($currentTime)
    {
	
	$query = "  Select *
		    from openingsuren ou
		    where ou.openingsurenid = ".date('w', $currentTime);
	
	$result = mysql_query($query) or die();
	$openingstijden = mysql_fetch_object($result);
	if($openingstijden == null || $openingstijden->gesloten == 'Y')
        {
	    $this->todayClosed = true;
	}
	else
	{
	    $this->openTime = $openingstijden->openingstijd;
	    $this->closeTime = $openingstijden->sluitingstijd; 
	}
    }
    
    function getSecUntilClosing()
    {
	if($this->todayClosed == true)
	{
	    return false;
	}
	
	if($this->currentTime > strtotime($this->openTime) && $this->currentTime < strtotime($this->closeTime))
	{
	    return (strtotime($this->closeTime) - $this->currentTime);
	}
	else
	{
	    return false;
	}
    }
}
?>
