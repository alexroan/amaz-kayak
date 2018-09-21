<?php
  $footerLogo1 = get_field('footer_logo_1', 'option');
  $footerLogo2 = get_field('footer_logo_2', 'option');
?>
<footer class="content-info">
  <div class="footer-menu">
    <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
      endif;
    ?>
  </div>
  <div class="footer-content row">
    <div class="col-sm-6 footer-half">
      <div class="col-sm-6 offset-sm-3">
        <span class="helper"></span>
        <img src="<?= $footerLogo1["sizes"]["medium_large"]; ?>" alt="">
      </div>
    </div>
    <div class="col-sm-6 footer-half">
      <div class="col-sm-6 offset-sm-3">
        <span class="helper"></span>
        <img src="<?= $footerLogo2["sizes"]["medium_large"]; ?>" alt="">
      </div>
    </div>
  </div>
</footer>
