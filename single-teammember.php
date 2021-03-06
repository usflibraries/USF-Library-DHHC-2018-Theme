<?php
/**
 * The Template for displaying all single posts.
 */

	get_header();
?>
<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100">
    
    <header style="background-image:url('<?php the_post_thumbnail_url();?>')" id="header" class="mdl-layout__header mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
    
        <!-- Top row, always visible -->

        <div class="mdl-layout__header-row z-depth-2 navbar-fixed">
            
            <nav class="mdl-navigation z-depth-0">
                    <div class="topleft_nav">
                        <a href="<?php echo site_url();?>" class="brand-logo"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2017/12/USF-Libraries-and-DHHC-250x50.png"></a>
                    </div>
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <div class="topright_nav hide-on-med-and-down">
                    <?php
                    /** Loading WordPress Custom Menu (theme_location) **/
                    wp_nav_menu( array(
                    'theme_location' => 'main-menu',
                    'container'      => '',
                    'items_wrap'     => '%3$s',
                    'depth'          => 1,
                    //'fallback_cb'    => 'mdl_navwalker::fallback',
                    'walker'         => new mdl_navwalker(),
                    ) );
                    ?>
                    </div>
            </nav>
            <div class="mdl-layout-spacer"></div>
                
                

            </div><!-- /.mdl-layout__header-row (top) -->

            <!-- Bottom row, not visible on scroll -->
            <div class="mdl-layout__header-row mdl-layout__header-row--bottom">

                <!-- Navigation -->
        <div class="mdl-navigation__container">

<div class="introtext text-white animate fadeInUp"><h1><?php echo the_title();?></h1></div>

            </div><!-- /.mdl-layout__header-row (bottom) -->

    </header><!-- /#header -->

    <div id="main" class="mdl-layout__content container">

			<section>
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
				the_post();
			?>
		<?php
				get_template_part( 'content', 'single' );
			?>

		<?php
			endwhile;
			endif;
			wp_reset_postdata(); // end of the loop.
		?>
	<div class="post-socials"><a href=""><i class="fa fa-facebook"></i></a><a href=""><i class="fa fa-twitter"></i></a><a href=""><i class="fa fa-flickr"></i></a><a href=""><i class="fa fa-vimeo"></i></a><!--<a href=""><i class="fa fa-globe"></i></a>--><a href=""><img src="<?php echo site_url();?>/wp-content/themes/dhhc/gigapan1.svg"></a><a href=""><img src="<?php echo site_url();?>/wp-content/themes/dhhc/sketchfab1.svg"></a></div>

<?php get_footer(); ?>
