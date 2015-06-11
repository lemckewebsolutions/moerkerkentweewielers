<?php
/**
 * @var Framework_Views_PageView $this
 */
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/head.inc.tpl");
?>

<div class="sidebar hidden-xs hidden-sm col-md-2 col-lg-2 col-md-offset-1 col-lg-offset-1">
	<div class="logos col-md-12 col-lg-12">
		<?=$this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "brandbar.inc.tpl")?>
		<a href="https://www.facebook.com/moerkerkentweewielers" target="_blank" title="Facebook">
			<img src="images/facebook.jpg">
		</a>
	</div>
</div>
<div class="col-sm-12 col-md-9">
	<h2>Service</h2>
	<p>
		Moerkerken Tweewielers biedt de volgende services:
	</p>
	<ul>
		<li>Standaard 1 gratis servicebeurt bij aankoop van een nieuwe fiets;</li>
		<li>Onderhoud van uw fiets en het uitvoeren van alle voorkomende reparaties;</li>
		<li>Medewerking bij het aanschaffen van een fiets via fietsenplan;</li>
		<li>Betaling met een VVV-bon of de Nationale Fietsbon is geen enkel probleem.</li>
	</ul>

	<h3>Reparaties</h3>
	<p>
		Kleine reparaties zijn dezelfde dag klaar.
		Is dat niet mogelijk doordat onderdelen niet voorradig zijn of de reparatie is te groot, dan stellen wij, indien gewenst, een gratis leenfiets ter beschikking.
	</p>

	<h3>Verzekering</h3>
	<p>
		Wij zijn aangesloten bij Unigarant Verzekeringen.
		Door op de knop hieronder te klikken kunt u uw premie berekenen en de gewenste verzekering afsluiten.
		Als extra service kunnen wij, geheel vrijblijvend, de premie voor u berekenen.
		Daarnaast sluiten wij graag de gewenste fietsverzekering voor u af.
	</p>
	<a class="btn btn-success"
	   href="http://www.unigarant.nl/webservice/premiebereken.asp?id=17151288&product=fiets"
	   target="_blank"
	   title="Bereken uw premie (opent een nieuw venster)"
	>
		Bereken uw premie
	</a>
</div>
<?php
echo $this->includeFile(WebSite_IndexPageController::TEMPLATE_PATH . "default/footer.inc.tpl");