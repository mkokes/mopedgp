<?php get_header(); ?>
				<div class="inner-canvas">

					<div class="page front">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<article class="post">
									<?php the_content();?>
							</article>
							<?php endwhile; else : ?>
								<p>
									<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
								</p>
								<?php endif; ?>
								<div class="check-divider"></div>
								<div class="widget-bar">
									<div class="fpcol1">
										<?php if ( is_active_sidebar( 'frontpage1' ) ) : ?>
										    <div class="widgetarea frontpage1" >
										        <?php dynamic_sidebar( 'frontpage1' ); ?>
										    </div>
										<?php endif; ?>
									</div>
									<div class="fpcol2">
										<?php if ( is_active_sidebar( 'frontpage2' ) ) : ?>
										    <div class="widgetarea frontpage2" >
										        <?php dynamic_sidebar( 'frontpage2' ); ?>
										    </div>
										<?php endif; ?>
									</div>
									<div class="fpcol3">
										<?php if ( is_active_sidebar( 'frontpage3' ) ) : ?>
										    <div class="widgetarea frontpage3" >
										        <?php dynamic_sidebar( 'frontpage3' ); ?>
										    </div>
										<?php endif; ?>
									</div>
								</div>
								<div class="check-divider"></div>
							<?php get_template_part( 'components/sponsor','slider' ); ?>
					</div>

				</div>
<?php get_footer(); ?>
