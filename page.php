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
<<<<<<< HEAD
<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100">
    
 <header style="background-image:url('<?php the_post_thumbnail_url();?>'); background-size:cover" id="header" class="mdl-layout__header mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
=======
<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100"> 

<<<<<<< HEAD
<header style="background-size:cover;background-image:url('<?php the_post_thumbnail_url('large');?>'); background-position: center;" id="header" class="mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
=======
 <header style="background-size:cover;background-image:url('<?php the_post_thumbnail_url();?>'); background-position: center;" id="header" class="mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
>>>>>>> a9b4904f8ae86fa53d80818c26cd146b0afe812c
>>>>>>> e5928e631e60daf142fdcfc1b42d8729c625745a
    
        <!-- Top row, always visible -->

        <div class="mdl-layout__header-row z-depth-2 navbar-fixed">
            
            <nav class="mdl-navigation z-depth-0">
                    <div class="topleft_nav">
<<<<<<< HEAD
                        <a href="<?php echo site_url();?>" class="brand-logo"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2017/12/USF-Libraries-and-DHHC-250x50.png"></a>
=======
<<<<<<< HEAD
                        <a href="<?php echo site_url();?>" class="brand-logo"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2017/12/USF-Libraries-and-DHHC-250x50.png"></a>
=======
                        <a href="http://localhost/wordpress/dhhc/" class="brand-logo"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/09/logo.png"></a>
>>>>>>> a9b4904f8ae86fa53d80818c26cd146b0afe812c
>>>>>>> e5928e631e60daf142fdcfc1b42d8729c625745a
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
<<<<<<< HEAD
            </nav>
            <div class="mdl-layout-spacer"></div>
                
                

=======
                    <div class="topright_nav right">
                        <a href="https://lib.usf.edu" class="left">
                        <i class="material-icons left">create</i> USF Library</a>
                    </div>
                </nav>
>>>>>>> a9b4904f8ae86fa53d80818c26cd146b0afe812c
            </div><!-- /.mdl-layout__header-row (top) -->

            <!-- Bottom row, not visible on scroll -->
            <div class="mdl-layout__header-row mdl-layout__header-row--bottom">

                <!-- Navigation -->
        <div class="container">
            <div class="row center">
<div class="col m1 hide-on-small-only"></div>
<div class="col s12 m10">
<div class="introtext text-white animate fadeInUp"><h1><?php echo the_title();?></h1></div>
</div>
<div class="col m1 hide-on-small-only"></div></div>
        </div>
            </div><!-- /.mdl-layout__header-row (bottom) -->

    </header><!-- /#header -->

    <div id="main" class="content">

        <div class="mdl-grid">
        <?php the_post(); ?>

        <div id="post-<?php the_ID(); ?>" class="container">
<section>
            <?php
                the_content();

                wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'dhhc' ) . '&after=</div>');
                edit_post_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' );
            ?></section>
        </div><!-- /#post-<?php the_ID(); ?> -->


<?php get_footer(); ?>
