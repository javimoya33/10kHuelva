<?php
/**
 * Footer Template  File
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */

$options = jixic_WSH()->option();
$bg_img    = $options->get( 'footer_bg_img' );
$bg_img    = jixic_set( $bg_img, 'url', JIXIC_URI . 'assets/images/footer/footer-style2-area-bg.png' );
$bg_img_two   = $options->get( 'footer_bg_img_two' );
$bg_img_two    = jixic_set( $bg_img_two, 'url', JIXIC_URI . 'assets/images/footer/footer-style2-area-shape-1.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!--Start Footer Style2 Area-->  
<footer class="footer-style2-area">
    <div class="footer-style2-area-bg" style="background-image:url(<?php echo esc_url($bg_img);?>);">
        <div class="shape-one zoom-fade" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000" style="background-image: url(<?php echo esc_url($bg_img_two);?>);"></div>
        <div class="parallax-scene parallax-scene-1">
            <span data-depth="0.20" class="parallax-layer shape-two wow zoomInLeft" data-wow-duration="2000ms"></span>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="footer-contact-form">
                    <div class="title">
                        <h3><?php echo wp_kses( $options->get( 'form_title'), $allowed_html ); ?></h3>
                        <p><?php echo wp_kses( $options->get( 'form_text'), $allowed_html ); ?></p>
                    </div>
                    <div class="default-form">
                          <?php echo do_shortcode( $options->get( 'footer_contact_form_url') ); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="google-map-box" id="home-google-map">
                    <?php echo do_shortcode( $options->get( 'footer_google_map_code') ); ?>   
                </div>     
            </div>
        </div>
        <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
        <div class="row martop">
            <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
        </div>
        <?php } ?>
    </div>
</footer>   
<!--End Footer Style2 Area-->  

<!--Start footer bottom area-->
<section class="footer-bottom-area-style2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="footer-bottom-content-style2">
                    <div class="copyright-text-style2">
                        <p><?php echo wp_kses( $options->get( 'copyright_text2', 'Copyright © <a href="#">jixic SEO Company,</a> All Rights Reserved.' ), $allowed_html ); ?></p>
                    </div>
                    <?php if($options->get( 'footer_menu_2' )):?>
                    <div class="footer-menu-style1 home2">
                        <ul>
                            <?php echo wp_kses( $options->get( 'footer_menu_2'), $allowed_html ); ?>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>    
</section>
<!--End footer bottom area-->      

</div>

<!-- Scroll Top Button -->
<button class="scroll-top scroll-to-target style2" data-target="html">
    <span class="icon-down-arrow"></span>
</button>