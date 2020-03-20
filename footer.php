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
			<h2>Follow us for the latest news</h2>
			<input type="email" placeholder="eg. info@info.com" />
			</div>
		</div>
	</div>

	<footer>
		<div class="bottomFooter">
			<label class="items"><?php echo date('Y') ?> Devil's Trap Bakery Ltd.</label>
			<a class="items"href="">Terms & Conditions</a>
			<a class="items"href="">Privacy Policy</a>
		</div>
	</footer>
</main>

<?php wp_footer(); ?>

</body>
</html>
