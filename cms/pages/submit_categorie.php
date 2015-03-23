<?
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
    include_once '../../lib/Database.class.php';
    $db = new Database();
    foreach($_POST['categorie'] as $categorieid)
    {
        $nActive = 'N';
        $oActive = 'N';
        if(isset($_POST['nactive'.$categorieid]) && $_POST['nactive'.$categorieid] == 'on')
        {
            $nActive = 'Y';
        }
        if(isset($_POST['oactive'.$categorieid]) && $_POST['oactive'.$categorieid] == 'on')
        {
            $oActive = 'Y';
        }
        $query = "UPDATE categorie
                    SET nactive = '".$nActive."',
                        oactive = '".$oActive."'
                    WHERE categorieid =".$categorieid;
        $db->execute($query);
    }
header('Location:../index.php?page=categorie')
?>