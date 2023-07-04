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
class Funfacts extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_funfacts';
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
		return esc_html__( 'Funfacts', 'jixic' );
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
			'funfacts',
			[
				'label' => esc_html__( 'Funfacts', 'jixic' ),
			]
		);
		$this->add_control(
            'bg_img',
            [
				'label' => esc_html__('Background image', 'jixic'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
              'funfact', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['block_title' => esc_html__('Projects', 'jixic')],
                			['block_title' => esc_html__('Reviews', 'jixic')],
                			['block_title' => esc_html__('Team', 'jixic')],
							['block_title' => esc_html__('Completed Projects', 'jixic')]
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
							[
                				'name' => 'style_two',
                				'label'   => esc_html__( 'Choose Funfacts Style', 'jixic' ),
                				'type'    => Controls_Manager::SELECT,
                				'default' => 'DESC',
                				'options' => array(
                					'one' => esc_html__( 'Choose Dot Style', 'jixic' ),
                					'two'  => esc_html__( 'Choose Percent Style', 'jixic' ),
                					'three'  => esc_html__( 'Choose Hash Style', 'jixic' ),
                				),
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
        	
        <!--Start Fact Counter Area-->
        <section class="fact-counter-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <ul class="fact-counter">
                            <?php foreach($settings['funfact'] as $service_block):?>
                            <?php if($service_block['style_two'] == 'three'): ?>
                            <!--Start Single Fact Counter-->
                            <li class="single-fact-counter wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                                <div class="count-box">
                                    <h1>
                                        <span class="has"><?php echo esc_attr($service_block['alphabet_letter']);?></span>
                                        <span class="timer" data-from="<?php echo esc_attr($service_block['counter_start']);?>" data-to="<?php echo esc_attr($service_block['counter_stop']);?>" data-speed="5000" data-refresh-interval="50"><?php echo esc_attr($service_block['counter_stop']);?></span>
                                    </h1>
                                </div>
                                <div class="title">
                                    <h3><?php echo wp_kses($service_block['block_title'], $allowed_tags);?></h3>
                                </div>
                            </li>
                            <!--End Single Fact Counter-->
                            <?php elseif($service_block['style_two'] == 'two'): ?>
                            <!--Start Single Fact Counter-->
                            <li class="single-fact-counter wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1500ms">
                                <div class="count-box">
                                    <h1>
                                        <span class="timer" data-from="<?php echo esc_attr($service_block['counter_start']);?>" data-to="<?php echo esc_attr($service_block['counter_stop']);?>" data-speed="5000" data-refresh-interval="50"><?php echo esc_attr($service_block['counter_stop']);?></span>
                                        <span class="percent"><?php echo esc_attr($service_block['alphabet_letter']);?></span>
                                    </h1>
                                </div>
                                <div class="title">
                                    <h3><?php echo wp_kses($service_block['block_title'], $allowed_tags);?></h3>
                                </div>
                            </li>
                            <!--End Single Fact Counter-->
                            <?php else: ?>
                            <!--Start Single Fact Counter-->
                            <li class="single-fact-counter wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1500ms">
                                <div class="count-box">
                                    <h1>
                                        <span class="timer dot" data-from="<?php echo esc_attr($service_block['counter_start']);?>" data-to="<?php echo esc_attr($service_block['counter_stop']);?>" data-speed="5000" data-refresh-interval="50"><?php echo esc_attr($service_block['counter_stop']);?></span>
                                        <span class="k"> <?php echo esc_attr($service_block['alphabet_letter']);?></span>
                                    </h1>
                                </div>
                                <div class="title">
                                    <h3><?php echo wp_kses($service_block['block_title'], $allowed_tags);?></h3>
                                </div>
                            </li>
                            <!--End Single Fact Counter-->
                            <?php endif; endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>   
        <!--End Fact Counter Area-->
          
		<?php 
	}

}