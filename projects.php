<?php
/**
*Template Name: Projects Page
*/
get_header(); ?>

<div class="container page-padding">

    <div class="row justify-content-end">
        <div class="col-md-8 col-sm-12">
        <?php $p_menu = new WP_Query( array( 'page_id' => 11 ) );
        if ($p_menu -> have_posts() ) : while ( $p_menu -> have_posts() ) : $p_menu -> the_post(); ?>
        <h1 class="project_header"><?php the_title(); ?></h1>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>
    <div class="row justify-content-end">
    <?php $args = array(  
        'post_type' => 'project',
        'post_status' => 'publish',
        'posts_per_page' => -1, 
    );
    $p_items = new WP_Query( $args );
        if ($p_items -> have_posts() ) : while ( $p_items -> have_posts() ) : $p_items -> the_post();
    ?>
    
        <div class="col-md-8 col-sm-12">
        <a class="projects_link" href="<?php the_permalink(); ?>"><div class="ptitle_wraper"><p class="project_header"><?php the_title(); ?></p><p class="project_year"><?php the_field('year'); ?></p></div></a> 
        </div> 
   
        <?php endwhile; ?>
        <?php endif; ?>
    </div> 
    <div class="row justify-content-end">
    <div class="col-md-8 col-sm-12">
        <p class="events_link">EXHIBITIONS AND EVENTS</p>
    </div>
    <div class="col-md-8 col-sm-12">
        <p class="shop_link"><a href="http://localhost:8888/JoaoPrates/wordpress/shop/">Shop the collection</a></p>
    </div>
</div>
</div>


<?php get_footer(); ?>