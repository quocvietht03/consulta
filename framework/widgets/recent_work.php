<?php
class consulta_Recent_Work_Widget extends consulta_Widget {
	function __construct() {
		parent::__construct(
			'consulta_recent_work', // Base ID
			__('Recent Work', 'consulta'), // Name
			array('description' => __('Display a list of your posts on your site.', 'consulta'),) // Args
        );
		
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Recent Work', 'consulta' ),
				'label' => __( 'Title', 'consulta' )
			),
			'portfolio_category' => array(
				'type'   => 'consulta_taxonomy',
				'std'    => '',
				'label'  => __( 'Categories', 'consulta' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 8,
				'label' => __( 'Number of posts to show', 'consulta' )
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
		$category               = isset($instance['portfolio_category'])? $instance['portfolio_category'] : '';
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
			'post_type' => 'portfolio',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'portfolio_category',
										'field' => 'slug',
										'terms' => $category
									)
							);
		}
		
		$wp_query = new WP_Query($query_args);	
		
		if ($wp_query->have_posts()){
			?>
			<div class="bt-recent-work">
				<div class="owl-carousel" data-col_lg="3" data-col_md="3" data-col_sm="3" data-col_xs="3" data-item_space="10" data-loop="true" data-autoplay="false" data-smartspeed="700" data-nav="true" data-dots="false">
				<?php
					$count = $wp_query->post_count;
					$i = 0; 
					while ($wp_query->have_posts()){ $wp_query->the_post();
					
						if($i % 2 == 0) echo '<div class="bt-items">';
						?>
							<div class="bt-item" style="margin-bottom: 10px;">
								<?php if( has_post_thumbnail() ) the_post_thumbnail('thumbnail');?>
								<div class="bt-overlay">
									<a href="<?php the_permalink(); ?>"><i class="fa fa-link"></i></a>
								</div>
							</div>
						<?php
						if($i % 2 == 1 || $i == $count - 1) echo '</div>';
						$i++;
					}
				?>
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
/* Class consulta_Recent_Work_Widget */
function consulta_Recent_Work_Widget() {
    register_widget('consulta_Recent_Work_Widget');
}

add_action('widgets_init', 'consulta_Recent_Work_Widget');
