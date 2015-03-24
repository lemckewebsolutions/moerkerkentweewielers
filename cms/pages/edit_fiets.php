<?php
if(!session_id())
{
   session_start();
}
if(!$_SESSION['ingelogd']){
header('Location: login/index.php');
}
?>
<form enctype="multipart/form-data" action="pages/edit_fiets_submit.php" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="15728640" />
    <!-- MAX FILE SIZE IS IN BYTES 15728640 BYTES = 15MB-->
    <input type="hidden" name="ID" value="<?=$ID?>" />
    <input type="hidden" name="soort" value="<?=$_GET['s']?>" />
<table>
	<tr>
            <td colspan="2">
                <img width="300px" src="http://moerkerkentweewielers.nl/images/uploads/<?php echo $record->uploadname; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Selecteer een foto: 
                </td>
                <td>
                    <input name="userfile" type="file">
                </td>
        </tr>
        <tr>
            <td colspan="2">
                <u>De foto mag niet groter zijn dan 15MB en moet in JPG, GIF, BMP of PNG formaat zijn</u>
            </td>
        </tr>
	<tr>
            <td>
                Merk
            </td>
            <td>
                <input name="merk" type="text" value="<?php echo $record->merk ; ?>" />
            </td>
        </tr>
	<tr>
            <td>
                Model
            </td>
            <td>
                <input name="model" type="text" value="<?php echo $record->model ; ?>" />
            </td>
        </tr>
	<tr><td>Adviesverkoopprijs: </td><td><input name="adviesprijs" type="text" value="<?=$record->adviesprijs?>">Euro</td></tr>
        <tr><td>Verkoopprijs: </td><td><input name="verkoopprijs" type="text" value="<?=$record->verkoopprijs?>">Euro</td></tr>
	<tr>
            <td>
                Categorie
            </td>
            <td>
                <select name="categorie">
<?php
                $query = $db->execute("Select * from categorie order by categorietype");
                while($result = mysql_fetch_object($query))
                {
?>
                    <option value="<?=$result->categorieid?>" <?=($result->categorieid == $record->categorieid)?"selected":""?> ><?=$result->categorietype?></option>
<?php
                }
?>
	</select>
            </td>
        </tr>
	<tr>
            <td>
                Frame
            </td>
            <td>
                <select name="frame">
<?php
                $query = $db->execute("Select * from frame order by frametype");
                while($result = mysql_fetch_object($query))
                {
?>
                    <option value="<?=$result->frameid?>" <?=($result->frameid == $record->frameid)?"selected":""?> ><?=$result->frametype?></option>
<?php
                }
?>
	</select>
            </td>
        </tr>
	<tr>
            <td>
                Framemaat
            </td>
            <td>
                <select name="framemaat">
<?php
                    $query = $db->execute("Select * from framemaat order by framemaat");
                    while($result = mysql_fetch_object($query))
                    {
                        $eenheid;
                        $eenheidQeuryCode = "Select framemaateenheid
                                                    from framemaateenheid
                                                    where framemaateenheidid = ".$result->eenheid;
                        $eenheidQuery = $db->execute($eenheidQeuryCode) or die($eenheidQueryCode." ".mysql_error());
                        while($eenheidresult = mysql_fetch_object($eenheidQuery))
                        {
                            $eenheid = $eenheidresult->framemaateenheid;
                        }
?>
                        <option value="<?=$result->framemaatid?>" <?=($result->framemaatid == $record->framemaatid)?"selected":""?> ><?=$result->framemaat." "."$eenheid"?></option>
<?php
                    }
?>
                </select>
            </td>
        </tr>
	<tr>
            <td>
                Wielmaat
            </td>
            <td>
                <select name="wielmaat">
<?php
                    $query = $db->execute("Select * from wielmaat order by wielmaat");
                    while($result = mysql_fetch_object($query))
                    {
?>
                        <option value="<?=$result->wielmaatid?>" <?=($result->wielmaatid == $record->wielmaatid)?"selected":""?> ><?=$result->wielmaat?></option>
<?php
                    }
?>
	</select>inch
            </td>
        </tr>
	<tr>
            <td>
                Soort remmen
            </td>
            <td>
                <select name="remid">
<?php
                    $query = $db->execute("Select * from rem order by remtype");
                    while($result = mysql_fetch_object($query))
                    {
?>
                        <option value="<?=$result->remid?>" <?=($result->remid == $record->remid)?"selected":""?> ><?=$result->remtype?></option>
<?php
                    }
?>
	</select>
            </td>
        </tr>
	<tr>
            <td>
                Naam remmen
            </td>
            <td>
                <input name="nRemmen" type="text" value="<?php echo $record->naam_remmen; ?>"/>
            </td>
        </tr>
	<tr>
            <td>
                Versnellingen
            </td>
            <td>
                <input name="versnellingen" type="text" value="<?php echo $record->versnellingen; ?>"/>
            </td>
        </tr>
	<tr>
            <td>
                Extra
            </td>
            <td>
                <textarea name="extra" cols="40" rows="10"><?=$record->extra?></textarea>
            </td>
        </tr>
	<tr>
            <td>
                Gewicht
            </td>
            <td>
                <input name="gewicht" type="text" value="<?php echo $record->gewicht; ?>"/>kg
            </td>
        </tr>
	<tr>
            <td>
                Kleur
            </td>
            <td>
                <input name="kleur" type="text" value="<?php echo $record->kleur; ?>" />
            </td>
        </tr>
	<tr>
            <td>
                Modeljaar
            </td>
            <td>
                <input name="modeljaar" type="text" value="<?php echo $record->modeljaar; ?>" />
            </td>
        </tr>
	<tr>
            <td>
                Verwacht
            </td>
            <td>
                <input type="text" name="verwacht" value="<?php echo $record->verwacht; ?>" />jjjj-mm-dd (amerikaanse weergave)
            </td>
        </tr>
	<tr>
            <td>Status
            </td>
            <td>
                <select name="status">
                    <option value="Beschikbaar" <?php if("Uni"==$record->status)echo' selected '; ?>>Beschikbaar</option>
                    <option value="Gereserveerd" <?php if("Uni"==$record->status)echo' selected '; ?>>Gereserveerd</option>
                    <option value="Verkocht" <?php if("Uni"==$record->status)echo' selected '; ?>>Verkocht</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Beschrijving:
            </td>
            <td>
                <textarea name="beschrijving" cols="40" rows="10"><?php echo $record->beschrijving; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Garantie:
            </td>
            <td>
                <input name="aGarantie" type="text" value="<?php echo $record->aGarantie; ?>">maanden 
		<select name="garantieid">
<?php
                    $query = $db->execute("Select * from garantie order by garantietype");
                    while($result = mysql_fetch_object($query))
                    {
?>
                        <option value="<?=$result->garantieid?>" <?=($result->garantieid == $record->garantieid)?"selected":""?> ><?=$result->garantietype?></option>
<?php
                    }
?>
                </select>
	    </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-primary">Pas fiets aan</button>
</form>