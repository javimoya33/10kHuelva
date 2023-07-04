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
class Perfect_Application extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_perfect_application';
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
		return esc_html__( 'Perfect Application', 'jixic' );
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
			'perfect_application',
			[
				'label' => esc_html__( 'Perfect Application', 'jixic' ),
			]
		);
		$this->add_control(
            'mac_img',
            [
				'label' => esc_html__('Mac image', 'jixic'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
            'phone_no_img',
            [
				'label' => esc_html__('Phone Number image', 'jixic'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
            'graph_img',
            [
				'label' => esc_html__('Graph image', 'jixic'),
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
				'placeholder' => __( 'Enter your title', 'jixic' )
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
				'placeholder' => __( 'Enter your Description', 'jixic' ),
			]
		);
		$this->add_control(
              'accordion', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['acc_title' => esc_html__('User-Friendly, Modern & Intuitive', 'jixic')],
                			['acc_title' => esc_html__('Beautiful Icons, Typography and Images', 'jixic')],
                			['acc_title' => esc_html__('Extendable Premium Customer Support', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icons',
                    			'label' => esc_html__('Enter The icons', 'jixic'),
                    			'type' => Controls_Manager::SELECT,
                    			'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'acc_title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                			],
							[
                    			'name' => 'acc_text',
                    			'label' => esc_html__('Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'placeholder' => __( 'Enter your Description', 'jixic' ),
                			],
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'DESC',
                				'options' => array(
                					'one' => esc_html__( 'Choose Style One', 'jixic' ),
                					'two'  => esc_html__( 'Choose Style Two', 'jixic' ),
                					'three'  => esc_html__( 'Choose Style Three', 'jixic' ),
                				),
                			],
                			
            			],
            	    'title_field' => '{{acc_title}}',
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
        	
        <!--Start About Style4 Area-->
        <section class="about-style4-area">
            <div class="about-style4-bg">
                <div class="shape1 zoom-fade"></div>    
                <div class="shape2 float_up_down_two">
                    <img src="<?php echo esc_url($settings['mac_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                </div>
                <div class="shape3">
                    <img src="<?php echo esc_url($settings['phone_no_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                </div>
                <div class="shape4">
                    <img src="<?php echo esc_url($settings['graph_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-0 col-sm-0">
                          
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="about-style4-content">
                            <div class="sec-title-style4">
                                <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                                <div class="border-box"></div>
                            </div>
                            <div class="inner-content">
                                <div class="text">
                                    <p><?php echo wp_kses( $settings['text'], true );?></p>
                                </div>
                                <div class="content-box">
                                    <ul>
                                        <?php foreach($settings['accordion'] as $key => $item):?>
                                        <li class="<?php if($item['style_two'] == 'three') echo 'style3'; elseif($item['style_two'] == 'two') echo 'style2'; else echo ''; ?>">
                                            <div class="icons"><span class="<?php echo esc_attr($item['icons']);?>"></span></div>
                                            <div class="title">
                                                <h5><?php echo wp_kses($item['acc_title'], true);?></h5> 
                                            </div>
                                            <div class="overlay-text clearfix">
                                                <p><?php echo wp_kses($item['acc_text'], true);?></p>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>    
                            </div>    
                        </div>      
                    </div> 
                </div> 
            </div>    
        </section>
        <!--End About Style4 Area--> 
        
		<?php 
	}

}