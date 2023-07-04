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
class Home_V1_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_home_v1_slider';
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
		return esc_html__( 'Home V1 Slider', 'jixic' );
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
			'home_v1_slider',
			[
				'label' => esc_html__( 'Home V1 Slider', 'jixic' ),
			]
		);
		$this->add_control(
              'slider_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Love to', 'jixic')],
                			['title' => esc_html__('Branding', 'jixic')],
                			['title' => esc_html__('Experts in', 'jixic')],
							['title' => esc_html__('Building the', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'shape_image',
                    			'label' => __( 'Shape Image One', 'jixic' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
                			],
							[
                    			'name' => 'shape_image_2',
                    			'label' => __( 'Shape Image Two', 'jixic' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
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
							[
                    			'name' => 'video_link',
								'label' => __( 'Video Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Slide Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Choose Slide One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Slide One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Slide Two', 'jixic' ),
                					'three'  => esc_html__( 'Choose Slide Three', 'jixic' ),
									'four'  => esc_html__( 'Choose Slide Four', 'jixic' ),
                				),
                			],
                		],
            	    'title_field' => '{{title}}',
                 ]
        );
		$this->add_control(
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['icons' => esc_html__('Facebook', 'jixic')],
                		],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'jixic'),
                    			'type' => \Elementor\Controls_Manager::ICONS,
                    			'default' => [
									'value' => 'fas fa-star',
									'library' => 'solid',
								],
                			],
							[
                    			'name' => 'social_link',
								'label' => __( 'Social Link', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
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
        
        <!--Banner Section-->
        <section class="banner-section-two">
            <div class="main-slider-carousel owl-carousel owl-theme">
                <?php foreach($settings['slider_info'] as $service_block): ?>
                <?php if($service_block['style_two'] == 'two') :?>
                <div class="slide" style="background-image: url(<?php echo esc_url($service_block['shape_image']['url']);?>)">
                    <div class="patern-layer-one" style="background-image: url(<?php echo esc_url($service_block['shape_image_2']['url']);?>)"></div>
                    <div class="container">
                        <!-- Content Column -->
                        <div class="content-boxed">
                            <div class="inner-column">
                                <div class="title"><?php echo wp_kses($service_block['subtitle'], $allowed_tags);?></div>
                                <div class="agency">
                                    <ul>
                                        <?php echo wp_kses($service_block['title'], $allowed_tags);?>
                                    </ul>
                                </div>
                                <div class="text"><?php echo wp_kses($service_block['text'], $allowed_tags);?></div>
                                <div class="btn-box text-center">
                                    <a class="slide-btn2" href="<?php echo esc_url($service_block['btn_link']['url']);?>"><?php echo wp_kses($service_block['btn_title'], $allowed_tags);?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif($service_block['style_two'] == 'three') :?>
                <div class="slide" style="background-image: url(<?php echo esc_url($service_block['shape_image']['url']);?>)">
                    <div class="patern-layer-one" style="background-image: url(<?php echo esc_url($service_block['shape_image_2']['url']);?>)"></div>
                    <div class="container">
                        <!-- Content Column -->
                        <div class="content-boxed style-two">
                            <div class="inner-column">
                                <h1><?php echo wp_kses($service_block['title'], $allowed_tags);?></h1>
                                <div class="text"><?php echo wp_kses($service_block['text'], $allowed_tags);?></div>
                                <div class="btn-box">
                                    <a class="slide-btn2" href="<?php echo esc_url($service_block['btn_link']['url']);?>"><?php echo wp_kses($service_block['btn_title'], $allowed_tags);?></a>
                                </div>
                                <div class="video-holder-box">
                                    <a class="html5lightbox" title="Jixic Video Gallery" href="<?php echo esc_url($service_block['video_link']['url']);?>">
                                        <span class="flaticon-play-button-1"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php elseif($service_block['style_two'] == 'four') :?>
                <div class="slide" style="background-image: url(<?php echo esc_url($service_block['shape_image']['url']);?>)">
                    <div class="patern-layer-one" style="background-image: url(<?php echo esc_url($service_block['shape_image_2']['url']);?>)"></div>
                    <div class="container">
                        <!-- Content Column -->
                        <div class="content-boxed style-three">
                            <div class="inner-column">
                                <h1><?php echo wp_kses($service_block['title'], $allowed_tags);?></h1>
                                <div class="text style-two"><?php echo wp_kses($service_block['text'], $allowed_tags);?></div>
                                <div class="btn-box">
                                    <a class="slide-btn2" href="<?php echo esc_url($service_block['btn_link']['url']);?>"><?php echo wp_kses($service_block['btn_title'], $allowed_tags);?></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php else:?>
                <div class="slide" style="background-image: url(<?php echo esc_url($service_block['shape_image']['url']);?>)">
                    <div class="patern-layer-one" style="background-image: url(<?php echo esc_url($service_block['shape_image_2']['url']);?>)"></div>
                    <div class="container">
                        <!-- Content Column -->
                        <div class="content-boxed">
                            <div class="inner-column">
                                <h1><?php echo wp_kses($service_block['title'], $allowed_tags);?></h1>
                                <a href="<?php echo esc_url($service_block['btn_link']['url']);?>" class="theme-btn service-btn"><?php echo wp_kses($service_block['btn_title'], $allowed_tags);?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; endforeach;?>
            </div>
            
            <div class="slider-sociallinks-search-box">
                <div class="sociallinks">
                    <ul class="sociallinks-style-two">
                        <?php foreach($settings['social_icons'] as $service_block): ?>
                        <li>
                            <a href="<?php echo esc_url($service_block['social_link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $service_block['icons']); ?></a> 
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <div class="slider-search-box">
                    <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
            
        </section>
                
		<?php 
	}

}
