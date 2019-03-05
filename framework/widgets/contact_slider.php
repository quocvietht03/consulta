<?php
class consulta_Contact_Slider_Widget extends consulta_Widget {
	function __construct() {
		parent::__construct(
			'consulta_contact_slider', // Base ID
			__('Contact slider', 'consulta'), // Name
			array('description' => __('Display a slider of your posts on your site.', 'consulta'),) // Args
        );
		
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Contact Slider', 'consulta' ),
				'label' => __( 'Title', 'consulta' )
			),
			'team_category' => array(
				'type'   => 'consulta_taxonomy',
				'std'    => '',
				'label'  => __( 'Categories', 'consulta' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 2,
				'max'   => '',
				'std'   => 3,
				'label' => __( 'Number of slider to show', 'consulta' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => __( 'Order by', 'consulta' ),
				'options' => array(
					'none'   => __( 'None', 'consulta' ),
					'comment_count'  => __( 'Comment Count', 'consulta' ),
					'title'  => __( 'Title', 'consulta' ),
					'date'   => __( 'Date', 'consulta' ),
					'ID'  => __( 'ID', 'consulta' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => __( 'Order', 'consulta' ),
				'options' => array(
					'none'  => __( 'None', 'consulta' ),
					'asc'  => __( 'ASC', 'consulta' ),
					'desc' => __( 'DESC', 'consulta' ),
				)
			),
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Extra Class', 'consulta' )
			)
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}
        
	function widget_scripts() {
		wp_enqueue_script('widget_scripts', consulta_URI_PATH . '/framework/widgets/widgets.js');
	}

	function widget( $args, $instance ) {

		ob_start();
		global $post;
		extract( $args );
                
		$title                  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category               = isset($instance['team_category'])? $instance['team_category'] : '';
		$posts_per_page         = absint( $instance['posts_per_page'] );
		$orderby                = sanitize_title( $instance['orderby'] );
		$order                  = sanitize_title( $instance['order'] );
		$el_class               = sanitize_title( $instance['el_class'] );
                
		echo ''.$before_widget;

		if ( $title )
				echo ''.$before_title . $title . $after_title;
		
		$query_args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'team',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'team_category',
										'field' => 'slug',
										'terms' => $category
									)
							);
		}
		
		$wp_query = new WP_Query($query_args);                
		
		if ($wp_query->have_posts()){
			?>
			<div class="bt-contact-slider">
				<div class="owl-carousel" data-col_lg="1" data-col_md="1" data-col_sm="1" data-col_xs="1" data-item_space="30" data-loop="true" data-autoplay="false" data-smartspeed="700" data-nav="true" data-dots="false">
					<?php while ($wp_query->have_posts()){ $wp_query->the_post(); ?>
						<article <?php post_class(); ?>>
							<?php 
							/* get thumbnail */
								if( has_post_thumbnail() ){
									$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
									echo '<a href="'.get_the_permalink().'"><div class="bt-thumb" style="background: url('.esc_url($thumbnail_data[0]).') no-repeat top center / cover, #333"></div></a>';
								}
							?>
							<h6 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
							<div class="bt-position"><?php echo get_post_meta(get_the_ID(),'consulta_team_position',true); ?></div>
							<ul class="bt-meta">
								<li>
									<?php
										$team_email = get_post_meta(get_the_ID(),'consulta_team_email',true);
										if($team_email) echo __('Email: ', 'consulta').$team_email;
									?>
								</li>
								<li>
									<?php
										$team_skype = get_post_meta(get_the_ID(),'consulta_team_skype',true);
										if($team_skype) echo __('Skype: ', 'consulta').$team_skype;
									?>
								</li>
							</ul>
						</article>
					<?php } ?>
				</div>
			</div>
		<?php 
		}
		
		wp_reset_postdata();

		echo ''.$after_widget;
                
		$content = ob_get_clean();

		echo ''.$content;
		
	}
}
/* Class consulta_Contact_Slider_Widget */
function consulta_Contact_Slider_Widget() {
    register_widget('consulta_contact_slider_widget');
}

add_action('widgets_init', 'consulta_contact_slider_widget');
