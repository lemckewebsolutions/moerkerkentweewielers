<?php
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
?>
<h1>Categorie&euml;n beheren</h1>
<form method="POST" action="pages/submit_categorie.php">
<table class="table table-bordered">
        <thead>
          <tr>
            <th>Categorie</th>
            <th>Nieuw</th>
            <th>Gebruikt</th>
          </tr>
        </thead>
        <tbody>
<?php
        $querycode = "Select * from categorie order by categorieid";
        $query = $db->execute($querycode);
        while($result = mysql_fetch_object($query))
        {
?>
          <input type="hidden" name="categorie[]" value="<?=$result->categorieid?>" />
          <tr>
            <td><?=$result->categorietype?></td>
            <td><input type="checkbox" name="nactive<?=$result->categorieid?>" onclick="submit()" <?=($result->nactive == 'Y')?"checked":""?>/></td>
            <td><input type="checkbox" name="oactive<?=$result->categorieid?>" onclick="submit()" <?=($result->oactive == 'Y')?"checked":""?>/></td>
          </tr>
<?php
        }
?>
        </tbody>
      </table>
</form>