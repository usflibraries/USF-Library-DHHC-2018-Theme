<?php
/**
 * Template Name: Team
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
            <div style="background-image:url('<?php the_post_thumbnail_url();?>')" class="mdl-layout__header-row mdl-layout__header-row--bottom">
                <div class="semi-bg">
                <!-- Navigation -->
                <div class="container">
                    <div class="row mt-10">
                        <div class="col m1 hide-on-small-only"></div>
                        <div class="col s12">
                            <h1 class="introtext text-white animate fadeInUp"><?php echo the_title();?> 
                            </h1>
                            <h3 class="text-center introtext"><?php the_field('team_member_title'); ?></h3>
                        </div>
                        <div class="col m1 hide-on-small-only"></div>
                    </div>
                </div>
            </div>
            </div><!-- /.mdl-layout__header-row (bottom) -->
        </header><!-- /#header -->
    <section class="alt">
<div class="container home-projects">
<div class="row">
    <div class="col s12 m5 l4">
        <img src="<?php the_field('team_member_photo'); ?>">
    </div>
    <div class="col s12 m7 l8 white-text">
        <span class="divider"></span>
        <p><?php the_field('team_member_bio'); ?></p>
    </div>


</div>
<h3 class="white-text mt-3">Other Team Members</h3>
<span class="divider"></span>
<div class="staffgrid row">
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-lori.jpg"><span>Lori Collins</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb_travis.jpg"><span>Travis Doering</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-richard.jpg"><span>Richard McKenzie</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb_garrett.jpg"><span>Garrett Speed</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-noelia.jpg"><span>Noelia García</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-jorge.jpg"><span>Jorge González García</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-elizabeth.jpg"><span>Elizabeth Salewski</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-garrettc.jpg"><span>Garrett Campbell</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-aaron.jpg"><span>Aaron Lewis</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-zach.jpg"><span>Zach Smith</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-sarah.jpg"><span>Sarah J. Mobley</span></a></div>
    <div class="col s6 m4 l2"><a href=""><img src="http://www.lib.usf.edu/dhhc/wp-content/uploads/sites/24/2018/10/thumb-kelley.jpg"><span>Kelly M. Costello</span></a></div>
</div>
</div>
 </section>
<!--socials-->
<div class="post-socials">
  <div><h2 class="center-align"><b>DHHC Online</b></h2></div>
  <div class="icon-space">
  <a href="https://www.facebook.com/3DResearchers"><i class="fa fa-facebook"></i></a>
  <a href="https://twitter.com/3D_Researchers"><i class="fa fa-twitter"></i></a>
  <a href="https://www.flickr.com/photos/aist/albums"><i class="fa fa-flickr"></i></a>
  <a href="https://vimeo.com/user30365775"><i class="fa fa-vimeo"></i></a>
  <a href=""><i class="fa fa-globe"></i></a>
  <a href="http://gigapan.com/profiles/USF_AIST"><img src="http://lib.usf.edu/wp-content/themes/dhhc/gigapan1.svg"></a>
  <a href="https://sketchfab.com/USF_digital"><img src="http://lib.usf.edu/wp-content/themes/dhhc/sketchfab1.svg"></a>
  </div>
  <p class="copyright center-align">Copyright © 2018. Digital Heritage and Humanities Collections, University of South Florida Libraries.</p>
</div>
<!--end socials-->

    

<?php get_footer(); ?>