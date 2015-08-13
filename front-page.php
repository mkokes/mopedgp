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
					</div>

				</div>
<?php get_footer(); ?>
