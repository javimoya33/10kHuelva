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
class Our_Team_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_our_team_v5';
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
		return esc_html__( 'Our Team V5', 'jixic' );
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
			'our_team_v5',
			[
				'label' => esc_html__( 'Our Team V5', 'jixic' ),
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
				  'options' => get_team_categories()
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
			'post_type'      => 'jixic_team',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		
		if( jixic_set( $settings, 'query_category' ) ) $args['team_cat'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <!--Start Team Area-->
        <section class="team-area team-page" style="background-image:url(<?php echo esc_url($settings['bg_img']['url']);?>);">
            <div class="container">
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <!--Start Single Team Member-->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="single-team-member">
                            <div class="img-holder">
                                <?php the_post_thumbnail('jixic_270x300'); ?>
                                <?php
									$icons = get_post_meta( get_the_id(), 'social_profile', true );
									if ( ! empty( $icons ) ) :
								?>
                                <ul class="sociallinks">
                                    <?php
									foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( jixic_set( $h_icon, 'data' ) ) );
									if ( jixic_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', jixic_set( $header_social_icons, 'icon' ) );
									?>
									<li><a href="<?php echo jixic_set( $header_social_icons, 'url' ); ?>" style="background-color:<?php echo jixic_set( $header_social_icons, 'background' ); ?>; color: <?php echo jixic_set( $header_social_icons, 'color' ); ?>"><i class="fa <?php echo esc_attr( jixic_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
									<?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                                <div class="round-box"></div>
                                <div class="round-box-top"></div>
                            </div>
                            <div class="name text-center">
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>
                            </div>
                        </div>
                    </div> 
                    <!--End Single Team Member-->
                    <?php endwhile; ?>
                </div>    
            </div> 
        </section>
        <!--End Team Area-->
        
        <?php }
		wp_reset_postdata();
	}

}
