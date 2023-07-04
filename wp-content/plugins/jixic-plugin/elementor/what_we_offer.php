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
class What_We_Offer extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_what_we_offer';
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
		return esc_html__( 'What We Offer', 'jixic' );
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
			'what_we_offer',
			[
				'label' => esc_html__( 'What We Offer', 'jixic' ),
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
			'text',
			[
				'label'       => __( 'Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'jixic' ),
			]
		);
		$this->add_control(
			'text1',
			[
				'label'       => __( 'Next Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Next Description', 'jixic' ),
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
				'default'     => __( 'Discuss With Experts', 'jixic' ),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'jixic' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
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
				  'options' => get_service_categories()
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
			'post_type'      => 'jixic_service',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		if( jixic_set( $settings, 'query_category' ) ) $args['service_cat'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
        
        <!--Start What we Do Area Main service--> 
        <section class="whatwe-do-area main-service">
            <div class="container">
                <div class="top-box">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="title">
                                <h1><?php echo wp_kses( $settings['title'], $allowed_tags );?></h1>
                                <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                            </div>  
                        </div>
                        <div class="col-xl-6">
                            <div class="text">
                                <p><?php echo wp_kses( $settings['text1'], $allowed_tags );?></p>
                                <a class="thm-btn6" href="<?php echo esc_url( $settings['btn_link']['url'] );?>"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?></a>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <!--Start Single Whatwe Do Box-->
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1200ms">
                        <div class="single-whatwe-do-box">
                            <div class="top">
                                <h3><?php the_title(); ?></h3>
                            </div>
                            <div class="icon">
                                <span class="<?php echo get_post_meta( get_the_id(), 'service_icon', true )?>"></span>
                            </div>
                            <div class="text">
                                <p><?php echo jixic_trim(get_the_content(), $settings['text_limit']); ?></p>
                            </div>
                            <div class="button">
                                <a class="thm-btn2" href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><span></span><?php esc_html_e('Read More', 'jixic'); ?></a>
                            </div>
                        </div>   
                    </div>
                    <!--End Single Whatwe Do Box-->
                    <?php endwhile; ?> 
                </div>
            </div>    
        </section>
        <!--End What we Do Area Main service-->
        
        <?php }
		wp_reset_postdata();
	}

}
