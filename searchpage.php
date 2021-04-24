<?php
/**
 * Template Name: Search Page
 */

?>
<?php
 get_header(); ?>

<div class="container page-padding search_container">
    <main id="main" class="site-main" role="main">
         
        <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_permalink(); ?>">
            <div>
                <label class="screen-reader-text" for="s">Search for:</label>
                <input type="text" value="" name="search" id="s" />
                <input type="submit" id="searchsubmit" value="Search" />
            </div>
        </form> 
      
    </main><!-- #main -->
    <div class="row justify-content-senter">
        <div class="col-md-8 col-sm-12">
            <div  class="search_results" role="main">
            <ul class="search_result_list">
            <?php 
         
         if( isset( $_REQUEST['search'] ) ){
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'paged'           => $paged,
                'posts_per_page'  => -1, 
                //'post_type'       => 'post', 
                's'               => $_REQUEST[ 'search' ]
            );
      

            $search = new WP_Query($args);
            if ( $search->have_posts() ) { ?>
                <h2>Search for: <?php echo $_REQUEST[ 'search' ]; ?> </h2>  
                <div>Found <?php echo $search->post_count; ?> results</div>  
                <?php while ( $search->have_posts() ) {
                    $search->the_post();
                    echo '<li>';
                    $thumbnail_link = get_the_post_thumbnail_url(); 
                // error_log('search1---' . print_r($post,true));
                    if ($thumbnail_link) {
                        echo'<img src="' . $thumbnail_link . '" />';
                    } else {
                        echo'<img src="' . wc_placeholder_img_src() . '" />';
                        
                    }
                    echo '<div class="search_link"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div></li>';
                } 
            }?>
            </ul>
        </div><!-- #main -->
        </div><!-- .col -->
    </div><!-- .row -->
    <?php } ?>
</div><!-- .container -->

<?php get_footer(); 