<?php 

// Register Custom Navigation Walkers
require_once('wp_navwalkers.php');

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'PB-Bootstrap-less' ),
    'footer' => __( 'Footer Menu', 'PB-Bootstrap-less' ),
) );


// Custom Widget Areas

if ( function_exists('register_sidebar') ) {
  register_sidebar( array(
   'name' => __( 'Sidebar 1'),
   'id' => 'sidebar-1',
   'description' => __( 'An optional widget area', 'pb-bootstrap' ),
   'before_widget' => '<aside id="%1$s" class="widget %2$s unstyled">',
   'after_widget' => "</aside>",
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ) );

}

if ( function_exists('register_sidebar') ) {
  register_sidebar(array(
   'name' => __( 'Sidebar 2'),
   'id' => 'sidebar-2',
   'description' => __( 'Second optional widget area', 'pb-bootstrap' ),
   'before_widget' => '<aside id="%1$s" class="widget %2$s unstyled">',
   'after_widget' => "</aside>",
   'before_title' => '<h3 class="widget-title">',
   'after_title' => '</h3>',
   ));
  
}

// Editor Styles
function my_theme_add_editor_styles() {
  add_editor_style( 'editor-style.css' );
}
add_action( 'after_setup_theme', 'my_theme_add_editor_styles' );

// Change the Read More

function new_excerpt_more( $more ) {
  return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '&rarr;', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


// Featured image Support

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 900, 273, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // uncomment the next lines if you need additional image sizes
    // add_image_size( 'home-thumb', 451, 300, true ); //300 pixels wide (and unlimited height)
    // add_image_size( 'home-list-thumb', 300, 9999, true ); //300 pixels wide (and unlimited height)
  }  

// Options framework

//require_once ( get_template_directory() . '/theme-options.php' );

  if ( !function_exists( 'optionsframework_init' ) ) {

    define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
    define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');

    require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

  };

// Load Scripts

function wpbootstrap_scripts_with_jquery()
{
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ),'','',true  );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
	
	wp_register_script( 'jquery.cookiesdirective.js', get_template_directory_uri() . '/js/jquery.cookiesdirective.js' );
	 // For either a plugin or a theme, you can then enqueue the script:
	 wp_enqueue_script( 'jquery.cookiesdirective.js' );
	

}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


// Add PB logo to admin 

function pb_url_login(){
      	return "http://www.pointblank.ie/"; // your URL here
      }
      add_filter('login_headerurl', 'pb_url_login');

      /// custom admin login logo
      function custom_login_logo() {
      	echo '<style type="text/css">
      	h1 a { background-image: url(https://s3.amazonaws.com/pointblankltd/uploads/bootstrap/pblogo.png) !important; 
         background-size:172px 112px !important;
         width:172px !important;
         height:120px !important;
       }

     </style>';
   }
   add_action('login_head', 'custom_login_logo');


function add_cookie_warning()
{

  // Register the script like this for a theme:
  wp_register_script( 'cookie-script', get_template_directory_uri() . '/js/cookiewarning.js','','',true );

  // For either a plugin or a theme, you can then enqueue the script:
  wp_enqueue_script( 'cookie-script' );
}
add_action( 'wp_enqueue_scripts', 'add_cookie_warning' );


// Boostrap Pagination
        
function custom_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'type'  => 'array',
            'prev_next'   => true,
      'prev_text'    => __('«'),
      'next_text'    => __('»'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul>';
        }
}

