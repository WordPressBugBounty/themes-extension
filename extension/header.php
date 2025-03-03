<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage Extension
 * @since Extension 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 
 if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}

	$extension_settings = extension_get_theme_options();
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#site-content-contain"><?php esc_html_e('Skip to content','extension'); ?></a>
	<!-- Masthead ============================================= -->
	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrap">
			<!-- Top Header============================================= -->
			<div class="top-header">
				<?php if( is_active_sidebar( 'extension_header_info' )) { ?>

					<div class="top-bar">
						<div class="wrap">
							<?php dynamic_sidebar( 'extension_header_info' ); ?>
						</div> <!-- end .wrap -->
					</div> <!-- end .top-bar -->

				<?php } ?>
				<!-- Main Header============================================= -->
				<div class="main-header clearfix">
					<?php if( ($extension_settings['extension_header_design']=='4') || ($extension_settings['extension_header_design']=='5') ){ ?>
						<div class="header-wrap-inner">
							<div class="header-left">
								<?php if($extension_settings['extension_top_social_icons'] == 0 && has_nav_menu( 'social-link' )): ?>
								<div class="header-social-block">
									<?php do_action('extension_social_links'); ?>
								</div>
									<?php endif; ?>
							</div> <!-- end .header-left -->

							<?php do_action('extension_site_branding');

							do_action('extension_display_header_right_section'); ?>

						</div> <!-- end .wrap -->

					<?php }

					if($extension_settings['extension_disable_main_menu']==0){ ?>
						<!-- Main Nav ============================================= -->
						<div id="sticky-header" class="clearfix">
							<div class="wrap">
								<div class="sticky-header-inner clearfix">

									<?php do_action('extension_secondary_site_branding'); ?>

									<nav id="site-navigation" class="main-navigation clearfix" role="navigation" aria-label="<?php esc_attr_e( 'Main Menu', 'extension' ); ?>">

										<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" type="button">
											<span class="line-bar"></span>
									  	</button> <!-- end .menu-toggle -->

										<?php if (has_nav_menu('primary')) {
											$args = array(
												'theme_location' => 'primary',
												'container'      => '',
												'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
												);

											 wp_nav_menu($args);//extract the content from apperance-> nav menu
											} else {// extract the content from page menu only
											wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
											} ?>
									</nav> <!-- end #site-navigation -->
									<?php if( ($extension_settings['extension_header_design']=='1') || ($extension_settings['extension_header_design']=='2') || ($extension_settings['extension_header_design']=='3') ){

											do_action('extension_display_header_right_section');

										} ?>
								</div> <!-- end .sticky-header-inner -->
							</div> <!-- end .wrap -->
						</div> <!-- end #sticky-header -->
					<?php } ?>
				</div> <!-- end .main-header -->
			</div> <!-- end .top-header -->

			<?php
			$enable_header_image = $extension_settings['extension_enable_header_image'];

				if ($enable_header_image=='frontpage'|| $enable_header_image=='enitresite'){

					if(is_front_page() && ($enable_header_image=='frontpage') ) {

						do_action('extension_display_header_image_widget_slider');

					}

					if($enable_header_image=='enitresite'){

						do_action('extension_display_header_image_widget_slider');

					}
			} ?>
		</div> <!-- end .header-wrap -->
	</header> <!-- end #masthead -->
	<!-- Main Page Start ============================================= -->
	<div id="site-content-contain" class="site-content-contain">