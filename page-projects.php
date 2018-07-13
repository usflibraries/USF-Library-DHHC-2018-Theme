<?php
/**
 * Template Name: Projects
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
                <div class="container">
                    <div class="row">
                        <div class="col m1 hide-on-small-only"></div>
                        <div class="col s12 m10">
                            <h1 class="introtext text-white animate fadeInUp"><?php echo the_title();?>
                            </h1>
                        </div>
                        <div class="col m1 hide-on-small-only"></div>
                    </div>
                </div>
            </div><!-- /.mdl-layout__header-row (bottom) -->
        </header><!-- /#header -->
    <section class="alt">
<div class="container home-projects">
<div class="row">
<?php
// The Query
$the_query = new WP_Query( array( 'category_name' => 'latest-projects' ) );
// The Loop
if ( $the_query->have_posts() ) {
  while ( $the_query->have_posts() ) {
    $the_query->the_post();
    echo '<div class="col s12 m6 l4"><a href="' . get_the_permalink() . '"><div class="project-box" style="background-image: url(' . get_the_post_thumbnail_url() . ')"><span class="project-box-title">' . get_the_title() . '<p>' . get_the_excerpt() . '</p></span></div><div class="project-box-subtitle">' . get_the_title() . '</div></a></div>';
  }
  /* Restore original Post Data */
  wp_reset_postdata();
} else {
  // no posts found
}
?>
</div></div>

 </section>
    

<?php get_footer(); ?>