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
class Modern_Portfolio extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_modern_portfolio';
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
		return esc_html__( 'Modern Portfolio', 'jixic' );
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
			'modern_portfolio',
			[
				'label' => esc_html__( 'Modern Portfolio', 'jixic' ),
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
				  'options' => get_project_categories()
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
			'post_type'      => 'jixic_project',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		if( jixic_set( $settings, 'query_category' ) ) $args['project_cat'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ 
		$dimention = get_post_meta( get_the_id(), 'dimension', true );
		?>
		
        <!--Start portfolio Style9 area-->    
        <section class="portfolio-style9-area"  style="background-image:url('<?php echo esc_url( $settings['bg_img']['url']); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="portfolio-style9-content">
                            <div class="portfolio-style9-carousel owl-carousel owl-theme style1">
                                <?php
									global $post;
									while ( $query->have_posts() ) : $query->the_post(); 
									$term_list = wp_get_post_terms(get_the_id(), 'project_cat', array("fields" => "names"));
									$overlay_img = get_post_meta( get_the_id(), 'overlay_img', true );
								?>
                                <!--Start Single Portfolio Style9-->
                                <div class="single-portfolio-style9 clearfix">
                                    <div class="name"><?php echo implode( ', ', (array)$term_list );?></div>
                                    <div class="static-content text-center">   
                                        <div class="img-holder">
                                            <?php the_post_thumbnail('jixic_970x500'); ?>
                                            <div class="overlay">
                                                <div class="big-title"><?php the_title(); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overlay-content text-center">
                                        <div class="img-outer">
                                            <div class="img-holder">
                                                <img src="<?php echo esc_url($overlay_img['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>">
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <div class="big-title"><?php the_title(); ?></div>
                                            <p><?php echo wp_kses(jixic_trim(get_the_content(), $settings['text_limit']), $allowed_tags); ?></p>
                                            <a href="<?php echo (get_post_meta( get_the_id(), 'project_link', true ));?>"><?php esc_html_e('Explore', 'jixic'); ?></a>
                                        </div>    
                                    </div>  
                                </div>
                                <!--End Single Portfolio Style9-->
                                <?php endwhile; ?>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>    
        </section>
        <!--End portfolio Style9 area-->
        
        <?php }
		wp_reset_postdata();
	}

}
