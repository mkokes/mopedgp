<?php

/*
Template Name: Sponsor Template
*/

get_header(); ?>
				<div class="inner-canvas">

					<div class="page">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<article class="post">
								<h1 class="post-title">
									<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
								</h1>
								<p class="story-excerpt">
									<?php the_content();?>
								</p>
							</article>
							<?php endwhile; else : ?>
								<p>
									<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
								</p>
								<?php endif; ?>
					</div>

				</div>
<?php get_footer(); ?>
