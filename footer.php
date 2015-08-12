<footer class="site-footer">
  <?php echo '&copy; ' . date("Y") . ' MopedGP'; ?>
    <div class="scrolltotop">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64">
        <path d="M32 2l-30 30h18v32h24v-32h18z"></path>
      </svg>
    </div>
    <?php echo get_theme_mod('footer_code');?>
      <?php if (preg_match('/(?i)msie [4-9]/', $_SERVER['HTTP_USER_AGENT'])) {
    // if IE<=9 rem polyfill
    echo "<script src='".get_template_directory_uri()."/js/rem-min.js'></script>";
  }
  ?>
        <?php wp_footer();?>
</footer>
</div>
</div>
</body>
</html>
