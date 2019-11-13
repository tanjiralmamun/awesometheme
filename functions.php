<?php
/*
	==================================
		Include Scripts
	==================================
*/

	function awesome_script_enqueue(){
		//CSS
		wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
		wp_enqueue_style('customstyle', get_stylesheet_uri(), array(), '1.0.0', 'all');
		//JS
		wp_enqueue_script('jquery_update', 'https://code.jquery.com/jquery-3.4.1.min.js');
		wp_enqueue_script('jquery_migrate', 'https://code.jquery.com/jquery-migrate-1.4.1.min.js');
		wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
		wp_enqueue_script('customjs', get_template_directory_uri().'/js/scripts.js', array(), '1.0.0', true);
	}

	add_action('wp_enqueue_scripts', 'awesome_script_enqueue');


/*
	==================================
		Theme Setup Functions
	==================================
*/

	function awesome_theme_setup(){
		add_theme_support('menus');
		add_theme_support('custom-background');
		add_theme_support('custom-header');
		add_theme_support('post-thumbnails');
		add_theme_support('post-formats', array(
			'video',
			'image',
			'gallery',
			'aside',
			'link',
			'quote',
			'audio',
			'chat'
		));
		add_theme_support('html5');

		register_nav_menu('primary', 'Primary Header Navigation');
		register_nav_menu('secondary', 'Footer Navigation');
	}

	add_action('after_setup_theme', 'awesome_theme_setup');

/*
	==================================
		Sidebar Function
	==================================
*/

	function awesome_widget_setup(){
		register_sidebar(
			array(
				'name'	=> 'Right Sidebar',
				'id'	=> 'right-sidebar',
				'class'	=> 'custom',
				'description'	=> 'Standard Right Sidebar',
				'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</aside>',
				'before_title'	=> '<h2 class="widget-title">',
				'after_title'	=> '</h2>'
			)
		);

		register_sidebar(
			array(
				'name'	=> 'Left Sidebar',
				'id'	=> 'left-sidebar',
				'description' => 'Standard Left Sidebar'
			)
		);
	}

	add_action('widgets_init', 'awesome_widget_setup');

/*
	==================================
		Include Walker File
	==================================
*/

	require_once(get_template_directory().'/inc/walker.php');

/*
	==================================
		Custom Post Type
	==================================
*/

function awesome_custom_post_type(){
	$labels = array(

		'name'	=> 'Portfolios',
		'singular_name'	=> 'Portfolio',
		'all_items' => 'All Portfolios',
		'add_new'	=> 'Add New Portfolio',
		'add_new_item'	=> 'Add New Portfolio Item',
		'edit_item'	=> 'Edit Portfolio',
		'new_item'	=> 'New Portfolio',
		'view_item'	=> 'View Portfolio',
		'search_item' => 'Search Portfolio',
		'not_found'	=> 'No Portfolio Item Found',
		'not_found_in_trash'	=> 'No Portfolio Item Found In Trash',
		'parent_item_colon'	=> 'Parent Portfolio Item'

	);

	$args = array(

		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var'	=> true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revision'),
		//'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false

	);

	register_post_type('portfolio', $args);
}

add_action('init', 'awesome_custom_post_type');

function awesome_custom_taxonomies(){

	// add new taxonomy hierarchical

	$labels = array(
		'name'	=> 'Fields',
		'singular_name'	=> 'Field',
		'search_items'	=> 'Search Fields',
		'all_items'	=> 'All Fields',
		'parent_item' => 'Parent Field',
		'parent_item_colon' => 'Parent Field',
		'edit_item' => 'Edit Field',
		'update_item' => 'Update Field',
		'add_new_item' => 'Add New Field',
		'menu_name' => 'Fields'
	);

	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'field')
	);

	register_taxonomy( 'field', 'portfolio', $args );

	// Add new taxonomy not hierarchical 

	register_taxonomy( 'software', 'portfolio', array(
		'label'	=> 'Software',
		'rewrite' => array('slug' => 'software')
	) );
}

add_action('init', 'awesome_custom_taxonomies');

/*
	==================================
		Custom Term Function
	==================================
*/

function awesome_custom_term( $postID, $term ){

	$term_list = wp_get_post_terms( $postID, $term );
	$output = '';

	$i = 0;
	foreach($term_list as $term) {
		$i++;
		if( $i > 1 ){ $output .= ', '; }
		$output .= '<a href="'. get_term_link( $term ) . '">'. $term->name .'</a>';
	}

	return $output;
}

?>