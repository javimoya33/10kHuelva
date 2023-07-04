<?php
/**
 * Blog Main File.
 *
 * @package JIXIC
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \JIXIC\Includes\Classes\Common::instance()->data( 'blog' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$layout = ( $layout ) ? $layout : 'right';
$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
if (is_active_sidebar( $sidebar )) {$layout = 'right';} else{$layout = 'full';}
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-md-12 col-sm-12';
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
    
    <?php if ( class_exists( '\Elementor\Plugin' )):?>
    	<?php do_action( 'jixic_banner', $data );?>
    <?php else:?>
    <!-- Page Title -->
    <section class="breadcrumb-style6-area" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php esc_html_e( 'Blog', 'jixic' ); ?></div>
                        <div class="breadcrumb-menu">
                            <ul class="clearfix">
                                <?php echo jixic_the_breadcrumb(); ?>
                            </ul>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title -->
    <?php endif;?>
    
    <!--Start Blog List Area-->
    <section id="blog-list-area">
        <div class="container">
            <div class="row">
                
                <!--Sidebar Start-->
                <?php
					if ( $data->get( 'layout' ) == 'left' ) {
						do_action( 'jixic_sidebar', $data );
					}
				?>
                
                <div class="<?php echo esc_attr( $class ); ?>">
                    <div class="blog-post">
                        <div class="<?php if (! class_exists( '\Elementor\Plugin' )) echo 'thm-unit-test';?>">
							<?php
                                while ( have_posts() ) :
                                    the_post();
                                    jixic_template_load( 'templates/blog/blog.php', compact( 'data' ) );
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <?php jixic_the_pagination( $wp_query->max_num_pages );?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Sidebar Start-->
                <?php
					if ( $data->get( 'layout' ) == 'right' ) {
						do_action( 'jixic_sidebar', $data );
					}
				?>
                
            </div>
        </div>
    </section> 
    <!--End blog area--> 
	<?php
}
get_footer();
