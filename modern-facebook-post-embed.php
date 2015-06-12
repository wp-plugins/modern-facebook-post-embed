<?php
/**
 * Modern Facebook Post Embed
 *
 * @link http://workstation.nerdnet.it/portfolio/facebook-post-embed/
 *
 * @author Cris9400
 * @version 1.0.3
 * @package Modern_facebook_post_embed
 */

/*
* Plugin Name: Modern Facebook Post Embed
* Plugin URI: http://workstation.nerdnet.it/portfolio/facebook-post-embed/
* Description: One shortcode to embedding modern facebook posts easily, responsive and custom margin bottom.
* Version: 1.0.3
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
?>

<?php
class MFacebookPostEmbed
{

	 /**
     * @const WPURL Link to author site
     */
    const WPURL = 'http://workstation.nerdnet.it/portfolio/facebook-post-embed/';
    /**
     * @const VERSION The current plugin version
     */
    const VERSION = '1.0.3';

    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Modern Facebook Embed Post', 
            'manage_options', 
            'fb-embed-setting', 
            array( $this, 'create_admin_page' )
        );
    }
	

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
		 <div class="wrap modern-facebook-post-embed">
		<?php screen_icon('edit-pages'); ?>
		</div>

<script type="text/javascript">

function postembeddiv() {
	document.getElementById("epostpage").style.display = 'block';
	document.getElementById("homepage").style.display = 'none';
	document.getElementById("epagepage").style.display = 'none';
}

function pageembeddiv() {
	document.getElementById("epostpage").style.display = 'none';
	document.getElementById("homepage").style.display = 'none';
	document.getElementById("epagepage").style.display = 'block';
}

function makeshortcodewp() {
document.getElementById("allertlink").style.display = 'none';
document.getElementById("seeshortcut").style.display = 'none';
document.getElementById("copylabel").style.display = 'none';

	if (postlinktextbox.value == '') {
        document.getElementById("allertlink").style.display = 'block';
    } else {
		document.getElementById("seeshortcut").style.display = 'block';
		document.getElementById("copylabel").style.display = 'block';
		document.getElementById("seeshortcut").value= '[mfb_pe url="' + document.getElementById("postlinktextbox").value + '" mbottom="50"]';
	}

}
</script>		
		
		
		
		<div id="head">
			<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

			<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

			<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
			<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.3&appId=346339798798281";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
			
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" <?php echo 'href="' . self::WPURL . '"'; ?>>Modern FB Embed Post</a>
					</div>
				<div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#" onclick="window.location.reload(true);">HOME</a></li>
					<li><a href="#" onclick="postembeddiv()"><?php _e('EMBED CODE', 'modern-facebook-post-embed'); ?></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="https://wordpress.org/plugins/modern-facebook-post-embed/" target="_blanck"><?php _e('SUPPORT', 'modern-facebook-post-embed'); ?></a></li>
					<li><a href="https://wordpress.org/plugins/modern-facebook-post-embed/changelog/" target="_blanck"><?php _e('CHANGELOG', 'modern-facebook-post-embed'); ?></a></li>
					<li><a href="https://wordpress.org/support/view/plugin-reviews/modern-facebook-post-embed?filter=5#postform" target="_blanck"><?php _e('VOTE', 'modern-facebook-post-embed'); ?></a></li>
					<li><a>&nbsp;&nbsp;&nbsp;<?php _e('Version', 'modern-facebook-post-embed'); ?> <?php echo self::VERSION; ?></a></li>
				</ul>
				</div>
				</div>
			</nav>
		</div>
		
		<div id="homepage" style="display: block">
		<div class="row">
		<div class="col-lg-9">
			<div class="col-lg-3">
			<img src="<?php echo plugins_url('/images/fb-icon.png', __FILE__ )?>" class="img-thumbnail" />
			</div>
			<div class="col-lg-9">
			<h2>Modern Facebook Post</h2>
			<p>This plugin allows you to import any post, video, page and much more to facebook on your blog or website.
			<br/>
			The use of this plugin is very immediate and fast! begin now to share your facebook!</p>
			</div>
			<br/>
			<div class="col-lg-12">
			<div class="fb-comments" data-width="100%" data-href="http://workstation.nerdnet.it/portfolio/facebook-post-embed/" data-numposts="5"></div>
			</div>
		</div>
			<div class="col-lg-3">	
<div class="panel panel-default">
  <div class="panel-heading">
    <center><h3 class="panel-title"><?php _e('Donate to NerdNET', 'wp-login-logo'); ?></h3></center>
  </div>
  <div class="panel-body">
	<p>
	<center><?php _e('Donate to support the community and allow the development team to continue working by supporting at least part of the costs of management and hosting.', 'wp-login-logo'); ?></center>
	</p>
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="S65MNVSU4D4U6">
			<input type="image" width="100%" src="http://workstation.nerdnet.it/wp-content/uploads/2015/06/donate-button.png" border="0" name="submit" alt="PayPal - Il metodo rapido, affidabile e innovativo per pagare e farsi pagare.">
			<img alt="" border="0" src="https://www.paypalobjects.com/it_IT/i/scr/pixel.gif" width="1" height="1">
	</form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <center><h3 class="panel-title"><?php _e('WorkStation', 'wp-login-logo'); ?></h3></center>
  </div>
  <div class="panel-body">
	<p>
	<center><?php _e('Find more content in our development center!', 'wp-login-logo'); ?></center>
	</p>
	<a href="http://workstation.nerdnet.it/" target="_blank"><button type="button" width="100%" class="btn btn-info btn-lg">WorkStation</button></a>
	<a href="http://workstation.nerdnet.it/wordpress/" target="_blank"><button type="button" width="50%" class="btn btn-primary">Plugins</button></a>
	<a href="http://workstation.nerdnet.it/wordpress/" target="_blank"><button type="button" width="100%" class="btn btn-success">Theme</button></a>
  </div>
</div>
</div>
</div>
		</div>
		
		<div id="epostpage" style="display: none">
		<div class="row">
		<center><h2><?php _e('EMBED POST', 'modern-facebook-post-embed'); ?></h2></center>
		<div class="col-lg-3">
		<h4><?php _e('Shortcode', 'modern-facebook-post-embed'); ?></h4>
		<div class="well">[mfb_pe url="" mbottom=""]</div>
		<br/>
		<h4><?php _e('Make Shortcode', 'modern-facebook-post-embed'); ?></h4>
		 <div class="input-group">
      <input type="text" id="postlinktextbox" class="form-control" placeholder="Insert Link..." >
      <span class="input-group-btn">
        <button class="btn btn-default" id="makelink" type="button" onclick="makeshortcodewp()">Make</button>
      </span>
    </div>
		<br/>
		<div class="alert alert-danger" id="allertlink" style="display: none" role="alert"><b>Oh snap!</b> Insert Facebook Post Link</div>
		  <input type="text" id="seeshortcut" value="" class="form-control" readonly="readonly" onClick="this.setSelectionRange(0, this.value.length)" style="display: none;" >
		  <i id="copylabel" style="display: none;"><font size="1">Copy this Shortcode in your post!</font></i>
		</div>
		<div class="col-lg-9">
		<h4><?php _e('Find Post Link', 'modern-facebook-post-embed'); ?></h4>
		<div class="col-lg-6">
		<iframe width="100%" height="315" src="https://www.youtube.com/embed/oIQnCBTqbbQ" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="col-lg-6">
		<p>Find the link to a single post on facebook is very simple!<br/>
			The notion more important to know is that the post is stored with a timestamp code that represents the date and time of when they were published.<br/>
			To get the link of a single post simply click where it is indicated the date when it was published.</p>
		<img src="<?php echo plugins_url('/images/postembedguide.png', __FILE__ )?>" width="100%">
		</div>
		</div>
		</div>
		<div class="row">
		<div class="col-lg-12">
		<br/><br/><br/><br/>
		</div>
		</div>
		<div id="page">
		<div class="row">
		
		<div class="col-lg-5">
		<center><h2><?php _e('EMBED PAGE', 'modern-facebook-post-embed'); ?></h2></center>
		<h4><?php _e('Shortcode', 'modern-facebook-post-embed'); ?></h4>
		<div class="well">[mfb_page url="" cover="" facepile="" feed="" mbottom=""]</div>
		<br/>
		</div>
		<div class="col-lg-1">
		</div>
		<div class="col-lg-5">
		<center><h2><?php _e('EMBED VIDEO', 'modern-facebook-post-embed'); ?></h2></center>
		<h4><?php _e('Shortcode', 'modern-facebook-post-embed'); ?></h4>
		<div class="well">[mfb_video url="" size="" mbottom=""]</div>
		</div>
		</div>
		<div class="row">
		
		<div class="col-lg-5">
		<center><h2><?php _e('EMBED COMMENTS', 'modern-facebook-post-embed'); ?></h2></center>
		<h4><?php _e('Shortcode', 'modern-facebook-post-embed'); ?></h4>
		<div class="well">[mfb_comments url="" post-number="" width="" mtop="" mbottom=""]</div>
		<br/>
		</div>
		</div>
		</div>
		
		</div>
		
		<div id="footer">
		<a href="http://cris9400.nerdnet.it/"><img style="position: relative; left: 90%;" src="<?php echo plugins_url('/images/dev_logo.png', __FILE__ )?>" height="50px"></a>
		</div>
		
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'fb-embed-setting' // Page
        );  

        add_settings_field(
            'id_number', // ID
            'ID Number', // Title 
            array( $this, 'id_number_callback' ), // Callback
            'fb-embed-setting', // Page
            'setting_section_id' // Section           
        );      

        add_settings_field(
            'title', 
            'Title', 
            array( $this, 'title_callback' ), 
            'fb-embed-setting', 
            'setting_section_id'
        );      
    }

}

if( is_admin() )
    $my_settings_page = new MFacebookPostEmbed();


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


// Add [fb_pe url="" mbottom=""] shortcode
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

	if( empty($mbottom) or $mbottom == '0' ){
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

<?php


function facebook_page_embed_style(){
	?>
    	<style type="text/css">
			div.fb-page{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}

			div.fb-page *{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}
		</style>
    <?php
}
add_action('wp_head', 'facebook_page_embed_style');

function facebook_page_embed_script(){
	?>
		<div id="fb-root"></div>
			<script>(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.3";
				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
    <?php
}
add_action('wp_footer', 'facebook_page_embed_script');


// Add [mfb_page url="" cover="" facepile="" feed="" mbottom=""] shortcode
function facebook_page_embed_shortcode( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"url"		=>	'',
				"cover"		=>	'',
				"facepile"		=>	'',
				"feed"		=>	'',
				"mbottom" 		=>	''
			),$atts
		)
	);

	if( empty($url) ){
		return '<p>Please enter facebook page url.</p>';
		return false;
	}

	if( empty($cover) or $cover == 'true' ){
		$coverdata = 'data-hide-cover="false"';
	}

	else{
		$coverdata = 'data-hide-cover="true"';
	}
	
	if( empty($facepile) or $facepile == 'true' ){
		$facedata = 'data-show-facepile="true"';
	}

	else{
		$facedata = 'data-show-facepile="false"';
	}
	
	if( empty($feed) or $feed == 'true' ){
		$feeddata = 'data-show-posts="true"';
	}

	else{
		$feeddata = 'data-show-posts="false"';
	}
	
	if( empty($mbottom) or $mbottom == '0' ){
		$style = ' style="margin-bottom:0px;"';
	}

	else{
		$style = ' style="margin-bottom:'.$mbottom.'px;"';
	}
	
	return '<div class="fb-page fb-page-embed" '.$style.' data-href="'.$url.'" '.$coverdata.' '.$facedata.' '.$feeddata.'></div>';
	
}
add_shortcode("mfb_page", "facebook_page_embed_shortcode");

function fb_page_button($buttons) {
	array_push($buttons, 'facebook_page_embed');
	return $buttons;
}
add_filter('mce_buttons', 'fb_page_button');


// Register js for facebook button
function fb_page_register_tinymce_js($plugin_array) {
	$plugin_array['facebook_page_embed'] = plugins_url( '/js/mfb_page_button.js', __FILE__);
	return $plugin_array;
}
add_filter('mce_external_plugins', 'fb_page_register_tinymce_js');



function fb_page_button_icon(){
	?>
		<style type="text/css">
			.mce-i-facebook-page-embed-icon:before{
				font-family: 'dashicons' !important;
				content: '\f305' !important;
				font-size: 24px !important;
			}
		</style>
	<?php
}
add_action('admin_head','fb_page_button_icon');
?>

<?php


function facebook_video_embed_style(){
	?>
    	<style type="text/css">
			div.fb-video{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}

			div.fb-video *{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}
		</style>
    <?php
}
add_action('wp_head', 'facebook_video_embed_style');

function facebook_video_embed_script(){
	?>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <?php
}
add_action('wp_footer', 'facebook_video_embed_script');


// Add [mfb_video url="" size="" mbottom=""] shortcode
function facebook_video_embed_shortcode( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"url"		=>	'',
				"size"		=>	'',
				"mbottom" 		=>	''
			),$atts
		)
	);

	if( empty($url) ){
		return '<p>Please enter facebook video url.</p>';
		return false;
	}

	if( empty($size) ){
		$sizedata = '500';
	}

	else if (is_numeric($size)){
		$sizedata == $size ;
	}
	else {
	return '<p>Please enter valid size number.</p>';
	return false;
	}
	if( empty($mbottom) or $mbottom == '0' ){
		$stylem = ' style="margin-bottom:0px;"';
	}

	else{
		$stylem = ' style="margin-bottom:'.$mbottom.'px;"';
	}
	
	//return '<div class="fb-page fb-page-embed" data-href="'.$url.'" '.$coverdata.' '.$facedata.' '.$feeddata.'></div>';
	return '<div class="fb-video" '.$stylem.' data-href="'.$url.'" data-width="'.$sizedata.'"></div>';
	
}
add_shortcode("mfb_video", "facebook_video_embed_shortcode");

function fb_video_button($buttons) {
	array_push($buttons, 'facebook_video_embed');
	return $buttons;
}
add_filter('mce_buttons', 'fb_video_button');


// Register js for facebook button
function fb_video_register_tinymce_js($plugin_array) {
	$plugin_array['facebook_video_embed'] = plugins_url( '/js/mfb_video_button.js', __FILE__);
	return $plugin_array;
}
add_filter('mce_external_plugins', 'fb_video_register_tinymce_js');



function fb_video_button_icon(){
	?>
		<style type="text/css">
			.mce-i-facebook-video-embed-icon:before{
				font-family: 'dashicons' !important;
				content: '\f522' !important;
				font-size: 24px !important;
			}
		</style>
	<?php
}
add_action('admin_head','fb_video_button_icon');
?>


<?php
function facebook_comments_embed_style(){
	?>
    	<style type="text/css">
			div.fb-comments{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}

			div.fb-comments *{
				width:100% !important;
				max-width:100% !important;
				min-width:100% !important;
				display:block !important;
			}
		</style>
    <?php
}
add_action('wp_head', 'facebook_comments_embed_style');

function facebook_comments_embed_script(){
	?>
		<div id="fb-root"></div>
	
			<script>
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/it_IT/sdk.js#xfbml=1&version=v2.3";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			</script>
    <?php
}
add_action('wp_footer', 'facebook_comments_embed_script');


// Add [mfb_comments url="" post-number="" width="" mtop="" mbottom=""] shortcode
function facebook_comments_embed_shortcode( $atts, $content = null ){

	extract(
		shortcode_atts(
			array(
				"url"		=>	'',
				"postnumber"		=>	'',
				"width" 		=>	'',
				"mtop" 		=>	'',
				"mbottom" 		=>	''
			),$atts
		)
	);

	if( empty($url) ){
		return '<p>Please enter facebook video url.</p>';
		return false;
	}

	if( empty($post_number) ){
		$post_numberdata = '5';
	}

	else if (is_numeric($postnumber)){
		$postnumberdata == $postnumber ;
	}
	else {
	return '<p>Please enter valid post number.</p>';
	return false;
	}
	
	if( empty($width) or $width == '0' ){
		$width1 = ' data-width="100%"';
	}
	else{
		$width1 = ' data-width="'.$width.'"';
	}
	
	if( empty($mtop) or $mtop == '0' ){
		$stylemt = 'margin-top:0px;"';
	}

	else{
		$stylemt = 'margin-top:'.$mtop.'px;"';
	}
	
	if( empty($mbottom) or $mbottom == '0' ){
		$stylemb = 'margin-bottom:0px;';
	}

	else{
		$stylemb = 'margin-bottom:'.$mbottom.'px;"';
	}
	
	
	//return '<div class="fb-page fb-page-embed" data-href="'.$url.'" '.$coverdata.' '.$facedata.' '.$feeddata.'></div>'; style="
	return '<div class="fb-comments" style="'.$stylemt.' '.$stylemb.'" data-href="'.$url.'" '.$width1.' data-numposts="'.$postnumberdata.'"></div>'; 
	
}
add_shortcode("mfb_comments", "facebook_comments_embed_shortcode");

function fb_comments_button($buttons) {
	array_push($buttons, 'facebook_comments_embed');
	return $buttons;
}
add_filter('mce_buttons', 'fb_comments_button');


// Register js for facebook button
function fb_comments_register_tinymce_js($plugin_array) {
	$plugin_array['facebook_comments_embed'] = plugins_url( '/js/mfb_comments_button.js', __FILE__);
	return $plugin_array;
}
add_filter('mce_external_plugins', 'fb_comments_register_tinymce_js');



function fb_comments_button_icon(){
	?>
		<style type="text/css">
			.mce-i-facebook-comments-embed-icon:before{
				font-family: 'dashicons' !important;
				content: '\f125' !important;
				font-size: 24px !important;
			}
		</style>
	<?php
}
add_action('admin_head','fb_comments_button_icon');
?>