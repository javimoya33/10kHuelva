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
class Professional_Skills extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_professional_skills';
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
		return esc_html__( 'Professional Skills', 'jixic' );
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
			'professional_skills',
			[
				'label' => esc_html__( 'Professional Skills', 'jixic' ),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Sub Title', 'jixic' ),
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
				'placeholder' => __( 'Enter Title', 'jixic' ),
			]
		);
		$this->add_control(
              'skill', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Designing', 'jixic')],
                			['block_title' => esc_html__('Marketing', 'jixic')],
                			['block_title' => esc_html__('Consutling', 'jixic')],
							['block_title' => esc_html__('Coding Experience', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'counter_start',
                    			'label' => esc_html__('Counter Start', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'counter_stop',
                    			'label' => esc_html__('Counter Stop', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'alphabet_letter',
                    			'label' => esc_html__('Alphabet Letter', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => ''
                			],
							[
                    			'name' => 'block_title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
						],
            	    'title_field' => '{{block_title}}',
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
        
        <!--Start Skill Area-->
        <section class="skill-area">
            <div class="layer-outer">
                <div class="layer-shape1"></div>
                <div class="layer-shape2"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="skill-image-box">
                            <div class="img-box float_up_down_two">
                                <img src="<?php echo esc_url($settings['feature_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                            </div>    
                        </div>    
                    </div>
                    <div class="col-xl-4">
                        <div class="skill-content">
                            <div class="sec-title-style5">
                                <div class="border-box"><div class="border-left"></div><h6><?php echo wp_kses( $settings['subtitle'], $allowed_tags );?></h6></div>
                                <div class="title"><?php echo wp_kses( $settings['title'], $allowed_tags );?></div>
                            </div>
                            <div class="progress-levels">
                                <?php foreach($settings['skill'] as $item):?>
                                <!--Skill Box-->
                                <div class="progress-box wow">
                                    <div class="inner count-box">
                                        <div class="text"><?php echo esc_attr($item['block_title']);?></div>
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($item['counter_stop']);?>"><?php echo esc_attr($item['counter_start']);?></span>
                                                    <span class="percent"><?php echo esc_attr($item['alphabet_letter']);?></span>
                                                </div>
                                                <div class="bar-fill" data-percent="<?php echo esc_attr($item['counter_stop']);?>"></div>
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
        </section>
        <!--End Skill Area-->
        
		<?php 
	}

}
