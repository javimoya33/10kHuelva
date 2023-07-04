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
class Our_Work extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_work';
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
		return esc_html__( 'Our Work', 'jixic' );
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
			'our_work',
			[
				'label' => esc_html__( 'Our Work', 'jixic' ),
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
				'placeholder' => __( 'Enter your Title', 'jixic' ),
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
				  'options' => get_project_categories()
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
		{ 
		$dimention = get_post_meta( get_the_id(), 'dimension', true );
		?>

		<!--Start Latest Project Style1 Area-->
        <section class="latest-project-style1-area">
            <div class="latest-project-style1-bg" style="background-image:url(<?php echo esc_url( $settings['bg_img']['url']); ?>);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="sec-title-style1 float-left">
                            <div class="title"><span><?php echo wp_kses( $settings['subtitle'], true); ?></span><span class="dotted-right"><span class="dot"></span></span></div>
                            <div class="big-title"><?php echo wp_kses( $settings['title'], true); ?></div>
                        </div>
                        <div class="view-all-projects-button float-right">
                            <a class="thm-btn1" href="<?php echo esc_url( $settings['btn_link']['url']);?>"><span></span><?php echo wp_kses( $settings['btn_title'], true); ?></a>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="outer-container">
                <div class="row masonary-layout">
                    <?php
						global $post;
						while ( $query->have_posts() ) : $query->the_post(); 
						$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
						$post_thumbnail_id = get_post_thumbnail_id($post->ID);
						$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
					?>
                    
                    <!--Start single project style1-->
                    <div class="<?php if(get_post_meta( get_the_id(), 'dimension', true) == 'extra_width') echo 'col-xl-6 col-lg-8 col-md-6 col-sm-12'; else echo 'col-xl-3 col-lg-4 col-md-6 col-sm-12'?>">
                        <div class="single-project-style1">
                            <div class="img-holder">
                                <?php 
									$dimention = get_post_meta( get_the_id(), 'dimension', true );
									if($dimention == 'extra_width'){
										$image_size = 'jixic_960x380';
									}
									else{
										$image_size = 'jixic_480x380'; 
									}
									the_post_thumbnail($image_size);
								?>
                                <div class="overlay-style-one bg1">
                                    <div class="box">
                                        <div class="inner">
                                            <h3><a href="<?php echo (get_post_meta( get_the_id(), 'project_link', true ));?>"><?php the_title(); ?></a></h3>
                                            <span><?php echo implode( ', ', (array)$term_list );?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="zoom-button">
                                    <a class="lightbox-image" data-fancybox="gallery" href="<?php echo esc_url($post_thumbnail_url); ?>">
                                        <span class="icon-zoom-in"></span>
                                    </a>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <!--End single project style1-->
                    <?php endwhile; ?>
                </div>
            </div>    
        </section>
        <!--End Latest Project Style1 Area-->
        
        <?php }
		wp_reset_postdata();
	}

}
