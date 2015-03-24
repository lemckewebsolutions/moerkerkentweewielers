<?php
session_start();
if(!$_SESSION['ingelogd']){
header('Location: login.php?url=index.php');
}
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include_once '../../lib/Database.class.php';
$db = new Database();

global $_FILES;

$extentie_check = false;

$ID = $_POST['ID'];
$soortid = $db->escapeString($_POST['soort']);
$merk = $db->escapeString($_POST['merk']);
$model = $db->escapeString($_POST['model']);
$categorie = $db->escapeString($_POST['categorie']);
$frame = $db->escapeString($_POST['frame']);
$framemaatid = $db->escapeString($_POST['framemaat']);
$wielmaatid = $db->escapeString($_POST['wielmaat']);
$sRemmen = $db->escapeString($_POST['remid']);
$nRemmen = $db->escapeString($_POST['nRemmen']);
$versnellingen = $db->escapeString($_POST['versnellingen']);
$extra = $db->escapeString($_POST['extra']);
$gewicht = $db->escapeString($_POST['gewicht']);
$kleur = $db->escapeString($_POST['kleur']);
$modeljaar = $db->escapeString($_POST['modeljaar']);
$adviesprijs= $db->escapeString($_POST['adviesprijs']);
$verkoopprijs = $db->escapeString($_POST['verkoopprijs']);
$beschrijving = $db->escapeString($_POST['beschrijving']);
$aGarantie = $db->escapeString($_POST['aGarantie']);
$sGarantie = $db->escapeString($_POST['garantieid']);
$verwacht = $db->escapeString($_POST['verwacht']);
$status = $db->escapeString($_POST['status']);
$filename = $db->escapeString($_FILES['userfile']['name']);
$uploadname = $db->escapeString($_FILES['userfile']['name']);


if($filename!=null && $filename!=""){
    $allow[0] = "jpg";
    $allow[1] = "gif";
    $allow[2] = "bmp";
    $allow[3] = "png";
    $allow[4] = "pneg";
    $allow[5] = "jpeg";

    // $allow[3] = "exe"; enz.

    $extentie = substr($uploadname, -3);
    echo strtolower($extentie);
    var_dump($allow);

    for ($i = 0; $i < count($allow); $i++)
    {
        if (strtolower($extentie) == $allow[$i])
        {
            $extentie_check = true;
        }
    }
    
    if ($extentie_check == true)
    {
        if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
            unlink("../../images/uploads/" . $uploadname);
            move_uploaded_file($_FILES['userfile']['tmp_name'], "../../images/uploads/" . $uploadname);
		$uploadpath = $uploadname;
		$insert_query = "UPDATE fietsen SET merk='$merk', model='$model', categorieid='$categorie', frameid='$frame', framemaatid='$framemaatid', wielmaatid='$wielmaatid', remid='$sRemmen', naam_remmen='$nRemmen', versnellingen='$versnellingen', extra='$extra', gewicht='$gewicht', kleur='$kleur', modeljaar='$modeljaar', adviesprijs='$adviesprijs', verkoopprijs='$verkoopprijs', beschrijving='$beschrijving', aGarantie='$aGarantie', garantieid='$sGarantie', verwacht='$verwacht', status='$status', uploadname='$uploadpath' WHERE ID=".$ID;
		$insert = $db->execute($insert_query);
    }
    } else
    {
        echo "Er is iets fout gegaan. Extentie = ".$extentie." check = ".$extentie_check;
    }
} else {
    $insert_query = "UPDATE fietsen SET merk='$merk', model='$model', categorieid='$categorie', frameid='$frame', framemaatid='$framemaatid', wielmaatid='$wielmaatid', remid='$sRemmen', naam_remmen='$nRemmen', versnellingen='$versnellingen', extra='$extra', gewicht='$gewicht', kleur='$kleur', modeljaar='$modeljaar', adviesprijs='$adviesprijs', verkoopprijs='$verkoopprijs', beschrijving='$beschrijving', aGarantie='$aGarantie', garantieid='$sGarantie', verwacht='$verwacht', status='$status' WHERE ID=".$ID;
    $insert = $db->execute($insert_query);
}

echo "<br /><b><u>".$merk." ".$model." is aangepast</u></b><br />";
?>
<script type="text/javascript">

function delayer(){
    window.location = '../index.php?page=fietsen&s=<?=$soortid?>&actie=edit_fiets&ID=<?=$ID?>'
}
setTimeout(delayer(), 5000);
//
</script>