<?php
///----Blog widgets---
//Trending Post 
class Jixic_Trending_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Trending_Post', /* Name */esc_html__('jixic Trending Post','jixic'), array( 'description' => esc_html__('Show the Trending Post', 'jixic' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start single sidebar--> 
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <ul class="trending-post">
           <?php $query_string = 'posts_per_page='.$instance['number'];
				if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
				 
				$this->posts($query_string);
			?>
        </ul>
        <!--End single sidebar-->
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Trending Post', 'jixic');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'jixic'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'jixic'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while( $query->have_posts() ): $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <figure class="post-image" style="background-image:url(<?php echo esc_url($post_thumbnail_url);?>)"></figure>
                <div class="img-holder">
                    <div class="overlay-style-one"></div>
                </div>
                <div class="title-holder">
                    <span><?php echo get_the_date();?></span>
                    <h5 class="post-title"><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php echo wp_trim_words( get_the_title(), 5, '...' );?></a></h5>
                </div>
            </li>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Project
class Jixic_Our_Projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Our_Projects', /* Name */esc_html__('jixic Our Projects','jixic'), array( 'description' => esc_html__('Show the Our Projects', 'jixic' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start single-sidebar-->    
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <ul class="instagram">
            <?php 
				$args = array('post_type' => 'jixic_project', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
				 
				$this->posts($args);
			?>
        </ul>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Our Projects';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Our Projects', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'jixic'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'jixic'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <li>
                <div class="img-holder">
                    <?php the_post_thumbnail('jixic_140x140'); ?>
                    <div class="overlay-style-one">
                        <div class="box">
                            <div class="inner">
                                <a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><span class="icon-zoom-in"></span></a>    
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Blog Newsletter
class Jixic_Blog_Newsletter extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Blog_Newsletter', /* Name */esc_html__('jixic Blog Newsletter','jixic'), array( 'description' => esc_html__('Show the Blog Newsletter', 'jixic' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Start single-sidebar-->
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <form class="newsletter-form" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                <input type="hidden" id="uri7" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                <input type="email" name="email" placeholder="<?php esc_html_e('Email Address...', 'jixic'); ?>">    
                <button type="submit"><?php esc_html_e('Subscribe Us', 'jixic'); ?></button> 
            </form> 
            <!--End single-sidebar-->
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Newsletter';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Newsletter', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
                
		<?php 
	}
	
}


///----footer widgets---
//About Us
class Jixic_About_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_About_Us', /* Name */esc_html__('jixic About Us','jixic'), array( 'description' => esc_html__('Show the information about company', 'jixic' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="marbtm50">
                <div class="footer-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($instance['footer_logo']); ?>" alt="<?php esc_attr_e('Awesome Image', 'jixic'); ?>" title="Logo"></a>    
                </div>
                <div class="footer-company-info-text">
                    <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                    <ul>
                        <li><?php echo wp_kses_post($instance['address']); ?></li>
                        <li><?php echo wp_kses_post($instance['phone_no']); ?></li>
                        <li><?php echo wp_kses_post($instance['email_address']); ?></li>
                    </ul>
                </div>  
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['footer_logo'] = strip_tags($new_instance['footer_logo']);
		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$footer_logo = ($instance) ? esc_attr($instance['footer_logo']) : 'http://el.commonsupport.com/newwp/jixic/wp-content/uploads/2020/06/footer-logo.png';
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('footer_logo')); ?>"><?php esc_html_e('Footer Logo Image Url:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Logo url', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_logo')); ?>" name="<?php echo esc_attr($this->get_field_name('footer_logo')); ?>" type="text" value="<?php echo esc_attr($footer_logo); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Newyork', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('+321(00)8884455', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Address:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('supportyou@example.com', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p> 
               
                
		<?php 
	}
	
}

//Newsletter
class Jixic_Newsletter extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Newsletter', /* Name */esc_html__('jixic Newsletter','jixic'), array( 'description' => esc_html__('Show the Newsletter', 'jixic' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="martop30">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="subscribe-box">
                    <div class="text">
                        <p><?php echo wp_kses_post($instance['content']); ?></p>
                    </div>
                    <form class="subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                        <input type="hidden" id="uri4" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                        <input type="email" name="email" placeholder="<?php esc_html_e('Email...', 'jixic'); ?>">
                        <button type="submit"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </form>
                    <?php if( $instance['show'] ): ?>
                    <div class="footer-social-links">
                        <ul class="sociallinks-style-two">
                            <?php echo wp_kses_post(jixic_get_social_icons()); ?>
                        </ul>
                    </div> 
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Newsletter';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Newsletter', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'jixic'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
                
		<?php 
	}
	
}


///----footer Two widgets---
//About Us
class Jixic_About_Us_Two extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_About_Us_Two', /* Name */esc_html__('jixic About Us Two','jixic'), array( 'description' => esc_html__('Show the information about company', 'jixic' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="marbtm50">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="footer-company-info-text">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                    <p class="mar0"><?php echo wp_kses_post($instance['content_two']); ?></p>
                </div> 
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['content_two'] = $new_instance['content_two'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$content_two = ($instance) ? esc_attr($instance['content_two']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('About Company', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content_two')); ?>"><?php esc_html_e('Next Description:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content_two')); ?>" name="<?php echo esc_attr($this->get_field_name('content_two')); ?>" ><?php echo wp_kses_post($content_two); ?></textarea>
        </p>
               
                
		<?php 
	}
	
}

//Newsletter
class Jixic_Newsletter_Two extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Newsletter_Two', /* Name */esc_html__('jixic Newsletter Two','jixic'), array( 'description' => esc_html__('Show the Newsletter Two', 'jixic' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="pdtop50">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="subscribe-box">
                    <div class="text">
                        <p><?php echo wp_kses_post($instance['content']); ?></p>
                    </div>
                    <form class="subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                        <input type="hidden" id="uri5" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                        <input type="email" name="email" placeholder="<?php esc_html_e('Email...', 'jixic'); ?>">
                        <button type="submit"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </form>
                    <?php if( $instance['show'] ): ?>
                    <div class="footer-social-links">
                        <ul class="sociallinks-style-two">
                            <?php echo wp_kses_post(jixic_get_social_icons()); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Newsletter';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Newsletter', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'jixic'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
                
		<?php 
	}
	
}


///----footer Three widgets---
//Start Your Project
class Jixic_Start_Your_Projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Start_Your_Projects', /* Name */esc_html__('jixic Start Your Project','jixic'), array( 'description' => esc_html__('Show the Start Your Project', 'jixic' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Service List Box -->
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>    
        <div class="project-content">
            <h2><?php echo wp_kses_post($instance['content']); ?><br> <a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></h2>
            <ul class="clearfix">
                <?php 
					$args = array('post_type' => 'jixic_project', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
					 
					$this->posts($args);
				?>
            </ul>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Start your Project';
		$content = ( $instance ) ? esc_attr($instance['content']) : '';
		$email_address = ( $instance ) ? esc_attr($instance['email_address']) : '';
		$number = ( $instance ) ? esc_attr($instance['number']) : 5;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Start your Project', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Address:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'jixic'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'jixic'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <li class="wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1200ms"> 
                <div class="img-holder">
                    <?php the_post_thumbnail('jixic_98x98'); ?>
                    <div class="overlay-style-one">
                        <div class="box">
                            <div class="inner">
                                <a href="<?php echo (get_post_meta( get_the_id(), 'project_link', true ));?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>    
                </div>
            </li>
            
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Get in Touch
class Jixic_Get_in_Touch extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Get_in_Touch', /* Name */esc_html__('jixic Get in Touch','jixic'), array( 'description' => esc_html__('Show the Get in Touch', 'jixic' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="project-style martop40">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="subscribe-box">
                    <div class="text">
                        <p><?php echo wp_kses_post($instance['address']); ?></p>
                        <p><?php echo wp_kses_post($instance['phone_number']); ?></p>
                    </div>
                    <form class="subscribe-form" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                        <input type="hidden" id="uri6" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                        <input type="email" name="email" placeholder="<?php esc_html_e('Email Address...', 'jixic'); ?>">
                        <button type="submit"><?php esc_html_e('Subscribe', 'jixic'); ?></button>
                    </form>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['phone_number'] = $new_instance['phone_number'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Get in Touch';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$phone_number = ($instance) ? esc_attr($instance['phone_number']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Get in Touch', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'jixic'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_number')); ?>"><?php esc_html_e('Enter Phone Number:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('+321(00)888-44-55&66', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_number')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_number')); ?>" type="text" value="<?php echo esc_attr($phone_number); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
               
                
		<?php 
	}
	
}



///----footer Four widgets---
//Trending Post 
class Jixic_Trending_Post_Two extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Trending_Post_Two', /* Name */esc_html__('jixic Trending Post Two','jixic'), array( 'description' => esc_html__('Show the Trending Post Two', 'jixic' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start single sidebar--> 
        <?php echo wp_kses_post($before_title.$title.$after_title); ?>
        <ul class="trending-post">
            <?php $query_string = 'posts_per_page='.$instance['number'];
				if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
				 
				$this->posts($query_string);
			?>    
        </ul>
		<!--End single sidebar-->
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Trending Post', 'jixic');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'jixic'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'jixic'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				while( $query->have_posts() ): $query->the_post();
			?>
            <li>
                <span><?php echo get_the_date();?></span>
                <h6><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php echo wp_trim_words( get_the_title(), 6, '...' );?></a></h6>
            </li>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Latest Projects
class Jixic_Latest_Projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Jixic_Latest_Projects', /* Name */esc_html__('jixic Latest Projects','jixic'), array( 'description' => esc_html__('Show the Latest Projects', 'jixic' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start single-sidebar-->    
        <div class="pdtop50">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <ul class="lat-projects clearfix">
                <?php 
					$args = array('post_type' => 'jixic_project', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
					 
					$this->posts($args);
				?>  
            </ul>    
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Latest Projects';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'jixic'); ?></label>
            <input placeholder="<?php esc_attr_e('Our Projects', 'jixic');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'jixic'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'jixic'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'jixic'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <li>
                <div class="img-holder">
                    <?php the_post_thumbnail('jixic_82x82'); ?>
                    <div class="overlay-style-one bg2">
                        <div class="box">
                            <div class="inner">
                                <a href="<?php echo (get_post_meta( get_the_id(), 'project_link', true ));?>"><span class="icon-zoom-in"></span></a>    
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}
