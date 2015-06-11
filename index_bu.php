<?php
if ($_SERVER['REMOTE_ADDR'] == "77.251.79.182") {
	include_once("applications/Website/index.php");
	exit;
}
session_start();include('connect.php');include_once 'models/browserModel.php';include_once 'lib/Visiting.class.php';$visitingHours = new Visiting();$dif = $visitingHours->getSecUntilClosing();$page = "";if (isset($_GET['page'])) {
	$page = mysql_real_escape_string($_GET['page']);
} else {
	$page = "home";
}?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Moerkerken Tweewielers</title>
	<meta name="keywords" content="Moerkerken Tweewielers fietsenwinkel fietsenmaker Ridderkerk fietsen bike    "/>
	<meta name="description" content="Moerkerken tweewielers, voor kwaliteit, service en klantvriendelijkheid"/>
	<link href="style.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
	<!-- Foto gallery scripts -->
	<script LANGUAGE="JavaScript"><
		!--Begin// Set slideShowSpeed (milliseconds)var slideShowSpeed = 10000;// Duration of crossfade (seconds)var crossFadeDuration = 3;// Specify the image filesvar Pic = new Array();// to add more images, just continue// the pattern, adding to the array belowPic[0] = 'images/header/1.png'Pic[1] = 'images/header/2.png'Pic[2] = 'images/header/3.png'Pic[3] = 'images/header/4.png'Pic[4] = 'images/header/5.png'Pic[5] = 'images/header/6.png'Pic[6] = 'images/header/7.png'var t;var j = 0;var p = Pic.length;var preLoad = new Array();for (i = 0; i < p; i++) {preLoad[i] = new Image();preLoad[i].src = Pic[i];}function runSlideShow() {if (document.all) {document.images.SlideShow.style.filter="blendTrans(duration=2)";document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)";document.images.SlideShow.filters.blendTrans.Apply();}document.images.SlideShow.src = preLoad[j].src;if (document.all) {document.images.SlideShow.filters.blendTrans.Play();}j = j + 1;if (j > (p - 1)) j = 0;t = setTimeout('runSlideShow()', slideShowSpeed);}//  End --></script>
	<!-- Menu dropdown + fietsen scripts -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/slider.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/formvalidator.js"></script>
	<script type="text/javascript" src="js/content.js"></script>
	<!-- GOOGLE ANALITICS -->
	<script type="text/javascript">  var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-26052368-1']);
		_gaq.push(['_trackPageview']);
		(function () {
			var ga = document.createElement('script');
			ga.type = 'text/javascript';
			ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(ga, s);
		})();</script>
</head>
<body onload="runSlideShow()"><!-- FACEBOOK PLUGIN -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/nl_NL/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<!-- END FACEBOOK PLUGIN -->
<div id="wrapper">
	<div id="logo">
		<table border="0">
			<tr>
				<td valign="bottom"><img src="images/logo.png" alt="logo" width="100px"/></td>
				<td><img src="images/moerkerklogo.png"
				         alt="Moerkerken tweewielers, voor kwaliteit, service en klantvriendelijkheid"/></td>
			</tr>
		</table>
	</div>
	<div id="header">
		<div id="VU"><img src="images/header/1.png" name="SlideShow" height="200px" width="960px"/></div>
	</div>
	<div id="menu">
		<ul class="sf-menu dropdown">
			<li><a href="index.php">Home</a></li>
			<li><a class="has_submenu" href="?page=collectie&s=1&cat=0">Collectie</a>
				<ul><?php $query = mysql_query("Select * from categorie c where c.nactive = 'Y' order by c.categorietype") or die(mysql_error());
					while ($record = mysql_fetch_object($query)) { ?>
						<li><a
							href="?page=collectie&cat=<?= $record->categorieid ?>&s=1"><?= $record->categorietype ?></a>
						</li><?php } ?>                </ul>
			</li>
			<li><a class="has_submenu" href="?page=collectie&s=2&cat=0">Occasions</a>
				<ul><?php $query = mysql_query("Select * from categorie c where c.oactive = 'Y' order by c.categorietype") or die(mysql_error());
					while ($record = mysql_fetch_object($query)) { ?>
						<li><a
							href="?page=collectie&cat=<?= $record->categorieid ?>&s=2"><?= $record->categorietype ?></a>
						</li><?php } ?>                </ul>
			</li>
			<li><a class="has_submenu" href="?page=accesoires">Accessoires</a>
				<ul>
					<li><a href="?page=accesoires&subpage=anuy_regenkleding">Anuy regenkleding</a></li>
					<li><a href="?page=accesoires&subpage=basil">Basil tassen en manden</a></li>
					<li><a href="?page=accesoires&subpage=race">Bontrager race accessoires</a></li>
					<li><a href="?page=accesoires&subpage=diversen">Diversen</a></li>
					<li><a href="?page=accesoires&subpage=kinderzitjes">Qibbel kinderzitjes</a></li>
					<li><a href="?page=accesoires&subpage=banden">Schwalbe banden</a></li>
					<li><a href="?page=accesoires&subpage=zadeldekjes">Tempur zadeldekjes</a></li>
				</ul>
			</li>
			<li><a href="?page=aanbiedingen">Aanbiedingen</a></li>
			<li><a class="has_submenu" href="#">Service</a>
				<ul>
					<li><a href="?page=reparatieOnderhoud">Reparatie & Onderhoud</a></li>
					<li><a href="?page=verzekeringen">Verzekering</a></li>
				</ul>
			</li>
			<li><a href="?page=contact">Contact</a></li>
		</ul>
	</div><?php if (false && $page == "collectie" && isset($_GET['s']) && $_GET['s'] == 1) { ?>
		<div id=slideFiets>            <?php include('pages/slide.php'); ?>        </div><?php } ?>
	<div id="page">        <?php include('templates/sidebar.tpl.php'); ?>
		<!-- end #sidebar -->        <?php include('pages/' . $page . '.php'); ?>
		<div style="clear: both;">&nbsp;</div>
		<div id="socialmedia"><a href="https://twitter.com/share" class="twitter-share-button"
		                         data-url="http://moerkerkentweewielers.nl" data-size="large"
		                         data-hashtags="moerkerkentweewielers">Tweet</a>
			<script>            !function (d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (!d.getElementById(id)) {
						js = d.createElement(s);
						js.id = id;
						js.src = "//platform.twitter.com/widgets.js";
						fjs.parentNode.insertBefore(js, fjs);
					}
				}(document, "script", "twitter-wjs");            </script>
			<div id="fb-like" class="fb-like" style="text-algin:center;" data-href="http://moerkerkentweewielers.nl"
			     data-send="true" data-width="450" data-show-faces="false" data-action="recommend"></div>
		</div>
	</div>
</div>
<div id="footer"><p>Copyright &copy; 2012 <a href="http://wouterlemcke.nl">Lemcke WebSolutions</a>. | <a
			href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid
			<abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></p></div>
<div style="text-align: center; font-size: 0.75em;"> Created by <a href="mailto:w.lemcke@lemckesolutions.nl">Wouter
		Lemcke</a>.
</div>
</body>
</html>