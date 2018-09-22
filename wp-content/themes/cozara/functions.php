<?php

add_action( 'after_setup_theme', 'cozara_setup' );
function cozara_setup(){
  load_theme_textdomain( 'cozara', get_template_directory() . '/languages' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 640;
  register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'cozara' ) )
  );
}

add_action( 'wp_enqueue_scripts', 'cozara_load_scripts' );
function cozara_load_scripts(){
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script('typekitcache', get_template_directory_uri().'/js/typekit_cache.js');
  wp_enqueue_script('plugins', get_template_directory_uri().'/js/plugins.js');
  wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
}

add_action( 'comment_form_before', 'cozara_enqueue_comment_reply_script' );
function cozara_enqueue_comment_reply_script(){
  if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'cozara_title' );
function cozara_title( $title ) {
  if ( $title == '' ) {
    return '&rarr;';
  } else {
    return $title;
  }
}

add_filter( 'wp_title', 'cozara_filter_wp_title' );
function cozara_filter_wp_title( $title ){
  return $title . esc_attr( get_bloginfo( 'name' ) );
}
function career_content_type() {
  $labels = array(
    'name' => _x( 'Careers', 'post type general name' ),
    'singular_name' => _x( 'Career', 'post type singular name' ),
    'add_new' => _x( 'Add New', 'book' ),
    'add_new_item' => __( 'Add New Career' ),
    'edit_item' => __( 'Edit Career' ),
    'new_item' => __( 'New Career' ),
    'all_items' => __( 'All Careers' ),
    'view_item' => __( 'View Careers' ),
    'search_items' => __( 'Search Careers' ),
    'not_found' => __( 'No careers found' ),
    'not_found_in_trash' => __( 'No careers found in the Trash' ),
    'parent_item_colon' => '',
    'menu_name' => 'Careers'
  );
  $args = array(
    'labels' => $labels,
    'description' => 'Holds our careers',
    'public' => true,
    'menu_position' => 26,
    'menu_icon' => 'dashicons-media-text',
    'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive' => false,
  );
  register_post_type( 'careers', $args );
}
add_action( 'init', 'career_content_type' );

//Custom admin panel
function my_login_logo() { ?>
    <style type="text/css">
      body.login {}
      @keyframes zoomIn{
        from{
          transform: scale(0) translateY(-50%);;
        }
        to{
          transform: scale(1) translateY(-50%);;
        }
      }
      body.login div#login {
        width: 300px;
        padding: 0;
        position: relative;
        display: table;
        top: 50%;
        transform: translateY(-50%);
        transform-origin: top center;
        animation: zoomIn 0.5s forwards;
      }
      body.login div#login h1 {}
      body.login div#login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/login-logo.svg);
        outline: 0;
        border: 0;
        box-shadow: none;
      }
      body.login div#login_error{
        width: 250px;
        margin: 0 20px;
      }
      body.login div#login form#loginform {
        margin-top: 0;
        padding-top: 10px;
      }
      body.interim-login{
        height: inherit!important;
      }
      #wpadminbar .quicklinks li .blavatar{
        display: none;
      }
      body.login div#login form#loginform p {}
      body.login div#login form#loginform p label {}
      body.login div#login form#loginform input {}
      body.login div#login form#loginform input#user_login {}
      body.login div#login form#loginform input#user_pass {}
      body.login div#login form#loginform p.forgetmenot {}
      body.login div#login form#loginform p.forgetmenot input#rememberme:focus {
        border-color: #5ac09d;
      }
      body.login div#login form#loginform p.submit {}
      body.login div#login form#loginform p.submit input#wp-submit {}
      body.login #nav a{
        font-size: 12px;
        transition: color 0.1s ease-out
      }
      body.login #nav{
        margin: 0 0 20px;
        padding: 0 20px;
        display: inline-block;
        vertical-align: top;
        float: right;
      }
      body.login #nav a:focus{
        box-shadow: none;
      }
      body.login #nav a:hover{
        color: #5ac09d;
      }
      body.login #backtoblog a{
        display: none;
      }
      body.login h1 a{
        width: 105px;
        height: 75px;
        padding: 0;
        background-size: contain;
        background-position: top center;
      }
      body.wp-core-ui{
        background-color: #0e0e0e;
      }
      body.wp-core-ui.login form{
        background: #0e0e0e;
        box-shadow: none;
        padding-bottom: 20px;
      }
      body.wp-core-ui.login input{
        color: #FFF;
        background: #0e0e0e;
        transition: border-color 0.1s ease-out;
      }
      body.wp-core-ui.login input:focus, body.wp-core-ui.login input:active{
        border-color: #5ac09d;
      }
      body.wp-core-ui.login input:-webkit-autofill{
        -webkit-box-shadow: 0 0 0px 1000px #0e0e0e inset;
        -webkit-text-fill-color: #FFF;
      }
      body.wp-core-ui.login input[type=checkbox]{
        background-color: #0e0e0e;
      }
      body.wp-core-ui.login input[type=checkbox]:focus, body.wp-core-ui.login input[type=checkbox]:active{
        box-shadow: none;
      }
      body.wp-core-ui.login input[type=checkbox]:checked:before{
        color: #5ac09d;
      }
      body.wp-core-ui .wp-core-ui .button-group.button-large .button, body.wp-core-ui .button.button-large{
        background-color: #5ac09d;
        font-size: 12px;
        color: #0e0e0e;
        text-transform: uppercase;
        transition: color 0.1s ease-out, background 0.1s ease-out;
        border-radius: 0;
        box-shadow: none;
        text-shadow: none;
        border: 0;
        outline: 0;
        font-weight: 600;
        padding: 0.15em 2em;
        height: auto;
      }
      body.wp-core-ui .wp-core-ui .button-group.button-large .button:hover, body.wp-core-ui .button.button-large:hover{
        background: #48967b;
      }
      ::selection {
        background: #5ac09d;
      }
      ::-moz-selection {
        background: #5ac09d;
      }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function slugify($text){
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = trim($text, '-');
  $text = preg_replace('~-+~', '-', $text);
  $text = strtolower($text);
  if (empty($text)) return 'n-a';

  return $text;
}
