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
class Classic_Portfolio_V5 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'jixic_classic_portfolio_v5';
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
		return esc_html__( 'Classic Portfolio V5', 'jixic' );
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
			'Classic_Portfolio_V5',
			[
				'label' => esc_html__( 'Classic Portfolio V5', 'jixic' ),
			]
		);
		$this->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number of post', 'fixkar' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'fixkar' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'fixkar' ),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'fixkar' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'fixkar' ),
					'ASC'  => esc_html__( 'ASC', 'fixkar' ),
				),
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'fixkar' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'fixkar' ),
					'title'      => esc_html__( 'Title', 'fixkar' ),
					'menu_order' => esc_html__( 'Menu Order', 'fixkar' ),
					'rand'       => esc_html__( 'Random', 'fixkar' ),
				),
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
		
		$paged = get_query_var('paged');
		$paged = jixic_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-fixkar' );
		$args = array(
			'post_type'      => 'jixic_project',
			'posts_per_page' => jixic_set( $settings, 'number' ),
			'orderby'        => jixic_set( $settings, 'query_orderby' ),
			'order'          => jixic_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",jixic_set( $settings, 'cat_exclude' ));
		if(jixic_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'project_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'project_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'project_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	?>
            
            <!--Start Single Portfolio Style6-->
            <div class="col-xl-4 col-lg-6 filter-item <?php echo esc_attr($term_slug); ?>">
                <div class="single-portfolio-style7">
                    <div class="img-holder">
                        <?php 
							$dimention = get_post_meta( get_the_id(), 'dimension', true );
							if($dimention == 'extra_width'){
								$image_size = 'jixic_960x420';
							}
							else{
								$image_size = 'jixic_480x415'; 
							}
							the_post_thumbnail($image_size);
						?>
                        <div class="title">
                            <a href="<?php echo (get_post_meta( get_the_id(), 'project_link', true ));?>"><?php the_title(); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Single Portfolio Style6-->
            
            <?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('project_cat')); ?>
            
            <!--Start Portfolio Style7 Area-->
            <section class="portfolio-style7-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="project-filter post-filter has-dynamic-filters-counter text-center">
                                <li data-filter=".filter-item" class="active"><span class="filter-text"><?php esc_attr_e('View All', 'jixic');?></span></li>
                                <?php foreach( $fliteration as $t ): ?>
                                <li data-filter=".<?php echo esc_attr(jixic_set( $t, 'slug' )); ?>"><span class="filter-text"><?php echo jixic_set( $t, 'name'); ?></span></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row filter-layout masonary-layout">
                        <?php echo wp_kses($data_posts, $allowed_tags); ?>
                    </div>
                </div>    
            </section>
            <!--End Portfolio Style7 Area-->
            
    	<?php }
	}

}
