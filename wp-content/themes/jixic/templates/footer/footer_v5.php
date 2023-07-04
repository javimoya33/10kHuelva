<?php
/**
 * Footer Template  File
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */

$options = jixic_WSH()->option();
$feature_image   = $options->get( 'feature_image_one' );
$feature_image    = jixic_set( $feature_image, 'url', JIXIC_URI . 'assets/images/shape/mockup-iphone.png' );
$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!--Start Footer Style5 Area-->  
<footer class="footer-style5-area">
    <div class="layer-outer" style="background-image:url(<?php echo esc_url($feature_image);?>);"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
               <div class="footer-style5-content text-center">
                    <h1><?php echo wp_kses($options->get( 'footer_title' ), $allowed_html);?></h1>
                    <p><?php echo wp_kses($options->get( 'footer_text' ), $allowed_html);?></p>
                    <div class="button">
                        <a href="<?php echo esc_url($options->get( 'google_store_link' ));?>">
                            <span class="icon-brand">
                                <span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span>
                            </span><?php esc_html_e('Google Store', 'jixic'); ?>
                        </a>
                       <a href="<?php echo esc_url($options->get( 'app_store_link' ));?>">
                           <span class="flaticon-apple-logo"></span>
                           <?php esc_html_e('Apple Store', 'jixic'); ?>
                       </a>
                    </div>
               </div>
           </div>
        </div>
    </div>
    <div class="footer-style5-bottom-content clearfix text-center">
        <?php
			$icons = $options->get( 'footer_v5_social_share' );
			if ( ! empty( $icons ) ) :
		?>
        <div class="footer-social-links">
            <ul class="social-links-style1">
                <?php
				foreach ( $icons as $h_icon ) :
				$header_social_icons = json_decode( urldecode( jixic_set( $h_icon, 'data' ) ) );
				if ( jixic_set( $header_social_icons, 'enable' ) == '' ) {
					continue;
				}
				$icon_class = explode( '-', jixic_set( $header_social_icons, 'icon' ) );
				?>
				<li><a href="<?php echo esc_url(jixic_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(jixic_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(jixic_set( $header_social_icons, 'color' )); ?>"><i class="fa <?php echo esc_attr( jixic_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
				<?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>
        <div class="copyright-text">
            <p><?php echo wp_kses( $options->get( 'copyright_text5', 'Copyrights © 2020 , All Rights Reserved by <a href="#">jixic</a>.' ), $allowed_html ); ?></p>
        </div>
    </div>
</footer>   
<!--End Footer Style5 Area-->  
 
</div>

<!-- Scroll Top Button -->
<button class="scroll-top scroll-to-target style4" data-target="html">
    <span class="icon-down-arrow"></span>
</button>