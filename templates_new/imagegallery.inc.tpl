<!--<div class="imagegallery">-->
<!--	<img src="images/imagegallery/012.jpg">-->
<!--</div>-->
<script type="text/javascript" charset="utf-8">
	$(window).load(function() {
		$('.flexslider').flexslider(
			{
				smoothHeight: true
			}
		);
	});
</script>
<div class="imagegallery">
	<div class="flexslider">
		<ul class="slides">
<?php
$images = scandir("images/imagegallery/");

foreach ($images as $image)
{
	if (strtolower(substr($image, -4, 4)) === '.jpg') {
?>
			<li>
				<img src="images/imagegallery/<?= $image ?>"/>
			</li>
<?php
	}
}
?>
		</ul>
	</div>
</div>