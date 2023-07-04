<?php
$options = jixic_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );
$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<div class="boxed_wrapper">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <div class="preloader"></div>
    <?php endif; ?>

    <!-- main header -->
    <header class="main-header style2">
        <!--Start header top style2-->
        <div class="header-top-style2">
            <div class="container">
                <div class="outer-box clearfix">
                    <?php if( $options->get('welcome_text_2') ):?>
                    <!--Top Left-->
                    <div class="top-left float-left">
                        <p><span class="icon-car"></span><?php echo wp_kses($options->get( 'welcome_text_2' ), $allowed_html);?> <a href="<?php echo esc_url($options->get( 'analysis_link_2' ));?>"><?php echo wp_kses($options->get( 'analysis_text_2' ), $allowed_html);?></a></p>
                    </div>
                    <?php endif; ?>
                    <!--Top Right-->
                    <div class="top-right float-right">
                        
                        <ul class="top-contact-info">
                            <?php if( $options->get('phone_no_2') ):?><li><i class="icon-music"></i><span><?php esc_html_e('Call us', 'jixic'); ?></span> <?php echo wp_kses($options->get( 'phone_no_2' ), $allowed_html);?></li><?php endif; ?>
                            <?php if( $options->get('email_2') ):?><li><i class="icon-mail"></i><span><?php esc_html_e('Email', 'jixic'); ?></span> <?php echo wp_kses($options->get( 'email_2' ), $allowed_html);?></li><?php endif; ?>    
                        </ul>
                        <?php
                            $icons = $options->get( 'social_icon_2' );
                            if ( ! empty( $icons ) ) :
                        ?>
                        <ul class="top-social-links social-links-style1">
                            <?php
                            foreach ( $icons as $h_icon ) :
                                $header_social_icons = json_decode( urldecode( jixic_set( $h_icon, 'data' ) ) );
                                if ( jixic_set( $header_social_icons, 'enable' ) == '' ) {
                                    continue;
                                }
                                $icon_class = explode( '-', jixic_set( $header_social_icons, 'icon' ) );
                                ?>
                                <li><a href="<?php echo jixic_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo jixic_set( $header_social_icons, 'background' ); ?>; color: <?php echo jixic_set( $header_social_icons, 'color' ); ?>"><i class="fa <?php echo esc_attr( jixic_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
                            <?php endforeach; ?>            
                        </ul>
                        <?php endif;?>
                    </div>
                </div>  
            </div>
        </div>
        <!--End header top style2-->
        <!--Start Header upper style2-->
        <div class="header-upper-style2">
            <div class="container clearfix">
                <div class="outer-box clearfix"> 
                    <div class="header-upper-left float-left">
                        <div class="logo">
                            <?php echo jixic_logo( $logo_type, $image_logo2, $logo_dimension2, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <div class="header-upper-right clearfix float-right">
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu style2 navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
    
                                <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                            'container_class'=>'navbar-collapse collapse navbar-right',
                                            'menu_class'=>'nav navbar-nav',
                                            'fallback_cb'=>false, 
                                            'items_wrap' => '%3$s', 
                                            'container'=>false,
                                            'depth'=>'3',
                                            'walker'=> new Bootstrap_walker()  
                                        ) ); ?>
                                    </ul>
                                </div>
                            </nav>                        
                            <!-- Main Menu End-->
                        </div> 
                        <div class="menu-right-content">
                            <?php if( $options->get( 'show_shoping_cart_icon_2' ) ):?>
                            <?php if( function_exists( 'WC' ) ): global $woocommerce; ?>
                            <div class="cart-box">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><span class="icon-cart"><span class="number"><?php echo wp_kses(( $woocommerce->cart->cart_contents_count ), $allowed_html); ?></span></span></a>
                            </div>
                            <?php endif; endif; ?>
                            
                            <?php if( $options->get( 'show_search_form_2' ) ):?>
                            <div class="outer-search-box">
                                <div class="seach-toggle"><i class="fa fa-search"></i></div>
                                <ul class="search-box">
                                    <li>
                                        <?php get_template_part('searchform1')?>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Header Upper style2--> 
        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="clearfix">
                    <!--Logo-->
                    <div class="logo float-left">
                        <?php echo jixic_logo( $logo_type, $image_logo2, $logo_dimension2, $logo_text, $logo_typography ); ?>
                    </div>
                    <!--Right Col-->
                    <div class="right-col float-right">
                        <!-- Main Menu -->
                        <nav class="main-menu style2 navbar-expand-lg">
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
                                        'container_class'=>'navbar-collapse collapse navbar-right',
                                        'menu_class'=>'nav navbar-nav',
                                        'fallback_cb'=>false, 
                                        'items_wrap' => '%3$s', 
                                        'container'=>false,
                                        'depth'=>'3',
                                        'walker'=> new Bootstrap_walker()  
                                    ) ); ?>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Sticky Header-->
    </header>