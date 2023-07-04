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
class Our_Testimonials_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_testimonials_v4';
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
		return esc_html__( 'Our Testimonials V4', 'jixic' );
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
			'our_testimonials_v4',
			[
				'label' => esc_html__( 'Our Testimonials V4', 'jixic' ),
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
				'label'       => __( 'Text', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'jixic' ),
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
				'default'     => __( '', 'elementor' ),
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
				  'options' => get_testimonials_categories()
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
			'post_type'      => 'jixic_testimonials',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		if( jixic_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
			
        <!--Start Testimonial style4 Area-->
        <section class="testimonial-style4-area">
            <div class="layer-outer">
                <div class="layer-shape" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1700"></div>    
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-9">
                        <div class="testimonial-style4-content">
                            <div class="sec-title-style4">
                                <div class="title"><?php echo wp_kses($settings['title'], $allowed_tags);?></div>
                                <div class="border-box"></div>
                            </div>
                            <div class="inner-content">
                                <div class="text">
                                    <p><?php echo wp_kses($settings['text'], $allowed_tags);?></p>
                                </div>
                                <div class="button">
                                    <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], $allowed_tags);?></a>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-12">
                        <div class="testimonial-style4-right-content">
                            <?php $count = 1; while ( $query->have_posts() ) : $query->the_post(); 
								if($count > 4){
									$count = 1;
								}
								if($count == 2){
									$class = 'two'; 
								}
								elseif($count == 3){
									$class = 'three'; 
								}
								else{
									$class = 'one';
								}
							?>
                            <!--Start Single Testimonial Style4-->
                            <div class="single-testimonial-style4 <?php echo esc_attr($class); ?>">
                                <div class="top">
                                    <div class="image-box">
                                        <?php the_post_thumbnail('jixic_75x75'); ?>
                                    </div>
                                    <div class="title-box">
                                        <h3><?php the_title(); ?></h3>
                                        <span><?php echo wp_kses(get_post_meta( get_the_id(), 'test_designation', true ), $allowed_tags);?></span>
                                    </div>
                                </div>
                                <div class="text">
                                    <p><?php echo jixic_trim(get_the_content(), $settings['text_limit']); ?></p>
                                </div>
                                <div class="bottom">
                                    <div class="review-box">
                                        <ul>
                                            <?php
												$ratting = get_post_meta( get_the_id(), 'testimonial_rating', true ); 
												for ($x = 1; $x <= 5; $x++) {
												if($x <= $ratting) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-half"></i></li>'; 
												}
											?>
                                        </ul>
                                    </div>
                                    <div class="quote-box">
                                        <span class="icon-quote"></span>
                                    </div>
                                </div>    
                            </div>     
                            <!--End Single Testimonial Style4-->
                            <?php $count++; endwhile; ?>
                        </div>   
                    </div>
                       
                </div>
            </div>
        </section>
        <!--End Testimonial Style4 Area-->
        
        <?php }
		wp_reset_postdata();
	}

}
