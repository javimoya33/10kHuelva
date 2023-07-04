<?php
/**
 * Footer Template  File
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */

$options = jixic_WSH()->option();
$bg_img_three   = $options->get( 'footer_bg_img_three' );
$bg_img_three    = jixic_set( $bg_img_three, 'url', JIXIC_URI . 'assets/images/pattern/footer-style3-bg.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<?php if ( is_active_sidebar( 'footer-sidebar-3' ) ) { ?>
<!--Start Footer Style3 Area-->  
<footer class="footer-style3-area">
    <div class="auto-container">
        <div class="footer-style3-bg"  style="background-image:url(<?php echo esc_url($bg_img_three);?>);"></div>
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
            </div>
        </div>
    </div>
</footer>   
<!--End Footer Style3 Area--> 
<?php } ?>
<!--Start Footer bottom Style3 Area-->   
<section class="footer-bottom-style3-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="footer-bottom-style3-content">
                    <div class="copyright-text">
                        <p><?php echo wp_kses( $options->get( 'copyright_text3', 'Copyright © <a href="#">jixic Creative Agency</a> All Rights Reserved.' ), $allowed_html ); ?></p>
                    </div>
                    <?php
						$icons = $options->get( 'footer_v3_social_share' );
						if ( ! empty( $icons ) ) :
					?>
                    <div class="footer-menu-style2">
                        <ul>
                            <?php
							foreach ( $icons as $h_icon ) :
							$header_social_icons = json_decode( urldecode( jixic_set( $h_icon, 'data' ) ) );
							if ( jixic_set( $header_social_icons, 'enable' ) == '' ) {
								continue;
							}
							$icon_class = explode( '-', jixic_set( $header_social_icons, 'icon' ) );
							?>
							<li><a href="<?php echo esc_url(jixic_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(jixic_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(jixic_set( $header_social_icons, 'color' )); ?>"><span class="fa <?php echo esc_attr( jixic_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
							<?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>    
</section> 
<!--End Footer bottom Style3 Area-->   

</div> 

<!-- Scroll Top Button -->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="icon-down-arrow"></span>
</button>