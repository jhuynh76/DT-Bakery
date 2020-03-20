<?php
/**
 * The template for the main page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Devil\'s_Trap_Bakery
 */

get_header();
?>

<section id="intro" class="bgColored flex">
	<div class="floatWrapper">
		<h1>Life is better with coffee</h1>
		<button class="btn">Shop goods</button>
	</div>
	<div class="bgWrapper">
		<div class="bg" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
	</div>
</section>

<?php
get_footer();
