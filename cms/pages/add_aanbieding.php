<?php

if(!isset($_SESSION))
{
    session_start();
}
if(!$_SESSION['ingelogd']){
header('Location: login.php?url=index.php');
}

include_once '../../lib/Database.class.php';

$db = new Database();

global $_FILES;

$extentie_check = "False";

$titel = $db->escapeString($_POST["titel"]);
$van = $db->escapeString($_POST["van"]);
$voor = $db->escapeString($_POST["voor"]);
$cat = $_POST['cat'];
$omschrijving = $db->escapeString($_POST["omschrijving"]);
$uploadname = $_FILES['userfile']['name'];

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

                //verhoog alle posities met 1
                $sQuery = "Select * from aanbiedingen";
                $queryResult = $db->execute($sQuery);
                while($result = mysql_fetch_object($queryResult))
                {
                    $sUpdateQuery = "Update aanbiedingen
                                     set pos = ".($result->pos+1)."
                                     where ID = ".$result->ID;
                    $updateQuery = $db->execute($sUpdateQuery);
                }
		$query = $db->execute("INSERT INTO aanbiedingen (ID, titel, van, voor, omschrijving, cat, pos, foto_url) VALUES ('','".$titel."','".$van."','".$voor."','".$omschrijving."', '".$cat."', 1, '".$url."')");

        //echo "<br /><b><u>".$merk." ".$model." is toegevoegd</u></b><br />";//Extentie = ".$extentie." check = ".$extentie_check;
		
		header('Location: http://cms.moerkerkentweewielers.nl/index.php?page=aanbiedingen');
    }
}
else
{
    echo "Er is iets fout gegaan. Extentie = ".$extentie." check = ".$extentie_check." totaal = ".$uploadname;
}
?>