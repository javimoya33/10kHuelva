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
class Home_V3_Banner extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_home_v3_banner';
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
		return esc_html__( 'Home V3 Banner', 'jixic' );
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
			'home_v3_banner',
			[
				'label' => esc_html__( 'Home V3 Banner', 'jixic' ),
			]
		);
		$this->add_control(
              'social_icons', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['social_title' => esc_html__('Facebook', 'jixic')]
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
                    			'name' => 'social_title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('Enter Title', 'jixic')
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
            	    'title_field' => '{{social_title}}',
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
				'default'     => __( 'Title', 'jixic' ),
			]
		);
		$this->add_control(
			'line_title',
			[
				'label'       => __( 'Line Description', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Drop Line Description', 'jixic' ),
				'default'     => __( 'Drop a Line', 'jixic' ),
			]
		);
		$this->add_control(
			'ext_link',
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
        
        <!-- Banner style3 Section -->
        <section class="banner-style3-section">
            <div class="banner-social-links">
                <ul>
                    <?php foreach($settings['social_icons'] as $item):?>
                    <li>
                        <a href="<?php echo esc_url($item['social_link']['url']);?>">
                            <?php \Elementor\Icons_Manager::render_icon( $item['icons']); ?>
                            <span class="overlay"><?php echo wp_kses($item['social_title'], $allowed_tags);?></span>
                        </a> 
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="drop-line">
                <div class="text"><?php echo wp_kses( $settings['line_title'], true );?></div>
                <div class="icon"><a href="<?php echo esc_url($settings['ext_link']['url']);?>"><span class="icon-pen"></span></a></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="banner-content">
                            <div class="big-title"><?php echo wp_kses( $settings['title'], true );?></div>
                            <!--Scroll Dwwn Btn-->
                            <div class="mouse-btn-down scroll-to-explore" data-target=".popular-portfolio-area"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner style3 Section -->
          
		<?php 
	}

}
