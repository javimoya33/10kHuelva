<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage JIXIC
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Jixic_Resizer' ) ) {
	$img_obj = new Jixic_Resizer();
} else {
	$img_obj = array();
}
?>

<!--Start single blog post style5-->
<div <?php post_class( 'single-blog-post-style5 blog-large' ) ?>>
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="img-holder">
        <?php the_post_thumbnail(array(1170, 480)); ?>
    </div>
    <?php endif; ?>
    <div class="text-holder">
        <?php if( has_category() ):?>
        <div class="categories">
            <h6><?php the_category(' ');?></h6>
        </div>
        <?php endif; ?>
        <h2 class="blog-title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h2>
        <div class="meta-box">
            <?php if ( $data->get( 'archive_post_author', true ) ): ?>
            <div class="author-info">
                <div class="img-box">
                    <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
						<?php echo get_avatar(get_the_author_meta('ID'), 35); ?>
                    <?php endif; ?>
                </div>
                <div class="title-box">
                    <h6><?php the_author(); ?></h6>
                </div>
            </div>
            <?php endif;?>
            
			<?php if ( class_exists( '\Elementor\Plugin' )):?>
            <div class="meta-info">
                <ul>
                    <?php if ( $data->get( 'archive_post_comments', true ) ): ?>
                    <li><a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><span class="icon-chat"></span><?php comments_number( wp_kses(__('0' , 'jixic'), true), wp_kses(__('1' , 'jixic'), true), wp_kses(__('%' , 'jixic'), true)); ?></a></li>
                    <?php endif;?>
					<?php if ( $data->get( 'archive_post_date', true ) ): ?>
                    <li><a href="<?php echo esc_url(get_month_link(get_the_date('Y'), get_the_date('m'))); ?>"><span class="icon-calendar"></span><?php echo get_the_date( ); ?></a></li>
                    <?php endif;?>
                </ul>
            </div>
            <?php endif;?>
        </div>
        <div class="text">
            <?php the_excerpt(); ?>
        </div>
        <div class="bottom">
            <div class="reamore">
                <a class="btn-two" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e( 'Leer más', 'jixic' );?></a>
            </div>
            <?php if(function_exists('bunch_share_us_two')):?>
            <div class="post-share">
                <p>
					<?php esc_html_e( 'Share this post', 'jixic' );?> 
                	<?php echo wp_kses(bunch_share_us_two(get_the_id(),$post->post_name ), true);?>
                </p>    
            </div>
            <?php endif;?>
        </div> 
    </div>
</div>
<!--End single blog post style5-->