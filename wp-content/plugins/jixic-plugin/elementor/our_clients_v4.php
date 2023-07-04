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
class Our_Clients_V4 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_clients_v4';
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
		return esc_html__( 'Our Clients V4', 'jixic' );
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
			'our_clients_v4',
			[
				'label' => esc_html__( 'Our Clients V4', 'jixic' ),
			]
		);
		$this->add_control(
              'clients', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
					'default' => 
					[
						['title' => esc_html__('Dexeon Techno', 'jixic')],
						['title' => esc_html__('Dexeon Techno', 'jixic')],
						['title' => esc_html__('Dexeon Techno', 'jixic')],
					],
					'fields' => 
						[
                			
							[
                    			'name' => 'title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'client_img',
                    			'label' => esc_html__('Client image', 'jixic'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'client_link',
								'label' => __( 'External Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Choose Style One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Style One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Style Two', 'jixic' ),
                				),
                			],
							
            			],
					'title_field' => '{{title}}',
            	 ]
        );
		$this->add_control(
			'client_img1',
				[
				  'label' => __( 'Client Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'title1',
			[
				'label'       => __( 'Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'jixic' ),
			]
		);
		$this->add_control(
			'client_link1',
				[
				  'label' => __( 'External Url', 'jixic' ),
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
			'title2',
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
				'default'     => __( 'Let’s Join as a User', 'elementor' ),
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
			'client_img2',
				[
				  'label' => __( 'Client Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'title3',
			[
				'label'       => __( 'Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'jixic' ),
			]
		);
		$this->add_control(
			'client_link2',
				[
				  'label' => __( 'External Url', 'jixic' ),
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
              'clients_two', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
					[
						['title4' => esc_html__('Dexeon Techno', 'jixic')],
						['title4' => esc_html__('Dexeon Techno', 'jixic')],
						['title4' => esc_html__('Dexeon Techno', 'jixic')],
					],
					'fields' => 
						[
                			
							[
                    			'name' => 'title4',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'client_img3',
                    			'label' => esc_html__('Client image', 'jixic'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'client_link3',
								'label' => __( 'External Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                				'name' => 'diff_style',
                				'label'   => esc_html__( 'Choose Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Choose Style One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Style One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Style Two', 'jixic' ),
                				),
                			],
							
            			],
					'title_field' => '{{title4}}',
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
        
        <!--Start Brand Style4 Area-->
        <section class="brand-style4-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <?php foreach($settings['clients'] as $item):?>
                        <!--Start Single Brand Item style4-->
                        <div class="single-brand-item-style4 <?php if($item['style_two'] == 'two') echo 'marleft70 float-left'; else echo 'float-left'; ?>">
                            <a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo esc_url($item['client_img']['url']);?>" alt="<?php esc_attr_e('Awesome Brand Image', 'jixic'); ?>"></a> 
                            <div class="overlay-content">
                                <p><?php echo wp_kses($item['title'], $allowed_tags);?></p>
                            </div>   
                        </div>
                        <?php endforeach;?>
                        <!--End Single Brand Item style4--> 
                                     
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <!--Start Single Brand Item style4-->
                        <div class="single-brand-item-style4 margintop-minus15 margin0-auto">
                            <a href="<?php echo esc_url($settings['client_link1']['url']);?>"><img src="<?php echo esc_url($settings['client_img1']['url']);?>" alt="<?php esc_attr_e('Awesome Brand Image', 'jixic'); ?>"></a> 
                            <div class="overlay-content">
                                <p><?php echo wp_kses($settings['title1'], $allowed_tags);?></p>
                            </div>     
                        </div>
                        <!--End Single Brand Item style4-->
                        <div class="brand-style4-title-box text-center">
                            <h1><?php echo wp_kses($settings['title2'], $allowed_tags);?></h1>
                            <div class="button">
                                <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><?php echo wp_kses($settings['btn_title'], $allowed_tags);?></a>
                            </div>
                        </div> 
                        <!--Start Single Brand Item style4-->
                        <div class="single-brand-item-style4 margin0-auto">
                            <a href="<?php echo esc_url($settings['client_link2']['url']);?>"><img src="<?php echo esc_url($settings['client_img2']['url']);?>" alt="<?php esc_attr_e('Awesome Brand Image', 'jixic'); ?>"></a>
                            <div class="overlay-content">
                                <p><?php echo wp_kses($settings['title3'], $allowed_tags);?></p>
                            </div>      
                        </div>
                        <!--End Single Brand Item style4-->           
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <?php foreach($settings['clients_two'] as $items):?>
                        <!--Start Single Brand Item style4-->
                        <div class="single-brand-item-style4 <?php if($items['diff_style'] == 'two') echo 'marright70 float-right'; else echo 'float-right'; ?>">
                            <a href="<?php echo esc_url($items['client_link3']['url']);?>"><img src="<?php echo esc_url($items['client_img3']['url']);?>" alt="<?php esc_attr_e('Awesome Brand Image', 'jixic'); ?>"></a>
                            <div class="overlay-content">
                                <p><?php echo wp_kses($items['title4'], $allowed_tags);?></p>
                            </div>      
                        </div>
                        <!--End Single Brand Item style4--> 
                        <?php endforeach;?>
                                    
                    </div>
                </div>
            </div>
        </section>
        <!--End Brand Style4 Area-->
           
		<?php 
	}

}
