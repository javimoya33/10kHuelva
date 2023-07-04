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
class Contact_Form extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_contact_form';
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
		return esc_html__( 'Contact Form', 'jixic' );
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
			'contact_form',
			[
				'label' => esc_html__( 'Contact Form', 'jixic' ),
			]
		);
		$this->add_control(
			'image',
				[
				  'label' => __( 'Image Url', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'title',
			[
				'label'       => __( 'Image Caption', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Image Caption', 'jixic' )
			]
		);
		$this->add_control(
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['social_title' => esc_html__('Facebook', 'jixic')],
							['social_title' => esc_html__('Twitter', 'jixic')],
							['social_title' => esc_html__('Instagram', 'jixic')],
							['social_title' => esc_html__('Linkedin', 'jixic')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'social_title',
                    			'label' => esc_html__('Social Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
                			
            			],
            	    'title_field' => '{{social_title}}',
                 ]
        );
		$this->add_control(
			'contact_form_url4',
			[
				'label'       => __( 'Contact Form 7 Url', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'jixic' ),
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
        
        <!--Start contact form area-->
        <section class="contact-form-area">
            <div class="container">
                <div class="row">
                   
                    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                        <div class="contact-social-links">
                            <div class="image-box" style="background-image: url(<?php echo esc_url( $settings['image']['url'] );?>);">
                                <div class="big-title">
                                    <div class="inner">
                                        <div class="title"><?php echo wp_kses( $settings['title'], $allowed_tags );?></div>
                                    </div>
                                </div>
                            </div>
                            
                            <ul class="social-links">
                                <?php foreach($settings['social_icons'] as $item):?>
                                <li><a href="<?php echo esc_url( $item['social_link']['url']);?>"><?php echo wp_kses( $item['social_title'], $allowed_tags );?></a></li>    
                                <?php endforeach;?>      
                            </ul>
                        </div>     
                    </div>
                    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                        <div class="contact-form"> 
                            <div class="inner-box">
                                <div class="default-form">
                                    <?php echo do_shortcode( $settings['contact_form_url4'] );?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--End contact form area-->
        
		<?php 
	}

}
