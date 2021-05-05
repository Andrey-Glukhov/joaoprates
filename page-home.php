<?php
/**
*Template Name: Home Page
*/
get_header(); ?>

<div class="container page-padding">
<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
     <?php the_content(); ?>
        <?php endwhile; ?>
        <?php endif; ?>

</div>
<?php get_footer(); ?>