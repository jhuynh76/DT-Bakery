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
?>

<section class="customHeader bgColored flex">
	<div class="floatWrapper container">
		<h1><?php echo single_cat_title(); ?></h1>
	</div>
	<div class="bgWrapper">
		<div class="bgFull" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
	</div>
</section>

<section id="productList">
	<div class="container"><?php
		$cat = get_category(get_query_var('cat'));
		$cat_id = $cat->cat_ID;
		$cat_num = $cat->count; ?>
		
		<h2><?php echo single_cat_title(); ?><sup>(<?php echo $cat_num; ?>)</sup></h2>
		<div class="grid"><?php
			$query = new wp_query(array(
				'posts_per_page' => -1,
				'post_type' => 'food',
				'cat' => $cat_id
			));

			while($query->have_posts()):$query->the_post(); ?>
				<div class="cols cols-3">
					<a class="frame" href="<?php the_permalink(); ?>">
						<figure><img src="<?php the_post_thumbnail_url(); ?>" alt="" /></figure>
						<h4><?php the_title(); ?></h4>
						<div class="excerpt"><?php the_field('quick_description'); ?></div>
					</a>
				</div><?php 
			endwhile; ?>
		</div>
	</div>
</section>

<?php
get_footer();
