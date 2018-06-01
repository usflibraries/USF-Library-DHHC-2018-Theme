<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo site_url();?>/wp-content/themes/dhhc/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="<?php echo site_url();?>/wp-content/themes/dhhc/js/materialize.min.js"></script>
  <!-- Smooth Scrolling -->
  <script src="<?php echo site_url();?>/wp-content/themes/dhhc/js/smoothscroll.js"></script>
<link rel='stylesheet' href="<?php echo site_url();?>/wp-content/themes/dhhc/css/font-awesome.min.css"/>

<link rel='stylesheet' id='materialiconsfont-css'  href='//fonts.googleapis.com/icon?family=Material+Icons&#038;ver=1.0' type='text/css' media='all' />
<link rel='stylesheet' src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"/>
<?php wp_head(); ?>
</head>

<?php
    $navbar_position = get_theme_mod( 'navbar_position', 'scroll' ); // get custom meta-value

    $search_enabled = get_theme_mod( 'search_enabled', '1' ); // get custom meta-value
?>
<script>
$(document).ready(function(){
  $(".button-collapse").sideNav();
});
</script>
<body <?php body_class(); ?>>