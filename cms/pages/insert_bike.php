<?php
session_start();
if(!$_SESSION['ingelogd']){
header('Location: login/index.php');
}

$soortid = null;

if(isset($_GET['s']))
{
    $soortid = $_GET['s'];
}
else
{
    $soortid = 1;
}

if(isset($soortid) && $soortid == 1)
{
    echo "<h1>Nieuwe fietsen invoeren</h1>";
}
elseif(isset($soortid) && $soortid == 2)
{
    echo "<h1>Gebruikte fietsen invoeren</h1>";
}
?>

<form enctype="multipart/form-data" action="index.php?page=upload" method="post"> 
<table>
<input type="hidden" name="MAX_FILE_SIZE" value="15728640" />
<!-- MAX FILE SIZE IS IN BYTES 15728640 BYTES = 15MB-->
<input type="hidden" name="soort" value="<?=$soortid?>" />
<tr><td>Merk: </td><td><input name="merk" type="text"></td></tr>
<tr><td>Model: </td><td><input name="model" type="text"></td></tr>
<tr><td>Categorie: </td><td>
	<select name="categorie">
<?php
    $query = $db->execute("Select * from categorie order by categorietype");
    while($record = mysql_fetch_object($query))
    {
?>
	<option value="<?=$record->categorieid?>"><?=$record->categorietype?></option>
<?php
    }
?>
	</select></td></tr>
	<tr><td>Frame: </td><td>
	<select name="frame">
<?php
    $query = $db->execute("Select * from frame order by frametype");
    while($record = mysql_fetch_object($query))
    {
?>
	<option value="<?=$record->frameid?>"><?=$record->frametype?></option>
<?php
    }
?>
	</select>
</td></tr>
<tr><td>Framemaat:</td><td>
	<select name="framemaat">
<?php
    $query = $db->execute("Select * from framemaat order by framemaat");
    while($record = mysql_fetch_object($query))
    {
        $eenheid;
        $eenheidQeuryCode = "Select framemaateenheid
                                    from framemaateenheid
                                    where framemaateenheidid = ".$record->eenheid;
        $eenheidQuery = $db->execute($eenheidQeuryCode) or die($eenheidQueryCode." ".mysql_error());
        while($eenheidresult = mysql_fetch_object($eenheidQuery))
        {
            $eenheid = $eenheidresult->framemaateenheid;
        }
?>
	<option value="<?=$record->framemaatid?>"><?=$record->framemaat." "."$eenheid"?></option>
<?php
    }
?> 
	</select></td></tr>
<tr><td>Wielmaat: </td><td>
	<select name="wielmaat">
<?php
    $query = $db->execute("Select * from wielmaat order by wielmaat");
    while($record = mysql_fetch_object($query))
    {
?>
	<option value="<?=$record->wielmaatid?>"><?=$record->wielmaat?></option>
<?php
    }
?>    
	</select>inch</td></tr>
<tr><td>Soort Remmen: </td><td>
	<select name="remid">
<?php
    $query = $db->execute("Select * from rem order by remtype");
    while($record = mysql_fetch_object($query))
    {
?>
	<option value="<?=$record->remid?>"><?=$record->remtype?></option>
<?php
    }
?>
	</select></td></tr>
<tr><td>Naam Remmen: </td><td><input name="nRemmen" type="text">(bijv. Magura HS11)</td></tr>
<tr><td>Versnellingen: </td><td><input name="versnellingen" type="text">(bijv. 27 - Deore LX)</td></tr>
<tr><td>Extra's: </td><td><textarea name="extra" cols="40" rows="10"></textarea></td></tr>
<tr><td>Gewicht: </td><td><input name="gewicht" type="text">kg</td></tr>
<tr><td>Kleur: </td><td><input name="kleur" type="text"></td></tr>
<tr><td>Modeljaar: </td><td><input name="modeljaar" type="text"></td></tr>
<tr><td>Registratienummer: </td><td><input name="registratie" type="text"></td></tr>
<tr><td>Adviesprijs: </td><td><input name="adviesprijs" type="text">Euro</td></tr>
<tr><td>Verkoopprijs: </td><td><input name="verkoopprijs" type="text">Euro</td></tr>
<tr><td>Beschrijving: </td><td><textarea name="beschrijving" cols="40" rows="10"></textarea><br />
</td></tr>
<tr><td>Garantie: </td><td><input name="aGarantie" type="text">maanden
	<select name="garantieid">
<?php
    $query = $db->execute("Select * from garantie order by garantietype");
    while($record = mysql_fetch_object($query))
    {
?>
	<option value="<?=$record->garantieid?>"><?=$record->garantietype?></option>
<?php
    }
?>
	</select>							
			</td></tr>
<tr><td>Verwacht op: </td><td><input name="dVerwacht" type="text" size="2">
							<select name="mVerwacht">
									<option value="01">Januari</option>
									<option value="02">februari</option>
									<option value="03">maart</option>
									<option value="04">april</option>
									<option value="05">mei</option>
									<option value="06">juni</option>
									<option value="07">juli</option>
									<option value="08">augustus</option>
									<option value="09">september</option>
									<option value="10">oktober</option>
									<option value="11">november</option>
									<option value="12">december</option>
							</select><input name="jVerwacht" type="text" size="4">(dd-maand-jjjj)
					</td></tr>
<tr><td>Status: </td><td>
	<select name="status">
		<option value="Beschikbaar">Beschikbaar</option>
		<option value="Gereserveerd">Gereserveerd</option>
		<option value="Verkocht">Verkocht</option>
	</select>
</td></tr>					
<tr><td>Selecteer een foto: </td><td><input name="userfile" type="file"></td></tr>
<tr><td colspan="2"><u>De foto mag niet groter zijn dan 15MB en moet in JPG, GIF, BMP of PNG formaat zijn</u></td></tr>
<tr><td colspan="2"><button type="submit" class="btn btn-primary">Voeg toe!</button></td></tr>
</table>
</form>