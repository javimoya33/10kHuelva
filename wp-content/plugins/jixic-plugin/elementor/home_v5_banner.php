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
class Home_V5_Banner extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_home_v5_banner';
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
		return esc_html__( 'Home V5 Banner', 'jixic' );
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
			'home_v5_banner',
			[
				'label' => esc_html__( 'Home V5 Banner', 'jixic' ),
			]
		);
		$this->add_control(
			'bg_img',
				[
				  'label' => __( 'Background Image', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
				]
	    );
		$this->add_control(
			'mobile_img',
				[
				  'label' => __( 'Mobile Image', 'jixic' ),
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
				'placeholder' => __( 'Enter your title', 'jixic' ),
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
				'default'     => __( 'Download Jixic V2.0', 'jixic' ),
			]
		);
		$this->add_control(
			'btn_link',
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
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['icons' => esc_html__('Select Icon', 'jixic')]
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
								'label' => __( 'External Url', 'jixic' ),
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
        
        <!-- Start Banner Style5 Area -->
        <section class="banner-style5-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>)">
            <div class="phone float_up_down_two" style="background-image:url(<?php echo esc_url($settings['mobile_img']['url']);?>)"></div>
            <div class="round-box zoom-fade"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="single-item">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="inner">
                                        <div class="big-title">
                                            <?php echo wp_kses( $settings['title'], true );?>
                                        </div>
                                        <div class="button">
                                            <a href="<?php echo esc_url($settings['btn_link']['url']);?>"><i class="fa fa-download" aria-hidden="true"></i><?php echo wp_kses( $settings['btn_title'], true );?></a>
                                        </div>
                                        
                                        <div class="social-share-links">
                                            <div class="title">
                                                <h5><?php esc_html_e('Share with friends:', 'jixic'); ?></h5>
                                            </div>
                                            
                                            <ul class="social-links">
                                            	<?php foreach($settings['social_icons'] as $item):?>
                                                <li>
                                                    <a href="<?php echo esc_url($item['social_link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?></a> 
                                                </li>
                                                <?php endforeach;?>
                                            </ul>
                                            
                                        </div>
                                        
                                    </div>
                                </div>  
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Style5 Area -->
          
		<?php 
	}

}
