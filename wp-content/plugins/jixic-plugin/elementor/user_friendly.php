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
class User_Friendly extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_user_friendly';
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
		return esc_html__( 'User Friendly', 'jixic' );
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
			'user_friendly',
			[
				'label' => esc_html__( 'User Friendly', 'jixic' ),
			]
		);
		$this->add_control(
			'image1',
				[
				  'label' => __( 'Feature Image one', 'jixic' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				  
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
			'image3',
				[
				  'label' => __( 'Feature Image Three', 'jixic' ),
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
				'placeholder' => __( 'Enter Text', 'jixic' ),
			]
		);
		$this->add_control(
              'features', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['title1' => esc_html__('Education', 'jixic')],
							['title1' => esc_html__('Education', 'jixic')],
							['title1' => esc_html__('Education', 'jixic')],
							['title1' => esc_html__('Education', 'jixic')],
            			],
            		'fields' => 
						[
							
							[
                    			'name' => 'icons',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                    		],
							[
                    			'name' => 'title1',
                    			'label' => esc_html__('Enter Title', 'jixic'),
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
        
        <!--Start Friendly Interface Area-->
        <section class="friendly-interface-area">
            <div class="outer-container">
                <div class="layer-image wow fadeInUp" data-wow-duration="1500ms"></div>    
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12">
                        <div class="friendly-interface-content">
                            <div class="sec-title-style4">
                                <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                                <div class="border-box"></div>
                            </div>
                            <div class="inner-content">
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], true );?></p>
                                </div>
                                <ul>
                                    <?php foreach($settings['features'] as $item):?>
                                    <li class="<?php if($item['style_two'] == 'four') echo 'style4'; elseif($item['style_two'] == 'three') echo 'style3'; elseif($item['style_two'] == 'two') echo 'style2'; else echo ''; ?>">
                                        <div class="icons"><span class="<?php echo esc_attr( $item['icons'] );?>"></span></div>
                                        <h5><?php echo wp_kses( $item['title1'], true );?></h5>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>    
                    </div>
                    <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12">
                        <div class="friendly-interface-right-content">
                            <div class="interface-box1">
                                <img src="<?php echo esc_url($settings['image1']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            </div>
                            <div class="interface-box2">
                                <img src="<?php echo esc_url($settings['image2']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            </div>
                            <div class="interface-box3">
                                <img src="<?php echo esc_url($settings['image3']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--End Friendly Interface Area-->
         
		<?php 
	}

}
