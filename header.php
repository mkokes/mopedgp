<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="initial-scale=1.0, width=device-width, height=device-height, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<title>
			<?php wp_title();?>
		</title>
		<?php wp_head();?>
	</head>

	<body <?php body_class();?>>

		<div id="wrapper">
			<div class="offcanvas">
				<?php if ( has_nav_menu( 'offcanvas' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'offcanvas',
						'container_id'=>'offcanvas-menu',
						'container_class' => 'offcanvas-menu',
						'depth' => '3',
						'walker' => new My_Sub_Menu()) );
			} ?>
			</div>
			<div class="canvas">
				<header class="site-header">
					<div class="top-navicon">
						<div class="nav-icon">
							<div></div>
						</div>
					</div>
					<div class='top-sitelogo'>
						<a href='<?php echo esc_url( home_url() ); ?>' title='<?php echo esc_attr( get_bloginfo( ' name ', 'display ' ) ); ?>' rel='home'>
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">
				</a>
					</div>
				</header>
