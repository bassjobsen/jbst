<?php
/*
THIS PLUGIN WAS ORIGINALLY DEVELOPED BY JONATHAN LUNDSTROM. DETAILS BELOW:
COMMENTED OUT LINE 24

Description: A drag'n'drop replacement for the featured image.
Version: 1.0
Author: Jonathan Lundström
Author URI: http://www.jonathanlundstrom.me
License: GPLv2 or later

Code references and thanks to:
http://wordpress.org/support/topic/use-php-to-set-featured-image
http://wordpress.stackexchange.com/questions/33173/plupload-intergration-in-a-meta-box
*/
		
	// Add default options:
	add_option('drag-drop-post-types', array('post', 'page'));
	add_option('drag-drop-file-types', array('jpg', 'jpeg', 'png', 'gif', 'bmp'));
	
	
	// Add plugin actions:
	add_action('admin_init', 'dgd_removeDefaultBoxes');
//	add_action('admin_menu', 'dgd_setMenuPage');
	add_action('add_meta_boxes', 'dgd_addNewMetaBox');
	add_action('admin_enqueue_scripts', 'dgd_removeDefaultScripts');
	add_action('wp_ajax_photo_gallery_upload', 'dgd_ajaxPhotoUpload');
	
	
	// Remove the default thumbnail box:
	function dgd_removeDefaultBoxes(){
		$selected = array('post', 'page', 'product');
		foreach ($selected as $post_type){
			remove_post_type_support($post_type, 'thumbnail');
		}
	}
	
	// Include necessary scripts:
	function dgd_removeDefaultScripts(){

			wp_enqueue_script('plupload-all');
			wp_register_style('dgd_uploaderStyle', get_template_directory_uri() . '/library/plugins/drag-and-featured.css', false);
			wp_enqueue_style('dgd_uploaderStyle');
	}

	// Add the meta box to the edit page:
	function dgd_addNewMetaBox(){
		$selected = array('post', 'page', 'product');
		foreach ($selected as $post_type){
			add_meta_box('drag_to_upload', __('Featured Image', 'jamedo-bootstrap-start-theme'), 'dgd_upload_meta_box', $post_type, 'side', 'default');
		}
	}
	

	// Uploading functionality trigger:
	// (Most of the code comes from media.php and handlers.js)
	function dgd_upload_meta_box(){ ?>
		<div id="uploadContainer" style="margin-top: 10px;">
			
			<!-- Current image -->
			<div id="current-uploaded-image" class="<?php if (has_post_thumbnail()): ?>open<?php else: ?>closed<?php endif; ?>">
				<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail('full'); ?>
				<?php else: ?>
					<img class="attachment-full" src="" />
				<?php endif; ?>
				
				<?php global $post; ?>
				<?php $thumbnail_id = get_post_thumbnail_id($post->ID); ?>
				<?php $ajax_nonce = wp_create_nonce("set_post_thumbnail-$post->ID"); ?>
				<p class="hide-if-no-js"><a class="button-secondary" href="#" id="remove-post-thumbnail" onclick="WPRemoveThumbnail('<?php echo $ajax_nonce; ?>');return false;"><?php echo esc_html__('Remove featured image'); ?></a></p>
			</div>
			
			<!-- Uploader section -->
			<div id="uploaderSection" style="position: relative;">
				<div class="loading"><img src="<?php echo get_template_directory_uri() . '/library/plugins/loading.gif'; ?>" alt="Loading..." /></div>
				<div id="plupload-upload-ui" class="hide-if-no-js">
					<div id="drag-drop-area">
						<div class="drag-drop-inside">
							<p class="drag-drop-info"><?php _e('Drop files here', 'jamedo-bootstrap-start-theme'); ?></p>
							<p><?php _ex('or', 'Uploader: Drop files here - or - Select Files'); ?></p>
							<p class="drag-drop-buttons"><input id="plupload-browse-button" type="button" value="<?php esc_attr_e('Select Files'); ?>" class="button" /></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php
			global $post;
			$plupload_init = array(
				'runtimes'            => 'html5,silverlight,flash,html4',
				'browse_button'       => 'plupload-browse-button',
				'container'           => 'plupload-upload-ui',
				'drop_element'        => 'drag-drop-area',
				'file_data_name'      => 'async-upload',            
				'multiple_queues'     => true,
				'max_file_size'       => wp_max_upload_size().'b',
				'url'                 => admin_url('admin-ajax.php'),
				'flash_swf_url'       => includes_url('js/plupload/plupload.flash.swf'),
				'silverlight_xap_url' => includes_url('js/plupload/plupload.silverlight.xap'),
				'filters'             => array(array('title' => __('Allowed Files', 'jamedo-bootstrap-start-theme'), 'extensions' => implode(',', array('jpg', 'jpeg', 'png', 'gif', 'bmp')))),
				'multipart'           => true,
				'urlstream_upload'    => true,

				// Additional parameters:
				'multipart_params'    => array(
					'_ajax_nonce' => wp_create_nonce('photo-upload'),
					'action'      => 'photo_gallery_upload', // The AJAX action name
					'postID'	  => $post->ID
				),
			);

			// Apply filters to initiate plupload:
			$plupload_init = apply_filters('plupload_init', $plupload_init); ?>

			<script type="text/javascript">
				jQuery(document).ready(function($){

					// Create uploader and pass configuration:
					var uploader = new plupload.Uploader(<?php echo json_encode($plupload_init); ?>);

					// Check for drag'n'drop functionality:
					uploader.bind('Init', function(up){
						var uploaddiv = $('#plupload-upload-ui');
						
						// Add classes and bind actions:
						if(up.features.dragdrop){
							uploaddiv.addClass('drag-drop');
							$('#drag-drop-area')
								.bind('dragover.wp-uploader', function(){ uploaddiv.addClass('drag-over'); })
								.bind('dragleave.wp-uploader, drop.wp-uploader', function(){ uploaddiv.removeClass('drag-over'); });

						} else{
							uploaddiv.removeClass('drag-drop');
							$('#drag-drop-area').unbind('.wp-uploader');
						}
					});

					// Initiate uploading script:
					uploader.init();

					// File queue handler:
					uploader.bind('FilesAdded', function(up, files){
						var hundredmb = 100 * 1024 * 1024, max = parseInt(up.settings.max_file_size, 10);
						
						// Limit to one limit:
						if (files.length > 1){
							alert("You may only upload one image at a time!");
							return false;
						}
						
						// Loop through files:
						plupload.each(files, function(file){
							if (max > hundredmb && file.size > hundredmb && up.runtime != 'html5'){
								alert("The file you selected exceeds the maximum filesize specified in this installation.");
							} else{
								// DEBUG: console.log(file);
							}
						});

						// Refresh and start:
						up.refresh();
						up.start();
						
						// Set sizes and hide container:
						var currentHeight = $('#uploaderSection').outerHeight();
						$('#uploaderSection').css({ height: currentHeight });
						$('div#plupload-upload-ui').fadeOut('medium');
						$('#uploaderSection .loading').fadeIn('medium');
						$('#current-uploaded-image').slideUp('medium');
						
					});
					
					// A new file was uploaded:
					uploader.bind('FileUploaded', function(up, file, response) {
						
						// Parse response AS JSON:
						response = $.parseJSON(response.response);
						
						// Find current image and continue:
						if ($('#drag_to_upload div.inside').find('.attachment-full').length > 0){
						
							// Update image with new info:
							var imageObject = $('#drag_to_upload div.inside img.attachment-full');
							var currentImageHeight = imageObject.outerHeight();
							imageObject.attr('src', response.image);
							imageObject.removeAttr('width');
							imageObject.removeAttr('height');
							imageObject.removeAttr('title');
							imageObject.removeAttr('alt');
							
							// Hide container:
							imageObject.load(function(){
							
								// Display container:
								$('#current-uploaded-image').slideDown('medium');
								
								// Fade in upload container:
								$('div#plupload-upload-ui').fadeIn('medium');
								$('#uploaderSection .loading').fadeOut('medium');
								
							});
							
						}
						
					});
					
					// Remove image handler:
					$('#remove-post-thumbnail').live('click', function(){
						$('#current-uploaded-image').slideUp('medium');
					});
					
				});
			</script>
			
		<?php
	}
	
	
	// File upload handler:
	function dgd_ajaxPhotoUpload(){
		
		// Check referer, die if no ajax:
		check_ajax_referer('photo-upload');
		
		/// Upload file using Wordpress functions:
		$file = $_FILES['async-upload'];
		$status = wp_handle_upload($file, array('test_form'=>true, 'action' => 'photo_gallery_upload'));
	
		// Fetch post ID:
		global $post;
		$post_id = $_POST['postID'];
		
		// Insert uploaded file as attachment:
		$attach_id = wp_insert_attachment(array(
			'post_mime_type' => $status['type'],
			'post_title' => preg_replace('/\.[^.]+$/', '', basename($file['name'])),
			'post_content' => '',
			'post_status' => 'inherit'
		), $status['file'], $post_id);
		
		// Include the image handler library:
		require_once(ABSPATH . 'wp-admin/includes/image.php');
		
		// Generate meta data and update attachment:
		$attach_data = wp_generate_attachment_metadata($attach_id, $status['file']);
		wp_update_attachment_metadata($attach_id, $attach_data);
		
		// Check for current meta (update / add):
		if ($prevValue = get_post_meta($post_id, '_thumbnail_id', true)){
			update_post_meta($post_id, '_thumbnail_id', $attach_id, $prevValue);
		} else {
			add_post_meta($post_id, '_thumbnail_id', $attach_id);
		}
		
		// Get image sizes and correct thumb:
		$croppedImage = wp_get_attachment_image_src($attach_id, 'full');
		$imageDetails = getimagesize($croppedImage[0]);
		
		// Create response array:
		$uploadResponse = array(
			'image' => $croppedImage[0],
			'width' => $imageDetails[0],
			'height' => $imageDetails[1],
			'postID' => $post_id
		);
		
		// Return response and exit:
		echo json_encode($uploadResponse);
		exit;
		
	}
	
	
	// Drag & drop featured image panel:
	function dragFeatureAdminPanel($info){ ?>
		<div class="wrap">
			<div id="icon-themes" class="icon32"></div>
			<h2><?php _e('Plugin options for drag to feature', 'jamedo-bootstrap-start-theme'); ?></h2>
			
			<?php
			
				// Check for POST request:
				if (isset($_POST['updatePluginSettings'])){
				
					// Check that everything is set:
					if ($_POST['file_types'] && !empty($_POST['post_types'])){
						
						// Update post types:
						$selected = $_POST['post_types'];
						update_option('drag-drop-post-types', $selected);
						
						// Update formats:
						$selected = $_POST['file_types'];
						update_option('drag-drop-file-types', $selected);
						
						// Show message:
						echo '<div id="message" style="margin-top: 10px;" class="updated"><p>The plugin options have been successfully updated!</p></div>';
						
					} else {
						
						// Show message:
						echo '<div id="message" style="margin-top: 10px;" class="error"><p>Please make sure you filled in all the required fields before submitting. At least <em><strong>one post type</strong></em> and <em><strong>one extension</strong></em> must be selected!</p></div>';
						
					}
				}
				
			?>
			
			<div id="drag-to-feature-image" class="metabox-holder">
				
				<!-- Meta box -->
				<div id="manage-plugin-options" class="postbox">
					<h3 class="hndle"><span><?php _e('Available options:', 'jamedo-bootstrap-start-theme'); ?></span></h3>
					<div class="inside" style="padding: 20px 30px;">
						<form action="" method="post">
							<strong>Which post types do you want the meta box to display at?</strong><br />
							<div class="containerDiv" style="margin: 2px 0px 20px 0px; overflow: hidden;">
								<?php $post_types = get_post_types(array('exclude_from_search' => false)); ?>
								<?php $selected = array('post', 'page', 'product'); ?>
								<?php foreach ($post_types as $type): ?>
									<input name="post_types[]" <?php if (in_array($type, $selected)): ?>checked="checked" <?php endif; ?>type="checkbox" id="type_<?php echo $type; ?>" value="<?php echo $type; ?>" /> <label for="type_<?php echo $type; ?>"><?php echo $type; ?></label>&nbsp;&nbsp;&nbsp;
								<?php endforeach; ?>
							</div>
							
							<strong>Which of the following file types should be supported?</strong><br />
							<div class="containerDiv" style="margin: 2px 0px 20px 0px; overflow: hidden;">
								<?php $selected = get_option('drag-drop-file-types'); ?>
								<?php $file_types = array('jpg', 'jpeg', 'png', 'gif', 'bmp'); ?>
								<?php foreach ($file_types as $ft): ?>
									<input name="file_types[]" <?php if (in_array($ft, $selected)): ?>checked="checked" <?php endif; ?>type="checkbox" id="filetype_<?php echo $ft; ?>" value="<?php echo $ft; ?>" /> <label for="filetype_<?php echo $ft; ?>"><?php echo $ft; ?></label>&nbsp;&nbsp;&nbsp;
								<?php endforeach; ?>
							</div>
							
							<input type="submit" name="updatePluginSettings" class="button-secondary" value="Update settings" />
						</form>
					</div>
				</div>
				
			</div>
			
		</div>
		<?php
	}
