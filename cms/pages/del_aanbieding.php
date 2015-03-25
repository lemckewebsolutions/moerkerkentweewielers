<?php
if(!isset($_SESSION))
{
 session_start();
}
if(!$_SESSION['ingelogd']){
header('Location: login.php?url=index.php');
}
include('../../lib/Database.class.php');

$db = new Database();

$id = $_GET['ID'];

$getFoto = $db->execute("Select * from aanbiedingen where ID='$id'");
$fotoURL = "";
$pos;
while($record = mysql_fetch_object($getFoto)){
	$fotoURL = $record->foto_url;
        $pos = $record->pos;
}
$delQuery = "DELETE FROM aanbiedingen where ID='$id'";

$sQuery = "Select * from aanbiedingen where pos > ".$pos;
$queryResult = $db->execute($sQuery);

while($result = mysql_fetch_object($queryResult))
{
    $sUpdate = "Update aanbiedingen
                set pos = ".($result->pos - 1)."
                where ID = ".$result->ID;
    $updateQuery = $db->execute($sUpdate);
}
$delete = $db->execute($delQuery);
//DELETE FOTO
unlink("../images/uploads/".$fotoURL);

echo'<script type="text/javascript"> window.location = "../index.php?page=aanbiedingen"</script>';
?>