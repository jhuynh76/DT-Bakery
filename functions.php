<?php
/**
 * Devil\'s Trap Bakery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Devil\'s_Trap_Bakery
 */

if ( ! function_exists( 'devils_trap_bakery_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function devils_trap_bakery_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Devil\'s Trap Bakery, use a find and replace
		 * to change 'devils_trap_bakery' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'devils_trap_bakery', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'devils_trap_bakery' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'devils_trap_bakery_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'devils_trap_bakery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function devils_trap_bakery_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'devils_trap_bakery_content_width', 640 );
}
add_action( 'after_setup_theme', 'devils_trap_bakery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function devils_trap_bakery_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'devils_trap_bakery' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'devils_trap_bakery' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'devils_trap_bakery_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function devils_trap_bakery_scripts() {
	wp_enqueue_style( 'devils_trap_bakery-style', get_stylesheet_uri() );

	wp_enqueue_script( 'devils_trap_bakery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'devils_trap_bakery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'devils_trap_bakery_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
# Assets
# Custom Header
# Columned Content
--------------------------------------------------------------*/
/*--------------------------------------------------------------
# Assets
--------------------------------------------------------------*/
function dtAsset(){?>
	<img class="dtAsset" src="http://localhost:81/devils_trap_bakery/wp-content/uploads/2020/03/DT.png" /><?php
}

/*--------------------------------------------------------------
# Custom Header
--------------------------------------------------------------*/
function customHeader($title){
	if ($title == null):
		$title = get_the_title();
	endif;?>

	<section class="customHeader flex">
	<div class="floatWrapper container">
		<?php dtAsset(); ?>
		<h1><?php echo $title; ?></h1>
	</div>
	<div class="bgWrapper">
		<div class="bgFull" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>')"></div>
	</div>
</section><?php
}

/*--------------------------------------------------------------
# Columned Content
--------------------------------------------------------------*/
function columnedContent(){
	while(have_rows('columned_content')):the_row();?>
		<div class="flex-wrap">

			<!-- LEFT COLS --><?php
				columnedContentConditions('left');
				columnedContentConditions('right'); ?>
	
		</div>
		
		<div class="row"><?php
			columnedContentConditions('row'); ?>
		</div><?php
	endwhile;
}

function columnedContentConditions($position){
	while(have_rows($position)):the_row();
		if (get_row_layout() == 'text'):?>
			<div class="cols cols-2 flex article">
				<article><?php
					the_sub_field('text'); ?>
				</artivle>
			</div><?php
							
		elseif (get_row_layout() == 'button'):?>
			<a class="btn" href="<?php echo get_sub_field('button')['url']; ?>"><?php echo get_sub_field('button')['title']; ?></a><?php
						
		elseif (get_row_layout() == 'image'):?>
			<figure class="cols cols-2">
				<img src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt'] ?>" />
			</figure><?php

		elseif (get_row_layout() == 'gallery_masonry'):
			$galleryMasonry = get_sub_field('masonry');
			echo '<div class="gallery gallery-masonry">';
				foreach($galleryMasonry as $gm):?>
					<figure>
						<img src="<?php echo $gm['url']; ?>" alt="<?php echo $gm['alt'] ?>" />
					</figure><?php
				endforeach;
			echo '</div>';

		elseif (get_row_layout() == 'gallery_row'):
			$galleryRow = get_sub_field('row');
			echo '<div class="gallery gallery-row flex">';
				foreach($galleryRow as $gr):?>
					<figure>
						<img src="<?php echo $gr['url']; ?>" alt="<?php echo $gr['alt'] ?>" />
					</figure><?php
				endforeach;
			echo '</div>';

		elseif (get_row_layout() == 'video'):?>
			<div class="cols cols-2"><?php
				the_sub_field('video');?>
			</div><?php

		endif;
	endwhile;
}