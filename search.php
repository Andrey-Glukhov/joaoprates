<?php
 get_header(); ?>

<div class="container-fluid page-padding">

    <div class="row justify-content-senter">
        <div class="col-md-8 col-sm-12">
            <main id="main" class="site-main" role="main">
            <ul class="search_result_list">
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
            global $post;
            $search = new WP_Query($search_query);
            while ( $search->have_posts() ) {
                $search->the_post();
                echo '<li>';
                $thumbnail_link = get_the_post_thumbnail_url(); 
                if ($thumbnail_link) {
                    echo'<img src="' . $thumbnail_link . '" />';
                } else {
                    echo'<img src="' . wc_placeholder_img_src() . '" />';
                    
                }
                echo '<div class="search_link"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div></li>';
            } ?>
            </ul>
            </main><!-- #main -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); 