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
class Home_V4_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_home_v4_slider';
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
		return esc_html__( 'Home V4 Slider', 'jixic' );
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
			'home_v4_slider',
			[
				'label' => esc_html__( 'Home V4 Slider', 'jixic' ),
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
              'slider_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Slide One', 'jixic')],
                			['title' => esc_html__('Slide Two', 'jixic')],
                			['title' => esc_html__('Slide Three', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'slide_image',
                    			'label' => esc_html__('Background image', 'jixic'),
                    			'type' => Controls_Manager::MEDIA,
                    			'default' => ['url' => Utils::get_placeholder_image_src(),],
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
        
        <!-- Start Banner Style4 Area -->
        <section class="banner-style4-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>)">
            <div class="outer-container clearfix">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="banner-carousel-style4 owl-carousel owl-theme">
                            <?php foreach($settings['slider_info'] as $service_block):?>
                            <!--Start Single Item-->
                            <div class="single-item">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="inner">
                                            <div class="big-title">
                                                <?php echo wp_kses($service_block['title'], $allowed_tags);?>
                                            </div>
                                            <div class="text"><?php echo wp_kses($service_block['text'], $allowed_tags);?></div>
                                            <div class="button">
                                                <a href="<?php echo esc_url($service_block['btn_link']['url']);?>"><span class="icon-back"></span><?php echo wp_kses($service_block['btn_title'], $allowed_tags);?></a>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-xl-6">
                                        <div class="image-box">
                                            <img src="<?php echo esc_url($service_block['slide_image']['url']);?>" alt="Awesome Image">
                                        </div>
                                    </div>   
                                </div>    
                            </div>
                            <!--End Single Item-->
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="mouse-btn-down scroll-to-explore" data-target=".about-style3-area"><i class="fa fa-angle-down" aria-hidden="true"></i><?php esc_html_e('Scroll to know more', 'jixic'); ?></div>
            </div>
        </section>
        <!-- End Banner Style4 Area -->
        
		<?php 
	}

}
