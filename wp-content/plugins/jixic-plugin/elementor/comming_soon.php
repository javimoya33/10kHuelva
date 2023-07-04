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
class Comming_Soon extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_comming_soon';
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
		return esc_html__( 'Comming Soon', 'jixic' );
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
			'comming_soon',
			[
				'label' => esc_html__( 'Comming Soon', 'jixic' ),
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
			'logo_img',
				[
				  'label' => __( 'Logo Image', 'jixic' ),
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
				'placeholder' => __( 'Enter your title', 'jixic' ),
				'default'     => __( 'Coming Soon', 'jixic' ),
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
			'countdown_value',
			[
				'label'       => __( 'Counter Value', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Counter Value', 'jixic' ),
				'default'     => __( '2021/11/28', 'jixic' ),
			]
		);
		$this->add_control(
			'form_title',
			[
				'label'       => __( 'Form Title', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Title', 'jixic' ),
				'default'     => __( 'Subscribe us & get updates', 'jixic' ),
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
        
        <!--Start Coming Soon Content Area-->
        <section class="coming-soon-content-area" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="coming-soon-content text-center">
                            <div class="logo-box">
                                <a href="index.html">
                                    <img src="<?php echo esc_url($settings['logo_img']['url']);?>" alt="<?php esc_attr_e('Awesome Logo', 'jixic'); ?>">
                                </a>    
                            </div>
                            <div class="timer-box text-center">
                                <div class="big-title"><?php echo wp_kses( $settings['title'], $allowed_tags );?></div>
                                <span><?php echo wp_kses( $settings['text'], $allowed_tags );?></span>
                                <div class="countdown-timer">
                                    <div class="default-coundown">
                                        <div class="box">
                                            <div class="countdown time-countdown-two" data-countdown-time="<?php echo wp_kses( $settings['countdown_value'], $allowed_tags );?>"></div>
                                        </div>
                                    </div>          
                                </div>
                                <div class="subscribe-box">
                                    <div class="text">
                                        <p><?php echo wp_kses( $settings['form_title'], $allowed_tags );?></p>
                                    </div>
                                    <form class="subscribe-form" method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                                        <input type="hidden" id="uri5" name="uri" value="<?php echo wp_kses( $settings['news_letter_id'], true );?>">
                                        <input type="email" name="email" value="" placeholder="<?php esc_html_e('Your email address', 'jixic'); ?>">
                                        <button type="submit"><?php esc_html_e('Subscribe', 'jixic'); ?></button>
                                    </form>
                                    <div class="go-home">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="icon-back"></span><?php esc_html_e('Back to The Home', 'jixic'); ?></a>
                                    </div> 
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>    
            </div>
        </section>
        <!--End Coming Soon Content Area-->
        
		<?php 
	}

}
