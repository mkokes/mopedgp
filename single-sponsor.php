<?php get_header(); ?>
				<div class="inner-canvas">

					<div class="page">
						<?php if (have_posts()) : while (have_posts()) : the_post();
                        $description = get_field('description');
                        $website = get_field('website');
                        $facebook = get_field('facebook');
                        $twitter = get_field('twitter');
                        $sponsorthumb = get_the_post_thumbnail(get_the_ID(), '');
                        ?>
							<article class="post sponsor">
								<h2 class="post-title">
									<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a>
								</h2>
								<div class="col1">
									<?php echo $sponsorthumb;?>
								</div>
								<div class="col2">
									<?php if ($description) {
    echo $description;
}?>
									<?php if ($website) {
    echo '<div class="sponsor-website"><a href="'.$website.'" title="'.get_the_title().'">Website</a></div>';
}?>
									<div class="socialbar">
										<?php if ($facebook) {
    ?>
											<a href="<?php echo $facebook;
    ?>" title="<?php the_title();
    ?> Facebook" class="social-icon facebook">
												<?php echo get_template_part('img/inline', 'facebook.svg');
    ?>
											</a>
										<?php
} ?>
										<?php if ($twitter) {
    ?>
											<a href="<?php echo $twitter;
    ?>" title="<?php the_title();
    ?> Twitter" class="social-icon twitter">
												<?php echo get_template_part('img/inline', 'twitter.svg');
    ?>
											</a>
										<?php 
} ?>
									</div>
								</div>
							</article>
							<?php endwhile; else : ?>
								<p>
									<?php _e('Sorry, no posts matched your criteria.'); ?>
								</p>
								<?php endif; ?>
					</div>

				</div>
<?php get_footer(); ?>
