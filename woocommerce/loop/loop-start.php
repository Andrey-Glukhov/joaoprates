<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="container page-padding">
    <div class="row justify-content-end">

        <div class="col-md-8 col-sm-12 col-12">
            <div class="shop_title_wrapper">
                <p>SHOP</p>
                
                <p><?php //$count_posts = wp_count_posts( 'product' ); echo $count_posts->publish;
                do_action('woocommerce_shoppage_result_count') ?></p>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-4 attr_col">
            <div class="attr_wraper">
            <?php if ( function_exists('dynamic_sidebar') )
		dynamic_sidebar('shop-sidebar');?>
        </div>
        </div>
        <div class="col-md-8">
            <ul class="row products">