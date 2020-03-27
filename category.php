<?php
/**
 * The template for displaying all pages
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

// Variables
$cat = get_category(get_query_var('cat'));
$cat_id = $cat->cat_ID;
$cat_num = $cat->count;
$cat_name = $cat->name;
?>

<?php customHeader($cat_name); ?>

<section id="productList">
	<div class="container list">		
		<div class="titleRow flex">
			<h2><?php echo single_cat_title(); ?><sup>(<?php echo $cat_num; ?>)</sup></h2>
		</div>
		<?php prodGrid($cat_id, ''); ?>
	</div>
</section>

<?php
get_footer();
