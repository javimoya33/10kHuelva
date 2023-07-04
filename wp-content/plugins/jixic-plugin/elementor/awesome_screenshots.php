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
class Awesome_Screenshots extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_awesome_screenshots';
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
		return esc_html__( 'Awesome Screenshots', 'jixic' );
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
			'awesome_screenshots',
			[
				'label' => esc_html__( 'Awesome Screenshots', 'jixic' ),
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
				'placeholder' => __( 'Enter The Title', 'jixic' ),
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
				'placeholder' => __( 'Enter The Text', 'jixic' ),
			]
		);
		$this->add_control(
              'screenshot', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'fields' => 
						[
							[
								'name' => 'img',
								'label' => __( 'Image', 'jixic' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
							],
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
        
        <!--Start App Screenshot-area-->
        <section class="app-screenshot-area">
            <div class="outer-container">
                <div class="sec-title-style4 max-witdth text-center">
                    <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                    <div class="border-box center"></div>
                    <div class="text"><p><?php echo wp_kses( $settings['text'], true );?></p></div>
                </div>
                <div class="carousel-container">
                    <div class="carousel-outer">
                        <div class="screenshot-carousel owl-carousel owl-theme style1">
                            <?php foreach($settings['screenshot'] as $service_block):?>
                            <!--Start Single Item-->
                            <div class="single-item">
                                <div class="img-holder">
                                    <img src="<?php echo esc_url($service_block['img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                </div>    
                            </div>
                            <!--End Single Item-->
                            <?php endforeach;?>        
                        </div> 
                    </div>
                </div>   
            </div>
        </section>
        <!--End App Screenshot-area-->
        
		<?php 
	}

}
