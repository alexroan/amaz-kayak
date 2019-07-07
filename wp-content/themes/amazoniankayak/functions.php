<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();	
}

if( ! function_exists('printGreyBackground')){
  function printGreyBackground(){
    print_r(json_encode('grey background'));
  }
}

if ( ! function_exists('printSplitScreenBlog') ) {
  function printSplitScreenBlog($details, $imageSide) {
    // Get blog post info
    $title = $details->post_title;
    $image = get_the_post_thumbnail_url($details, 'medium');
    if (! $image) {
      $image = get_field('logo', 'option');
    }
    $subtitle = $details->post_date;
    $url = get_the_permalink($details);
    ?>

    <!-- Print out blog post tile -->
    <a href="<?= $url; ?>" class="split-container-link" style="text-decoration: none;">
    <div class="split-container container row">
      <?php if ($imageSide == 'left') : ?>
        <div class="col-lg-4 image image-dark" style="background-image:url('<?= $image; ?>')"></div>
        <div class="col-lg-8 content content-right">
          <h2><?= $title; ?></h2>
          <h4 class="orange"><?= $subtitle; ?></h4>
        </div>
      <?php else: ?>
      <div class="col-lg-4 order-lg-last image image-dark image-right" style="background-image:url('<?= $image; ?>')"></div>
      <div class="col-lg-8 order-lg-first content content-left">
        <h2><?= $title; ?></h2>
        <h4 class="orange"><?= $subtitle; ?></h4>
      </div>
      <?php endif; ?>
    </div>
    </a>

    <?php
  }
}

if ( ! function_exists('printSplitScreen') ){
  function printSplitScreen($details) { 
    $imageSide = $details['image_side'];
    $image = $details['image']['sizes']['medium_large'];
    $title = $details['title'];
    $subtitle = $details['subtitle'];
    $content = $details['content'];

    ?>
    <div class="split-container container row">
      <?php if ($imageSide == 'left') : ?>
        <div class="col-lg-4 image" style="background-image:url('<?= $image; ?>')"></div>
        <div class="col-lg-8 content content-right">
          <h2><?= $title; ?></h2>
          <h4 class="orange"><?= $subtitle; ?></h4>
          <p><?= $content; ?></p>
        </div>
      <?php else: ?>
      <div class="col-lg-4 order-lg-last image image-right" style="background-image:url('<?= $image; ?>')"></div>
      <div class="col-lg-8 order-lg-first content content-left">
        <h2><?= $title; ?></h2>
        <h4 class="orange"><?= $subtitle; ?></h4>
        <p><?= $content; ?></p>
      </div>
      <?php endif; ?>
    </div>
<?php }} ?>