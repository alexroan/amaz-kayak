<?php
/**
 * Template Name: Gallery Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<!-- Print Gallery -->
<?php $gallery = get_field('gallery_images');?>
<div class="container gallery-container row">
    <?php foreach ($gallery as $image) : ?>
        <?php 
            $url = $image['sizes']['medium']; 
            $largeUrl = $image['sizes']['large'];
        ?>
        <div class="col-sm-4 gallery-image" data-url="<?= $largeUrl; ?>" style="background-image:url('<?= $url; ?>')"></div>
    <?php endforeach; ?>

    <!-- Image modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>

</div>

