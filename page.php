<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side
 *
 */

    get_header();

    $id = get_the_ID();

    // Add class via custom field (optional)
    $class = sanitize_text_field( get_post_meta( $id, '_class', true ) );// get custom meta-value
    $style = sanitize_text_field( get_post_meta( $id, '_style', true ) );// get custom meta-value
?>
<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100">
    
 <header id="header" class="mdl-layout__header mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
    
        <!-- Top row, always visible -->

        <div class="mdl-layout__header-row z-depth-2 navbar-fixed">
            
            <nav class="mdl-navigation z-depth-0">
                    <div class="topleft_nav">
                        <a href="<?php echo site_url();?>" class="brand-logo"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/DHHC_PyramidandLetters_White_1000vpx.png"></a>
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
            <div class="mdl-layout__header-row mdl-layout__header-row--bottom" style="background-image:url('<?php the_post_thumbnail_url();?>')" >

                <!-- Navigation -->
        <div class="container semi-bg">
            <div class="row center">
<div class="col m1 hide-on-small-only"></div>
<div class="col s12 m10">
<div class="introtext text-white animate fadeInUp"><h1><?php echo the_title();?></h1></div>
</div>
<div class="col m1 hide-on-small-only"></div></div>
        </div>
            </div><!-- /.mdl-layout__header-row (bottom) -->

    </header><!-- /#header -->

    <div id="main" class="mdl-layout__content">

        <div class="mdl-grid">
        <?php the_post(); ?>

        <div id="post-<?php the_ID(); ?>" class="container">
<section>
            <?php
                the_content();

                wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'dhhc' ) . '&after=</div>');
                edit_post_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' );
            ?></section><div class="post-socials"><a href="https://www.facebook.com/3DResearchers"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/3D_Researchers"><i class="fa fa-twitter"></i></a><a href="https://www.flickr.com/photos/aist/albums"><i class="fa fa-flickr"></i></a><a href="https://vimeo.com/user30365775"><i class="fa fa-vimeo"></i></a><!--<a href=""><i class="fa fa-globe"></i></a>--><a href="http://gigapan.com/profiles/USF_AIST"><img src="<?php echo site_url();?>/wp-content/themes/dhhc/gigapan1.svg"></a><a href="https://sketchfab.com/USF_digital"><img src="<?php echo site_url();?>/wp-content/themes/dhhc/sketchfab1.svg"></a></div>
        </div><!-- /#post-<?php the_ID(); ?> -->


<?php get_footer(); ?>
