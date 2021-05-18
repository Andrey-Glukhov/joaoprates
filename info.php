<?php
/**
*Template Name: Info Page
*/
get_header(); ?>


<div class="container page-padding">
    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="row" style="margin-top: 10px; margin-bottom: 50px;">
        <div class="col-12">
            <h1 class="about_header"><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="info-content col-md-8 col-sm-12 col-12">
            <?php the_content(); ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

</div>
<?php get_footer(); ?>