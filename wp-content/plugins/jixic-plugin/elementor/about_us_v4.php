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
class About_Us_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_about_us_v4';
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
		return esc_html__( 'About Us V4', 'jixic' );
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
			'about_us_v4',
			[
				'label' => esc_html__( 'About Us V4', 'jixic' ),
			]
		);
		$this->add_control(
			'exp_year',
			[
				'label'       => __( 'Experience Year', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Experience Year', 'jixic' ),
				'default'     => __( 'Since 1st April 1972', 'jixic' ),
			]
		);
		$this->add_control(
			'about_image1',
				[
				  'label' => __( 'About Image one', 'jixic' ),
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
			'about_image3',
				[
				  'label' => __( 'About Image Three', 'jixic' ),
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
			'bg_text',
			[
				'label'       => __( 'Background Text', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Background Text', 'jixic' ),
				'default'     => __( 'Story About Jexic', 'jixic' ),
			]
		);
		$this->add_control(
			'logo_img',
				[
				  'label' => __( 'Logo Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
				'placeholder' => __( 'Enter Title', 'jixic' ),
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
				'placeholder' => __( 'Enter Text', 'jixic' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Description', 'jixic' ),
			]
		);
		$this->add_control(
			'author_title',
			[
				'label'       => __( 'Author Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Author Title', 'jixic' ),
			]
		);
		$this->add_control(
			'author_designation',
			[
				'label'       => __( 'Author Designation', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Author Designation', 'jixic' ),
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
        
        <!--Start About Style3 Area-->
        <section class="about-style3-area about-page pd130-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-style3-image-box clearfix" style="background-image:url(<?php echo esc_url($settings['about_image1']['url']);?>);">
                            <div class="text"><span><?php echo wp_kses( $settings['exp_year'], $allowed_tags );?></span></div>
                            <div class="image-box-one">
                                <img src="<?php echo esc_url($settings['about_image2']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            </div>
                            <div class="video-holder-box-style2">
                                <div class="img-holder">
                                    <img src="<?php echo esc_url($settings['about_image3']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                    <div class="icon-holder">
                                        <div class="icon">
                                            <div class="inner">
                                                <a class="html5lightbox wow zoomIn animated" data-wow-delay="300ms" data-wow-duration="1500ms" title="Jixic Video Gallery" href="<?php echo esc_url($settings['video_url']['url']);?>" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: zoomIn;">
                                                    <span class="icon-multimedia"></span>
                                                </a>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>   
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-2">
                        <div class="about-style3-title"><span><?php echo wp_kses( $settings['bg_text'], $allowed_tags );?></span></div>
                    </div>
                    <div class="col-xl-5 col-lg-11 col-md-10">
                        <div class="about-style3-content-box style2">
                            <div class="inner-content">
                                <div class="logo"><img src="<?php echo esc_url($settings['logo_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>"></div>
                                <div class="title"><h1><?php echo wp_kses( $settings['title'], $allowed_tags );?></h1></div> 
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                                    <p><?php echo wp_kses( $settings['text2'], $allowed_tags );?></p>
                                </div>
                                <div class="authorized-person">
                                    <h3><?php echo wp_kses( $settings['author_title'], $allowed_tags );?></h3>
                                    <span><?php echo wp_kses( $settings['author_designation'], $allowed_tags );?></span>
                                </div>   
                            </div>
                        </div>
                    </div>
                    
                </div> 
            </div>    
        </section>
        <!--End About Style3 Area-->
        
		<?php 
	}

}
