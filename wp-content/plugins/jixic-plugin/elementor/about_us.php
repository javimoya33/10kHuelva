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
class About_Us extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_about_us';
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
		return esc_html__( 'About Us', 'jixic' );
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
			'about_us',
			[
				'label' => esc_html__( 'About Us', 'jixic' ),
			]
		);
		$this->add_control(
			'about_image',
				[
				  'label' => __( 'About Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'about_image2',
				[
				  'label' => __( 'About Image Two', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'video_url',
				[
				  'label' => __( 'Video Url', 'jixic' ),
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
			'video_title',
			[
				'label'       => __( 'Video Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Video title', 'jixic' ),
				'default'     => __( 'Jixic', 'elementor' ),
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
				'placeholder' => __( 'Enter your Sub title', 'jixic' ),
				'default'     => __( 'About Company', 'jixic' ),
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
				'default'     => __( 'Title', 'jixic' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description Text', 'jixic' ),
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
				'label'       => __( 'Next Description Text', 'jixic' ),
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
				'default'     => __( '', 'jixic' ),
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
		?>
        
        <!--Start About Style1 Area-->
        <section class="about-style1-area secpd1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-10">
                        <div class="about-style1-left-content clearfix">
                            <div class="shape">
                                <div class="shape1 zoom-fade"></div>
                                <div class="shape2"></div>
                                <div class="shape3"></div>
                                <div class="shape4"></div>
                            </div>
                            <img src="<?php echo esc_url($settings['about_image']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            <div class="video-holder-box">
                                <div class="big-title"><?php echo wp_kses( $settings['video_title'], true );?></div>
                                <div class="outer">
                                    <div class="content-box">
                                        <div class="img-holder">
                                            <img src="<?php echo esc_url($settings['about_image2']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                            <div class="icon-holder">
                                                <div class="icon">
                                                    <div class="inner">
                                                        <a class="html5lightbox wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms" title="FixyMan Video Gallery" href="<?php echo esc_url($settings['video_url']['url']);?>">
                                                            <span class="icon-multimedia"></span>
                                                        </a>
                                                    </div>   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            
                        </div>     
                    </div>
                    <div class="col-xl-5 col-lg-12">
                        <div class="about-style1-content">
                            <div class="sec-title-style1">
                                <div class="title"><span><?php echo wp_kses( $settings['subtitle'], true );?></span><span class="dotted-right"><span class="dot"></span></span></div>
                                <div class="big-title"><?php echo wp_kses( $settings['title'], true );?></div>
                            </div>
                            <div class="inner-content">
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], true );?></p>
                                    <p><?php echo wp_kses( $settings['text1'], true );?></p>
                                </div>
                                <div class="button">
                                    <a class="thm-btn1" href="<?php echo esc_url($settings['btn_link']['url']);?>"><span></span><?php echo wp_kses( $settings['btn_title'], true );?></a>
                                </div>
                            </div>    
                        </div>   
                    </div>
                    
                    
                </div> 
            </div>    
        </section>
        <!--End About Style1 Area-->
           
		<?php 
	}

}
