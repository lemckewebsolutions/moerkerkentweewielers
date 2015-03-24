<?
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
//------------------------------- ACCOUNT INVOEREN --------------------------------\\
if($_GET['actie'] == 'controlpanel_invoeren'){
	$username = $db->escapeString($_POST['username']);
	$password = md5($db->escapeString($_POST['wachtwoord']));
        $email = $db->escapeString($_POST['email']);
        $rights = $_POST['rights'];
	$insert = $db->execute("INSERT INTO users VALUES ('','$username', '$password', '$email', $rights)"); // query uitvoeren
}
//------------------------------- DELETE ACCOUNT --------------------------------\\
if($_GET['actie'] == 'delete_account'){
	$id = $_GET['id'];
	$delete = $db->execute("DELETE FROM users WHERE id=$id");
}
?>
<h1>Controlpanel accounts</h1>
<form method="POST" action="?page=<?=$_GET['page']?>&actie=controlpanel_invoeren">
<table>
    <tr><td>Gebruikersnaam:</td><td><input name="username" type="text" required /><br /></td></tr>
    <tr><td>Wachtwoord:</td><td><input name="wachtwoord" type="password" required/><br /></td></tr>
    <tr><td>Emailadres:</td><td><input name="email" type="email" required/><br /></td></tr>
    <tr><td>Rol*:</td><td><select name="rights">
<?php
    $query = $db->execute("Select * from admin_rights") or die(mysql_error());
    while($record = mysql_fetch_object($query))
    {
?>
	<option value="<?=$record->rightsid?>"><?=$record->rightsname?></option>
<?php
    }
?>
                            </select></td></tr>
    <tr><td colspan="2"><p>*Om fietsen te kunnen beheren is admin voldoende.<br />
                            Om content, users e.d. te kunnen beheren is superadmin vereist.</p></td></tr>
</table>
<button type="submit" class="btn btn-primary">Voeg toe</button>
</form>
<b>geregistreerde users:</b><br />
<?php $users = $db->execute("SELECT *
                            from users u
                            inner join admin_rights r on r.rightsid = u.rights
                            ORDER BY id");
while($record = mysql_fetch_object($users)){
?>
	<table>
		<tr><td>userid: </td><td><?=$record->id?></td></tr>
		<tr><td>username: </td><td><?=$record->username?></td></tr>
                <tr><td>emailadres: </td><td><?=$record->email?></td></tr>
                <tr><td>rol: </td><td><?=$record->rightsname?></td></tr>
	</table>
<?
	if($_SESSION['user_id']==$record->id)
	{
		echo '<b>U bent momenteel ingelogd met dit account. Deze kunt u niet verwijderen.</b>';
	}
	else
	{
?>
	    <form method="POST" action="?page=<?=$_GET['page']?>&actie=delete_account&id=<?=$record->id?>">
                <button type="submit" class="btn btn-danger" onClick="return confirm('Weet u zeker dat u deze gebruiker wilt verwijderen?')">Verwijder account</button>
	    </form>
<?
	}
    echo'<hr>';
}