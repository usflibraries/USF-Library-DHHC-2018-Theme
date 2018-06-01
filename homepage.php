<?php
/**
 * Template Name: Home
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
                        <a href="#" class="brand-logo"><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2017/12/USF-Libraries-and-DHHC-250x50.png"></a>
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
                <div class="row center">
                    <div class="col m1"></div>
                    <div class="col s12 m10">
                        <div class="introtext text-white animate fadeInUp"><span>University of South Florida Libraries</span>Digital Heritage & Humanities Collections</div>
                    </div>
                    <div class="col m1"></div></div>
                </div>
            </div><!-- /.mdl-layout__header-row (bottom) -->
        </div>

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
<div class="post-socials"><a href="https://www.facebook.com/3DResearchers"><i class="fa fa-facebook"></i></a><a href="https://twitter.com/3D_Researchers"><i class="fa fa-twitter"></i></a><a href="https://www.flickr.com/photos/aist/albums"><i class="fa fa-flickr"></i></a><a href="https://vimeo.com/user30365775"><i class="fa fa-vimeo"></i></a><a href=""><i class="fa fa-globe"></i></a><a href="http://gigapan.com/profiles/USF_AIST"><img src="<?php echo site_url();?>/wp-content/themes/dhhc/gigapan1.svg"></a><a href="https://sketchfab.com/USF_digital"><img src="<?php echo site_url();?>/wp-content/themes/dhhc/sketchfab1.svg"></a></div>
<p class="center">Copyright &copy; 2018. Digital Heritage and Humanities Collections, University of South Florida Libraries.</p>
        </div><!-- /#post-<?php the_ID(); ?> -->

    <section class="alt">
<h2 class="center white-text">Highlighted Projects</h2>
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
  <div class="center" width=100%"><a class="btn-large center usfteal" href="our-projects/">VIEW ALL PROJECTS</a></div>
 </section>
    

<?php get_footer(); ?>