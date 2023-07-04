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
class Our_Mission extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_mission';
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
		return esc_html__( 'Our Mission', 'jixic' );
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
			'our_mission',
			[
				'label' => esc_html__( 'Our Mission', 'jixic' ),
			]
		);
		$this->add_control(
			'bg_image',
				[
				  'label' => __( 'Background Image', 'jixic' ),
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
				'placeholder' => __( 'Enter The Title', 'jixic' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Our Mission', 'jixic')],
                			['title1' => esc_html__('Our Vision', 'jixic')],
                			['title1' => esc_html__('Our Values', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'image',
                    			'label' => __( 'Feature Image', 'jixic' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'icon',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Sub Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
                			[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
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
        
        <!--Start Mission Vision Area-->
        <section class="mission-vision-area" style="background-image:url(<?php echo esc_url($settings['bg_image']['url']);?>);">
            <div class="container">
                <div class="top-title text-center"><h1><?php echo wp_kses( $settings['title'], $allowed_tags );?></h1></div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="mission-vision-tabs tabs-box">
                            <ul class="tab-buttons clearfix">
                                <?php foreach($settings['services'] as $key => $item):?>
                                <li data-tab="#mission<?php echo esc_attr($key); ?>" class="tab-btn <?php if($key == 1) echo 'active-btn'; ?>">
                                    <div class="img-box">
                                        <img src="<?php echo esc_url($item['image']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                        <div class="overlay-content">
                                            <div class="inner">
                                                <div class="box">
                                                    <span class="<?php echo esc_attr($item['icon']);?>"></span>
                                                    <h3><?php echo wp_kses($item['title1'], $allowed_tags);?></h3>
                                                    <span><?php echo wp_kses($item['subtitle'], $allowed_tags);?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </li>
                                <?php endforeach;?>
                            </ul>
                            <div class="clearfix">
                                <div class="inner">
                                    <div class="tabs-content">
                                        <?php foreach($settings['services'] as $keys => $items):?>
                                        <!--Tab-->
                                        <div class="tab <?php if($keys == 1) echo 'active-tab'; ?>" id="mission<?php echo esc_attr($keys); ?>">
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="inner-box text-center" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                                        <div class="title">
                                                            <h3><?php echo wp_kses($items['title1'], $allowed_tags);?></h3>
                                                            <span><?php echo wp_kses($items['subtitle'], $allowed_tags);?></span>
                                                        </div>
                                                        <div class="border-box"></div>
                                                        <div class="text">
                                                            <p><?php echo wp_kses($items['text'], $allowed_tags);?></p>
                                                        </div>     
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End Mission Vision Area-->
        
		<?php 
	}

}
