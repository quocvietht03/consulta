<?php
class consulta_framework_metaboxes {
	public function __construct(){
		global $consulta_options;
		$this->data = $consulta_options;
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('save_post', array($this, 'save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	function admin_script_loader() {
		global $pagenow;
		if (is_admin() && ($pagenow=='post-new.php' || $pagenow=='post.php')) {
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-sortable');
			wp_enqueue_style('tb-metabox', consulta_URI_PATH_FR.'/meta-boxes/assets/css/metabox.css');
			wp_enqueue_style('colorpicker', consulta_URI_PATH_FR.'/meta-boxes/assets/css/colorpicker.css');
			wp_enqueue_style('datepicker', consulta_URI_PATH_FR.'/meta-boxes/assets/css/datepicker.css');
			
			wp_enqueue_script('jcolpick', consulta_URI_PATH_FR.'/meta-boxes/assets/js/colpick.js');
			wp_enqueue_script('datepicker.min', consulta_URI_PATH_FR.'/meta-boxes/assets/js/datepicker.min.js');
			wp_enqueue_script('tb-upload', consulta_URI_PATH_FR.'/meta-boxes/assets/js/upload.js');
			wp_enqueue_script('jquery-easytabs', consulta_URI_PATH_FR.'/meta-boxes/assets/js/jquery.easytabs.min.js');
			wp_enqueue_script('blog-tabs', consulta_URI_PATH_FR.'/meta-boxes/assets/js/blog.tab.js');
			wp_enqueue_script('meta-box', consulta_URI_PATH_FR.'/meta-boxes/assets/js/meta.box.js');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
			wp_enqueue_style('thickbox');
		}
	}
	public function add_meta_boxes()
	{
		$post_types = get_post_types( array( 'public' => true ) );
		$this->add_meta_box('post_options', __('Page Options','consulta'), 'page');
		$this->add_meta_box('post_video', __('Video Settings','consulta'), 'post');
		$this->add_meta_box('post_audio', __('Audio Settings','consulta'), 'post');
		$this->add_meta_box('post_quote', __('Quote Settings','consulta'), 'post');
		$this->add_meta_box('post_link', __('Link Settings','consulta'), 'post');
		$this->add_meta_box('post_gallery', __('Gallery Settings','consulta'), 'post');
		$this->add_meta_box('post_portfolio', __('Portfolio Settings','consulta'), 'portfolio');
		$this->add_meta_box('post_team', __('Team Settings','consulta'), 'team');
		$this->add_meta_box('post_testimonial', __('Testimonial Settings','consulta'), 'testimonial');
		$this->add_meta_box('post_testimonial', __('Testimonial Settings','consulta'), 'testimonial');
		$this->add_meta_box('post_product', __('Product Settings','consulta'), 'product');
	}
	public function save_meta_boxes($post_id)
	{
		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		foreach($_POST as $key => $value) {
			if(strstr($key, 'consulta_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}
	public function add_meta_box($id, $label, $post_type)
	{
		add_meta_box(
		'consulta_' . $id,
		$label,
		array($this, $id),
		$post_type
		);
	}
	public function post_options()
	{
		$data = $this->data;
		include get_template_directory() .'/framework/meta-boxes/blog_options.php';
	}
	public function post_video()
	{
		include get_template_directory() .'/framework/meta-boxes/post_video.php';
	}
	public function post_audio()
	{
		include get_template_directory() .'/framework/meta-boxes/post_audio.php';
	}
	public function post_quote()
	{
		include get_template_directory() .'/framework/meta-boxes/post_quote.php';
	}
	public function post_link()
	{
		include get_template_directory() .'/framework/meta-boxes/post_link.php';
	}
	public function post_gallery()
	{
		include get_template_directory() .'/framework/meta-boxes/post_gallery.php';
	}
	public function post_portfolio()
	{
		include get_template_directory() .'/framework/meta-boxes/post_portfolio.php';
	}
	public function post_team()
	{
		include get_template_directory() .'/framework/meta-boxes/post_team.php';
	}
	public function post_testimonial()
	{
		include get_template_directory() .'/framework/meta-boxes/post_testimonial.php';
	}
	public function post_product()
	{
		include get_template_directory() .'/framework/meta-boxes/post_product.php';
	}
	public function text($id, $label, $default, $desc = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'consulta_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input type="text" id="consulta_' . $id . '" name="consulta_' . $id . '" value="' . $value . '" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}
	public function checkbox($id, $label, $default, $desc = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'consulta_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field tb-checkbox">';
		$html .= '<input type="hidden" id="consulta_' . $id . '" name="consulta_' . $id . '" value="' . $value . '" />';
		$html .= '<input type="checkbox"/>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}
	public function text_date($id, $label, $default, $desc = '')
	{
		global $post;
		$value = get_post_meta($post->ID, 'consulta_' . $id, true);
		if (!$value){
			$value = $default;
		}
		$html = '';
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input type="text" id="consulta_' . $id . '" class="bt-date-picker" name="consulta_' . $id . '" value="' . $value . '" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}
	public function hidden($id){
		global $post;
		$html = '<input type="hidden" id="consulta_' . $id . '" name="consulta_' . $id . '" value="' . get_post_meta($post->ID, 'consulta_' . $id, true) . '" />';
		echo ''.$html;
	}
	public function select($id, $label, $options,$default, $desc = '')
	{
		global $post;
		$html = null;
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<select id="consulta_' . $id . '" name="consulta_' . $id . '">';                
		$value = get_post_meta($post->ID, 'consulta_' . $id, true);
		$default = $value == '' ? $default ='global': $value;
                
		foreach($options as $key => $option) {
                    $selected = $default === (string)$key?'selected="selected"':null;
                    $html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
		}
		$html .= '</select>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}

	public function multiple($id, $label, $options, $desc = '')
	{
		global $post;

		$html = '';
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<select multiple="multiple" id="consulta_' . $id . '" name="consulta_' . $id . '[]">';
		foreach($options as $key => $option) {
			if(is_array(get_post_meta($post->ID, 'consulta_' . $id, true)) && in_array($key, get_post_meta($post->ID, 'consulta_' . $id, true))) {
				$selected = 'selected="selected"';
			} else {
				$selected = '';
			}

			$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
		}
		$html .= '</select>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}

	public function textarea($id, $label, $desc = '')
	{
		global $post;

		$html = '';
		$html = '';
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<textarea cols="30" rows="5" id="consulta_' . $id . '" name="consulta_' . $id . '">' . get_post_meta($post->ID, 'consulta_' . $id, true) . '</textarea>';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}

	public function upload($id, $label, $desc = '')
	{
		global $post;
		$html = '';
		$html = '';
		$html .= '<div id="consulta_metabox_field_'.$id.'" class="consulta_metabox_field">';
		$html .= '<label for="consulta_' . $id . '">';
		$html .= $label;
		$html .= '</label>';
		$html .= '<div class="field">';
		$html .= '<input name="consulta_' . $id . '" class="upload_field" id="consulta_' . $id . '" type="text" value="' . get_post_meta($post->ID, 'consulta_' . $id, true) . '" />';
		$html .= '<input class="consulta_upload_button button button-primary button-large" type="button" value="Browse" />';
		if($desc) {
			$html .= '<p>' . $desc . '</p>';
		}
		$html .= '</div>';
		$html .= '</div>';

		echo ''.$html;
	}
}
$metaboxes = new consulta_framework_metaboxes();