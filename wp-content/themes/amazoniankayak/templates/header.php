<?php
$class = "page-banner";
$image = get_the_post_thumbnail_url(null, 'large');

$home = false;
if(is_page_template('template-home.php')){
  $home = true;
  $logo = get_field('logo', 'option');
  $class = "home-banner";
}
else{
  $logo = get_field('logo_2', 'option');
  $textLogo = get_field('logo_3', 'option');
  $header_right = get_field('header_right', 'option');
}
?>

<header class="banner">
    <div class="header-banner <?= $class; ?>" style="background: url('<?= $image; ?>')">
      <div class="overlay"></div>
      <img src="<?= $logo ?>" data-url="<?= get_home_url(); ?>" alt="Home" class="logo crest-logo">
      <div id="social-icons">
        <!-- <a href="http://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a> -->
        <a href="https://twitter.com/2020Kayak" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com/amazoniankayak2020/" target="_blank"><i class="fab fa-instagram"></i></a>
      </div>
      <?php if (isset($textLogo)): ?>
        <img src="<?= $textLogo ?>" data-url="<?= get_home_url(); ?>" alt="Home" class="logo text-logo">
      <?php endif; ?>
      <div id="header-right">
        <?= $header_right; ?>
      </div>
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
      ?>
    </div>
</header>