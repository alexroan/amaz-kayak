<?php
$class = "page-banner";
$image = get_the_post_thumbnail_url(null, 'large');
$logo = get_field('logo_2', 'option');
$home = false;
if(is_page_template('template-home.php')){
    $home = true;
    $logo = get_field('logo', 'option');
    $class = "home-banner";
}
?>

<header class="banner">
    <div class="header-banner <?= $class; ?>" style="background: url('<?= $image; ?>')">
      <div class="overlay"></div>
      <img src="<?= $logo ?>" data-url="<?= get_home_url(); ?>" alt="Home" class="logo">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
      ?>
    </div>
</header>