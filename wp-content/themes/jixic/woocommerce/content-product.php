<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

global $wp_query;
$data  = \JIXIC\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}

if( !$layout || $layout == 'full' ) $classes[] = 'col-xl-3 col-lg-6 col-md-6 col-sm-12'; else $classes[] = 'col-xl-4 col-lg-6 col-md-6 col-sm-12'; ?>

<div <?php post_class( $classes ); ?> >
	<div class="single-product-item text-center">
		<?php
			/**
			 * Hook: woocommerce_before_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_open - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item' );
		
			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			 
			 $post_thumbnail_id = get_post_thumbnail_id($post->ID);
			 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
         ?>
         <div class="img-holder">
            <?php woocommerce_template_loop_product_thumbnail(); ?>
         </div>
             
		<?php do_action( 'woocommerce_before_shop_loop_item_title' );
    
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			//do_action( 'woocommerce_shop_loop_item_title' );
		
			/**
			 * Hook: woocommerce_after_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
        ?>
        <div class="title-holder text-center">
            <div class="static-content">
                <h3 class="title text-center"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                <?php woocommerce_template_loop_price(); ?>
            </div>
            <div class="overlay-content">
                <ul class="clearfix">
                    <li>
                        <a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><span class="icon-cart"></span>
                            <div class="toltip-content">
                                <p><?php esc_html_e( 'Add to Cart', 'jixic' );?></p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( $post_thumbnail_url );?>" class="lightbox-image" data-fancybox="gallery"><span class="icon-refresh"></span>
                            <div class="toltip-content">
                                <p><?php esc_html_e( 'View', 'jixic' );?></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
		<?php
			/**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' );
        ?>
	</div>
</div>