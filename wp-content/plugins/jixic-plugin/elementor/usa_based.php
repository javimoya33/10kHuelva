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
class Usa_Based extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_usa_based';
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
		return esc_html__( 'Usa Based', 'jixic' );
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
			'usa_based',
			[
				'label' => esc_html__( 'Usa Based', 'jixic' ),
			]
		);
		$this->add_control(
            'shape_img',
            [
				'label' => esc_html__('Background Shape image', 'jixic'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
            'about_img',
            [
				'label' => esc_html__('About image', 'jixic'),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
	    );
		$this->add_control(
			'icons',
			[
				'label' => esc_html__('Select The icons', 'jixic'),
				'type' => Controls_Manager::SELECT,
				'options'  => get_fontawesome_icons(),
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
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'jixic' )
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
                			['acc_title' => esc_html__('Reached our milestone', 'jixic')],
                			['acc_title' => esc_html__('Received best service award', 'jixic')],
                			['acc_title' => esc_html__('Started as small concern', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'year',
                    			'label' => esc_html__('Enter Year', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'placeholder' => __( 'Enter Year', 'jixic' ),
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
                			]
                			
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
        	
        <!--Start About Style2 Area-->
        <section class="about-style2-area">
            <div class="pattern-layer" style="background-image:url(<?php echo esc_url($settings['shape_img']['url']);?>)" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="2000"></div>
            <div class="shape float-bob-y"><img src="<?php echo esc_url($settings['about_img']['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>"></div>
            <div class="container">
                <div class="sec-title-style2">
                    <div class="icon"><span class="<?php echo esc_attr( $settings['icons']);?>"></span></div>
                    <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-style2-content">
                            <div class="text">
                                <h3><?php echo wp_kses( $settings['subtitle'], true );?></h3>
                                <p><?php echo wp_kses( $settings['text'], true );?></p>
                            </div>
                            <div class="accordion-holder">
                                <?php foreach($settings['accordion'] as $key => $item):?>
                                <!-- Accordion -->
                                <article class="accordion">
                                    <div class="acc-btn <?php if($key == 1) echo 'active'; ?>">
                                        <div class="year"><?php echo wp_kses($item['year'], $allowed_tags);?></div> 
                                        <h3><?php echo wp_kses($item['acc_title'], $allowed_tags);?></h3>
                                    </div>
                                    <div class="acc-content <?php if($key == 1) echo 'collapsed'; ?>">
                                        <div class="inner">
                                            <p><?php echo wp_kses($item['acc_text'], $allowed_tags);?></p>
                                        </div>
                                    </div>
                                </article>
                                <!-- Accordion -->
                                <?php endforeach;?>
                            </div>       
                        </div>   
                    </div>
                </div> 
            </div>    
        </section>
        <!--End About Style2 Area-->
        
		<?php 
	}

}