<?php
/**
 * Template Name: Blog Menu Template
 */

$blogPosts = get_posts();
?>

<h1><?= the_title(); ?></h1>
<?php
while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
    <div class="entry-content-page">
        <?php the_content(); ?> <!-- Page Content -->
    </div><!-- .entry-content-page -->
<?php
endwhile; //resetting the page loop
wp_reset_query(); //resetting the page query

if($blogPosts){
    $count = 0;
    foreach ($blogPosts as $blog) {
        $side = ($count % 2 == 0) ? 'left' : 'right';
        printSplitScreenBlog($blog, $side);
        $count++;
    }
}
