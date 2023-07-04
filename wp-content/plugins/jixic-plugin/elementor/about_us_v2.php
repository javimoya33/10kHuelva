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
class About_Us_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_about_us_v2';
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
		return esc_html__( 'About Us V2', 'jixic' );
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
			'about_us_v2',
			[
				'label' => esc_html__( 'About Us V2', 'jixic' ),
			]
		);
		$this->add_control(
			'exp_year',
			[
				'label'       => __( 'Experience Year', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Experience Year', 'jixic' ),
				'default'     => __( 'Since 1st April 1972', 'jixic' ),
			]
		);
		$this->add_control(
			'about_image1',
				[
				  'label' => __( 'About Image one', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'about_image2',
				[
				  'label' => __( 'About Image Two', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'about_image3',
				[
				  'label' => __( 'About Image Three', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'video_url',
				[
				  'label' => __( 'Video Url', 'jixic' ),
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
			'bg_text',
			[
				'label'       => __( 'Background Text', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Background Text', 'jixic' ),
				'default'     => __( 'Story About Jexic', 'jixic' ),
			]
		);
		$this->add_control(
              'about_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title' => esc_html__('Title', 'jixic')],
            			],
            		'fields' => 
						[
							[
								'name' => 'logo_img',
								'label' => __( 'Logo Image', 'jixic' ),
								'type' => Controls_Manager::MEDIA,
								'default' => ['url' => Utils::get_placeholder_image_src(),],
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
                    			'name' => 'text2',
                    			'label' => esc_html__('Enter Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
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
        
        <!--Start About Style3 Area-->
        <section class="about-style3-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-style3-image-box clearfix" style="background-image:url(<?php echo esc_url($settings['about_image1']['url']);?>);">
                            <div class="text"><span><?php echo wp_kses( $settings['exp_year'], true );?></span></div>
                            <div class="image-box-one">
                                <img src="<?php echo esc_url($settings['about_image2']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            </div>
                            <div class="video-holder-box-style2">
                                <div class="img-holder">
                                    <img src="<?php echo esc_url($settings['about_image3']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                    <div class="icon-holder">
                                        <div class="icon">
                                            <div class="inner">
                                                <a class="html5lightbox wow zoomIn animated" data-wow-delay="300ms" data-wow-duration="1500ms" title="Jixic Video Gallery" href="<?php echo esc_url($settings['video_url']['url']);?>" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: zoomIn;">
                                                    <span class="icon-multimedia"></span>
                                                </a>
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>      
                        </div>   
                    </div>
                    <div class="col-xl-1 col-lg-2 col-md-3 col-sm-2">
                        <div class="about-style3-title"><span><?php echo wp_kses( $settings['bg_text'], true );?></span></div>
                    </div>
                    <div class="col-xl-5 col-lg-10 col-md-9 col-sm-10">
                        <div class="about-style3-content-box">
                            <div class="slick-slider-box">
                                <div class="slider slider-nav">
                                    <?php foreach($settings['about_info'] as $service_block):?>
                                    <div class="slide-item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="inner-content">
                                                    <div class="logo"><img src="<?php echo esc_url($service_block['logo_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>"></div>
                                                    <div class="title"><h1><?php echo wp_kses( $service_block['title'], true );?></h1></div> 
                                                    <div class="text">
                                                        <p><?php echo wp_kses( $service_block['text'], true );?></p>
                                                        <p><?php echo wp_kses( $service_block['text2'], true );?></p>
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
        </section>
        <!--End About Style3 Area-->
         
		<?php 
	}

}
