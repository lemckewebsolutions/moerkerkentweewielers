<?php
if (!isset ($_COOKIE[ini_get('session.name')]))
{
    session_start();
}

if(!$_SESSION['ingelogd'])
{
    header('Location: login.php?url=index.php');
}

$actie;
if(isset($_GET['actie']))
{
	$actie = $_GET['actie'];
}
else
{
 $actie = "";
}

$soortid;
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
    echo "<h1>Nieuwe fietsen</h1>";
}
elseif(isset($soortid) && $soortid == 2)
{
    echo "<h1>Gebruikte fietsen</h1>";
}


if ($actie=="fiets")
{
	$ID = $_GET['ID'];
	$zoekquery = '	Select
			    f.ID,
			    f.merk,
			    f.model,
			    c.categorietype as categorie,
			    frame.frametype as frame,
			    fm.framemaat,
			    fme.framemaateenheid as eenheid,
			    wm.wielmaat,
			    r.remtype,
			    f.naam_remmen,
			    f.versnellingen,
			    f.extra,
			    f.gewicht,
			    f.kleur,
			    f.modeljaar,
			    f.registratienummer,
			    f.adviesprijs,
                            f.verkoopprijs,
			    f.beschrijving,
			    f.aGarantie,
			    g.garantietype,
			    f.verwacht,
			    f.status,
			    f.views,
			    f.uploadname
			from fietsen f
			inner join categorie	c	on c.categorieid = f.categorieid
			inner join frame	frame	on frame.frameid = f.frameid
			inner join framemaat	fm	on fm.framemaatid = f.framemaatid
            left join framemaateenheid fme on fme.framemaateenheidid = fm.eenheid
			inner join wielmaat	wm	on wm.wielmaatid = f.wielmaatid
			inner join rem		r	on r.remid = f.remid
			inner join garantie	g	on g.garantieid = f.garantieid
			where f.soortid = '.$soortid.' AND
                              f.ID = '.$ID.'
			order by f.merk, f.model';
	//echo $zoekquery;
	$zoek = $db->execute($zoekquery);
?>
        <b><a href="index.php?page=fietsen&s=<?=$soortid?>&actie=">terug</a></b>
<?php
	while($record = mysql_fetch_object($zoek)){
		include 'fiets.php';
	}
?>
        <b><a href="index.php?page=fietsen&s=<?=$soortid?>&actie=">terug</a></b>
<?php
} elseif ($actie=="del_fiets"){
	$del = $_GET['del'];
	$ID = $_GET['ID'];
	if($del == "t"){
    $getFoto = $db->execute("Select * from fietsen where ID='$ID'");
    $fotoURL = "";
    while($record = mysql_fetch_object($getFoto)){
		    $fotoURL = $record->uploadname;
	  }
		$delQuery = "DELETE FROM fietsen where ID='$ID'";
		//echo $zoekquery;
		$delete = $db->execute($delQuery);

    //DELETE FOTO
    fclose("../images/uploads/".$fotoURL);
    unlink("../images/uploads/".$fotoURL);

		echo'<script type="text/javascript"> window.location = "index.php?page=fietsen&s='.$soortid.'"</script>';
	} else {
?>
	<script type="text/javascript">
        if (confirm("Weet u zeker dat u deze fiets wilt verwijderen?")){
		var ID = <?=$ID?>;
			window.location = "index.php?page=fietsen&actie=del_fiets&del=t&s=<?=$soortid?>&ID="+ID
        } else {
			window.location = "index.php?page=fietsen&s=<?=$soortid?>"
		}
	</script>
<?php
	}
} elseif ($actie=="edit_fiets"){
	$ID = $_GET['ID'];
	$zoekquery = 'Select * from fietsen where ID=' . $ID;
	//echo $zoekquery;
	$zoek = $db->execute($zoekquery);
?>
        <b><a href="index.php?page=fietsen&s=<?=$soortid?>&actie=">terug</a></b>
<?php
	$fiets = "n";
	while($record = mysql_fetch_object($zoek)){
		include 'edit_fiets.php';
	}
?>
        <b><a href="index.php?page=fietsen&s=<?=$soortid?>&actie=">terug</a></b>
<?php
} else {
	$zoekquery = '	Select
			    f.ID,
			    f.merk,
			    f.model,
			    c.categorietype,
			    frame.frametype,
			    fm.framemaat,
			    fme.framemaateenheid as eenheid,
			    wm.wielmaat,
			    r.remtype,
			    f.naam_remmen,
			    f.versnellingen,
			    f.extra,
			    f.gewicht,
			    f.kleur,
			    f.modeljaar,
			    f.registratienummer,
			    f.adviesprijs,
                            f.verkoopprijs,
			    f.beschrijving,
			    f.aGarantie,
			    g.garantietype,
			    f.verwacht,
			    f.status,
			    f.views,
			    f.uploadname
			from fietsen f
			inner join categorie	c	on c.categorieid = f.categorieid
			inner join frame	frame	on frame.frameid = f.frameid
			inner join framemaat	fm	on fm.framemaatid = f.framemaatid
            left join framemaateenheid fme on fme.framemaateenheidid = fm.eenheid
			inner join wielmaat	wm	on wm.wielmaatid = f.wielmaatid
			inner join rem		r	on r.remid = f.remid
			inner join garantie	g	on g.garantieid = f.garantieid
			where f.soortid = '.$soortid.'
			order by f.merk, f.model, wm.wielmaat';
		//echo $zoekquery;
		$zoek = $db->execute($zoekquery);
?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Merk / Model</th>
                        <th>Frame</th>
                        <th>WielMaat</th>
                        <th>Prijs</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
<?php
		while($record = mysql_fetch_object($zoek))
                {
?>
                    <tr>
                        <td><a href="index.php?page=fietsen&actie=fiets&s=<?=$soortid?>&ID=<?=$record->ID?>"><?=$record->merk?> / <?=$record->model?></a></td>
                        <td><?=$record->frametype?></td>
                        <td><?=$record->wielmaat?> Inch</td>
                        <td><?=$record->verkoopprijs?></td>
                        <td><?=$record->status?></td>
                        <td><?=$record->views?></td>
                        <td>
<?php
                            if($record->uploadname!=""){ echo'Ja'; } else { echo'Nee'; }
?>
                        </td>
                        <td>
                            <a href="index.php?page=fietsen&s=<?=$soortid?>&actie=del_fiets&ID=<?=$record->ID?>&del=f"><img src="../images/delete.png" alt="Verwijderen" width="25px"/></a>
                            <a href="index.php?page=fietsen&s=<?=$soortid?>&actie=edit_fiets&ID=<?=$record->ID?>"><img src="../images/edit.png" alt="Aanpassen" width="25px"/></a>
                        </td>
                    </tr>
<?php
                }
?>
                    </tbody>
                </table>
<?php

                }
?>
