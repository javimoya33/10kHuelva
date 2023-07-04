<?php
$options = jixic_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$image_logo9 = $options->get( 'image_normal_logo9' );
$logo_dimension9 = $options->get( 'normal_logo_dimension9' );
$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<div class="boxed_wrapper">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <div class="preloader"></div>
    <?php endif; ?>

    <!-- Main header -->
    <header id="creative-portfolio-header" class="main-header style5 style5withstyle7 responsive-header">
        <!--Start Header upper style2-->
        <div class="header-upper-style5">
            <div class="outer-container clearfix">
               
                <div class="header-upper-left clearfix">
                    <div class="logo">
                        <?php echo jixic_logo( $logo_type, $image_logo9, $logo_dimension9, $logo_text, $logo_typography ); ?>
                    </div>
                </div>
                
                <div class="header-upper-middle clearfix">
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu style4 navbar-expand-lg">
                            <div class="navbar-header">
                                <!-- Toggle Button -->      
                                <button type="button" class="navbar-toggle mar-right0" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                </div>
                
                <div class="header-upper-right clearfix">
                    <div class="header-right-content">
                        <?php if( $options->get( 'show_shoping_cart_icon_10' ) ):?>
                        <?php if( function_exists( 'WC' ) ): global $woocommerce; ?>
                        <div class="cart-box style2">
                            <a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"><span class="icon-cart"><span class="number"><?php echo wp_kses(( $woocommerce->cart->cart_contents_count ), $allowed_html); ?></span></span></a>
                        </div>
                        <?php endif; endif; ?>
                            
                        <?php if( $options->get( 'show_search_form_10' ) ):?>
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
        <!--End Header Upper style2--> 
        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="clearfix">
                    <!--Logo-->
                    <div class="logo float-left">
                        <?php echo jixic_logo( $logo_type, $image_logo9, $logo_dimension9, $logo_text, $logo_typography ); ?>
                    </div>
                    <!--Right Col-->
                    <div class="right-col float-right">
                        <!-- Main Menu -->
                        <nav class="main-menu style4 navbar-expand-lg">
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