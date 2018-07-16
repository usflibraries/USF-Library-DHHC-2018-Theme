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
    <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>

                <article class="masonry__brick entry format-standard" data-aos="fade-up">
                        
                    <div class="entry__thumb">
                        <a href="single-standard.html" class="entry__thumb-link">
                            <img src="images/thumbs/masonry/lamp-400.jpg" 
                                    srcset="images/thumbs/masonry/lamp-400.jpg 1x, images/thumbs/masonry/lamp-800.jpg 2x" alt="">
                        </a>
                    </div>
    
                    <div class="entry__text">
                        <div class="entry__header">
                            
                            <h1 class="entry__title"><a href="single-standard.html">Just a Standard Format Post.</a></h1>
                            
                        </div>
                        <div class="entry__excerpt">
                            <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua...
                            </p>
                        </div>
                    </div>
    
                </article>
            </div>
        </div>
    </section>