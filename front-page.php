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

<!-- INTRO -->
<section id="intro" class="bgColored flex">
	<div class="floatWrapper container"><?php
		while(have_rows('intro')):the_row(); ?>
			<h1><?php the_sub_field('title') ?></h1>
			<?php the_sub_field('text') ?>
			<button class="btn"><?php echo get_sub_field('button')['title'] ?></button><?php
		endwhile; ?>
	</div>
	<div class="bgWrapper">
		<div class="bgFull" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
	</div>
</section>

<!-- OUR PRODUCTS -->
<section id="products-snippet">
	<div class="container">
		<h2 class="heading">Our Products</h2>
		<div class="grid"><?php
		$cat = get_categories(array(
			'orderby' => 'name',
			'exclude' => array(1)
		));
		$taxonomyTerm = get_queried_object();
		foreach($cat as $c):?>
			<div class="cols cols-3">
				<div class="frame">
					<a href="<?php echo get_category_link($c->term_id); ?>"><img src="../devils_trap_bakery/wp-content/uploads/2020/03/DT.png" /></a>
					<h4><?php echo $c->name; ?></h4>
					<p><?php echo $c->description; ?></p>
					<a class="btn" href="<?php echo get_category_link($c->term_id); ?>">Shop <?php echo $c->name; ?></a>
				</div>
			</div><?php
		endforeach; ?>
		</div>
	</div>
	<img class="opaqueBanner" src="http://localhost:81/devils_trap_bakery/wp-content/uploads/2020/03/opaqueBanner.png" />
</section>

<!-- ABOUT US -->
<section id="about-snippet" class="bgColored flex"><?php
	while(have_rows('about_us')):the_row(); ?>
	<div class="bg" style="background-image: url('<?php echo get_sub_field('image')['url']; ?>')"></div>
	<div class="article">
		<?php the_sub_field('text') ?>
	</div><?php
	endwhile; ?>
</section>

<?php
get_footer();
