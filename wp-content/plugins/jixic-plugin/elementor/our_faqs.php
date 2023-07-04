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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Our_Faqs extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_faqs';
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
		return esc_html__( 'Our Faqs', 'jixic' );
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
			'our_faqs',
			[
				'label' => esc_html__( 'Our Faqs', 'jixic' ),
			]
		);
		$this->add_control(
			'bottom_description',
			[
				'label'       => __( 'Form Description', 'jixic' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Form Description', 'jixic' ),
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'jixic' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'jixic' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'jixic' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'jixic' ),
					'title'      => esc_html__( 'Title', 'jixic' ),
					'menu_order' => esc_html__( 'Menu Order', 'jixic' ),
					'rand'       => esc_html__( 'Random', 'jixic' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'jixic' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'jixic' ),
					'ASC'  => esc_html__( 'ASC', 'jixic' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'jixic' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'jixic' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'jixic'),
				  'options' => get_faqs_categories()
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
		
        $paged = jixic_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-jixic' );
		$args = array(
			'post_type'      => 'jixic_faqs',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		
		if( jixic_set( $settings, 'query_category' ) ) $args['faqs_cat'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts()) { 
		
		$count = 1;
		$left_arr = array();
   		$right_arr = array();
					
		?>
		<?php while ( $query->have_posts() ) : $query->the_post();
				
				if($count > 2) $count = 1;
				$active = ( $query->current_post == 0 ) ? 'active' : '';
				$current = ( $query->current_post == 0 ) ? 'collapsed' : '';
			?>
			<?php if( ($count == 1)):
				$left_arr[get_the_id()] = ' <li>
												<div class="title">
													<h5>'.get_the_title(get_the_id()).'</h5> 
												</div>
												<div class="overlay-text clearfix">
													<p>'.jixic_trim(get_the_content(), $settings['text_limit']).'</p>
												</div>
											</li>';
			?>
			<?php else:
				$right_arr[get_the_id()] = ' <li>
												<div class="title">
													<h5>'.get_the_title(get_the_id()).'</h5> 
												</div>
												<div class="overlay-text clearfix">
													<p>'.jixic_trim(get_the_content(), $settings['text_limit']).'</p>
												</div>
											</li>';
			?>
			<?php endif; ?>
			<?php $count++; endwhile; ?>	
            
            <!--Start Faq Content Area-->
            <section class="faq-content-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="faq-search-box text-center">   
                                <form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Enter Keyword...', 'jixic' ); ?>" required>
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                                <p><?php echo wp_kses($settings['bottom_description'], $allowed_tags);?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="faq-content-box">
                                <ul>
                                   <?php foreach($left_arr as $key => $content):?>
										<?php echo wp_kses_post($content);?>
                                    <?php endforeach;?> 
                                </ul>
                            </div>      
                        </div>
                        <div class="col-xl-6">
                            <div class="faq-content-box martop30">
                                <ul>
                                    <?php foreach($right_arr as $key => $right_content):?>
										<?php echo wp_kses_post($right_content);?>
                                    <?php endforeach;?>
                                </ul>
                            </div>      
                        </div>
                        
                    </div>
                </div>
            </section>
            <!--Start End Content Area-->
            
        <?php }
		wp_reset_postdata();
	}

}
