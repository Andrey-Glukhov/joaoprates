<?php get_header(); 
$gallery_id = 0;?>

<div class="container-fluid page-padding">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); 
        $gallery_id = get_field('gallery_id');
        // if( have_rows('Projets') ):
        //         error_log('---ROW--> ' . print_r($gallery_id.true));     
        //    the_row();
        //    $gallery_id = get_sub_field('gallery_id');
        // endif;
        endwhile; 
endif; ?>

</div>
<?php
error_log('---ID--> ' . print_r('[jp_slider post_id='. $gallery_id .']',true));
echo do_shortcode('[jp_slider post_id='. $gallery_id .']');
get_footer(); ?>