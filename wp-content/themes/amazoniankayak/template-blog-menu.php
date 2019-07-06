<?php
/**
 * Template Name: Blog Menu Template
 */

$posts = get_posts();
?>

<?php
if($posts){
    $count = 0;
    foreach ($posts as $post) {
        $side = ($count % 2 == 0) ? 'left' : 'right';
        printSplitScreenBlog($post, $side);
        $count++;
    }
}
