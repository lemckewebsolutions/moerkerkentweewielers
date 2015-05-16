<?php
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
    if(isset($_GET['action']) && $_GET['action'] == "up")
    {
        if(isset($_GET['id']) && is_int((int)$_GET['id']))
        {
            $id = $_GET['id'];
            $sQuery = "Select * from aanbiedingen where ID = ".$id;
            $query = $db->execute($sQuery);
            $result = mysql_fetch_object($query);

            $sUpdateQuery = "   Update aanbiedingen
                                set pos = ".$result->pos."
                                where pos = ".($result->pos-1);
            $update = $db->execute($sUpdateQuery);

            $sUpdateQuery = "   Update aanbiedingen
                                set pos = ".($result->pos-1)."
                                where ID = ".$id;
            $update = $db->execute($sUpdateQuery);

?>
            <script language="javascript">
                window.location="index.php?page=aanbiedingen";
            </script>
<?php
        }
        else
        {
           echo 'Er is iets fout gegaan tijdens het verplaatsen van de aanbieding.
               De actie is ongedaan gemaakt. Excuus voor het ongemak.';
        }
    }
    elseif(isset($_GET['action']) && $_GET['action'] == "down")
    {
        if(isset($_GET['id']) && is_int((int)$_GET['id']))
        {
            $id = $_GET['id'];
            $sQuery = "Select * from aanbiedingen where ID = ".$id;
            $query = $db->execute($sQuery);
            $result = mysql_fetch_object($query);

            $sUpdateQuery = "   Update aanbiedingen
                                set pos = ".$result->pos."
                                where pos = ".($result->pos+1);
            $update = $db->execute($sUpdateQuery);

            $sUpdateQuery = "   Update aanbiedingen
                                set pos = ".($result->pos+1)."
                                where ID = ".$id;
            $update = $db->execute($sUpdateQuery);

?>
            <script language="javascript">
                window.location="index.php?page=aanbiedingen";
            </script>
<?php
        }
        else
        {
           echo 'Er is iets fout gegaan tijdens het verplaatsen van de aanbieding.
               De actie is ongedaan gemaakt. Excuus voor het ongemak.';
        }
    }
?>

<h1>Overzicht aanbiedingen</h1>
<table cellspacing="20px">
	<tr>
		<td>
			Titel
		</td>
		<td>
			Van
		</td>
		<td>
			Voor
		</td>
		<td>
		</td>
                <td></td>
                <td></td>
	</tr>
<?php
	$query = $db->execute("Select * from aanbiedingen order by pos") or die(mysql_error());
        $count = mysql_num_rows($query);
	while($record = mysql_fetch_object($query)){
?>
			<tr>
				<td>
				<?=$record->titel?>
				</td>
				<td>
				<?=$record->van?>
				</td>
				<td>
				<?=$record->voor?>
				</td>
				<td>
                                    <a href="pages/del_aanbieding.php?ID=<?=$record->ID?>"><img src="../images/delete.png" alt="Verwijderen" width="25px"/></a>
                                    <a href="index.php?page=change_aanbieding&ID=<?=$record->ID?>"><img src="../images/edit.png" alt="Aanpassen" width="25px"/></a>
                                </td>
                                <td>
                                    <?=($record->pos > 1)?"<a href=\"index.php?page=aanbiedingen&action=up&id=".$record->ID."\"><img src=\"../images/arrow_up.png\" alt=\"Omhoog verplaatsen\" width=\"25px\"/></a>":""?>
                                </td>
                                <td>
                                    <?=($record->pos < $count)?"<a href=\"index.php?page=aanbiedingen&action=down&id=".$record->ID."\"><img src=\"../images/arrow_down.png\" alt=\"Omlaag verplaatsen\" width=\"25px\"/></a>":""?>
				</td>
			</tr>
<?php	 }
?>
</table>