<?php
/**
 * Template Name: Albums Template
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$defaultImage = get_field('logo', 'option');
$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => '_wp_page_template',
            'value' => 'template-gallery.php'
        )
    )
);
$result = new WP_Query( $args );
?>

<div class="container albums-container row">

<?php
foreach ($result->posts as $post) :
    $title = $post->post_title;
    $image = get_the_post_thumbnail_url($post, 'medium');
    if (! $image) {
      $image = $defaultImage;
    }
    $url = get_permalink($post);
    ?>
    <div class="col-sm-6 col-md-4 album-wrapper">
        <a href="<?= $url; ?>" class="album-link">
            <div class="album-cover">
                <div class="album-image" style="background-image:url('<?= $image; ?>')"></div>
                <h4 class="album-title"><?= $title; ?></h4>
            </div>
        </a>
    </div>
    <div class="clearfix visible-sm-block"></div>
<?php endforeach; ?>

</div>