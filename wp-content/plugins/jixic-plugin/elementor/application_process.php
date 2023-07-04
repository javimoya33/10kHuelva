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
class Application_Process extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_application_process';
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
		return esc_html__( 'Application Process', 'jixic' );
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
			'application_process',
			[
				'label' => esc_html__( 'Application Process', 'jixic' ),
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
              'services', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Download', 'jixic')],
							['title1' => esc_html__('Sign up - Login', 'jixic')],
							['title1' => esc_html__('Start Work', 'jixic')],
							['title1' => esc_html__('Add Review', 'jixic')],
            			],
            		'fields' => 
						[
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Enter Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'text1',
                    			'label' => esc_html__('Enter Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
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
									'four'  => esc_html__( 'Choose Style Four', 'jixic' ),
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
        
        <!--Start App setup process Area--> 
        <section class="app-setup-process-area">
            <div class="layer-outer">
                <div class="layer-image"></div>
            </div>
            <div class="container">
                <div class="sec-title-style4 max-witdth text-center">
                    <div class="title clr-white"><?php echo wp_kses( $settings['title'], true );?></div>
                    <div class="border-box center"></div>
                    <div class="text"><p><?php echo wp_kses( $settings['text'], true );?></p></div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="app-setup-process">
                            <div class="row">
                                <?php $count = 1; foreach($settings['services'] as $service_block): ?>
								<!--Start Single App Setup Process-->
                                <div class="col-xl-3">
                                    <div class="single-app-setup-process <?php if($service_block['style_two'] == 'four') echo 'martop80'; elseif($service_block['style_two'] == 'three') echo 'margintop80'; elseif($service_block['style_two'] == 'two') echo 'martop80';  else echo ''; ?>">
                                        <div class="count-box"><?php $count = sprintf('%02d', $count); echo esc_attr($count); ?></div>
                                        <div class="icons">
                                            <span class="<?php if($service_block['style_two'] == 'four') echo 'icon-review'; elseif($service_block['style_two'] == 'three') echo 'icon-user'; elseif($service_block['style_two'] == 'two') echo 'icon-login';  else echo 'icon-download1'; ?>">
                                                <?php
													if($service_block['style_two'] == 'four') echo '<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span>';
													elseif($service_block['style_two'] == 'three') echo '<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span>'; 
													elseif($service_block['style_two'] == 'two') echo '<span class="path1"></span><span class="path2"></span><span class="path3"></span>';
													else echo '<span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span>'; 
												?>
                                            </span>
                                            <div class="overlay-text">
                                                <p><?php echo wp_kses( $service_block['text1'], true );?></p>
                                            </div>
                                        </div>
                                        <h5><?php echo wp_kses( $service_block['title1'], true );?></h5>
                                    </div>
                                </div>
                                <!--End Single App Setup Process-->
                                <?php $count++; endforeach;?>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </section>   
        <!--End App setup process Area-->
         
		<?php 
	}

}
