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

<section id="productList">
	<div class="container list"><?php
		$catHook = '';
		$cat = get_categories(array(
			'orderby' => 'name',
			'exclude' => -1
		));?>
		
		<div class="titleRow flex">
			<h2><?php the_title(); ?><sup>(<?php echo $cat_num; ?>)</sup></h2>
			<div class="btnFilterWrapper">
			<select id="btnFilter" class="btn">
				<option value="default">None</option><?php
				foreach($cat as $c):
					$catHook = $c->slug; ?>
					<option value="<?php echo $catHook; ?>"><?php echo $c->name; ?></option><?php
				endforeach;?>
			</select>
			</div>
		</div>
		<div class="grid"><?php
			$query = new wp_query(array(
				'posts_per_page' => -1,
				'post_type' => 'food'
			));
			
			while($query->have_posts()):$query->the_post();
				$category = get_the_category($post->ID); ?>
				<div class="cols cols-3 <?php echo $category[0]->slug ?>">
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
