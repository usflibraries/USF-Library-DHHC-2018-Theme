<?php
/**
 * The Template for displaying all single posts.
 */

	get_header();
?>
<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100">
    
<<<<<<< HEAD
    <header style="background-image:url('<?php the_post_thumbnail_url();?>'); background-size:cover" id="header" class="mdl-layout__header mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
=======
     <header style="background-size:cover;background-image:url('<?php the_post_thumbnail_url();?>'); background-position: center;" id="header" class="mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
>>>>>>> a9b4904f8ae86fa53d80818c26cd146b0afe812c
    
        <!-- Top row, always visible -->

        <div class="mdl-layout__header-row z-depth-2 navbar-fixed">
            
            <nav class="mdl-navigation z-depth-0">
                    <div class="topleft_nav">
                        <a href="http://localhost/wordpress/dhhc/" class="brand-logo">
                            <img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/09/logo.png">
                        </a>
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
        <div class="container">

<div class="introtext text-white animate fadeInUp"><h1><?php echo the_title();?></h1></div>

            </div><!-- /.mdl-layout__header-row (bottom) -->

    </header><!-- /#header -->

    <div id="main" class="container">

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


<?php get_footer(); ?>
