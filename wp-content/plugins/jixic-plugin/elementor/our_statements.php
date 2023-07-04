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
class Our_Statements extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_statements';
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
		return esc_html__( 'Our Statements', 'jixic' );
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
			'our_statements',
			[
				'label' => esc_html__( 'Our Statements', 'jixic' ),
			]
		);
		$this->add_control(
            'bg_img',
            [
				'label' => esc_html__('Background image', 'jixic'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
              'statements', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Think Positive', 'jixic')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('Description', 'jixic')
                			],
                			
            			],
            	    'title_field' => '{{title}}',
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
        
        <!--Start Statements Area-->
        <section class="statements-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="statements owl-carousel owl-theme">
                            <?php foreach($settings['statements'] as $service_block):?>
                            <!--Start Single Statements Item-->
                            <div class="single-statements-item text-center">
                                <div class="title">
                                    <span class="dotted-left"><span class="dot"></span></span>
                                        <span><?php echo wp_kses($service_block['subtitle'], $allowed_tags);?></span>
                                    <span class="dotted-right"><span class="dot"></span></span>
                                </div>
                                <div class="big-title"><span><?php echo wp_kses($service_block['title'], $allowed_tags);?></span></div>
                                <div class="text">
                                    <p><?php echo wp_kses($service_block['text'], $allowed_tags);?></p>
                                </div>
                            </div>
                            <!--End Single Statements Item-->
                            <?php endforeach;?>
                        </div>    
                    </div>    
                </div>
            </div>
        </section>
        <!--End Statements Area-->	
        
		<?php 
	}

}