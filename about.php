<?php
/**
*Template Name: About Page
*/
get_header(); ?>

<div class="container page-padding">

<?php $p_menu = new WP_Query( array( 'page_id' => 2 ) );
if ($p_menu -> have_posts() ) : while ( $p_menu -> have_posts() ) : $p_menu -> the_post(); ?>
        <?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>
</div>
<?php get_footer(); ?>