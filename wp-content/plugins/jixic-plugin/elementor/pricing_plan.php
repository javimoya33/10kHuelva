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
class Pricing_Plan extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_pricing_plan';
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
		return esc_html__( 'Pricing Plan', 'jixic' );
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
			'pricing_plan',
			[
				'label' => esc_html__( 'Pricing Plan', 'jixic' ),
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
            'bg_cloud_img',
            [
				'label' => esc_html__('Background Pattern image', 'jixic'),
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
				'placeholder' => __( 'Enter your title', 'jixic' ),
				'default'     => __( 'Enter your title', 'jixic' ),
			]
		);
		$this->add_control(
              'monthly_table', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['plan_title' => esc_html__('Standard', 'jixic')],
                			['plan_title' => esc_html__('Economy', 'jixic')],
                			['plan_title' => esc_html__('Executive', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'currency_symbol',
                    			'label' => esc_html__('Currency Symbols', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'price',
                    			'label' => esc_html__('Price', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'plan_title',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'plan_description',
                    			'label' => esc_html__('Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'feature_str',
                    			'label' => esc_html__('Feature List', 'diaco'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'diaco')
                			],
							[
                    			'name' => 'btn_title',
                    			'label' => esc_html__('Button Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'ext_link',
								'label' => __( 'External Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{plan_title}}',
                 ]
        );
		$this->add_control(
              'yearly_table', 
			  	[
            		'type' => Controls_Manager::REPEATER,
            		'seperator' => 'before',
            		'default' => 
						[
                			['plan_title1' => esc_html__('Standard', 'jixic')],
                			['plan_title1' => esc_html__('Economy', 'jixic')],
                			['plan_title1' => esc_html__('Executive', 'jixic')]
            			],
            		'fields' => 
						[
                			[
                    			'name' => 'icon1',
                    			'label' => esc_html__('Select The icons', 'jixic'),
								'type' => Controls_Manager::SELECT,
								'options'  => get_fontawesome_icons(),
                			],
							[
                    			'name' => 'currency_symbol1',
                    			'label' => esc_html__('Currency Symbols', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'price1',
                    			'label' => esc_html__('Price', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'plan_title1',
                    			'label' => esc_html__('Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'plan_description1',
                    			'label' => esc_html__('Description', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'feature_str2',
                    			'label' => esc_html__('Feature List', 'jixic'),
                    			'type' => Controls_Manager::TEXTAREA,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'btn_title1',
                    			'label' => esc_html__('Button Title', 'jixic'),
                    			'type' => Controls_Manager::TEXT,
                    			'default' => esc_html__('', 'jixic')
                			],
							[
                    			'name' => 'ext_link1',
								'label' => __( 'External Url', 'jixic' ),
							    'type' => Controls_Manager::URL,
							    'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
							    'show_external' => true,
							    'default' => ['url' => '','is_external' => true,'nofollow' => true,],
                			],
            			],
            	    'title_field' => '{{plan_title1}}',
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
        	
        <!--Start Pricing Table Area-->
        <section class="pricing-table-area">
            <div class="pricing-table-bg" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>);">
                <div class="inner-bg" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2000" style="background-image: url(<?php echo esc_url($settings['bg_cloud_img']['url']);?>);"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="pricing-tabs tabs-box">
                            <div class="title-column clearfix">
                                <div class="sec-title-style2 float-left">
                                    <div class="icon"><span class="<?php echo esc_attr( $settings['icons'] );?>"></span></div>
                                    <div class="title"><?php echo wp_kses( $settings['title'], true );?></div>
                                </div>
                                <ul class="tab-buttons clearfix float-right">
                                    <li data-tab="#prod-monthly" class="tab-btn active-btn"><?php esc_html_e('Monthly', 'jixic'); ?></li>
                                    <li data-tab="#prod-yearly" class="tab-btn"><?php esc_html_e('Yearly', 'jixic'); ?></li>
                                </ul>
                            </div>
                            <div class="price-column clearfix">
                                <div class="inner">
                                    <div class="tabs-content">
                                        <!--Tab-->
                                        <div class="tab active-tab" id="prod-monthly">
                                            <div class="row clearfix">
                                                <?php foreach($settings['monthly_table'] as $item):?>
                                                <!--Single Price Box-->
                                                <div class="single-price-box col-lg-4 col-md-12 col-sm-12">
                                                    <div class="inner-box" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                                        <div class="top">
                                                            <div class="icon">
                                                                <span class="<?php echo esc_attr($item['icon']);?>"></span>
                                                            </div>
                                                            <div class="value">
                                                                <h1><sub><?php echo wp_kses($item['currency_symbol'], $allowed_tags);?></sub><?php echo wp_kses($item['price'], $allowed_tags);?></h1>
                                                            </div>
                                                        </div>
                                                        <div class="title-box">
                                                            <h5><?php echo wp_kses($item['plan_title'], $allowed_tags);?></h5>
                                                            <p><?php echo wp_kses($item['plan_description'], $allowed_tags);?></p>
                                                        </div>
                                                        <ul class="price-list">
                                                            <?php $fearures = explode("\n", ($item['feature_str']));?>
															<?php foreach($fearures as $feature):?>
                                                            <?php echo wp_kses($feature, true); ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <div class="btn-box">
                                                            <a class="thm-btn3" href="<?php echo esc_url($item['ext_link']['url']);?>"><?php echo wp_kses($item['btn_title'], $allowed_tags);?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Single Price Box-->
                                                <?php endforeach;?>
                                            </div>
                                        </div>
                                        <!--Tab-->
                                        <div class="tab" id="prod-yearly">
                                            <div class="row clearfix">
                                                <?php foreach($settings['yearly_table'] as $items):?>
                                                <!--Single Price Box-->
                                                <div class="single-price-box col-lg-4 col-md-12 col-sm-12">
                                                    <div class="inner-box" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="700">
                                                        <div class="top">
                                                            <div class="icon">
                                                                <span class="<?php echo esc_attr($items['icon1']);?>"></span>
                                                            </div>
                                                            <div class="value">
                                                                <h1><sub><?php echo wp_kses($items['currency_symbol1'], $allowed_tags);?></sub><?php echo wp_kses($items['price1'], $allowed_tags);?></h1>
                                                            </div>
                                                        </div>
                                                        <div class="title-box">
                                                            <h5><?php echo wp_kses($items['plan_title1'], $allowed_tags);?></h5>
                                                            <p><?php echo wp_kses($items['plan_description1'], $allowed_tags);?></p>
                                                        </div>
                                                        <ul class="price-list">
                                                            <?php $fearures2 = explode("\n", ($items['feature_str2']));?>
															<?php foreach($fearures2 as $feature2):?>
                                                            <?php echo wp_kses($feature2, true); ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                        <div class="btn-box">
                                                            <a class="thm-btn3" href="<?php echo esc_url($items['ext_link1']['url']);?>"><?php echo wp_kses($items['btn_title1'], $allowed_tags);?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Single Price Box-->
                                                <?php endforeach;?>
                                            </div>    
                                        </div>
           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        <!--End Pricing Table Area-->   
        
		<?php 
	}

}
