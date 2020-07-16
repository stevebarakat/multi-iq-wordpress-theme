<?php
/*
Plugin Name: Multi IQ Newsletters
Description: A simple plugin to display Newsletters for the MultiIQ Theme
Author: S.Barakat
Author URI: http://www.stevebarakat.com
Version: 1.0
*/
class Multi_IQ_Newsletters {
	
	
	public function __construct() {
		
		add_action( 'init', array( &$this, 'init' ) );
		
		if ( is_admin() ) {
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
		}
	}
	
	
	/** Frontend methods ******************************************************/
	
	
	/**
	 * Register the custom post type
	 */
	public function init() {
	    register_post_type( 'newsletter', array( 'supports' => array( 'title', 'editor', 'thumbnail' ), 'public' => true, 'has_archive' => true, 'label' => 'Newsletters' ) );
	}
	
	
	/** Admin methods ******************************************************/
	
	
	/**
	 * Initialize the admin, adding actions to properly display and handle 
	 * the Newsletter custom post type add/edit page
	 */
	public function admin_init() {
		global $pagenow;
		
		if ( $pagenow == 'post-new.php' || $pagenow == 'post.php' || $pagenow == 'edit.php' ) {
			
			add_action( 'add_meta_boxes', array( &$this, 'meta_boxes' ) );
			add_filter( 'enter_title_here', array( &$this, 'enter_title_here' ), 1, 2 );
			
			add_action( 'save_post', array( &$this, 'meta_boxes_save' ), 1, 2 );
		}
	}
	
	
	/**
	 * Save meta boxes
	 * 
	 * Runs when a post is saved and does an action which the write panel save scripts can hook into.
	 */
	public function meta_boxes_save( $post_id, $post ) {
		if ( empty( $post_id ) || empty( $post ) || empty( $_POST ) ) return;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
		if ( is_int( wp_is_post_revision( $post ) ) ) return;
		if ( is_int( wp_is_post_autosave( $post ) ) ) return;
		if ( ! current_user_can( 'edit_post', $post_id ) ) return;
		if ( $post->post_type != 'newsletter' ) return;
			
		$this->process_newsletter_meta( $post_id, $post );
	}
	
	
	/**
	 * Function for processing and storing all newsletter data.
	 */
	private function process_newsletter_meta( $post_id, $post ) {
		update_post_meta( $post_id, '_image_id', $_POST['upload_image_id'] );
	}
	
	
	/**
	 * Set a more appropriate placeholder text for the New Newsletter title field
	 */
	public function enter_title_here( $text, $post ) {
		if ( $post->post_type == 'newsletter' ) return __( 'Newsletter Title' );
		return $text;
	}
	
	
	/**
	 * Add and remove meta boxes from the edit page
	 */
	public function meta_boxes() {
		add_meta_box( 'newsletter-image', __( 'Newsletter Header Image' ), array( &$this, 'newsletter_image_meta_box' ), 'newsletter', 'normal', 'high' );
	}
	
	
	/**
	 * Display the image meta box
	 */
	public function newsletter_image_meta_box() {
		global $post;
		
		$image_src = '';
		
		$image_id = get_post_meta( $post->ID, '_image_id', true );
		$image_src = wp_get_attachment_url( $image_id );
		
		?>
		<img id="newsletter_image" src="<?php echo $image_src ?>" style="max-width:100%;" />
		<input type="hidden" name="upload_image_id" id="upload_image_id" value="<?php echo $image_id; ?>" />
		<p>
			<a title="<?php esc_attr_e( 'Set newsletter header image', 'multi-iq' ) ?>" href="#" id="set-newsletter-image"><?php _e( 'Set newsletter header image', 'multi-iq' ) ?></a>
			<a title="<?php esc_attr_e( 'Remove newsletter header image', 'multi-iq' ) ?>" href="#" id="remove-newsletter-image" style="<?php echo ( ! $image_id ? 'display:none;' : '' ); ?>"><?php _e( 'Remove newsletter header image', 'multi-iq' ) ?></a>
		</p>
		
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			
			// save the send_to_editor handler function
			window.send_to_editor_default = window.send_to_editor;
	
			$('#set-newsletter-image').click(function(){
				
				// replace the default send_to_editor handler function with our own
				window.send_to_editor = window.attach_image;
				tb_show('', 'media-upload.php?post_id=<?php echo $post->ID ?>&amp;type=image&amp;TB_iframe=true');
				
				return false;
			});
			
			$('#remove-newsletter-image').click(function() {
				
				$('#upload_image_id').val('');
				$('img').attr('src', '');
				$(this).hide();
				
				return false;
			});
			
			// handler function which is invoked after the user selects an image from the gallery popup.
			// this function displays the image and sets the id so it can be persisted to the post meta
			window.attach_image = function(html) {
				
				// turn the returned image html into a hidden image element so we can easily pull the relevant attributes we need
				$('body').append('<div id="temp_image">' + html + '</div>');
					
				var img = $('#temp_image').find('img');
				
				imgurl   = img.attr('src');
				imgclass = img.attr('class');
				imgid    = parseInt(imgclass.replace(/\D/g, ''), 10);
	
				$('#upload_image_id').val(imgid);
				$('#remove-newsletter-image').show();
	
				$('img#newsletter_image').attr('src', imgurl);
				try{tb_remove();}catch(e){};
				$('#temp_image').remove();
				
				// restore the send_to_editor handler function
				window.send_to_editor = window.send_to_editor_default;
				
			}
	
		});
		</script>
		<?php
	}
}

// finally instantiate our plugin class and add it to the set of globals
$GLOBALS['multi_iq_newsletters'] = new Multi_IQ_Newsletters();