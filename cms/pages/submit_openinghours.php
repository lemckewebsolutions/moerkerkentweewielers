<?php
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
include_once '../../lib/Database.class.php';
$db = new Database();

$i = 1;
foreach($_POST['opening'] as $tijd)
{
    $update = "	Update openingsuren ou
		set ou.openingstijd = '".$tijd."'
		where ou.openingsurenid = ".$i;
    $db->execute($update);
    $i++;
}

$i = 1;
foreach($_POST['closing'] as $tijd)
{
    $update = "	Update openingsuren ou
		set ou.sluitingstijd = '".$tijd."'
		where ou.openingsurenid = ".$i;
    $db->execute($update);
    $i++;
}

$update = "	Update openingsuren ou
	    set ou.gesloten = 'N'";
$db->execute($update);

foreach($_POST['closed'] as $closed)
{    
    $update = "	Update openingsuren ou
		set ou.gesloten = 'Y'
		where ou.openingsurenid = ".$closed;
    $db->execute($update);
}

header('Location: ../index.php?openingstijden&page=openingHours');
?>
