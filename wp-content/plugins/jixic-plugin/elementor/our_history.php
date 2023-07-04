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
class Our_History extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_history';
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
		return esc_html__( 'Our History', 'jixic' );
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
			'our_history',
			[
				'label' => esc_html__( 'Our History', 'jixic' ),
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
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Title', 'jixic' ),
				'default'     => __( 'History', 'jixic' ),
			]
		);
		$this->add_control(
              'history', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Established', 'jixic')],
                			['title1' => esc_html__('4k Project Milestone', 'jixic')],
                			['title1' => esc_html__('Office Expanded', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'image',
                    			'label' => __( 'History Image', 'jixic' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'year',
                    			'label' => esc_html__('Year', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
                			[
                    			'name' => 'text',
                    			'label' => esc_html__('Text', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => ''
                			],
                			[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                			],
                			[
                    			'name' => 'btn_link',
								'label' => __( 'Button Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
        <!--Start History Area -->
        <section class="history-area">
            <div class="layer-outer">
                <div class="layer-shape1 aos-init aos-animate" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="2500"></div>
            </div>
            <div class="history-bg" style="background-image:url(<?php echo esc_url($settings['bg_image']['url']);?>);">
                <div class="inner">
                    <div class="box">
                        <div class="title"><?php echo wp_kses( $settings['title'], $allowed_tags );?></div>
                    </div>
                </div>    
            </div>
            <div class="auto-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="history-carousel owl-carousel owl-theme style1">
                            <?php foreach($settings['history'] as $item):?>
                            <!--Start Single History-->
                            <div class="single-history">
                                <div class="inner-box" style="background-image:url(<?php echo esc_url($item['image']['url']);?>);">
                                    <div class="static-content">
                                        <div class="date-box">
                                            <h3><?php echo wp_kses($item['year'], $allowed_tags);?></h3>
                                        </div>
                                    </div>
                                    <div class="overlay-content">
                                        <p><?php echo wp_kses($item['text'], $allowed_tags);?></p>
                                        <div class="read-more-button">
                                            <a href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['btn_title'], $allowed_tags);?></a>
                                        </div>
                                    </div>    
                                </div>
                                <div class="title">
                                    <a href="<?php echo esc_url($item['btn_link']['url']);?>"><span class="icon-back"></span><?php echo wp_kses($item['title1'], $allowed_tags);?></a>
                                </div>
                            </div>
                            <!--Start Single History-->
                            <?php endforeach;?>
                        </div>    
                    </div>        
                </div>
            </div>
        </section>  
        <!--End History Area-->
        
		<?php 
	}

}
