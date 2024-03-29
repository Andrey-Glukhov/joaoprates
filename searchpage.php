<?php
/**
 * Template Name: Search Page
 */

?>
<?php
 get_header(); ?>

<div class="container-fluid page-padding search_container">
	<div class="row justify-content-center">
		<div class="col-lg-6 col-md-8 col-sm-10 col-11">
		    <main id="main" class="site-main" role="main">
                <form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_permalink(); ?>">
                    <div>
                        <label class="screen-reader-text" for="s">Search for:</label>
                        <input type="text" value="" name="search" id="s" />
                        <input type="submit" id="searchsubmit" value="Search" />
                    </div>
                </form>       
            </main><!-- #main -->			
		</div>
	</div>

    <div class="row justify-content-center">
            <?php 
            if( isset( $_REQUEST['search'] ) && $_REQUEST['search'] != '' ){
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'paged'           => $paged,
                    'posts_per_page'  => -1, 
                    //'post_type'       => 'post', 
                    's'               => $_REQUEST[ 'search' ]
                );       

                $search = new WP_Query($args);
        if ( $search->have_posts() ) { ?>
			<div class="col-12 search_title_wrapper">
                <h1 class="about_header">Search for: <?php echo $_REQUEST[ 'search' ]; ?> </h1>  
				<div>Found <?php echo $search->post_count; ?> results</div>
		    </div>
		</div><!-- .row -->
                      
		<div class="row justify-content-center">
        
                    <?php while ( $search->have_posts() ) {
                        $search->the_post();
                        echo '<div class="col-md-4 col-sm-10 col-12 search_block">';
                        $thumbnail_link = woocommerce_get_product_thumbnail();//get_the_post_thumbnail_url(); 
                        echo '<div class="search_link"><a href="' . get_the_permalink() . '">';    
                        if ($thumbnail_link) {
                            //echo'<img  class="find_image" src="' . $thumbnail_link . '" />';
                            echo $thumbnail_link . '<p>';
                        } else {
                            echo'<img class="find_image" src="' . wc_placeholder_img_src() . '" /> <p>';
                            
                        }
                       echo get_the_title() . '</p></a></div></div>';
                    } 
                } else { ?>
                    <div class="col-12 search_title_wrapper">
                    <h1 class="about_header">Search for: <?php echo $_REQUEST[ 'search' ]; ?> </h1>
                    <div >No items were found matching your search request. </div>  
				        
		            </div>
                <?php }
            } ?>
        

    </div><!-- .row -->
   
</div><!-- .container -->

<?php get_footer(); 