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
class Home_V6_Banner extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_home_v6_banner';
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
		return esc_html__( 'Home V6 Banner', 'jixic' );
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
			'home_v6_banner',
			[
				'label' => esc_html__( 'Home V6 Banner', 'jixic' ),
			]
		);
		$this->add_control(
			'feature_img',
				[
				  'label' => __( 'Feature Image', 'jixic' ),
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
			'phone_no',
			[
				'label'       => __( 'Phone Number', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Phone Number', 'jixic' ),
			]
		);
		$this->add_control(
			'email_address',
			[
				'label'       => __( 'Email Address', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Email Address', 'jixic' ),
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
		$this->add_control(
			'title1',
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
			'text',
			[
				'label'       => __( 'Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'jixic' ),
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
        
        <!-- Banner style6 Section -->
        <section class="banner-style6-section">
            <div class="layer-outer">
                <div class="layer-image" style="background-image:url(<?php echo esc_url($settings['feature_img']['url']);?>)"></div>  
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="banner-contact-details-box">
                            <h3><?php echo wp_kses( $settings['title'], $allowed_tags );?></h3>
                            <ul>
                                <li>
                                    <h6>Phone</h6>
                                    <h5><?php echo wp_kses( $settings['phone_no'], $allowed_tags );?></h5>
                                </li>
                                <li>
                                    <h6>Email</h6>
                                    <h5><?php echo wp_kses( $settings['email_address'], $allowed_tags );?></h5>
                                </li>
                            </ul>
                            <div class="banner-style6-social-links">
                                <ul class="social-links-style1">
                                    <?php foreach($settings['social_icons'] as $item):?>
                                    <li>
                                        <a href="<?php echo esc_url($item['social_link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?></a> 
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>    
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="banner-style6-title-box">
                            <div class="shape zoom-fade"></div>
                            <div class="big-title"><?php echo wp_kses( $settings['title1'], $allowed_tags );?></div>
                            <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                        </div>    
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner style6 Section -->
         
		<?php 
	}

}
