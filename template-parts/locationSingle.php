<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devil\'s_Trap_Bakery
 */

?>

<?php customHeader(''); ?>

<section id="infoAndMap">
	<div class="menuOptions flex">
		<div class="cols cols-3 optionLocation">
			<h4>Location</h4>
			<a href="" target="_blank">Get Directions</a>
		</div>

		<div class="cols cols-3 optionMenu">
			<h4>Menu</h4>
			<a href="<?php echo get_field('menu')['url'] ?>" target="_blank">View our menu</a>
		</div>

		<div class="cols cols-3 optionCatering">
			<h4>Catering</h4>
			<a href="">Place your order</a>
		</div>
	<div id="map"></div>
</section>

<Section class="columnedContent">
	<?php columnedContent(); ?>
</section>