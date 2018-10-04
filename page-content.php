<?php
/**
 * Template Name: Default Page (use this for inner pages)
 * 
 *
 */

    get_header();

    $id = get_the_ID();

    // Add class via custom field (optional)
    $class = sanitize_text_field( get_post_meta( $id, '_class', true ) );// get custom meta-value
    $style = sanitize_text_field( get_post_meta( $id, '_style', true ) );// get custom meta-value
?>
<div id="wrapper" class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-color--grey-100">
    
    <header>
    
        <!-- Top row, always visible -->

        <div class="mdl-layout__header-row z-depth-2">
            
            <nav class="mdl-navigation z-depth-0">
                <div class="topleft_nav">
          <a href="http://localhost/wordpress/dhhc/"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2017/12/USF-Libraries-and-DHHC-250x50.png"></a>
                </div>
<div class="topright_nav">
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
            <div class="row center">
<div class="col m1"></div>
<div class="col s12 m10">
<div class="text-white animate fadeInUp"><h1><?php get_the_title();?></div>
</div>
<div class="col m1"></div></div>
        </div>
            </div><!-- /.mdl-layout__header-row (bottom) -->

    </header><!-- /#header -->

    <div id="main" class="mdl-layout__content">
        <div class="mdl-grid">
        <?php the_post(); ?>

        <div id="post-<?php the_ID(); ?>" class="container">

            <?php
                the_content();

                wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'dhhc' ) . '&after=</div>');
                edit_post_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' );
            ?>
        </div><!-- /#post-<?php the_ID(); ?> -->
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
