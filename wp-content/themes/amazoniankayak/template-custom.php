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
      case 'sponsors':
        printSponsors($item);
        break;
    }
  }
}
