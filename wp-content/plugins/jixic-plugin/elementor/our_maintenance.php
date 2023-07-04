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
class Our_Maintenance extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_maintenance';
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
		return esc_html__( 'Our Maintenance', 'jixic' );
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
			'our_maintenance',
			[
				'label' => esc_html__( 'Our Maintenance', 'jixic' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Title', 'jixic' ),
				'default'     => __( 'The site is under maintenance', 'jixic' ),
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
				'default'     => __( 'We’ll be right back', 'jixic' ),
			]
		);
		$this->add_control(
			'news_letter_id',
			[
				'label'       => __( 'FeedBurner ID', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your FeedBurner ID', 'jixic' ),
				'default'     => __( 'themeforest', 'jixic' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description Text', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'jixic' ),
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
        
        <!--Start Maintenance Content Area-->
        <section class="maintenance-content-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="maintenance-content text-center">
                            <div class="inner-content">
                                <span><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></span>
                                <div class="big-title"><?php echo wp_kses( $settings['title'], $allowed_tags );?></div>
                                <div class="subscribe-box">
                                    <form class="subscribe-form" method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                                        <input type="hidden" id="uri" name="uri" value="<?php echo wp_kses( $settings['news_letter_id'], true );?>">
                                        <input type="email" name="email" value="" placeholder="<?php esc_html_e('Your email address', 'jixic'); ?>">
                                        <button type="submit"><?php esc_html_e('Subscribe', 'jixic'); ?></button>
                                    </form>
                                    <div class="text">
                                        <p><?php echo wp_kses( $settings['text'], $allowed_tags );?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="go-home">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Back to Home', 'jixic'); ?></a>
                                </div>
                                <div class="social-links">
                                    <ul class="social-links-style1">
                                        <?php foreach($settings['social_icons'] as $item):?>
                                        <li><a href="<?php echo esc_url($item['social_link']['url']);?>"><?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?></a></li>
                                        <?php endforeach;?>            
                                    </ul>
                                </div>     
                            </div> 
                        </div>    
                    </div>
                </div>    
            </div>
        </section>
        <!--End Maintenance Content Area-->
        
		<?php 
	}

}
