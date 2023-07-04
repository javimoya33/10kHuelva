<?php
/**
 * Default Template Main File.
 *
 * @package JIXIC
 * @author  ThemeKalia
 * @version 1.0
 */

get_header();
$data  = \JIXIC\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$class = ( !$layout || $layout == 'full' ) ? 'col-xs-12 col-sm-12 col-md-12' : 'col-xl-8 col-lg-7 col-md-12 col-sm-12';
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
    <!-- Page Title -->
<?php endif;?>

<!--Start Blog List Area-->
<section id="blog-list-area">
    <div class="container">
        <div class="row">
			<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'jixic_sidebar', $data );
				}
            ?>
            <div id="blog-single-area" class="<?php echo esc_attr( $class ); ?>">
				<div class="blog-post">		
                    <div class="thm-unit-test">
						<?php while ( have_posts() ): the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>
                    </div>
					<div class="clearfix"></div>
					<?php
					$defaults = array(
						'before' => '<div class="paginate-links">' . esc_html__( 'Pages:', 'jixic' ),
						'after'  => '</div>',

					);
					wp_link_pages( $defaults );
					?>
					<?php comments_template() ?>
				</div>
            </div>
			<?php
				if ( $layout == 'right' ) {
					$data->set('sidebar', 'default-sidebar');
					do_action( 'jixic_sidebar', $data );
				}
            ?>
		</div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>
