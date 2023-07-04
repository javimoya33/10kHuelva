<?php
/**
 * Banner Template
 *
 * @package    WordPress
 * @subpackage Theme Kalia
 * @author     Theme Kalia
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );
	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : 
?>

	<?php if( $data->get('banner_type') == 'two'): ?>
    <!--Start breadcrumb Style2 area-->     
    <section class="breadcrumb-style2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                        <span><?php echo wp_kses( $data->get( 'text' ), true ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb Style2 area-->
	
	<?php elseif( $data->get('banner_type') == 'three'): ?>
	<!--Start breadcrumb Style3 area-->     
    <section class="breadcrumb-style3-area" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                        <span><?php echo wp_kses( $data->get( 'text' ), true ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb Style3 area-->
	
	<?php elseif( $data->get('banner_type') == 'four'): ?>
    <!--Start breadcrumb Style4 area-->     
    <section class="breadcrumb-style4-area" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                        <span><?php echo wp_kses( $data->get( 'text' ), true ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb Style4 area-->
    
    <?php elseif( $data->get('banner_type') == 'five'): ?>
    <!--Start breadcrumb Style4 area-->     
    <section class="breadcrumb-style4-area faq-breadcrumb" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                        <span><?php echo wp_kses( $data->get( 'text' ), true ); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb Style4 area-->
    
	<?php elseif( $data->get('banner_type') == 'six'): ?>
    <!--Start breadcrumb Style3 area-->     
    <section class="breadcrumb-style6-area" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
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
    <!--End breadcrumb Style3 area-->
    
    <?php elseif( $data->get('banner_type') == 'seven'): ?>
    
    <!--Start breadcrumb Style5 area-->     
    <section class="breadcrumb-style5-area" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb Style5 area-->
    
    <?php elseif( $data->get('banner_type') == 'eight'): ?>
    <!--Start breadcrumb area-->     
    <section class="breadcrumb-area" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End breadcrumb area-->
    <?php else: ?>
    <!--Start breadcrumb Style5 area-->     
    <section class="breadcrumb-style5-area" style="background-image:url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="inner-content text-center clearfix">
                        <div class="big-title"><?php if( $data->get( 'title' ) ) echo wp_kses( $data->get( 'title' ), true ); else wp_title( '' ); ?></div>
                        <h3><?php echo wp_kses( $data->get( 'text' ), true ); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--End breadcrumb Style5 area-->
     
<?php endif; endif; ?>