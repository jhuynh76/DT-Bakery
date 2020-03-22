<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Devil\'s_Trap_Bakery
 */

get_header();
?>

<?php
if (is_singular('locations')):
	get_template_part('template-parts/locationSingle');
else:
	echo 'aaaaaaaabb';
endif;
?>

<?php
get_sidebar();
get_footer();
