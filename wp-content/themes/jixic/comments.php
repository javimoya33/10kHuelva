<?php
/**
 * Comments Main File.
 *
 * @package JIXIC
 * @author  Theme Kalia
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>
<?php if ( have_comments() ) : ?>
<div class="inner-comment-box comment-area post-comments" id="comments">
    <div class="row">
        <div class="col-md-12">
            <div class="single-blog-title-box">
                <h2><?php esc_html_e('Read Comments', 'jixic'); ?></h2>
            </div>
            
                <?php
                    wp_list_comments( array(
                        'style'       => 'div',
                        'short_ping'  => true,
                        'avatar_size' => 70,
                        'callback'    => 'jixic_list_comments',
                    ) );
                ?>
                
                <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                    <nav class="navigation comment-navigation" role="navigation">
                        <h1 class="screen-reader-text section-heading">
                            <?php esc_html_e( 'Comment navigation', 'jixic' ); ?>
                        </h1>
                        <div class="nav-previous">
                            <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'jixic' ) ); ?>
                        </div>
                        <div class="nav-next">
                            <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'jixic' ) ); ?>
                        </div>
                    </nav><!-- .comment-navigation -->
                <?php endif; ?>
                <?php if ( ! comments_open() && get_comments_number() ) : ?>
                <p class="no-comments">
                    <?php esc_html_e( 'Comments are closed.', 'jixic' ); ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php jixic_comment_form(); ?>