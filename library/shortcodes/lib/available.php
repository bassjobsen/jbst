<?php

/**
 * List of available shortcodes
 */
 
function su_shortcodes( $shortcode = false ) {
	global $shortcodes;
	$shortcodes = array(
		# basic shortcodes - start
		'basic-shortcodes-open' => array(
			'name' => __( 'DEFAULT SKEMATIK SHORTCODES', 'shortcodes-ultimate' ),
			'type' => 'opengroup'
		),

/*
==========================================================
Button Group
==========================================================
*/
		'button_group' => array(
			'name' => 'Button Group',
			'type' => 'wrap',
			'atts' => array( ),
			'usage' => '[button_group][/button_group]',
			'content' => '',
			'desc' => __( 'Button Group', 'shortcodes-ultimate' )
		),
		
/*
==========================================================
Buttons
==========================================================
*/			
		'button' => array(
			'name' => 'Button',
			'type' => 'single',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => 'Button Text',
					'desc' => __( 'Button Text', 'shortcodes-ultimate' )
				),
				'url' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Button Link', 'shortcodes-ultimate' )
				),
				'size' => array(
					'values' => array(
						'',
						'mini',
						'small',
						'medium',
						'large'
					),
					'default' => '',
					'desc' => __( 'Button Size', 'shortcodes-ultimate' )
				),
				'type' => array(
					'values' => array(
						'',
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '',
					'desc' => __( 'Button Style (color)', 'shortcodes-ultimate' )
				),
				'icon' => array(
					'values' => array(
						'','glass','music','search','envelope','heart','star','star-empty','user','film','th-large','th','th-list','ok','remove','zoom-in','zoom-out','off','signal','cog','trash','home','file','time','road','download-alt','download','upload','inbox','play-circle','repeat','refresh','list-alt','lock','flag','headphones','volume-off','volume-down','volume-up','qrcode','barcode','tag','tags','book','bookmark','print','camera','icon-font','bold','italic','text-height','text-width','align-left','align-center','align-right','align-justify','list','indent-left','indent-right','facetime-video','picture','pencil','map-marker','adjust','tint','edit','share','check','move','step-backward','fast-backward','backward','play','pause','stop','forward','fast-forward','step-forward','eject','chevron-left','chevron-right','plus-sign','minus-sign','remove-sign','ok-sign','question-sign','info-sign','screenshot','remove-circle','ok-circle','ban-circle','arrow-left','arrow-right','arrow-up','arrow-down','share-alt','resize-full','resize-small','plus','minus','asterisk','exclamation-sign','gift','leaf','fire','eye-open','eye-close','warning-sign','plane','calendar','random','comment','magnet','chevron-up','chevron-down','retweet','shopping-cart','folder-close','folder-open','resize-vertical','resize-horizontal','hdd','bullhorn','bell','certificate','thumbs-up','thumbs-down','hand-right','hand-left','hand-up','hand-down','circle-arrow-right','circle-arrow-left','circle-arrow-up','circle-arrow-down','globe','wrench','tasks','filter','briefcase','fullscreen'
					),
					'default' => '',
					'desc' => __( 'Button Icon', 'shortcodes-ultimate' )
				),
				
				'iconcolor' => array(
					'values' => array(
						'',
						'white',
						'black'
					),
					'default' => '',
					'desc' => __( 'Icon Color', 'shortcodes-ultimate' )
				),
				
				'target' => array(
					'values' => array(
						'',
						'_self',
						'_blank'
					),
					'default' => '',
					'desc' => __( 'Button Link Target', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[button url="" size="medium" type="default" text="Button Text" icon="default" target="_self" icon="image.png"]',
			'desc' => __( '3 sizes, 7 colors and 140 icons', 'shortcodes-ultimate' )
		),
		
/*
==========================================================
Labels
==========================================================
*/			
		'label' => array(
			'name' => 'Label',
			'type' => 'single',
			'atts' => array(
				'type' => array(
					'values' => array(
						'',
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '',
					'desc' => __( 'Label Style (color)', 'shortcodes-ultimate' )
				),
				'text' => array(
					'values' => array( ),
					'default' => 'Label Text',
					'desc' => __( 'Label Text', 'shortcodes-ultimate' )
				),
			),
			'usage' => '[label type="default" text="Label Text"]',
			'desc' => __( 'Text surrounded by a solid color for importance.', 'shortcodes-ultimate' )
		),				
		
/*
==========================================================
Badges
==========================================================
*/			
		'badge' => array(
			'name' => 'Badge',
			'type' => 'single',
			'atts' => array(
				'type' => array(
					'values' => array(
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '1',
					'desc' => __( 'Badge Style (color)', 'shortcodes-ultimate' )
				),
				'text' => array(
					'values' => array( ),
					'default' => 'Badge Text',
					'desc' => __( 'Badge Text', 'shortcodes-ultimate' )
				),
			),
			'usage' => '[badge type="default" text="Badge Text"]',
			'desc' => __( 'Text surrounded by a solid color for importance.', 'shortcodes-ultimate' )
		),			
		
/*
==========================================================
Code
==========================================================
*/	
		'code' => array(
			'name' => 'Code',
			'type' => 'wrap',
			'atts' => array(
				'scroll' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Scroll', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[code] Content [/code]<br/>[code scroll="true"] Content [/code]',
			'content' => __( 'Code goes here', 'shortcodes-ultimate' ),
			'desc' => __( 'Code box for showing code.', 'shortcodes-ultimate' )
		),

/*
==========================================================
Row
==========================================================
*/
		'row' => array(
			'name' => 'Column Row',
			'type' => 'wrap',
			'atts' => array( ),
			'usage' => '[row][/row]',
			'content' => '',
			'desc' => __( 'Row', 'shortcodes-ultimate' )
		),

/*
==========================================================
Column
==========================================================
*/
		'column' => array(
			'name' => 'Column',
			'type' => 'wrap',
			'atts' => array(
				'span' => array(
					'values' => array(
						'1',
						'2',
						'3',
						'4',
						'5',
						'6',
						'7',
						'8',
						'9',
						'10',
						'11',
						'12'
					),
					'desc' => __( 'Column Span.', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[column]Content goes here[/column]',
			'content' => __( 'Content goes here', 'shortcodes-ultimate' ),
			'desc' => __( 'Empty space with adjustable height', 'shortcodes-ultimate' )
		),

/*
==========================================================
Lead
==========================================================
*/
		'lead' => array(
			'name' => 'Lead Paragraph',
			'type' => 'wrap',
			'atts' => array(
				'align' => array(
					'values' => array(
						'default',
						'left',
						'center',
						'right'
					),
					'default' => 'Align',
					'desc' => __( 'text alignment', 'shortcodes-ultimate' )
				),
			),
			'usage' => '[lead][/lead]',
			'content' => __( 'Content goes here', 'shortcodes-ultimate' ),
			'desc' => __( 'Lead Paragraph', 'shortcodes-ultimate' )
		),

/*
==========================================================
Page Header
==========================================================
*/			
		'header' => array(
			'name' => 'Page Header',
			'type' => 'single',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => 'Heading Text',
					'desc' => __( 'Heading Text', 'shortcodes-ultimate' )
				),
				'subtext' => array(
					'values' => array( ),
					'default' => 'Sub Text',
					'desc' => __( 'Sub Text', 'shortcodes-ultimate' )
				),
			),
			'usage' => '[header text="Header Text" subtext="Sub Text"]',
			'desc' => __( 'Page Header.', 'shortcodes-ultimate' )
		),

/*
==========================================================
Divider
==========================================================
*/
		'divider' => array(
			'name' => 'Divider',
			'type' => 'single',
			'atts' => array( ),
			'usage' => '[divider]',
			'content' => '',
			'desc' => __( 'Divider', 'shortcodes-ultimate' )
		),

/*
==========================================================
Jumbotron
==========================================================
*/
		'jumbotron' => array(
			'name' => 'Jumbotron',
			'type' => 'wrap',
			'atts' => array(
					'background' => array(
						'values' => array( ),
						'default' => '#ffffff',
						'desc' => __( 'Background color', 'shortcodes-ultimate' ),
						'type' => 'color'
					),
					'color' => array(
						'values' => array( ),
						'default' => '#333333',
						'desc' => __( 'Text Color', 'shortcodes-ultimate' ),
						'type' => 'color'
					)
			),
			'usage' => '[jumbotron]Content goes here[/jumbotron]',
			'content' => __( 'Content goes here', 'shortcodes-ultimate' ),
			'desc' => __( 'A big header area for the top of your page.', 'shortcodes-ultimate' )
		),

/*
==========================================================
Alert
==========================================================
*/			
		'alert' => array(
			'name' => 'Alert',
			'type' => 'wrap',
			'atts' => array(
			
				'heading' => array(
					'values' => array( ),
					'default' => 'Alert Heading',
					'desc' => __( 'Alert Heading', 'shortcodes-ultimate' )
				),
				'type' => array(
					'values' => array(
						'alert-info',
						'alert-success',
						'alert-error'
					),
					'default' => 'alert-info',
					'desc' => __( 'Alert Style', 'shortcodes-ultimate' )
				),
				'block' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Block Padding', 'shortcodes-ultimate' )
				),
				'close' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Close Button', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[alert type="alert-info" heading="Alert Heading" block="false" close="false"]Content[/alert]',
			'desc' => __( 'Alert box with optional padding and close button', 'shortcodes-ultimate' )
		),
		
/*
==========================================================
Blockquote
==========================================================
*/			
		'blockquote' => array(
			'name' => 'Blockquote',
			'type' => 'wrap',
			'atts' => array(
			
				'cite' => array(
					'values' => array( ),
					'default' => 'Author or source name',
					'desc' => __( 'Blockquote Cite', 'shortcodes-ultimate' )
				),
				'float' => array(
					'values' => array(
						'no-float',
						'left',
						'right'
					),
					'default' => 'left',
					'desc' => __( 'Float (causes text wrap)', 'shortcodes-ultimate' )
				),
				'align' => array(
					'values' => array(
						'left',
						'right'
					),
					'align' => 'left',
					'desc' => __( 'Text Align', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[blockquote cite="Author or source name" float="left"]Blockquote content[/blockquote]',
			'desc' => __( 'Blockquote quotation with citation', 'shortcodes-ultimate' )
		),

/*
==========================================================
Popovers
==========================================================
*/			
		'popover' => array(
			'name' => 'Popover',
			'type' => 'single',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Text', 'shortcodes-ultimate' )
				),
				'title' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Popover Title', 'shortcodes-ultimate' )
				),
				'desc' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Popover description', 'shortcodes-ultimate' )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Link Url', 'shortcodes-ultimate' )
				),
				'target' => array(
					'values' => array(
						'_self',
						'_blank'
					),
					'default' => '_self',
					'desc' => __( 'Link Target', 'shortcodes-ultimate' )
				),
				'button' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Button', 'shortcodes-ultimate' )
				),
				'size' => array(
					'values' => array(
						'mini',
						'small',
						'medium',
						'large'
					),
					'default' => 'medium',
					'desc' => __( 'Button Size', 'shortcodes-ultimate' )
				),
				'type' => array(
					'values' => array(
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '1',
					'desc' => __( 'Button Style (color)', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[popover text="Popover Text" title="Popover Title" desc="Popover Description" link="" target="_self" button="false" size="medium" type="default"]',
			'desc' => __( '3 sizes, 7 colors and 140 icons', 'shortcodes-ultimate' )
		),

/*
==========================================================
Tooltip
==========================================================
*/			
		'tooltip' => array(
			'name' => 'Tooltip',
			'type' => 'single',
			'atts' => array(
				'text' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Text', 'shortcodes-ultimate' )
				),
				'title' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Tooltip description', 'shortcodes-ultimate' )
				),
				'link' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Link Url', 'shortcodes-ultimate' )
				),
				'target' => array(
					'values' => array(
						'_self',
						'_blank'
					),
					'default' => '_self',
					'desc' => __( 'Link Target', 'shortcodes-ultimate' )
				),
				'icon' => array(
					'values' => array(
						'none','glass','music','search','envelope','heart','star','star-empty','user','film','th-large','th','th-list','ok','remove','zoom-in','zoom-out','off','signal','cog','trash','home','file','time','road','download-alt','download','upload','inbox','play-circle','repeat','refresh','list-alt','lock','flag','headphones','volume-off','volume-down','volume-up','qrcode','barcode','tag','tags','book','bookmark','print','camera','icon-font','bold','italic','text-height','text-width','align-left','align-center','align-right','align-justify','list','indent-left','indent-right','facetime-video','picture','pencil','map-marker','adjust','tint','edit','share','check','move','step-backward','fast-backward','backward','play','pause','stop','forward','fast-forward','step-forward','eject','chevron-left','chevron-right','plus-sign','minus-sign','remove-sign','ok-sign','question-sign','info-sign','screenshot','remove-circle','ok-circle','ban-circle','arrow-left','arrow-right','arrow-up','arrow-down','share-alt','resize-full','resize-small','plus','minus','asterisk','exclamation-sign','gift','leaf','fire','eye-open','eye-close','warning-sign','plane','calendar','random','comment','magnet','chevron-up','chevron-down','retweet','shopping-cart','folder-close','folder-open','resize-vertical','resize-horizontal','hdd','bullhorn','bell','certificate','thumbs-up','thumbs-down','hand-right','hand-left','hand-up','hand-down','circle-arrow-right','circle-arrow-left','circle-arrow-up','circle-arrow-down','globe','wrench','tasks','filter','briefcase','fullscreen'
					),
					'default' => 'default',
					'desc' => __( 'Button Icon', 'shortcodes-ultimate' )
				),
				'iconcolor' => array(
					'values' => array(
						'white',
						'black'
					),
					'default' => 'white',
					'desc' => __( 'Icon Color', 'shortcodes-ultimate' )
				),
				'button' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Button', 'shortcodes-ultimate' )
				),
				'size' => array(
					'values' => array(
						'mini',
						'small',
						'medium',
						'large'
					),
					'default' => 'medium',
					'desc' => __( 'Button Size', 'shortcodes-ultimate' )
				),
				'type' => array(
					'values' => array(
						'primary',
						'default',
						'info',
						'success',
						'danger',
						'warning',
						'inverse'
					),
					'default' => '1',
					'desc' => __( 'Button Style (color)', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[tooltip text="Tooltip Text" title="Tooltip Title" link="" target="_self" icon="default" button="false" size="medium" type="default"]',
			'desc' => __( '3 sizes, 7 colors and 140 icons', 'shortcodes-ultimate' )
		),

/*
==========================================================
Progress Bar
==========================================================
*/			
		'progress' => array(
			'name' => 'Progress Bar',
			'type' => 'single',
			'atts' => array(
				'width' => array(
					'values' => array( ),
					'default' => '25',
					'desc' => __( 'Percentage of Progress', 'shortcodes-ultimate' )
				),
				'striped' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Striped', 'shortcodes-ultimate' )
				),
				'animate' => array(
					'values' => array(
						'on',
						'off'
					),
					'default' => 'off',
					'desc' => __( 'Animate (requires striped)', 'shortcodes-ultimate' )
				),
				'type' => array(
					'values' => array(
						'primary',
						'info',
						'success',
						'warning',
						'danger'
					),
					'default' => 'info',
					'desc' => __( 'Style (color)', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[progress width="25" animate="off" striped="off" type="off"]',
			'desc' => __( 'A Progress bar', 'shortcodes-ultimate' )
		),

/*
==========================================================
Carousel
==========================================================
*/			
		'carousel_gallery' => array(
			'name' => 'Carousel Gallery',
			'type' => 'single',
			'atts' => array(
				'include' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Include specific image IDs', 'shortcodes-ultimate' )
				),
				'exclude' => array(
					'values' => array( ),
					'default' => '',
					'desc' => __( 'Exclude specific image IDs', 'shortcodes-ultimate' )
				)
			),
			'usage' => '[carousel_gallery include="" exclude=""]',
			'desc' => __( 'A Carousel of your gallery\'s images', 'shortcodes-ultimate' )
		),

/*
==========================================================
Menu
==========================================================
*/			
		'menu' => array(
			'name' => 'Menu',
			'type' => 'single',
			'atts' => array(
				'style' => array(
					'values' => array(
						'pills',
						'tabs'
					),
					'default' => 'pills',
					'desc' => __( 'Style', 'shortcodes-ultimate' )
				),
				'stacked' => array(
					'values' => array(
						'true',
						'false'
					),
					'default' => 'false',
					'desc' => __( 'Stacked Vertically', 'shortcodes-ultimate' )
				),
			),
			'usage' => '[menu]',
			'desc' => __( 'Display any of your menus.', 'shortcodes-ultimate' )
		),

/*
==========================================================
Accordion Group
==========================================================

		'accordion_group' => array(
			'name' => 'Accordion Group',
			'type' => 'wrap',
			'atts' => array( ),
			'usage' => '[accordion][/accordion]',
			'content' => '',
			'desc' => __( 'Accordion Group', 'shortcodes-ultimate' )
		),
*/		
/*
==========================================================
Accordion
==========================================================
*/
		'accordion' => array(
			'name' => 'Accordion',
			'type' => 'wrap',
			'atts' => array(
					'title' => array(
						'values' => array( ),
						'default' => 'Title here',
						'desc' => __( 'Title', 'shortcodes-ultimate' ),
					),
					'id' => array(
						'values' => array( ),
						'default' => 'id-here',
						'desc' => __( 'ID: (no spaces)', 'shortcodes-ultimate' ),
					)
			),
			'usage' => '[accordion title="Title Goes Here" id="IDHere"]Content goes here[/accordion]',
			'content' => __( 'Content goes here', 'shortcodes-ultimate' ),
			'desc' => __( 'Collapsible content areas.', 'shortcodes-ultimate' )
		),

/*
==========================================================
Icons
==========================================================
*/			
		'icon' => array(
			'name' => 'Icon',
			'type' => 'single',
			'atts' => array(
				'type' => array(
					'values' => array(
						'none','glass','music','search','envelope','heart','star','star-empty','user','film','th-large','th','th-list','ok','remove','zoom-in','zoom-out','off','signal','cog','trash','home','file','time','road','download-alt','download','upload','inbox','play-circle','repeat','refresh','list-alt','lock','flag','headphones','volume-off','volume-down','volume-up','qrcode','barcode','tag','tags','book','bookmark','print','camera','icon-font','bold','italic','text-height','text-width','align-left','align-center','align-right','align-justify','list','indent-left','indent-right','facetime-video','picture','pencil','map-marker','adjust','tint','edit','share','check','move','step-backward','fast-backward','backward','play','pause','stop','forward','fast-forward','step-forward','eject','chevron-left','chevron-right','plus-sign','minus-sign','remove-sign','ok-sign','question-sign','info-sign','screenshot','remove-circle','ok-circle','ban-circle','arrow-left','arrow-right','arrow-up','arrow-down','share-alt','resize-full','resize-small','plus','minus','asterisk','exclamation-sign','gift','leaf','fire','eye-open','eye-close','warning-sign','plane','calendar','random','comment','magnet','chevron-up','chevron-down','retweet','shopping-cart','folder-close','folder-open','resize-vertical','resize-horizontal','hdd','bullhorn','bell','certificate','thumbs-up','thumbs-down','hand-right','hand-left','hand-up','hand-down','circle-arrow-right','circle-arrow-left','circle-arrow-up','circle-arrow-down','globe','wrench','tasks','filter','briefcase','fullscreen'
					),
					'default' => 'default',
					'desc' => __( 'Icon', 'shortcodes-ultimate' )
				),
				
				'size' => array(
					'values' => array(
						'default',
						'16',
						'20',
						'28',
						'32',
						'36',
						'48',
						'72',
						'96',
					),
					'default' => 'default',
					'desc' => __( 'Size', 'shortcodes-ultimate' )
				),
				'float' => array(
					'values' => array(
						'none',
						'left',
						'right'
					),
					'default' => 'none',
					'desc' => __( 'Float', 'shortcodes-ultimate' )
				),
				'color' => array(
					'values' => array( ),
					'default' => 'default',
					'desc' => __( 'Color', 'shortcodes-ultimate' ),
					'type' => 'color'
				)
			),
			'usage' => '[icon type="music" size="24"]',
			'desc' => __( '210 icons', 'shortcodes-ultimate' )
		),
		
/*
==========================================================
End Shortcodes
==========================================================
*/
				'basic-shortcodes-close' => array(
			'type' => 'closegroup'
		),
	);


do_action('add_to_shortcode_generator');
		
	if ( $shortcode )
		return $shortcodes[$shortcode];
	else
		return $shortcodes;
}

?>