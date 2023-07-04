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
class Feature_Services_V3 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_feature_services_v3';
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
		return esc_html__( 'Feature Services V3', 'jixic' );
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
			'feature_services_v3',
			[
				'label' => esc_html__( 'Feature Services V3', 'jixic' ),
			]
		);
		$this->add_control(
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Responsive & modern', 'jixic')],
							['title' => esc_html__('Pixel perfect layout', 'jixic')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'count_value',
                    			'label' => esc_html__('Enter Counter Value', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'subtitle',
                    			'label' => esc_html__('Enter Sub Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'title',
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
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('Read More', 'jixic')
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
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Choose Style One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Background Style One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Background Style One', 'jixic' ),
                				),
                			],
                			
            			],
            	    'title_field' => '{{title}}',
                 ]
        );
		$this->add_control(
			'image1',
				[
				  'label' => __( 'Feature Image One', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'image_title1',
			[
				'label'       => __( 'Image Caption', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Image Caption', 'jixic' ),
			]
		);
		$this->add_control(
			'image2',
				[
				  'label' => __( 'Feature Image Two', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'image_title2',
			[
				'label'       => __( 'Image Caption', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Image Caption', 'jixic' ),
			]
		);
		$this->add_control(
              'services_two', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title2' => esc_html__('Responsive & modern', 'jixic')],
							['title2' => esc_html__('Pixel perfect layout', 'jixic')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'count_value2',
                    			'label' => esc_html__('Enter Counter Value', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'icons2',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'subtitle2',
                    			'label' => esc_html__('Enter Sub Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'title2',
                    			'label' => esc_html__('Enter Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'text2',
                    			'label' => esc_html__('Enter Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'btn_title2',
                    			'label' => esc_html__('Button Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
								'default' => esc_html__('Read More', 'jixic')
                			],
                			[
                    			'name' => 'btn_link2',
								'label' => __( 'Button Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
							[
                				'name' => 'bg_style',
                				'label'   => esc_html__( 'Background Color Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Choose Style One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Background Style One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Background Style One', 'jixic' ),
                				),
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
        
        <!--Start Features style2 Area-->
        <section class="features-style2-area">
            <div class="outer-container clearfix">
                <?php foreach($settings['services'] as $item): ?>
                <!--Start Single Features Box Style2-->
                <div class="single-features-box-style2 width23percent <?php if($item['style_two'] == 'two') echo 'bg2'; else echo ''; ?>">
                    <div class="count-box"><?php echo wp_kses( $item['count_value'], $allowed_tags );?></div>
                    <div class="outer-box">
                        <div class="shape-top zoom-fade"></div>
                        <div class="shape-bottom float_up_down_two"></div>
                        <div class="inner text-center">
                            <div class="static-content">
                                <div class="icon-holder">
                                    <span class="<?php echo esc_attr( $item['icons'] );?>"></span>
                                </div>
                                <div class="text-holder">
                                    <span><?php echo wp_kses( $item['subtitle'], $allowed_tags );?></span>
                                    <h3><?php echo wp_kses( $item['title'], $allowed_tags );?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="overlay-content">
                            <div class="inner-box">
                                <div class="content-box">
                                    <div class="icon-holder">
                                        <span class="<?php echo esc_attr( $item['icons'] );?>"></span>
                                    </div>
                                    <div class="text-holder">
                                        <p><?php echo wp_kses( $item['text'], $allowed_tags );?></p>
                                        <a href="<?php echo esc_url( $item['btn_link']['url'] );?>"><?php echo wp_kses( $item['btn_title'], $allowed_tags );?></a>
                                    </div>
                                </div> 
                            </div>   
                        </div>
                    </div>    
                </div>
                <!--End Single Features Box Style2-->
                <?php endforeach;?>
                
                <div class="single-box width54percent" style="background-image:url(<?php echo esc_url( $settings['image1']['url'] );?>);">
                    <div class="big-title">
                        <div class="inner">
                            <div class="box">
                                <h1><?php echo wp_kses( $settings['image_title1'], $allowed_tags );?></h1>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="single-box width54percent" style="background-image:url(<?php echo esc_url( $settings['image2']['url'] );?>);">
                    <div class="big-title">
                        <div class="inner">
                            <div class="box">
                                <h1><?php echo wp_kses( $settings['image_title2'], $allowed_tags );?></h1>
                            </div>
                        </div>
                    </div> 
                </div>
                
                <?php foreach($settings['services_two'] as $items): ?>
                <!--Start Single Features Box Style2-->
                <div class="single-features-box-style2 width23percent <?php if($items['bg_style'] == 'two') echo 'bg2'; else echo ''; ?>">
                    <div class="count-box"><?php echo wp_kses( $items['count_value2'], $allowed_tags );?></div>
                    <div class="outer-box">
                        <div class="shape-top zoom-fade"></div>
                        <div class="shape-bottom float_up_down_two"></div>
                        <div class="inner text-center">
                            <div class="static-content">
                                <div class="icon-holder">
                                    <span class="<?php echo esc_attr( $items['icons2'] );?>"></span>
                                </div>
                                <div class="text-holder">
                                    <span><?php echo wp_kses( $items['subtitle2'], $allowed_tags );?></span>
                                    <h3><?php echo wp_kses( $items['title2'], $allowed_tags );?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="overlay-content">
                            <div class="inner-box">
                                <div class="content-box">
                                    <div class="icon-holder">
                                        <span class="icon-graphic-design"></span>
                                    </div>
                                    <div class="text-holder">
                                        <p><?php echo wp_kses( $items['text2'], $allowed_tags );?></p>
                                        <a href="<?php echo esc_url( $items['btn_link2']['url'] );?>"><?php echo wp_kses( $items['btn_title2'], $allowed_tags );?></a>
                                    </div>
                                </div> 
                            </div>   
                        </div>
                    </div>    
                </div>
                <!--End Single Features Box Style2-->
                <?php endforeach;?> 
            </div>
        </section>
        <!--End Features style2 Area-->
        
		<?php 
	}

}
