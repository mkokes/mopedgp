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
			<div id="offcanvas">
				<?php if ( has_nav_menu( 'offcanvas' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'offcanvas',
						'container_id'=>'offcanvas-menu',
						'container_class' => 'offcanvas-menu',
						'depth' => '3',
						'walker' => new My_Sub_Menu()) );
			} ?>
			</div>
			<div id="canvas">
				<header id="site-header">
					<div id="top-navicon">
						<div class="nav-icon">
							<div></div>
						</div>
					</div>
					<div id='top-sitelogo'>
						<a href='<?php echo esc_url( home_url( ' / ' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( ' name ', 'display ' ) ); ?>' rel='home'>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png">
					</a>
					</div>
					<!--<div id="top-sitesearch">
					<?php get_search_form( ); ?>
				</div>-->
				</header>
				<div class="page">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article class="post">
							<h1 class="post-title">
								<?php the_title();?>
							</h1>
							<p class="story-excerpt">
								<?php the_excerpt();?>
							</p>
						</article>
						<?php endwhile; else : ?>
							<p>
								<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
							</p>
							<?php endif; ?>
				</div>
				<footer id="site-footer">
					<?php wp_footer();?>
				</footer>
			</div>
		</div>
	</body>

</html>
