<?php
/**
 * Footer Template  File
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */

$options = jixic_WSH()->option();
$footer_logo_image   = $options->get( 'footer_logo_img' );
$footer_logo_image    = jixic_set( $footer_logo_image, 'url', JIXIC_URI . 'assets/images/footer/footer-style6-logo.jpg' );

$allowed_html = wp_kses_allowed_html( 'post' );
?>

<!--Start Footer Style6 Area-->  
<footer class="footer-style6-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="footer-style6-box">
                    <div class="get-touch"><h6><?php echo wp_kses($options->get( 'footer_title_v6' ), $allowed_html);?></h6></div>
                    <div class="footer-style6-contact-details text-center">
                        <h2><a href="mailto:<?php echo esc_url($options->get( 'footer_email_v6' ));?>"><?php echo wp_kses($options->get( 'footer_email_v6' ), $allowed_html);?></a></h2>
                        <ul>
                            <li class="maxwidth270">
                                <h6><?php esc_html_e('Acerca de Nosotros', 'jixic'); ?></h6>
                                <p><?php echo wp_kses($options->get( 'footer_phone_no_v6' ), $allowed_html);?></p>
                            </li>
                            <li class="maxwidth626">
                                <h6><?php esc_html_e('Acerca de Nosotros', 'jixic'); ?></h6>
                                <p><?php echo wp_kses($options->get( 'footer_follow_on_v6' ), $allowed_html);?></p>
                            </li>
                            <li class="maxwidth270">
                                <h6><?php esc_html_e('Acerca de Nosotros', 'jixic'); ?></h6>
                                <p><?php echo wp_kses($options->get( 'footer_phone_no_two_v6' ), $allowed_html);?></p>
                            </li>
                        </ul>    
                    </div>
                    <div class="footer-style6-menu-box text-center">
                        <div class="footer-style6-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($footer_logo_image);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>"></a>
                        </div>
                        <div class="footer-style6-menu">
                            <ul>
                                <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'items_wrap' => '%3$s', 
									'container'=>false,
									'depth'=>'1',
									'walker'=> new Bootstrap_walker()  
								) ); ?>
                            </ul>
                        </div>
                    </div>
                    
                </div>    
            </div>
        </div>
    </div>
</footer>   
<!--End Footer Style6 Area-->
 
<!--Start Footer Bottom Area Style6-->
<section class="footer-bottom-area-style6">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="footer-bottom-content-style6">
                    <div class="copyright-text-style6">
                        <p><?php echo wp_kses( $options->get( 'copyright_text6', 'Copyright © <a href="#">jixic Freelancer</a> All Rights Reserved.' ), $allowed_html ); ?></p>
                    </div>
                    <?php
						$icons = $options->get( 'footer_v3_social_share' );
						if ( ! empty( $icons ) ) :
					?>
                    <div class="footer-social-links-style6">
                        <p><?php esc_html_e('Encuéntranos en:', 'jixic'); ?></p>
                        <ul class="sociallinks-style-two">
                            <li>
								<a href="https://www.facebook.com/10KHuelva" style="color: #fff">
									<i class="fab fa-facebook"></i>
								</a>
							</li>
							<li>
								<a href="https://www.instagram.com/10khuelva/" style="color: #fff">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/10KHuelva" style="color: #fff">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li>
								<a href="https://www.youtube.com/channel/UCNRyM1MkD5HECwVRAi9EQ_w" style="color: #fff">
									<i class="fab fa-youtube"></i>
								</a>
							</li>
                        </ul>
                    </div>
                	<?php endif;?>
                </div>
            </div>
        </div>
    </div>    
</section>
<!--End Footer Bottom Area Style2--> 

</div> 


<!-- Scroll Top Button -->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="icon-down-arrow"></span>
</button>
