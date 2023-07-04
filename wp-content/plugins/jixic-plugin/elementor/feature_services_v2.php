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
class Feature_Services_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_feature_services_v2';
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
		return esc_html__( 'Feature Services_v2', 'jixic' );
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
			'feature_services_v2',
			[
				'label' => esc_html__( 'Feature Services V2', 'jixic' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Responsive design', 'jixic')],
                			['title' => esc_html__('Pixel perfect layout', 'jixic')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
                		],
            	    'title_field' => '{{title}}',
                 ]
        );
		$this->add_control(
			'image',
				[
				  'label' => __( 'Feature Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
              'services_two', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title2' => esc_html__('Easy customization', 'jixic')],
                			['title2' => esc_html__('Lifetime support', 'jixic')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon2',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'subtitle2',
                    			'label' => esc_html__('Sub Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'title2',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'text2',
                    			'label' => esc_html__('Text', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
                		],
            	    'title_field' => '{{title2}}',
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
        
        <!--Start Featured Area-->
        <section class="featured-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <ul class="featured-box">
                            <?php foreach($settings['services'] as $key => $item):?>
                            <!--Start Single Featured Box-->
                            <li class="single-featured-box text-center">
                                <div class="icon-holder">
                                    <span class="<?php echo esc_attr($item['icon']);?>"></span>
                                </div> 
                                <div class="text-holder">
                                    <span><?php echo wp_kses($item['subtitle'], $allowed_tags);?></span>
                                    <h3><?php echo wp_kses($item['title'], $allowed_tags);?></h3>
                                    <p><?php echo wp_kses($item['text'], $allowed_tags);?></p>
                                </div>   
                            </li>
                            <!--End Single Featured Box-->
                            <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="col-xl-4">
                        <div class="featured-image-box">
                            <img src="<?php echo esc_url($settings['image']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">    
                        </div>    
                    </div>
                    <div class="col-xl-4">
                        <ul class="featured-box">
                            <?php foreach($settings['services_two'] as $key => $item):?>
                            <!--Start Single Featured Box-->
                            <li class="single-featured-box text-center">
                                <div class="icon-holder">
                                    <span class="<?php echo esc_attr($item['icon2']);?>"></span>
                                </div> 
                                <div class="text-holder">
                                    <span><?php echo wp_kses($item['subtitle2'], $allowed_tags);?></span>
                                    <h3><?php echo wp_kses($item['title2'], $allowed_tags);?></h3>
                                    <p><?php echo wp_kses($item['text2'], $allowed_tags);?></p>
                                </div>   
                            </li>
                            <!--End Single Featured Box-->
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End Featured Area-->
        
		<?php 
	}

}
