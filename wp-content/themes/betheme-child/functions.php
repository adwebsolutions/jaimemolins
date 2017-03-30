<?php

/* ---------------------------------------------------------------------------
 * Child Theme URI | DO NOT CHANGE
 * --------------------------------------------------------------------------- */
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );


/* ---------------------------------------------------------------------------
 * Define | YOU CAN CHANGE THESE
 * --------------------------------------------------------------------------- */

// White Label --------------------------------------------
define( 'WHITE_LABEL', false );

// Static CSS is placed in Child Theme directory ----------
define( 'STATIC_IN_CHILD', false );


/* ---------------------------------------------------------------------------
 * Enqueue Style
 * --------------------------------------------------------------------------- */
add_action( 'wp_enqueue_scripts', 'mfnch_enqueue_styles', 101 );
function mfnch_enqueue_styles() {
	
	// Enqueue the parent stylesheet
// 	wp_enqueue_style( 'parent-style', get_template_directory_uri() .'/style.css' );		//we don't need this if it's empty
	
	// Enqueue the parent rtl stylesheet
	if ( is_rtl() ) {
		wp_enqueue_style( 'mfn-rtl', get_template_directory_uri() . '/rtl.css' );
	}
	
	// Enqueue the child stylesheet
	wp_dequeue_style( 'style' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() .'/style.css' );

	wp_enqueue_style( 'custom-social', get_stylesheet_directory_uri() .'/custom-social.css' );

	wp_enqueue_script( 'custom-social', get_stylesheet_directory_uri() .'/js/default.script.js',array('jquery'),'1.0', true);
	wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() .'/js/custom.script.js',array('jquery'),'1.0', true);
	
}


/* ---------------------------------------------------------------------------
 * Load Textdomain
 * --------------------------------------------------------------------------- */
add_action( 'after_setup_theme', 'mfnch_textdomain' );
function mfnch_textdomain() {
    load_child_theme_textdomain( 'betheme',  get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'mfn-opts', get_stylesheet_directory() . '/languages' );
}


/*Function rewrites inclusion*/
include dirname( __FILE__ ) .'/functions_rw/theme-option-mfn-opts-setup.php';
include dirname( __FILE__ ) .'/functions_rw/sc_testimonials.php';
include dirname( __FILE__ ) .'/includes/content-post.php';

function custom_socials(){
	ob_start();
	echo'
		<div class="km-socials-share-modern" data-style="hoverShowTada" data-align="center" style="--icon-margins: 10px;">';
	$target = mfn_opts_get( 'social-target' ) ? 'target="_blank"' : false;

	if( mfn_opts_get('social-skype') ){include_social($target,'icon-skype','social-skype','Skype');}
	if( mfn_opts_get('social-facebook') ) {include_social($target,'icon-facebook','social-facebook','Facebook');}
	if( mfn_opts_get('social-googleplus') ){include_social($target,'icon-gplus','social-googleplus','Google+');}
	if( mfn_opts_get('social-twitter') ) {include_social($target,'icon-twitter','social-twitter','Twitter');}
	if( mfn_opts_get('social-vimeo') ) {include_social($target,'icon-vimeo','social-vimeo','Vimeo');}
	if( mfn_opts_get('social-youtube') ) {include_social($target,'icon-play','social-youtube','YouTube');}
	if( mfn_opts_get('social-flickr') ) {include_social($target,'icon-flickr','social-flickr','Flickr');}
	if( mfn_opts_get('social-linkedin') ){include_social($target,'icon-linkedin','social-linkedin','LinkedIn');}
	if( mfn_opts_get('social-pinterest') ){include_social($target,'icon-pinterest','social-pinterest','Pinterest');}
	if( mfn_opts_get('social-dribbble') ) {include_social($target,'icon-dribbble','social-dribbble','Dribbble');}
	if( mfn_opts_get('social-instagram') ) {include_social($target,'icon-instagram','social-instagram','Instagram');}
	if( mfn_opts_get('social-behance') ) {include_social($target,'icon-behance','social-behance','Behance');}
	if( mfn_opts_get('social-tumblr') ) {include_social($target,'icon-tumblr','social-tumblr','Tumblr');}
	if( mfn_opts_get('social-tripadvisor') ) {include_social($target,'icon-tripadvisor','social-tripadvisor','Tripadvisor');}
	if( mfn_opts_get('social-vkontakte') ) {include_social($target,'icon-vkontakte','social-vkontakte','Vkontakte');}
	if( mfn_opts_get('social-viadeo') ) {include_social($target,'icon-viadeo','social-viadeo','Viadeo');}
	if( mfn_opts_get('social-xing') ) {include_social($target,'icon-xing','social-xing','Xing');}
	if( mfn_opts_get('social-rss') ) {include_social($target,'icon-rss','social-rss','Rss');}
	if( mfn_opts_get( 'social-custom-icon' ) &&  mfn_opts_get( 'social-custom-link' ) ){
		include_social($target,mfn_opts_get( 'social-custom-icon' ),'social-custom-link','');
	}
	echo '</div>';
	return ob_get_clean();
}

function include_social($target,$ico,$option,$title){
	echo '
		<div class="km-socials-share-modern-item km-item-bind-view km-item-bind-hidden" style="--icon-transition-time:0.8s;">
			<div class="km-socials-m-back km-socials-m-back-color"></div>
			<div class="km-socials-m-back km-socials-m-back-colorscheme"></div>
			<i class="km-socials-m-icon km-socials-m-icon-color '.$ico.'"></i>
			<i class="km-socials-m-icon km-socials-m-icon-hovercolor '.$ico.'"></i>
			<i class="km-socials-m-icon km-socials-m-icon-colorscheme '.$ico.'"></i>
			<div class="kameleon-eff-8-tada eff8-top"><div class="eff8-insider eff8-insider-one"></div></div>
			<div class="kameleon-eff-8-tada eff8-top-left"><div class="eff8-insider eff8-insider-one"></div></div>
			<div class="kameleon-eff-8-tada eff8-top-right"><div class="eff8-insider eff8-insider-one"></div></div>
			<div class="kameleon-eff-8-tada eff8-bottom"><div class="eff8-insider eff8-insider-two"></div></div>
			<div class="kameleon-eff-8-tada eff8-bottom-left"><div class="eff8-insider eff8-insider-two"></div></div>
			<div class="kameleon-eff-8-tada eff8-bottom-right"><div class="eff8-insider eff8-insider-two"></div></div>
			<div class="kameleon-eff-8-tada eff8-center-right"><div class="eff8-center-insider eff8-insider-three"></div></div>
			<div class="kameleon-eff-8-tada eff8-center-left"><div class="eff8-center-insider eff8-insider-four"></div></div>
			<a '.$target.' href="'. mfn_opts_get($option) .'" title="'.$title.'"></a>
		</div>'
	;
}
function register_shortcodes(){
	add_shortcode('custom_socials', 'custom_socials');
}
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode',11);
add_action( 'init', 'register_shortcodes');

function get_the_content_with_formatting ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
	$content = get_the_content($more_link_text, $stripteaser, $more_file);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}