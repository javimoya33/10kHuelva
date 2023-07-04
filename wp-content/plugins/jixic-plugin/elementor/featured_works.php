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
class Featured_Works extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_featured_works';
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
		return esc_html__( 'Featured Works', 'jixic' );
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
			'featured_works',
			[
				'label' => esc_html__( 'Featured Works', 'jixic' ),
			]
		);
		$this->add_control(
			'icons',
			[
				'label' => esc_html__('Select The icons', 'jixic'),
				'type' => Controls_Manager::SELECT,
				'options'  => get_fontawesome_icons(),
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
				'default'     => __( 'Add Your Title Here', 'jixic' ),
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
				  'options' => get_project_categories()
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
				'placeholder' => __( 'Enter your Text', 'jixic' )
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
			'post_type'      => 'jixic_project',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		if( jixic_set( $settings, 'query_category' ) ) $args['project_cat'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
        
        <!--Start Working Style1 Area-->
        <section class="working-style1-area">
            <div class="layer-outer">
                <div class="layer-shape1 aos-init" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="2500"></div>
            </div>
            <div class="container">
                <div class="sec-title-style2 text-center">
                    <div class="icon center"><span class="<?php echo esc_attr( $settings['icons'] );?>"></span></div>
                    <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="working-style1-carousel owl-carousel owl-theme style1">
                            <?php 
								while ( $query->have_posts() ) : $query->the_post();
								$overlay_img = get_post_meta( get_the_id(), 'overlay_img', true );
								$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
							?>
                            <!--Start Single Working Box Style1-->
                            <div class="single-working-box-style1">
                                <div class="img-holder">
                                    <?php the_post_thumbnail('jixic_370x400'); ?>
                                    <div class="overlay">
                                        <div class="box">
                                            <div class="title">
                                                <span><?php echo implode( ', ', (array)$term_list );?></span>
                                                <h3><a href="<?php echo (get_post_meta( get_the_id(), 'project_link', true ));?>"><?php the_title(); ?></a></h3>    
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="overlay-image-box">
                                    <img src="<?php echo esc_url($overlay_img['url']);?>" alt="<?php echo esc_attr_e('Awesome Image', 'jixic'); ?>">
                                </div>   
                            </div>
                            <!--End Single Working Box Style1-->
                            <?php endwhile; ?>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bottom-text text-center">
                            <p><?php echo wp_kses( $settings['text'], true );?></p>
                            <a class="thm-btn3" href="<?php echo esc_url( $settings['btn_link']['url'] );?>"><?php echo wp_kses( $settings['btn_title'], true );?></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>   
        <!--End Working Style1 Area-->
        
		<?php }
		wp_reset_postdata();
	}

}