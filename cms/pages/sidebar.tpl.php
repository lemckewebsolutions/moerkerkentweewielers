<?php
if($_SESSION['ingelogd'] != true)
{
    header('Location: login/index.php');
}
?>

<div class="span3">
    <div class="well sidebar-nav">
        <ul class="nav nav-list">
<?php
    $catQuery = $db->execute("  Select *
                    from admin_category
                    where rights <= ".$_SESSION['rights']."
                    order by categoryid");
    
    while($category = mysql_fetch_object($catQuery))
    {
      $pageQuery = $db->execute("SELECT *
                                FROM admin_page p
                                WHERE
                                p.categoryid = ".$category->categoryid." AND
                                p.showInMenu = 'Y'
                                ORDER BY p.name");
      $count = mysql_num_rows($pageQuery);
      if($count > 0)
      {
?>
            <li class="nav-header"><?=$category->category?></li>
<?php
            while($pageResult = mysql_fetch_object($pageQuery))
            {
                $extra = "";
                $class = "";
                if($pageResult->getVariables != "")
                {
                    $extra = "&".$pageResult->getVariables;
                }
                
                if($pageResult->pagetypeid == 1)
                {
?>
                    <li class="<?=$class?>"><a href="?<?=$pageResult->shortname?>&page=<?=$pageResult->file?><?=$extra?>" title="<?=$pageResult->name?>"><?=$pageResult->name?></a></li>
<?php
                }
                else
                {
?>
                    <li class="<?=$class?>"><a href="?<?=$pageResult->shortname?>&pageid=<?=$pageResult->pageid?><?=$extra?>" title="<?=$pageResult->name?>"><?=$pageResult->name?></a></li>
<?php
                }
            }
      }
    }
?>
    </ul>
    </div><!--/.well -->
    &copy; Lemcke WebSolutions 2012
</div><!--/span-->