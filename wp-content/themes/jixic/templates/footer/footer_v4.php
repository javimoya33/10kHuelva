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

<?php if ( is_active_sidebar( 'footer-sidebar-4' ) ) { ?>
<!--Start Footer Style4 Area-->  
<footer class="footer-style4-area">
    <div class="container">
        <div class="row">
            <?php dynamic_sidebar( 'footer-sidebar-4' ); ?>
        </div>
    </div>
</footer>   
<!--End Footer Style4 Area-->  
<?php } ?>

<!--Start Footer bottom Style4 Area-->   
<section class="footer-bottom-style4-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="footer-bottom-style4-content">
                    <div class="copyright-text">
                        <p><?php echo wp_kses( $options->get( 'copyright_text4', 'Copyright © 2020 All Rights Reserved by <a href="#">Jixic.</a>' ), $allowed_html ); ?></p>
                    </div>
                    <?php
						$icons = $options->get( 'footer_v4_social_share' );
						if ( ! empty( $icons ) ) :
					?>
                    <div class="footer-menu-style3">
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
<!--End Footer bottom Style4 Area-->   
   

</div> 


<!-- Scroll Top Button -->
<button class="scroll-top scroll-to-target style3" data-target="html">
    <span class="icon-down-arrow"></span>
</button>