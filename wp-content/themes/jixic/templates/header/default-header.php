<?php
$options = jixic_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$image_logo = $options->get( 'image_normal_logo' );
$logo_dimension = $options->get( 'normal_logo_dimension' );
$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<div class="boxed_wrapper">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <div class="preloader"></div>
    <?php endif; ?>

    <!-- Main Header-->
    <header class="main-header">
        <!-- Header Upper -->
        <div class="header-upper animInTop">
            <div class="container clearfix">
                <div class="top-bar">
                    <div class="logo-box float-left">
                        <div class="logo">
                            <?php echo jixic_logo( $logo_type, $image_logo, $logo_dimension, $logo_text, $logo_typography ); ?>
                        </div>
                    </div>
                    <?php if( has_nav_menu( 'main_menu' ) ):?>
                    <div class="navbar-btn-wrap float-right">
                        <button class="reset anim-menu-btn js-anim-menu-btn" aria-label="Toggle menu">
                            <span><?php echo wp_kses($options->get( 'menu_btn_title' ), $allowed_html);?></span>
                            <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
                        </button>
                    </div>
                    <?php endif;?>
                </div>
    
                <div class="nav-outer">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon icon-blog"></span></div>
    
                    <div class="nav-inner close-menu">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-xl navbar-dark">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navigation">
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
                        </nav><!-- Main Menu End-->
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
    </header>
    <!-- End Main Header -->
    
    <!-- Mobile Menu  -->
    <div class="mobile-menu close-menu"> 
    	<div class="close-menu-btn"></div>       
        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">            
            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
        </nav>
    </div>
    <!-- End Mobile Menu -->