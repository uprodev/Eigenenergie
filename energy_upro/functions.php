<?php 

// show_admin_bar( false );


require_once 'inc/cpt.php';
require_once 'inc/ajax.php';


add_action('wp_enqueue_scripts', 'load_style_script');
function load_style_script(){
	wp_enqueue_style('my-normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
	wp_enqueue_style('my-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
	wp_enqueue_style('my-fa', get_stylesheet_directory_uri() . '/fonts/FA5PRO-master/css/all.css');
	wp_enqueue_style('my-font', get_stylesheet_directory_uri() . '/css/font.css');
	wp_enqueue_style('my-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('my-nice-select', get_stylesheet_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('my-fancybox', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css');
	wp_enqueue_style('my-swiper', get_stylesheet_directory_uri() . '/css/swiper.min.css');
	wp_enqueue_style('my-styles', get_stylesheet_directory_uri() . '/css/styles.css');
	wp_enqueue_style('my-responsive', get_stylesheet_directory_uri() . '/css/responsive.css');
	wp_enqueue_style('my-style-main', get_stylesheet_directory_uri() . '/style.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('my-sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array(), false, true);
	wp_enqueue_script('my-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array(), false, true);
	wp_enqueue_script('my-swiper', get_stylesheet_directory_uri() . '/js/swiper.js', array(), false, true);
	wp_enqueue_script('my-fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox.min.js', array(), false, true);
	wp_enqueue_script('my-nice-select', get_stylesheet_directory_uri() . '/js/jquery.nice-select.min.js', array(), false, true);
	wp_enqueue_script('my-script', get_stylesheet_directory_uri() . '/js/script.js', array(), false, true);
	wp_enqueue_script('my-add', get_stylesheet_directory_uri() . '/js/add.js', array(), false, true);
}


add_action('admin_enqueue_scripts', 'load_admin_style');
function load_admin_style() {
    wp_enqueue_style('admin', get_stylesheet_directory_uri() . '/css/admin.css');
}


add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header' => 'Header menu',
		'footer' => 'Footer menu'
	) );
});


add_theme_support( 'title-tag' );
add_theme_support('html5');
add_theme_support( 'post-thumbnails' ); 


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Main settings',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}


add_filter('wpcf7_autop_or_not', '__return_false');


function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyDiyT05YehIdz2LrV-QOeRa5M18WfKtlnY');
}
add_action('acf/init', 'my_acf_init');


add_filter('tiny_mce_before_init', 'override_mce_options');
function override_mce_options($initArray) {
	$opts = '*[*]';
	$initArray['valid_elements'] = $opts;
	$initArray['extended_valid_elements'] = $opts;
	return $initArray;
}


function custom_language_switcher(){
	$languages = icl_get_languages('skip_missing=0&orderby=id&order=desc');
	if(!empty($languages)){

		echo '<div class="lang-wrap">';

		foreach($languages as $index => $language){
			if($language['active'] === '1') echo '<a href="#"><img src="' . $language['country_flag_url'] . '" alt=""><i class="far fa-chevron-down"></i></a>';
		}

		echo '<ul>';

		foreach($languages as $index => $language){

			echo '<li><a href="' . $language['url'] . '"><img src="' . $language['country_flag_url'] . '" alt="">' . $language['native_name'] . '</a></li>';

		}

		echo '</ul></div>';

	}
}


function add_class_content($string, $p_class='', $h_class='') {

	if (str_contains($string, '<h')) {
		foreach (range(1,6) as $i) {
			$from[] = "<h$i";
			$to[] = '<h'. $i .' class="'. $h_class . '"';
		}
	} 
	if (str_contains($string, '<p')){
		$from[] = "<p";
		$to[] = '<p class="'. $p_class . '"';
	}

	return str_replace ($from, $to, $string);

}


add_filter('acfe/flexible/thumbnail', 'my_acf_layout_thumbnail', 10, 3);
function my_acf_layout_thumbnail($thumbnail, $field, $layout){

    // Must return an URL or Attachment ID
    return get_stylesheet_directory_uri() . '/img/acf/' . $layout['name'] . '.png';

}


function removeObjectsWithSameName($array) {
    $uniqueNames = [];
    $resultArray = [];

    foreach ($array as $item) {
        $name = $item->term_id;

        if (!in_array($name, $uniqueNames)) {
            $uniqueNames[] = $name;
            $resultArray[] = $item;
        }
    }

    return $resultArray;
}