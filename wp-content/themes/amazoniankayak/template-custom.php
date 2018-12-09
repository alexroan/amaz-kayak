<?php
/**
 * Template Name: Custom Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$flexibleContent = get_field('flexible_content');
if($flexibleContent){
  foreach ($flexibleContent as $item) {
    switch ($item['acf_fc_layout']) {
      case 'split_screen':
        printSplitScreen($item);
        break;
      case 'grey_background':
        printGreyBackground($item);
        break;
    }
  }
}

function printGreyBackground($details){
  print_r(json_encode('grey background'));
}

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
<?php } ?>
