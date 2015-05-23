<?php
/**
 * Modern Facebook Post Embed
 *
 * @link http://cris9400.nerdnet.it/work/portfolio/facebook-post-embed/
 *
 * @author Cris9400
 * @version 1.0.0
 * @package Modern_facebook_post_embed
 */

/*
* Plugin Name: Modern Facebook Post Embed
* Plugin URI: http://cris9400.nerdnet.it/work/portfolio/facebook-post-embed/
* Description: One shortcode to embedding modern facebook posts easily, responsive and custom margin bottom.
* Version: 1.0.0
* Author: Cris9400
* Author URI: http://cris9400.nerdnet.it/
* Text Domain: modern-facebook-post-embed
* License: GPLv2 or later
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


function facebook_post_embed_style(){
	?>
    	<style type="text/css">
			div.fb-post{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}

			div.fb-post *{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}
		</style>
    <?php
}
add_action('wp_head', 'facebook_post_embed_style');



function facebook_post_embed_script(){
	?>
		<div id="fb-root"></div>
		<script type="text/javascript">
			(function(d, s, id) {
  				var js, fjs = d.getElementsByTagName(s)[0];
  				if (d.getElementById(id)) return;
  					js = d.createElement(s); js.id = id;
  					js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.2";
  					fjs.parentNode.insertBefore(js, fjs);
				}
			(document, 'script', 'facebook-jssdk'));
    	</script>
    <?php
}
add_action('wp_footer', 'facebook_post_embed_script');


// Add [fb_pe url="" bottom=""] shortcode
function facebook_post_embed_shortcode( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"url"		=>	'',
				"mbottom" 	=>	'50'
			),$atts
		)
	);

	if( empty($url) ){
		return '<p>Please enter facebook post url.</p>';
		return false;
	}

	if( empty($mbottom) or $bottom == '0' ){
		$style = ' style="margin-bottom:0px;"';
	}

	else{
		$style = ' style="margin-bottom:'.$mbottom.'px;"';
	}
	
	return '<div class="fb-post fb-post-embed" data-href="'.$url.'"'.$style.'></div>';
	
}
add_shortcode("mfb_pe", "facebook_post_embed_shortcode");

function fb_pe_button($buttons) {
	array_push($buttons, 'facebook_post_embed');
	return $buttons;
}
add_filter('mce_buttons', 'fb_pe_button');


// Register js for facebook button
function fb_pe_register_tinymce_js($plugin_array) {
	$plugin_array['facebook_post_embed'] = plugins_url( '/js/mfb_pe_button.js', __FILE__);
	return $plugin_array;
}
add_filter('mce_external_plugins', 'fb_pe_register_tinymce_js');



function fb_pe_button_icon(){
	?>
		<style type="text/css">
			.mce-i-facebook-post-embed-icon:before{
				font-family: 'dashicons' !important;
				content: '\f304' !important;
				font-size: 24px !important;
			}
		</style>
	<?php
}
add_action('admin_head','fb_pe_button_icon');

?>