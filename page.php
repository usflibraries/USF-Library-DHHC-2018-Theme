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
    
 <header style="background-image:url('<?php the_post_thumbnail_url();?>')" id="header" class="mdl-layout__header mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
    
        <!-- Top row, always visible -->

        <div class="mdl-layout__header-row navbar-fixed">
            
            <nav class="mdl-navigation">
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
        <div class="container">
            <div class="row center">
<div class="col m1 hide-on-small-only"></div>
<div class="col s12 m10">
<div class="introtext text-white animate fadeInUp" data-aos="fade-up"><h1><?php echo the_title();?></h1></div>
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
