<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devil\'s_Trap_Bakery
 */

?>
<section id="locations">
	<div class="grid"><?php
	$locations = new WP_Query(array(
		'posts_per_page' => -1,
		'post_type' => 'locations'
	));
	while($locations->have_posts()):$locations->the_post();?>
		<div class="cols cols-3">
			<div class="frame">
				<h3><?php the_title(); ?></h3>
				<p><?php the_field('address'); ?></p>
				<label class="area"><?php the_field('area'); ?></label>
				<label class="phone"><?php the_field('phone'); ?></label>
				<?php the_field('hours'); ?>
			</div>
		</div><?php
	endwhile; ?>
	</div>
</section>
