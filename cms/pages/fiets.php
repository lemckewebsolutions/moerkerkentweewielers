<?
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
?>
<table>
    <tr><td colspan="2">
            <img width="300px" src="http://moerkerkentweewielers.nl/images/uploads/<?=$record->uploadname?>">
        </td>
    </tr>
<?
	if($record->merk!=""){echo'<tr><td>Merk</td><td>' . $record->merk . '</td></tr>';}
	if($record->model!=""){echo'<tr><td>Model</td><td>' . $record->model . '</td></tr>';}
	if($record->adviesprijs!=""){echo'<tr><td>Adviesverkoopprijs</td><td>&euro;' . $record->adviesprijs . '</td></tr>';}
        if($record->verkoopprijs!=""){echo'<tr><td>Verkoopprijs</td><td>&euro;' . $record->verkoopprijs . '</td></tr>';}
        if($record->beschrijving!=""){echo'<tr><td>Beschrijving</td><td>' . $record->beschrijving . '</td></tr>';}
	if($record->categorie!=""){echo'<tr><td>Categorie</td><td>' . $record->categorie . '</td></tr>';}
	if($record->frame!=""){echo'<tr><td>Frame</td><td>' . $record->frame . '</td></tr>';}
	if($record->framemaat!=0){echo'<tr><td>Framehoogte</td><td>' . $record->framemaat . ' '.$record->eenheid.'</td></tr>';}
	if($record->wielmaat!=0){echo'<tr><td>Wielmaat</td><td>' . $record->wielmaat . '</td></tr>';}
	if($record->remtype!=""){echo'<tr><td>Soort remmen</td><td>' . $record->remtype . '</td></tr>';}
	if($record->naam_remmen!=""){echo'<tr><td>Naam remmen</td><td>' . $record->naam_remmen . '</td></tr>';}
	if($record->versnellingen!=""){echo'<tr><td>Versnellingen</td><td>' . $record->versnellingen . '</td></tr>';}
	if($record->extra!=""){echo'<tr><td>Extra</td><td>' . $record->extra . '</td></tr>';}
	if($record->gewicht!=0){echo'<tr><td>Gewicht</td><td>' . $record->gewicht . '</td></tr>';}
	if($record->kleur!=""){echo'<tr><td>Kleur</td><td>' . $record->kleur . '</td></tr>	';}
	if($record->modeljaar!=0000){echo'<tr><td>Modeljaar</td><td>' . $record->modeljaar . '</td></tr>';}
	if($record->aGarantie!=""){echo'<tr><td>Garantie</td><td>' . $record->aGarantie . ' maanden '; if($record->garantietype!=""){ echo $record->garantietype;} echo '</td></tr>';}
	if($record->verwacht!=0000-00-00){echo'<tr><td>Verwacht</td><td>' . $record->verwacht . '</td></tr>';}
	if($record->status!=""){echo'<tr><td>Status</td><td>' . $record->status . '</td></tr>';}
?>
    </table>
?>