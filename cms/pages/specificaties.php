<?php
if($_SESSION['ingelogd'] != true)
{
	header('Location: login/index.php');
}
?>
<h1>Specificaties beheren</h1>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>#</th>
			<th>Specificatie</th>
			<th colspan="2">Acties</th>
		</tr>
	</thead>
	<tbody>
<?php
$query = $db->execute("Select * from specificatie order by sortorder, specificatieid");
$count = mysql_num_rows($query);
while($result = mysql_fetch_object($query))
{
?>
		<tr>
			<td>
				<?=$result->specificatieid?>
			</td>
			<td>
				<?=$result->specificatie?>
			</td>
			<td>
				<?=($result->sortorder > 1)?"<a href=\"index.php?page=aanbiedingen&action=up&id=".$result->specificatieid."\"><img src=\"../images/arrow_up.png\" alt=\"Omhoog verplaatsen\" width=\"25px\"/></a>":""?>
				<?=($result->sortorder < $count)?"<a href=\"index.php?page=aanbiedingen&action=down&id=".$result->specificatieid."\"><img src=\"../images/arrow_down.png\" alt=\"Omlaag verplaatsen\" width=\"25px\"/></a>":""?>
			</td>
			<td>
				<form method="POST" action="?page=<?=$_GET['page']?>&actie=delete_spec&id=<?=$result->specificatieid?>">
					<button type="submit" class="btn btn-danger" onClick="return confirm('Weet u zeker dat u deze specificatie met alle opgeslagen waardes wilt verwijderen?')">
						<i class="icon-trash icon-white"></i>
					</button>
				</form>
			</td>
		</tr>
<?php
}
?>
	</tbody>
</table>