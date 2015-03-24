<?
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
?>
<h1>Advertentie veranderen</h1>
<?php $query = $db->execute("SELECT * FROM aanbiedingen WHERE ID=".$_GET['ID']);
while($record = mysql_fetch_object($query)){ ?>
    <form enctype="multipart/form-data" method="post" name="advertentie" action="pages/change_aanbiedingen.php" onsubmit="return submitForm();">
	<table>
            <input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>">
            <tr><td colspan="2"><img src="../images/uploads/<?php echo $record->foto_url;?>" width="200px"/></td></tr>
            <tr><td>Titel:</td><td><input type="text" name="titel" size="50" value="<?php echo $record->titel; ?>"/></td></tr>
            <tr><td>Oude prijs: </td><td><input type="text" name="van" size="35" value="<?php echo $record->van; ?>" /></td></tr>
            <tr><td>Nieuwe prijs:</td><td><input type="text" name="voor" size="35" value="<?php echo $record->voor; ?>" /></td></tr>
            <tr><td>Categorie:</td><td>
							<select name="cat">
								<option value="F" <?=($record->cat == 'F')?"selected":""?>>Fietsen</option>
								<option value="A" <?=($record->cat == 'A')?"selected":""?>>Accessoires</option>
								<option value="B" <?=($record->cat == 'B')?"selected":""?>>Beide</option>
							</select>
						</td></tr>
            <tr><td>Omschrijving:</td>
                <td>
                    <textarea  name="omschrijving" rows="15" cols="180">
                        <?=htmlentities($record->omschrijving)?>
                    </textarea>

                </td>
            </tr>
            <tr><td>Selecteer een foto: </td><td><input name="userfile" type="file"></td></tr>
            <tr><td colspan="2"><u>De foto mag niet groter zijn dan 6MB en moet in JPG, GIF, BMP of PNG formaat zijn</u></td></tr>
            <tr><td colspan="2" align="right"><input type="submit" value="Pas aan" /></td></tr>
    </table>
    </form>
<? } ?>