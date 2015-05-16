<?php
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}

    include_once '../lib/Database.class.php';
    
    $db = new Database();

    $query = "	select *
		from openingsuren ou";
    
    $days = $db->execute($query);    
?>
<div class="page-header" style="margin-top: 0;">
    <h2>Openingstijden beheren</h2>
</div>

<div class="well">
    <form method="POST" action="pages/submit_openinghours.php">
<?php
    while($day = mysql_fetch_object($days))
    {
?>
	<b><?=$day->dag?></b>
	<table>
	    <tr>
		<td>
		    Openingstijd: 
		</td>
		<td>
		    Sluitingstijd:
		</td>
		<td>
		    Gesloten
		</td>
	    </tr>
	    <tr>
		<td>
		    <div class="input-append bootstrap-timepicker-component">
			<input class="timepicker input-small" type="text" name="opening[]" value="<?=$day->openingstijd?>" /><span class="add-on"><i class="icon-time"></i></span>
		    </div> 
		</td>
		<td>
		    <div class="input-append bootstrap-timepicker-component">
			<input class="timepicker input-small" type="text" name="closing[]" value="<?=$day->sluitingstijd?>" /><span class="add-on"><i class="icon-time"></i></span>
		    </div>
		</td>
		<td align="center">
		    <input type="checkbox" name="closed[]" value="<?=$day->openingsurenid?>" <?=($day->gesloten == 'Y')?"checked":""?> >
		</td>
	    </tr>
	</table>
<?php
    }
?>
	<input type="submit" value="Opslaan" class="btn btn-primary">
	</form>
</div>
    <script type="text/javascript">
        $(document).ready(function () { 
            $('.timepicker').timepicker({
		defaultTime: value,
                minuteStep: 1,
                template: 'modal',
                showSeconds: true,
                showMeridian: false,
		modalBackdrop: true
            });
        });
    </script>