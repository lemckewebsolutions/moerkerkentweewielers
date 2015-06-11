<?php

/**
 * Description of Database
 *
 * @author Wouter Lemcke
 */
class Database {
    private $server = "localhost"; 
    private $gebruiker = "moetwee_admin"; 
    private $wachtwoord = "hennie67"; 
    private $db = "moetwee_db";
    private $connected = false;
    
    private function connect()
    {
        $connectie = mysql_connect($this->server,$this->gebruiker,$this->wachtwoord) 
        or die ("Kon geen verbinding maken met de server: ".mysql_error()); 
        mysql_select_db($this->db,$connectie) 
        or die ("Kon de database niet selecteren");
        $this->connected = true;
    }
    
    private function closeConnection()
    {
        if($this->connected)
        {
            mysql_close();
            $this->connected = false;
        }
    }
    
    public function execute($queryString)
    {
        $this->connect();
        
        $results = mysql_query($queryString) or die(mysql_error()." ".$queryString);
        
        $this->closeConnection();
        
        return $results;
    }
    
    public function escapeString($unescaped_string)
    {
        $this->connect();
        
        $result = mysql_real_escape_string($unescaped_string);
        
        $this->closeConnection();
        
        return $result;
    }
    
    
}

?>
