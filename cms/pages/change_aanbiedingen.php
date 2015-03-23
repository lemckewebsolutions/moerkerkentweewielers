<?php
session_start();
if(!$_SESSION['ingelogd']){
header('Location: login.php?url=index.php');
}
include"../../lib/Database.class.php";

$db = new Database();

global $_FILES;

$extentie_check = "False";

$ID = $_POST['ID'];
$titel = $db->escapeString($_POST["titel"]);
$van = $db->escapeString($_POST["van"]);
$voor = $db->escapeString($_POST["voor"]);
$cat = $db->escapeString($_POST["cat"]);
$omschrijving = $db->escapeString($_POST["omschrijving"]);
$uploadname = $_FILES['userfile']['name'];

if($uploadname!=null && $uploadname!="" && isset($uploadname)){
    $allow[0] = "jpg";
    $allow[1] = "gif";
    $allow[2] = "bmp";
    $allow[3] = "png";
    $allow[4] = "JPG";

    // $allow[3] = "exe"; enz.
    
    $extentie = substr($uploadname, -3);
    
    for ($i = 0; $i < count($allow); $i++)
    {
	if ($extentie == $allow[$i])
	{
	    $extentie_check = "True";
	    $i = count($allow) + 5; // om loop te beindigen
	}
    }
    
    if ($extentie_check == "True")
    {
	if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
	    move_uploaded_file($_FILES['userfile']['tmp_name'], "../../images/uploads/aanbiedingen/" . $uploadname);
		    $url = "aanbiedingen/" . $uploadname;
		    $query = $db->execute("UPDATE aanbiedingen SET titel='$titel', van='$van', voor='$voor', cat='$cat', omschrijving='$omschrijving', foto_url='aanbiedingen/$uploadname' WHERE ID='$ID'");
		    
		    header('Location: http://cms.moerkerkentweewielers.nl/index.php?page=aanbiedingen');
	}
    }
    else
    {
	echo "Er is iets fout gegaan. Extentie = ".$extentie." check = ".$extentie_check." totaal = ".$uploadname;
    }
} else {
    $query = $db->execute("UPDATE aanbiedingen SET titel='$titel', van='$van', voor='$voor', cat='$cat', omschrijving='$omschrijving' WHERE ID='$ID'");
    header('Location: http://cms.moerkerkentweewielers.nl/index.php?page=aanbiedingen');
}
?>