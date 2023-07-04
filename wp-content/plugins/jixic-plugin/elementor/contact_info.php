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
class Contact_Info extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_contact_info';
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
		return esc_html__( 'Contact Info', 'jixic' );
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
			'contact_info',
			[
				'label' => esc_html__( 'Contact Info', 'jixic' ),
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
				'placeholder' => __( 'Enter Title', 'jixic' )
			]
		);
		$this->add_control(
              'info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Visit Our Office', 'jixic')],
							['title1' => esc_html__('Call Us', 'jixic')],
							['title1' => esc_html__('Mail Us', 'jixic')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Enter Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Enter Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
                			
            			],
            	    'title_field' => '{{title1}}',
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
        
        <!--Start Contact Address Area-->
        <section class="contact-address-area">
            <div class="container">
                <div class="title text-center">
                    <h2><?php echo wp_kses( $settings['title'], $allowed_tags );?></h2>
                </div>
                <div class="row">
                    <?php foreach($settings['info'] as $item):?>
                    <!--Start Single Contact Address Box-->
                    <div class="col-xl-4 col-lg-4">
                        <div class="single-contact-address-box text-center">
                            <div class="icon-holder">
                                <span class="<?php echo esc_attr( $item['icons'] );?>"></span>
                            </div>
                            <h3><?php echo wp_kses( $item['title1'], $allowed_tags );?></h3>
                            <p><?php echo wp_kses( $item['text'], $allowed_tags );?></p>
                        </div>
                    </div>
                    <!--End Single Contact Address Box-->
                    <?php endforeach;?>
                </div>
            </div>
        </section>  
        <!--End Contact Address Area-->
         
		<?php 
	}

}
