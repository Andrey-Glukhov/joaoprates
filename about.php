<?php
/**
*Template Name: About Page
*/
get_header(); ?>

<div class="container page-padding">

<?php $p_menu = new WP_Query( array( 'page_id' => 2 ) );
        if ($p_menu -> have_posts() ) : while ( $p_menu -> have_posts() ) : $p_menu -> the_post(); ?>
        <?php the_content(); ?>
        <div class="row">
        <div id="carouselExampleSlidesOnly" class="col-12">
       <?php   if( have_rows('images_group') ): while( have_rows('images_group') ) : the_row(); ?>
       	<img src="<?php echo esc_url(get_sub_field('image')); ?>"/>
         <?php endwhile; ?>
        <?php endif; ?>
        </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>


</div>
<?php get_footer(); ?>