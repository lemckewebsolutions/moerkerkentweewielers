<?
    session_start();
    
    include_once '../lib/Database.class.php';
    
    $db = new Database();
    
    if(!$_SESSION['ingelogd'])
    {
        header('Location: login/index.php');
    }
    
    if(!isset($_GET['pageid']) && !isset($_GET['page']))
    {
        $_GET['pageid'] = 0;
    }
    
    //--------------------------------- UITLOGGEN ----------------------------------\\
    if($_GET['actie'] == 'uitloggen'){
        unset($_SESSION['ingelogd']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Moerkerken Tweewielers - Adminpanel</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://www.moerkerkentweewielers.nl/css/bootstrap.css" rel="stylesheet">
    <link href="http://www.moerkerkentweewielers.nl/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="http://www.moerkerkentweewielers.nl/css/timepicker.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      
      textarea
      {
         width: 500px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="editor/ckeditor.js"></script>
    <!-- TinyMCE -->
    <script type="text/javascript" src="http://www.moerkerkentweewielers.nl/jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
            tinyMCE.init({
                    mode : "textareas",
                    theme : "advanced"
            });
    </script>
    <!-- /TinyMCE -->

  </head>
  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="http://cms.moerkerkentweewielers.nl/">Moerkerken Tweewielers</a>
          
<?
        if(isset($_SESSION['username']))
        {
?>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?=$_SESSION['username']?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="index.php?actie=uitloggen">Log uit</a></li>
            </ul>
          </div>
<?
        }
?>        
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
<?
    include 'pages/sidebar.tpl.php';
?>
        <div class="span9">
                  <div id="info">
<?
            if(isset($_GET['page']))
            {
                include("pages/".$_GET['page'].".php");
            }
            else
            {
                $pageQuery = $db->execute("  SELECT *
                                        FROM admin_page p
                                        WHERE p.pageid =".$_GET['pageid']);
                while($page = mysql_fetch_object($pageQuery))
                {
?>
                    <?=$page->content?>
<?
                }
            }            
?>
        </div><!--/span-->
      </div><!--/row-->
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="http://www.moerkerkentweewielers.nl/js/jquery.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-transition.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-alert.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-modal.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-dropdown.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-scrollspy.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-tab.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-tooltip.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-popover.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-button.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-collapse.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-carousel.js"></script>
    <script src="http://www.moerkerkentweewielers.nl/js/bootstrap-typeahead.js"></script>

    <script type="text/javascript" src="editor/ckeditor.js"></script>




  </body>
</html>
