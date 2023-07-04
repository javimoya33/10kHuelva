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
class About_Us_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_about_us_v3';
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
		return esc_html__( 'About Us V3', 'jixic' );
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
			'about_us_v3',
			[
				'label' => esc_html__( 'About Us V3', 'jixic' ),
			]
		);
		$this->add_control(
			'experience_img',
				[
				  'label' => __( 'Experience Image', 'jixic' ),
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
				'placeholder' => __( 'Enter Sub Title', 'jixic' ),
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
			'quote_description',
			[
				'label'       => __( 'Quote Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Quote Description', 'jixic' ),
			]
		);
		$this->add_control(
			'description',
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
			'signature_img',
				[
				  'label' => __( 'Signature Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
        
        <!--Start About Style5 Area-->
        <section class="about-style5-area">
            <div class="layer-outer">
                <div class="layer-shape1" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1500"></div>
                <div class="layer-shape2 float_up_down_two" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500"></div>
                <div class="layer-shape3 float_up_down_two" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500"></div>
                <div class="layer-shape4 float_up_down_two" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="1500"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="about-style5-left-content">
                            <img src="<?php echo esc_url($settings['experience_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">    
                        </div>      
                    </div>
                    <div class="col-xl-5">
                        <div class="about-style5-content">
                            <div class="sec-title-style5">
                                <div class="border-box"><div class="border-left"></div><h6><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></h6></div>
                                <div class="title"><?php echo wp_kses( $settings['title'], $allowed_tags );?></div>
                            </div>
                            <div class="inner-content">
                                <div class="top">
                                    <p><?php echo wp_kses( $settings['quote_description'], $allowed_tags );?></p>
                                </div>
                                <div class="bottom">
                                    <p><?php echo wp_kses( $settings['description'], $allowed_tags );?></p>
                                </div>
                                <div class="signature">
                                    <img src="<?php echo esc_url($settings['signature_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                </div>
                            </div>
                        </div>      
                    </div>
                     
                </div> 
            </div>    
        </section>
        <!--End About Style5 Area-->
        
		<?php 
	}

}
