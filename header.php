<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
      <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="<?php echo site_url();?>/wp-content/themes/USF-Library-DHHC-2018-Theme/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="<?php echo site_url();?>/wp-content/themes/USF-Library-DHHC-2018-Theme/js/materialize.min.js"></script>
  <!-- Smooth Scrolling -->
  <script src="<?php echo site_url();?>/wp-content/themes/USF-Library-DHHC-2018-Theme/js/smoothscroll.js"></script>
<link rel='stylesheet' href="<?php echo site_url();?>/wp-content/themes/USF-Library-DHHC-2018-Theme/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<script>
// CAROUSEL
$(document).ready(function(){
  $('.carousel').carousel(
  {
    dist: 0,
    padding: 0,
    fullWidth: true,
    indicators: false,
    duration: 100,
  }
  );
});

autoplay()   
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
</script>
<body <?php body_class(); ?>