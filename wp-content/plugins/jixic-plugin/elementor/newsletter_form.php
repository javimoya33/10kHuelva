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
class Newsletter_Form extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_newsletter_form';
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
		return esc_html__( 'Newsletter Form', 'jixic' );
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
			'newsletter_form',
			[
				'label' => esc_html__( 'Newsletter Form', 'jixic' ),
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
				'default'     => __( 'Subscribe our newsletter', 'jixic' ),
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
        
        <!--Start Subscribe Area-->
        <section class="subscribe-area">
            <div class="layer-outer">
                <div class="layer-shape1" data-aos="fade-right" data-aos-easing="linear" data-aos-duration="2500"></div>
                <div class="layer-shape2" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="2500"></div>
            </div>
            <div class="container">
                <div class="title text-center">
                    <h1><?php echo wp_kses( $settings['title'], true );?></h1>
                    <p><?php echo wp_kses( $settings['text'], true );?></p>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <form class="subscribe-form-box wow slideInUp" data-wow-delay="100ms" method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                            <div class="row">
                                <div class="col-xl-4">
                                    <input type="text" name="f_name" placeholder="<?php esc_html_e('Name...', 'jixic'); ?>">       
                                </div>
                                <div class="col-xl-4">
                                    <input type="hidden" id="uri3" name="uri" value="<?php echo wp_kses( $settings['news_letter_id'], true );?>">
                                    <input type="email" name="f_email" value="" placeholder="<?php esc_html_e('Email...', 'jixic'); ?>" required="">    
                                </div>
                                <div class="col-xl-4">
                                    <button class="btn-one" type="submit"><?php esc_html_e('Subscribe Us', 'jixic'); ?></button>     
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--End Subscribe Area-->
          
		<?php 
	}

}
