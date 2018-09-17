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
  <div class="footer-content container row">
    <div class="col-md-6">
      <div class="col-md-6 offset-md-3" style="background-image:url('<?= $footerLogo1; ?>')">
        Col 1
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-6 offset-md-3" style="background-image:url('<?= $footerLogo2; ?>')">
        Col 2
      </div>
    </div>
  </div>
</footer>
