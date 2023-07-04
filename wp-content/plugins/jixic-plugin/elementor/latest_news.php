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
class Latest_News extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_latest_news';
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
		return esc_html__( 'Latest News', 'jixic' );
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
			'latest_news',
			[
				'label' => esc_html__( 'latest News', 'jixic' ),
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
				'placeholder' => __( 'Enter your Sub title', 'jixic' ),
				'default'     => __( 'News & Updates', 'jixic' ),
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
				'default'     => __( 'Latest from our blog', 'jixic' ),
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
				  'options' => get_blog_categories()
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
			'post_type'      => 'post',
			'posts_per_page' => jixic_set( $settings, 'query_number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( jixic_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = jixic_set( $settings, 'query_exclude' );
		}
		if( jixic_set( $settings, 'query_category' ) ) $args['category_name'] = jixic_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
			
        <!--Start latest blog area-->
        <section class="latest-blog-area">
            <div class="container inner-content">
                <div class="sec-title-style1 pdb-52 text-center">
                    <div class="title">
                        <span class="dotted-left"><span class="dot"></span></span>
                            <span><?php echo wp_kses( $settings['subtitle'], true );?></span>
                        <span class="dotted-right"><span class="dot"></span></span>
                    </div>
                    <div class="big-title"><?php echo wp_kses( $settings['title'], true );?></div>
                </div>
                <div class="row">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <!--Start single blog post-->
                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="single-blog-post wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <div class="img-holder">
                                <?php the_post_thumbnail('jixic_370x310'); ?>
                                <div class="overlay-style-one bg2">
                                    <div class="box">
                                        <div class="inner">
                                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span class="icon-zoom-in"></span></a>    
                                        </div>
                                    </div>
                                </div>
                                <div class="author-info">
                                    <div class="img-box">
                                        <?php if($avatar = get_avatar(get_the_author_meta('ID')) !== FALSE): ?>
											<?php echo get_avatar(get_the_author_meta('ID'), 35); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="title-box">
                                        <h6><?php the_author(); ?></h6>
                                    </div>
                                </div>
                                <div class="date-box">
                                    <h3><?php echo get_the_date('d'); ?> <span><?php echo get_the_date('M Y'); ?></span></h3>
                                </div>
                            </div>
                            <div class="text-holder">
                                <div class="meta-box">
                                    <ul class="meta-info">
                                        <li><?php the_category(' ');?></li>
                                    </ul>  
                                </div> 
                                <h3 class="blog-title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                                <div class="reamore-button">
                                    <a class="thm-btn1" href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><span></span><?php esc_html_e('Leer más', 'jixic'); ?></a>    
                                </div> 
                            </div>
                        </div>
                    </div>
                    <!--End single blog post-->
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!--End latest blog area-->
          
        <?php }
		wp_reset_postdata();
	}

}
