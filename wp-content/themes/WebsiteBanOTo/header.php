<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="lean_overlay" style="opacity: 0.6; display: none"></div>
<div class="popupContainer" style="display: none;">
	<?php  echo do_shortcode('[contact-form-7 id="33" title="Đăng ký báo giá"]'); ?>
</div>
<div id="small-menu" class="hidden-lg hidden-md">
	<span class="glyphicon glyphicon-remove" id="close"></span>
	<div class="contain">
		<nav class="main-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
			) );
			?>
		</nav><!-- #site-navigation -->
	</div>
</div> 

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>

	<div id="scroll-menu">
		<header id="masthead" class="site-header">
		<div id="masthead-top" class="inner">
			<?php
			if ( ! is_active_sidebar( 'sidebar-4' ) ) {
				return;
			}
			?>
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	</header><!-- #masthead -->
<div id="masthead-middle" class="inner">
			<div class="icon-menu" id="icon-menu">
				<span class="glyphicon glyphicon-menu-hamburger"></span>
			</div>
			<div class="site-branding">
				<?php
				$_s_description = get_bloginfo( 'description', 'display' );
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					
					<?php
				else :
					?>
					
					<?php
				endif;
				
				if ( $_s_description || is_customize_preview() ) :
					?>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<div id="social-follow">
				<div class="social-content facebook">
					<a href="<?php  $social_facebook = '#';
							    $options = get_option('stheme_options');
							    if($options) 
							    	if($options['social_facebook'])
							            $social_facebook = $options['social_facebook'];
							    echo $social_facebook; ?>">
						<img src="<?php echo bloginfo('template_url'); ?>/layouts/image/icon-facebook.png" />
					</a>
				</div>
				<div class="social-content mail">
					<a href="<?php  $social_gmail = '#';
							    $options = get_option('stheme_options');
							    if($options) 
							    	if($options['social_gmail'])
							            $social_gmail = $options['social_gmail'];
							    echo $social_gmail; ?>">
						<img src="<?php echo bloginfo('template_url'); ?>/layouts/image/icon-mail.png" />
					</a>
				</div>
				<div class="social-content youtube">
					<a href="<?php  $social_youtube = '#';
							    $options = get_option('stheme_options');
							    if($options) 
							    	if($options['social_youtube'])
							            $social_youtube = $options['social_youtube'];
							    echo $social_youtube; ?>">
						<img src="<?php echo bloginfo('template_url'); ?>/layouts/image/icon-youtube.png" />
					</a>
				</div>
			</div>

			<nav class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
				) );
				?>
			</nav><!-- #site-navigation -->

		</div>
	
	</div>
	<!-- Slider -->
	<?php if ( is_front_page() && is_home() ) : ?>
	<div id="masthead-slider">
		<?php echo do_shortcode('[metaslider id="2261"]'); ?>
	</div>
	<?php endif; ?>
	<div id="content" class="site-content inner">
		