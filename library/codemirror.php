<?php
/* 
 * @author Lee Pham http://wp.tutsplus.com/author/leepham/
 * @twitter http://twitter.com/leephamj
 * @facebook http://facebook.com/tungchen93
 * 
 * Any problem please contact: tungchen93@gmail.com
 *
 */

add_action('admin_init', 'codemirror_register', 999);

function codemirror_register() {
	
	wp_register_script('codemirror', get_template_directory_uri()."/library/codemirror/lib/codemirror.js");
	wp_register_style('codemirror', get_template_directory_uri()."/library/codemirror/lib/codemirror.css");
	
	wp_register_style('vibrant-ink', get_template_directory_uri()."/library/codemirror/theme/vibrant-ink.css");
	
	wp_register_script('xml', get_template_directory_uri()."/library/codemirror/mode/xml/xml.js");
	wp_register_script('javascript', get_template_directory_uri()."/library/codemirror/mode/javascript/javascript.js");
	wp_register_script('css', get_template_directory_uri()."/library/codemirror/mode/css/css.js");	
	wp_register_script('php', get_template_directory_uri()."/library/codemirror/mode/php/php.js");
	wp_register_script('clike', get_template_directory_uri()."/library/codemirror/mode/clike/clike.js");
	
	add_action('admin_enqueue_scripts', 'codemirror_enqueue_scripts');
	add_action('admin_head', 'codemirror_control_js');
}

function codemirror_enqueue_scripts() {
	wp_enqueue_script('codemirror');
	wp_enqueue_style('codemirror');
	
	wp_enqueue_style('vibrant-ink');
	
	wp_enqueue_script('xml');
	wp_enqueue_script('javascript');
	wp_enqueue_script('css');
	wp_enqueue_script('php');
	wp_enqueue_script('clike');
}

function codemirror_control_js() {
	if (isset($_GET['file'])) {
		$filename_to_edit = end(explode("/", $_GET['file']));
		$file = substr($filename_to_edit, stripos($filename_to_edit, '.')+1);
		switch ($file) {
			case "php": $file = "application/x-httpd-php"; break;
			case "js" : $file = "text/javascript"; break;
			case "css": $file = "text/css"; break;
		}	
	}
	else {
		$file_script = $_SERVER['SCRIPT_NAME'];
		$file_script = end(explode('/', $file_script));
		if (($file_script == 'theme-editor.php') || ($file_script == 'themes.php'))
			$file = "text/css";
		else 
			$file = "application/x-httpd-php";
	}
?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
		/* hack to check if the textarea exists */
		if (jQuery('#newcontent').length) {
			var editor = CodeMirror.fromTextArea(document.getElementById("newcontent"), {
		        lineNumbers: true,
		        matchBrackets: true,
				mode: "<?php echo $file ;?>",
		        indentUnit: 4,
		        indentWithTabs: true,
		        enterMode: "keep",
		        tabMode: "shift",
				theme: "vibrant-ink"
			});
		}
		})
	</script>
<?php
}
