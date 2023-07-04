<?php
$options = jixic_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
$image_logo2 = $options->get( 'image_normal_logo2' );
$logo_dimension2 = $options->get( 'normal_logo_dimension2' );

$image_logo4 = $options->get( 'image_normal_logo4' );
$logo_dimension4 = $options->get( 'normal_logo_dimension4' );
$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<div class="boxed_wrapper">

	<?php if( $options->get( 'theme_preloader' ) ):?>
    <div class="preloader"></div>
    <?php endif; ?>

    <!-- main header -->
    <header class="main-header style4">
        <!--Start Header upper style2-->
        <div class="header-upper-style4">
            <div class="outer-container clearfix">
               
                <div class="header-upper-left clearfix">
                    <div class="logo">
                        <?php echo jixic_logo( $logo_type, $image_logo4, $logo_dimension4, $logo_text, $logo_typography ); ?>
                    </div>
                </div>
                
                <div class="header-upper-middle clearfix">
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu style3 navbar-expand-lg">
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
                        <?php if( $options->get( 'show_search_form_4' ) ):?>
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
                <?php if( $options->get( 'phone_no_4' ) ):?>
                <div class="header-upper-right clearfix">
                    <div class="header-right-content">
                        <div class="phone-num">
                            <a href="tel:<?php echo esc_url($options->get( 'phone_no_4' ));?>"><?php echo wp_kses($options->get( 'phone_no_4' ), $allowed_html);?></a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
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
                        <nav class="main-menu style3 navbar-expand-lg">
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