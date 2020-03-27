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
		$cat = get_categories(array(
			'orderby' => 'name',
			'exclude' => -1
		));?>
		
		<div class="titleRow flex">
			<h2><?php the_title(); ?><sup>(<?php echo $cat_num; ?>)</sup></h2>
			<div class="btnFilterWrapper">
			<select id="btnFilter" class="btn">
				<option value="default">None</option><?php
				foreach($cat as $c): ?>
					<option value="<?php echo $c->slug; ?>"><?php echo $c->name; ?></option><?php
				endforeach;?>
			</select>
			</div>
		</div>
		<?php prodGrid('', ''); ?>
	</div>
</section>
