<header class="banner">
  <?php if(is_page_template('template-home.php')): ?>
    <?php 
      $image = get_the_post_thumbnail_url(null, 'large'); 
      $logo = get_field('logo', 'option');
    ?>
    <div class="home-banner" style="background: url('<?= $image; ?>')">
      <div class="overlay"></div>
      <img src="<?= $logo ?>" alt="Home" class="home-logo">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
      ?>
    </div>
  <?php else: ?>
    <div class="container">
      <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
      </nav>
    </div>
  <?php endif; ?>
  
</header>