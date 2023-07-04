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
class Portfolio_Single extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_portfolio_single';
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
		return esc_html__( 'Portfolio Single', 'jixic' );
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
			'portfolio_single',
			[
				'label' => esc_html__( 'Portfolio Single', 'jixic' ),
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
			'text',
			[
				'label'       => __( 'Text', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Text', 'jixic' ),
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Next Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter The Next Description', 'jixic' ),
			]
		);
		$this->add_control(
              'project_info', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['info_title' => esc_html__('Client', 'jixic')],
							['info_title' => esc_html__('Date', 'jixic')],
							['info_title' => esc_html__('Categories', 'jixic')],
							['info_title' => esc_html__('Project Head', 'jixic')]
            			],
            		'fields' => 
						[
							[
                    			'name' => 'info_title',
                    			'label' => esc_html__('Enter Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'info_text',
                    			'label' => esc_html__('Enter Text', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
                		],
            	    'title_field' => '{{info_title}}',
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
				'default'     => __( 'More Details', 'jixic' ),
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
			'image1',
				[
				  'label' => __( 'Portfolio Image One', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'image2',
				[
				  'label' => __( 'Portfolio Image Two', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
        
        <!--Start Portfolio Single Style1 Area-->
        <section class="portfolio-single-style1-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="portfolio-info-content">
                            <h1><?php echo wp_kses( $settings['title'], $allowed_tags );?></h1>
                            <div class="text">
                                <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                                <p><?php echo wp_kses( $settings['text2'], $allowed_tags );?></p>
                            </div>
                            <div class="project-info">
                                <ul>
                                    <?php foreach($settings['project_info'] as $item): ?>
                                    <li>
                                        <h5><?php echo wp_kses( $item['info_title'], $allowed_tags );?></h5>
                                        <span><?php echo wp_kses( $item['info_text'], $allowed_tags );?></span>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                                <div class="bottom-box">
                                    <div class="button">
                                        <a href="<?php echo esc_url( $settings['btn_link']['url']);?>"><?php echo wp_kses( $settings['btn_title'], $allowed_tags );?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="project-info-image-box">
                            <!--Start Single Box-->
                            <div class="single-box marbtm30">
                                <div class="img-holder">
                                    <img src="<?php echo esc_url( $settings['image1']['url'] );?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                </div>
                            </div>
                            <!--End Single Box-->
                            <!--Start Single Box-->
                            <div class="single-box">
                                <div class="img-holder">
                                    <img src="<?php echo esc_url( $settings['image2']['url'] );?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                </div>
                            </div>
                            <!--End Single Box-->
                        </div>    
                    </div>
                </div>
            </div>    
        </section>
        <!--End Portfolio Single Style1 Area-->
        
		<?php 
	}

}
