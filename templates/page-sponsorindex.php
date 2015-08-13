<?php

/*
Template Name: Sponsor Index
*/

get_header(); ?>
				<div class="inner-canvas">

					<div class="page">
						<?php
						$count = 0;
						// args
						$args = array(
						    'posts_per_page' => -1,
						    'post_type'      => 'sponsor',
						    'orderby'        => 'rand'
						    );
						// query
						$sponsor_query = new WP_Query( $args );

						if( $sponsor_query->have_posts() ):
							while ( $sponsor_query->have_posts()) : $sponsor_query->the_post(); $count++;

							$description   = get_field( 'description' );
							$website   = get_field( 'website' );
							$facebook       = get_field( 'facebook' );
							$twitter      = get_field( 'twitter' );
							$sponsorthumb = get_the_post_thumbnail( get_the_ID(), '' );

							?>
							<article class="post sponsor">
								<h1 class="post-title">
									<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
								</h1>
								<div class="col1">
									<?php echo $sponsorthumb;?>
								</div>
								<div class="col2">
									<?php if ($description) {echo $description;}?>
									<?php if ($website) {echo '<a href="' . $website . '" title="' . get_the_title() . '">Website</a>';}?>
									<div class="socialbar">
										<?php if ($facebook) {echo '<a href="' . $facebook . '" title="' . get_the_title() . ' Facebook">Facebook</a>';}?>
										<?php if ($twitter) {echo '<a href="' . $twitter . '" title="' . get_the_title() . ' Twitter">Twitter</a>';}?>
									</div>
								</div>
							</article>
							<?php endwhile; else : ?>
								<p>
									<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
								</p>
								<?php endif; ?>
					</div>

				</div>
<?php get_footer(); ?>
