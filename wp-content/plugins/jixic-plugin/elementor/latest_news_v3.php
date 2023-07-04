<?php

namespace JIXICPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Latest_News_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_latest_news_v3';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Latest News V3', 'jixic' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'jixic' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'latest_news_v3',
			[
				'label' => esc_html__( 'latest News V3', 'jixic' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'jixic' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'jixic' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'jixic' ),
				'default'     => __( 'Read More', 'jixic' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'jixic' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
			 ]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'jixic' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'jixic' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'jixic' ),
					'title'      => esc_html__( 'Title', 'jixic' ),
					'menu_order' => esc_html__( 'Menu Order', 'jixic' ),
					'rand'       => esc_html__( 'Random', 'jixic' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'jixic' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'jixic' ),
					'ASC'  => esc_html__( 'ASC', 'jixic' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'jixic' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'jixic'),
				  'options' => get_blog_categories()
				]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Newsletter Title', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Newsletter Title', 'jixic' ),
			]
		);
		$this->add_control(
			'form_text',
			[
				'label'       => __( 'Form Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Form Description', 'jixic' ),
			]
		);
		$this->add_control(
			'form_id',
			[
				'label'       => __( 'Form ID', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form ID', 'jixic' ),
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = jixic_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-jixic' );
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		if( jixic_set( $settings, 'query_category' ) ) $args['category_name'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!--Start latest blog Style3 area-->
        <section class="latest-blog-style3-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="sec-title-style3 float-left">
                            <h6><?php echo wp_kses( $settings['subtitle'], true );?></h6>
                            <div class="borders"><span></span></div>
                            <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                        </div>
                        <div class="read-more-blog-button float-right">
                            <a href="<?php echo esc_url( $settings['btn_link']['url'] );?>"><?php echo wp_kses( $settings['btn_title'], true );?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <!--Start single blog post style3-->
                    <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                        <div class="single-blog-post-style3 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <?php the_post_thumbnail('jixic_370x430'); ?>
                                <div class="top-overlay">
                                    <div class="date-box">
                                        <h3><span class="icon-calendar"></span><?php echo get_the_date(); ?></h3>
                                    </div>
                                    <div class="meta-box"> 
                                        <a href="<?php echo esc_url(get_permalink(get_the_id()).'#comments'); ?>"><span class="icon-chat"></span><?php comments_number( wp_kses(__('0' , 'jixic'), true), wp_kses(__('1' , 'jixic'), true), wp_kses(__('%' , 'jixic'), true)); ?></a>
                                    </div>
                                </div>
                                <div class="bottom-overlay">
                                    <div class="static">
                                        <h5><?php the_category(' '); ?></h5>
                                        <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a> </h3>
                                    </div>
                                    <div class="overlay">
                                        <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Continue Reading', 'jixic'); ?></a>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single blog post style3-->
                    <?php endwhile; ?>
                    <!--End single blog post style3-->
                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
                        <div class="newsletter-subscription-box wow fadeInUp" data-wow-delay="500ms" data-wow-duration="1500ms">
                            <div class="top">
                                <div class="icon">
                                    <span class="flaticon-files-and-folders"></span>    
                                </div>
                                <div class="title">
                                    <h3><?php echo wp_kses( $settings['form_title'], true );?></h3>
                                </div>
                            </div>
                            <div class="text">
                                <p><?php echo wp_kses( $settings['form_text'], true );?></p>
                            </div>
                            <form class="subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                                <input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses( $settings['form_id'], true );?>">
                                <input type="email" name="email" placeholder="<?php esc_html_e('Email Address...', 'jixic'); ?>">
                                <button type="submit"><?php esc_html_e('Subscribe Us', 'jixic'); ?></button>
                            </form>
                        </div>
                    </div>
                
                </div>
            </div>
        </section>
        <!--End latest blog Style3 area-->	
        
        <?php }
		wp_reset_postdata();
	}

}
