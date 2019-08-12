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

if( ! function_exists('printSponsors')){
  function printSponsors($sponsors){ ?>
  <div class="container sponsor-container row">
  <?php
    foreach ($sponsors['sponsor_details'] as $sponsor) {
      $image = $sponsor['image']['sizes']['medium_large'];
      $url = $sponsor['url'];
      ?>
      <div class="col-sm-4 col-md-3">
        <a href="<?= $url; ?>" class="sponsor-link">
          <div style="background-image:url('<?= $image; ?>')" class="sponsor-image"></div>
        </a>
      </div>
      <?php
    }
  ?>
  </div>
  <?php }
}

//Blog split screen feature
if ( ! function_exists('printSplitScreenBlog') ) {
  function printSplitScreenBlog($details, $imageSide) {
    // Get blog post info
    $title = $details->post_title;
    $image = get_the_post_thumbnail_url($details, 'medium');
    if (! $image) {
      $image = get_field('logo', 'option');
    }
    $subtitle = date('j F Y', strtotime($details->post_date));
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

// Normal split screen feature
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
<?php }} 

// Just giving widget
if ( ! function_exists('justgiving_widget')) {
  function justgiving_widget() {
    return '<div id="jg-widget-amazoniankayak2020-287">
      </div>
        <script>
          (function(){
            var id="jg-widget-amazoniankayak2020-287", doc=document, pfx=(window.location.toString().indexOf("https")==0)?"https":"http";
            var el=doc.getElementById(id);
            if(el){
              var js=doc.createElement(\'script\');
              js.src=pfx+"://widgets.justgiving.com/fundraisingpage/amazoniankayak2020?enc=ZT1qZy13aWRnZXQtYW1hem9uaWFua2F5YWsyMDIwLTI4NyZ3PTQwMCZiPWlubmVyLGRvbmF0ZSZpYj1wcm9ncmVzcyxyYWlzZWQsdGFyZ2V0";
              el.parentNode.insertBefore(js, el);
            }
          })();
        </script>
      ';
    
  }
}
add_shortcode('justgiving', 'justgiving_widget');

if ( ! function_exists('countdown_timer') ) {
  function countdown_timer($atts = array()) {
    // set up default parameters
    extract(shortcode_atts(array(
      'date' => "Jan 5, 2021 15:37:25",
      'text' => "COUNTDOWN"
    ), $atts));
    return "<div class=\"countdown-section\">
    <h4>$text</h4>
    <h5 id=\"countdown-timer\"></h5>
    </div>
    <script>
    var countDownDate = new Date(\"$date\").getTime();
    var x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById(\"countdown-timer\").innerHTML = days + \"d \" + hours + \"h \"
      + minutes + \"m \" + seconds + \"s \";
      if (distance < 0) {
        clearInterval(x);
        document.getElementById(\"countdown-timer\").innerHTML = \"EXPIRED\";
      }
    }, 1000);
    </script>";
  }
}
add_shortcode('countdown', 'countdown_timer');
