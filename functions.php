<?php
/**
 * cone functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * @link https://codex.wordpress.org/Plugin_API
 *
 * @package cone
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cone_theme_setup() {
 
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'cone', get_template_directory() . '/languages' );
 
    // Register nav menues to use wp_nav_menu()
    register_nav_menus( array(
        'primary' => __( 'Primary menu', 'cone' ),
        'secondary' => __( 'Secondary menu', 'cone' ),
        'footer' => __( 'Footer menu', 'cone' )
    ) );
 
    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    // Add thumb sizes below
    add_image_size( 'rectangle-thumb', 375, 220, true );

    /*
     * Enable support for Post Formats.
     * See https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
    ) );
 
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'cone_theme_setup' );

/**
 * Register custom post types
 * 
 * @link https://codex.wordpress.org/Function_Reference/register_post_type
 */
function cone_register_post_types() {
    // Custom post types should be registered here
}
add_action( 'init', 'cone_register_post_types' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cone_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Global sidebar', 'cone' ),
        'id'            => 'sidebar-1',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Investor info', 'cone' ),
        'id'            => 'sidebar-2',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'cone_widgets_init' );

/**
 * Set the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove
 * the filter and add your own function tied to
 * the excerpt_length filter hook.
 *
 * @param int $length The number of excerpt characters.
 * @return int The filtered number of characters.
 */
function cone_set_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'cone_set_excerpt_length' );

/**
 * Replace "[...]" in the Read More link with an ellipsis.
 *
 * The "[...]" is appended to automatically generated excerpts.
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @param string $more The Read More text.
 * @return The filtered Read More text.
 */
function cone_excerpt_more( $more ) {
    if ( ! is_admin() ) {
        return ' &hellip;';
    }
    return $more;
}
add_filter( 'excerpt_more', 'cone_excerpt_more' );

remove_filter ('acf_the_content', 'wpautop');


/**
 * Add all the main scripts and styles here.
 */
function cone_enqueue_scripts() {

    // WordPress style.css
    wp_enqueue_style( 'default-style', get_stylesheet_uri() );

    // vendor.css created with gulp
    wp_enqueue_style( 'main-min-style', get_template_directory_uri() . '/assets/css/src/main.min.css' );

    // vendor.js created with gulp
    wp_enqueue_script( 'main-min-scripts', get_template_directory_uri() . '/assets/js/src/main.min.js', array('jquery'), 1.0, true );

    wp_localize_script(
        'main-min-scripts', // this needs to match the name of our enqueued script
        'ajaxObject',      // the name of the object
        array('ajaxurl' => admin_url('admin-ajax.php')) // the property/value
    );
}
add_action( 'wp_enqueue_scripts', 'cone_enqueue_scripts' );

// Custom template tags
require get_template_directory() . '/inc/template-tags.php';


// Creating the widget

class wpb_widget extends WP_Widget {



    function __construct() {

parent::__construct(

// Base ID of your widget

'wpb_widget',



// Widget name will appear in UI

__('WPBeginner Widget', 'wpb_widget_domain'),


// Widget
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )

);

}



// Creating widget front-end

// This is where the action happens

    public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes

echo $args['before_widget'];

if ( ! empty( $title ) )

echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output'

echo __( 'Hello, World!', 'wpb_widget_domain' );

echo $args['after_widget'];
}



// Widget Backend
    public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
}

// Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
