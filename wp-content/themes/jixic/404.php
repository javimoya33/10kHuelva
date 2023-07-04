<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Jixic
 * @author     Theme Kalia <admin@theme-kalia.com>
 * @version    1.0
 */

$text = sprintf(__('It seems we can\'t find what you\'re looking for. Perhaps searching can help or go back to', 'jixic'), esc_url(home_url('/')));
$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \JIXIC\Includes\Classes\Common::instance()->data( '404' )->get();
$options = jixic_WSH()->option();

$error_image    = $options->get( 'error_img' );
$error_image    = jixic_set( $error_image, 'url', JIXIC_URI . 'assets/images/resources/404.png' );

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
	
    <!--Start Error Content Area-->
    <section class="error-content-area"> 
        <div class="outer-container">
            <div class="layer-image float_up_down_two" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="700"></div>    
            <div class="layer-image two float_up_down_two" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="700"></div>    
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-content text-center">
                        <div class="image-box">
                            <img src="<?php echo esc_url($error_image);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                        </div>
                        <div class="inner-content">
                            <h1><?php if( $options->get( '404-page_title' )) { echo wp_kses( $options->get( '404-page_title' ), $allowed_html ); }  else { esc_html_e( 'Sorry, The page was not found', 'jixic' ); } ?></h1>
                            <span><?php echo wp_kses( $options->get('404-page-text'), $allowed_html ) ? wp_kses($options->get('404-page-text' ), $allowed_html ) : $text; ?></span>
                            <?php if ( $options->get( 'back_home_btn', true ) ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back To Home', 'jixic' ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <!--End Error Content Area-->
    
<?php
}
get_footer(); ?>
