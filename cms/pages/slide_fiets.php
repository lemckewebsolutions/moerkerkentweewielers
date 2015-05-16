<h1>Slide fietsen</h1>
<?php
session_start();
if(!$_SESSION['ingelogd']){
header('Location: login/index.php');
}
//ini_set('display_errors', 'On'); 
//error_reporting(E_ALL); 

if($_GET['actie']=='change'){
	$updateStr1 = 'update slideNieuweFietsen SET fietsID='.$_POST['slide1'].' WHERE slideID=1';
	//echo $updateStr1;
	$updateStr2 = 'update slideNieuweFietsen SET fietsID='.$_POST['slide2'].' WHERE slideID=2';
	//echo $updateStr2;
	$updateStr3 = 'update slideNieuweFietsen SET fietsID='.$_POST['slide3'].' WHERE slideID=3';
	//echo $updateStr3;
	$update1 = $db->execute($updateStr1);
	$update2 = $db->execute($updateStr2);
	$update3 = $db->execute($updateStr3);
	//header('Location: ?page=slide_fiets');
}



$getSlide = $db->execute("Select * from slideNieuweFietsen");
$getSlide2 = $db->execute("Select * from slideNieuweFietsen where slideID = 2");
$getSlide3 = $db->execute("Select * from slideNieuweFietsen where slideID = 3");
$slideID1;
$slideID2;
$slideID3;


while($record = mysql_fetch_object($getSlide2)){
	$slideID2 = $record->fietsID;
}
while($record = mysql_fetch_object($getSlide3)){
	$slideID3 = $record->fietsID;
}

//echo $slideID1;
//echo $slideID2;
//echo $slideID3;
?>
<html>
<body>
<form method="POST" action="?page=slide_fiets&actie=change">
<?php
    while($record = mysql_fetch_object($getSlide))
    {
        $currentFietsID;
        $currentFietsID = $record->fietsID;
?>
        <p>Slide <?=$record->slideID?>:
            <select name="slide<?=$record->slideID?>">
<?php
                $query = "Select * from fietsen f order by f.merk, f.model";
                $getFietsen = $db->execute($query);
                while($result = mysql_fetch_object($getFietsen))
                {
                   if($result->ID == $currentFietsID)
                   {
?>
			<option value="<?=$result->ID?>" selected ><b><?=$result->merk . ' / ' . $result->model?></b></option>
<?php
                    }
                    else
                    {
?>
			<option value="<?=$result->ID?>"><?=$result->merk . ' / ' . $result->model?></option>
<?php
                    }
                }
?>
            </select>

<?php
	}
?>
<input type="submit" name="change" value="Verander"></p>
</form>
</body>
</html>