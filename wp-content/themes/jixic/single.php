<?php
/**
 * Blog Post Main File.
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */

get_header();
$data    = \JIXIC\Includes\Classes\Common::instance()->data( 'single' )->get();
$layout = $data->get( 'layout' );
$sidebar = $data->get( 'sidebar' );
$class = ( !$layout || $layout == 'full' ) ? 'col-xl-12 col-lg-12 col-md-12 col-sm-12' : 'col-xs-12 col-sm-12 col-md-12 col-lg-8';
$options = jixic_WSH()->option();

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>
    
<!--Start Breadcrumb Blog Single Area-->     
<section class="breadcrumb-blog-single-area">
    <div class="outer-container">
        <div class="layer-image wow fadeInUp" data-wow-duration="1500ms" style="background-image: url(<?php echo esc_url( $data->get( 'banner' ) ); ?>);"></div>    
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-blog-single">
                    <div class="inner-box text-center">
                        <ul class="meta-box">
                            <?php if( $options->get( 'single_post_date' ) ):?>
                            <li><a href="<?php echo esc_url(get_month_link(get_the_date('Y'), get_the_date('m'))); ?>"><?php echo get_the_date( ); ?></a></li>    
                            <?php endif;?>
                            
                            <?php if( has_category() ):?>
                            <li><?php the_category(' ');?></li>
                            <?php endif; ?>
                        </ul>
                        <div class="blog-single-title"><?php the_title(); ?></div>
                        <?php if( $options->get( 'single_post_author' ) ):?>
                        <div class="post-author-info">
                            <div class="img-box">
                                <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
									<?php echo get_avatar(get_the_author_meta('ID'), 70); ?>
                                <?php endif; ?>
                            </div>
                            <h5><?php the_author(); ?></h5>    
                        </div>
                        <?php endif;?>
                    </div>
                    <?php if((get_previous_post()) || (get_next_post())): ?>
                    <div class="blog-prev-next-option">
                        <?php global $post; $prev_post = get_previous_post();
							if (!empty($prev_post)):
						?>
                        <div class="single prev float-left">
                            <div class="link">
                                <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>"><i class="fa fa-angle-double-left" aria-hidden="true"></i><?php esc_html_e('Prev', 'jixic'); ?></a>
                            </div>
                        </div>
                        <?php endif; ?>
            
						<?php global $post; $next_post = get_next_post();
                            if (!empty($next_post)): 
                        ?>
                        <div class="single next float-right">
                            <div class="link">
                                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"><?php esc_html_e('Next', 'jixic'); ?><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <?php endif; ?>    
                    </div>
                    <?php endif; ?>
                </div>  
            </div>
        </div>
    </div>
</section>
<!--End Breadcrumb Blog Single Area--> 
    
<!--Start blog area-->
<div class="sidebar-page-content">
    <div class="container">
        <div class="row">
        	<?php
				if ( $data->get( 'layout' ) == 'left' ) {
					do_action( 'jixic_sidebar', $data );
				}
			?>
            <div class="<?php echo esc_attr( $class ); ?>">
            	
				<?php while ( have_posts() ) : the_post(); ?>
				
                <div class="thm-unit-test">
                
                    <!--Start blog single area-->
                    <section id="blog-single-area">
                        <div class="text">
                        
							<?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links m-b30">'.esc_html__('Pages: ', 'jixic'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                                    
                        </div>    
                        
                        <div class="no-container">               
                            <?php if(! $options->get( 'single_post_tag' ) ):?>
                            <?php if( has_tag() ):?>
                            <div class="blog-single-tag-box">
                                
                                <span><?php esc_html_e('Tags:', 'jixic'); ?></span>
                                <ul>
                                    <?php the_tags( '<li>', '</li><li>', '</li>' ); ?>
                                </ul>
                                
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            
                        	<?php comments_template(); ?>
                        </div>
                        <!--End Single blog Post-->
                	 
                	</section>
                
                </div>
				<?php endwhile; ?>
            </div>
        	<?php
				if ( $data->get( 'layout' ) == 'right' ) {
					do_action( 'jixic_sidebar', $data );
				}
			?>
        </div>
    </div>
</div> 
<!--End blog area--> 
<?php
}
get_footer();
