<?php
/**
 * The template for displaying the header
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav id="mainNav">
  <div class="scaler">
		<?php
		$myMenu = wp_get_nav_menu_items('Main Nav');
		function checkCurrent($myID){
			if($myID == get_the_ID()) return ' current';
		}
		echo '<div class="navSplit" id="leftNav">';
		for($i = 0; $i < floor(count($myMenu)/2); $i++){
			echo '<a class="navBtn'.checkCurrent($myMenu[$i]->ID).'" href="'.$myMenu[$i]->url.'">'.$myMenu[$i]->title.'</a>';
		}
		echo '</div>';

		echo '<a href="'.get_home_url().'" id="logo"><img src="'. get_template_directory_uri().'/images/cozaraLogo.png'.'" alt="coZara" /></a>';

		echo '<div class="navSplit" id="rightNav">';
		for($i = ceil(count($myMenu)/2); $i < count($myMenu); $i++){
			echo '<a class="navBtn'.checkCurrent($myMenu[$i]->ID).'" href="'.$myMenu[$i]->url.'">'.$myMenu[$i]->title.'</a>';
		} echo '</div>'; ?>
  </div>
</nav>
<div id="content">
