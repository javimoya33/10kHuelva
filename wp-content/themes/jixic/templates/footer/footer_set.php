<?php
/**
 * Footer Template  File
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */

$options = jixic_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!--Start footer area-->  
<footer class="footer-area <?php if ( is_active_sidebar( 'footer-sidebar' ) ) echo 'p-t100';?>">
    <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
    <div class="parallax-scene parallax-scene-1">
        <span data-depth="0.20" class="parallax-layer shape wow zoomInLeft" data-wow-duration="2000ms"></span>
        <span data-depth="0.10" class="parallax-layer shape2 wow zoomInRight" data-wow-duration="2000ms"></span>
        <span data-depth="0.20" class="parallax-layer shape3 wow zoomInRight" data-wow-duration="2000ms"></span>
        <span class="shape4 wow zoomInRight" data-wow-duration="2000ms"></span>
    </div>
    <div class="container">
        <div class="row">
            <?php dynamic_sidebar( 'footer-sidebar' ); ?>
        </div>
    </div>
    <?php } ?>
    <div class="footer-bottom <?php if ( is_active_sidebar( 'footer-sidebar' ) ) echo 'm-t70';?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="footer-bottom-content">
                        <div class="copyright-text">
                            <p><?php echo wp_kses( $options->get( 'copyright_text', 'Copyright © <a href="#">jixic Creative Agency</a> All Rights Reserved.' ), $allowed_html ); ?></p>
                        </div>
                        <?php if($options->get( 'footer_menu' )):?>
                        <div class="footer-menu-style1">
                            <ul>
                                <?php echo wp_kses( $options->get( 'footer_menu'), $allowed_html ); ?>
                            </ul>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>    
    </div>
</footer>   
<!--End footer area-->

</div> 

<!-- Scroll Top Button -->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="icon-down-arrow"></span>
</button> 