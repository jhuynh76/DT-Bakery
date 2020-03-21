<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Devil\'s_Trap_Bakery
 */

?>

	</div><!-- #content -->

	<div id="newsletter" class="bgColored">
		<div class="container">
			<div class="flex">
				<h4>Follow us for the latest news</h4>
				<input type="email" placeholder="eg. info@info.com" />
				<button></button>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<?php dtAsset(); ?>
			<!-- Main nav repeat -->
			<?php wp_nav_menu(array('menu' => 'topNav')); ?>

			<!-- Social media menu -->
			<?php wp_nav_menu(array( 'menu' => 'socialMedia' )); ?>
		</div>
		<div class="bottomFooter">
			<label class="items"><?php echo date('Y') ?> Devil's Trap Bakery Ltd.</label>
			<a class="items"href="">Terms & Conditions</a>
			<a class="items"href="">Privacy Policy</a>
		</div>
	</footer>
</main>

<?php wp_footer(); ?>

</body>

<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-3.4.1.min.js'); ?>"></script>
<script>
	$('#menu-socialmedia li a').each(function(){
		$(this).text('');
	});

	$('#btnFilter').change(function(){
		var val = $('#btnFilter option:selected').val();
		$('#productList .cols').css('display', 'none');
		$('#productList .' + val).css('display', 'block');

		if ( $('#btnFilter option:selected').val() == 'default' ){
			$('#productList .cols').css('display', 'block');
		}
	});

</script>

</html>
