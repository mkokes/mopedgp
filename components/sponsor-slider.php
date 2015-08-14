<div class="fpsponsor-bar">
  <h2>MopedGP Sponsors</h2>
<div class='sponsor-slider'>
<?php
$count = 0;
// args
$args = array(
  'posts_per_page' => -1,
  'post_type' => 'sponsor',
  'orderby' => 'rand',
);
// query
$sponsor_query = new WP_Query($args);

if ($sponsor_query->have_posts()):
  while ($sponsor_query->have_posts()) : $sponsor_query->the_post(); ++$count;
  $sponsorthumb = get_the_post_thumbnail(get_the_ID(), '');
  ?>
<div class="sponsor-slide">
  <?php echo $sponsorthumb;?>
</div>
<?php endwhile; else : ?>
  <p>
    <?php _e('Sorry, no sponsors at this time.'); ?>
  </p>
  <?php endif; ?>
</div>
</div>
