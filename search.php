<?php
 get_header(); ?>

<div class="container page-padding">

    <div class="row justify-content-end">
        <div class="col-md-8 col-sm-12">
            <main id="main" class="site-main" role="main">
            <?php 
            global $query_string;
            $query_args = explode("&amp;", $query_string);
            $search_query = array();
            if( strlen($query_string) > 0 ) {
                 foreach($query_args as $key => $string) {
                     $query_split = explode("=", $string); 
                     $search_query[$query_split[0]] = urldecode($query_split[1]);
                } // foreach<br> 
            } //if
            $search = new WP_Query($search_query);
            while ( $search->have_posts() ) {
                $search->the_post();
                echo '<li>' . get_the_title() . '</li>';
            } ?>
            </main><!-- #main -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); 