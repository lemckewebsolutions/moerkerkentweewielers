<?
if (!isset ($_COOKIE[ini_get('session.name')]))
{
    session_start();
}

if(!$_SESSION['ingelogd']){
header('Location: login.php?url=index.php');
}
ini_set('display_errors', 'On');
error_reporting(E_ALL);

global $_FILES;

$extentie_check = "False";

$soortid = $db->escapeString($_POST['soort']);
$merk = $db->escapeString($_POST['merk']);
$model = $db->escapeString($_POST['model']);
$categorieid = $db->escapeString($_POST['categorie']);
$frameid = $db->escapeString($_POST['frame']);
$framemaatid = $db->escapeString($_POST['framemaat']);
$wielmaat = $db->escapeString($_POST['wielmaat']);
$remid = $db->escapeString($_POST['remid']);
$nRemmen = $db->escapeString($_POST['nRemmen']);
$versnellingen = $db->escapeString($_POST['versnellingen']);
$extra = $db->escapeString($_POST['extra']);
$gewicht = $db->escapeString($_POST['gewicht']);
$kleur = $db->escapeString($_POST['kleur']);
$modeljaar = $db->escapeString($_POST['modeljaar']);
$registratie = $db->escapeString($_POST['registratie']);
$adviesprijs = $db->escapeString($_POST['adviesprijs']);
$verkoopprijs = $db->escapeString($_POST['verkoopprijs']);
$beschrijving = $db->escapeString($_POST['beschrijving']);
$aGarantie = $db->escapeString($_POST['aGarantie']);
$garantieid = $db->escapeString($_POST['garantieid']);
$verwacht = $db->escapeString($_POST['jVerwacht'].'-'.$_POST['mVerwacht'].'-'.$_POST['dVerwacht']);
$status = $db->escapeString($_POST['status']);
$filename = $db->escapeString($_FILES['userfile']['name']);
$uploadname = $db->escapeString($_FILES['userfile']['name']);

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
        move_uploaded_file($_FILES['userfile']['tmp_name'], "../images/uploads/" . $uploadname);
		$uploadpath = $uploadname;
		$insert_query = "INSERT INTO fietsen (
                                        soortid,
                                        merk,
                                        model,
                                        categorieid,
                                        frameid,
                                        framemaatid,
                                        wielmaatid,
                                        remid,
                                        naam_remmen,
                                        versnellingen,
                                        extra,
                                        gewicht,
                                        kleur,
                                        modeljaar,
                                        registratienummer,
                                        adviesprijs,
                                        verkoopprijs,
                                        beschrijving,
                                        aGarantie,
                                        garantieid,
                                        verwacht,
                                        status,
                                        uploadname
                                )   VALUES (
                                        '$soortid',
                                        '$merk',
                                        '$model',
                                        '$categorieid',
                                        '$frameid',
                                        '$framemaatid',
                                        '$wielmaat',
                                        '$remid',
                                        '$nRemmen',
                                        '$versnellingen',
                                        '$extra',
                                        '$gewicht',
                                        '$kleur',
                                        '$modeljaar',
                                        '$registratie',
                                        '$adviesprijs',
                                        '$verkoopprijs',
                                        '$beschrijving',
                                        '$aGarantie',
                                        '$garantieid',
                                        '$verwacht',
                                        '$status',
                                        '$uploadpath')";
		$insert = $db->execute($insert_query);

        //echo "<br /><b><u>".$merk." ".$model." is toegevoegd</u></b><br />";//Extentie = ".$extentie." check = ".$extentie_check;
?>
    <script type="text/javascript">
        alert("<?=$merk?> <?=$model?> is toegevoegd");
        window.location = "index.php?fietsoverzicht&page=fietsen&s=<?=$soortid?>"
    </script>
<?
    }
}
else
{
?>
    <script type="text/javascript">
        alert("Er is iets fout gegaan.");
        window.location = "index.php?addFiets&page=insert_bike&s=<?=$soortid?>"
    </script>
<?
}
include_once("fietsen.php");
?>