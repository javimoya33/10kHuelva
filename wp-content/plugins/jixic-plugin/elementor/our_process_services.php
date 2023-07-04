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
class Our_Process_Services extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_process_services';
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
		return esc_html__( 'Our Process Services', 'jixic' );
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
			'our_process_services',
			[
				'label' => esc_html__( 'Our Process Services', 'jixic' ),
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
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Digital branding', 'jixic')],
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'title1',
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
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'Choose Style One',
                				'options' => array(
                					'one' => esc_html__( 'Choose Style One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Style Two', 'jixic' ),
                					'three'  => esc_html__( 'Choose Style Three', 'jixic' ),
                				),
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
        <!--Start Process Area-->
        <section class="process-area">
            <div class="main-title"><h1><?php echo wp_kses( $settings['title'], $allowed_tags );?></h1></div>
            <div class="outer-container">
                <div class="process-tab-box tabs-box">
                    <ul class="process-box tab-buttons clearfix">
                        <?php $count = 1; foreach($settings['services'] as $key => $item):?>
                        <li data-tab="#process-two<?php echo esc_attr($key); ?>" class="tab-btn <?php if($key == 1) echo 'active-btn'; ?>">
                            <div class="<?php if($item['style_two'] == 'three') echo 'border-box style3'; elseif($item['style_two'] == 'two') echo 'border-box style2'; else echo 'border-box'; ?>"></div>
                            <div class="outer-box">
                                <div class="count-boxs">
                                    <div class="inner">
                                        <h2><?php $count = sprintf('%02d', $count); echo esc_attr($count); ?></h2>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3><?php echo wp_kses($item['title1'], $allowed_tags);?></h3>
                                </div>
                            </div>    
                        </li>
                        <?php $count++; endforeach;?>
                    </ul>
                    
                    <div class="tabs-content">
                        <?php foreach($settings['services'] as $keys => $items):?>
                        <div class="tab <?php if($keys == 1) echo 'active-tab'; ?>" id="process-two<?php echo esc_attr($keys); ?>">
                            <div class="inner-content text-center">
                                <div class="title">
                                    <span class="border-box"></span>
                                    <h1><?php echo wp_kses($items['title1'], $allowed_tags);?></h1>
                                </div>
                                <div class="text">
                                    <p><?php echo wp_kses($items['text'], $allowed_tags);?> </p>
                                </div> 
                            </div>   
                        </div>
                        <?php endforeach;?> 
                    </div>
                    
                </div>    
            </div>    
        </section>
        <!--End Process Area-->
        
		<?php 
	}

}
