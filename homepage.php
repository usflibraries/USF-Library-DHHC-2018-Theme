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
        <header style="background-image:url('<?php the_post_thumbnail_url();?>')" id="header" class="mdl-layout__header--<?php echo $navbar_position; ?><?php if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
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

            <!--Carsouel-->
<section >
  <div class="carousel carousel-slider data-indicators="true">
    <div class="carousel-fixed-item">
      <div class="container">
        <a class="btn waves-effect blue lighten-1 white-text" href="#" target="_blank">EXPLORE THIS</a>
      </div>
    </div>
    <div class="carousel-item colorbox white-text" href="#">
      <div class="container">
        <h3>Castillo de San Marco</h3>
        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur ex mi. Ut dapibus libero vitae eleifend pellentesque. Etiam bibendum tortor lectus, sit amet facilisis ligula vulputate et. Vivamus eget augue vel libero bibendum consectetur.
                    Nunc tempor vel leo in malesuada. Integer dictum, libero vitae ultricies euismod, odio diam porta sapien, sed varius lacus metus at ipsum.</p>
      </div>  
    </div>
    <div class="carousel-item colorbox white-text" href="#">
      <div class="container">
        <h3>Castillo de San Marco</h3>
        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur ex mi. Ut dapibus libero vitae eleifend pellentesque. Etiam bibendum tortor lectus, sit amet facilisis ligula vulputate et. Vivamus eget augue vel libero bibendum consectetur.
                    Nunc tempor vel leo in malesuada. Integer dictum, libero vitae ultricies euismod, odio diam porta sapien, sed varius lacus metus at ipsum.</p>
      </div>  
    </div>
    <div class="carousel-item colorbox white-text" href="#">
      <div class="container">
        <h3>Castillo de San Marco</h3>
        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur ex mi. Ut dapibus libero vitae eleifend pellentesque. Etiam bibendum tortor lectus, sit amet facilisis ligula vulputate et. Vivamus eget augue vel libero bibendum consectetur.
                    Nunc tempor vel leo in malesuada. Integer dictum, libero vitae ultricies euismod, odio diam porta sapien, sed varius lacus metus at ipsum.</p>
      </div>  
    </div>
    <div class="carousel-item colorbox white-text" href="#">
      <div class="container">
        <h3>Castillo de San Marco</h3>
        <p class="white-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consectetur ex mi. Ut dapibus libero vitae eleifend pellentesque. Etiam bibendum tortor lectus, sit amet facilisis ligula vulputate et. Vivamus eget augue vel libero bibendum consectetur.
                    Nunc tempor vel leo in malesuada. Integer dictum, libero vitae ultricies euismod, odio diam porta sapien, sed varius lacus metus at ipsum.</p>
      </div>  
    </div>

  </div>
</section>
            <!--Carsouel-End-->





</div>

</header><!-- /#header -->
</div>

<div id="main" class="white">
    <div class="mdl-grid">
        <?php the_post(); ?>

        <div id="post-<?php the_ID(); ?>" class="container">

            <?php
            the_content();

            wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'dhhc' ) . '&after=</div>');
            edit_post_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' );
            ?>
            <div class="center-align">
              <div class="row">
                 <div class="col s6">
            <h2><b>Preserving History</b></h2>
            <p class="flow-text valign">Nunc tempor vel leo in malesuada. Integer dictum, libero vitae ultricies euismod, odio diam porta sapien, sed varius lacus metus at ipsum. Quisque vel ex suscipit quam dignissim vestibulum. Nam aliquet varius nisi eu.sed varius lacus metus
                at ipsum. Quisque vel ex suscipit quam dignissim vestibulum.
            </p>
            <a href="#" class="btn blue lighten-1">View Projects</a>
            <a href="#" class="btn blue lighten-1">Our Technology</a>
                 </div>
        <div class="col s6">
            <div class="wrapper">
                <div class="column">
                    <div>1</div>
                    <div>2</div>
                    <div>3</div>
                </div>
                <div class="column">
                    <div>1</div>
                    <div>2</div>
                </div>
                <div class="column">
                    <div>1</div>
                </div>
            </div>
        </div>
    </div>
</div>

            <p class="center-align">Copyright &copy; 2018. Digital Heritage and Humanities Collections, University of South Florida Libraries.</p>
        </div><!-- /#post-<?php the_ID(); ?> -->
        
        <section class="alt">
            <div class="container home-projects">
                <h2 class="center-align"><b>Digital Humanities and Heritage Collection</b></h2>
                <p class="center-align">Who We Are & What We Do</p>
                <div class="row">
                    <div class="center-align">
                 <iframe src="https://player.vimeo.com/video/261709083" width="640" height="660" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>

                </div>
            </div>
            <div class="center" width=100%"><a class="btn-large center usfteal blue lighten-1" href="our-projects/">Meet The Team</a></div>
        </section>


        <?php get_footer(); ?>