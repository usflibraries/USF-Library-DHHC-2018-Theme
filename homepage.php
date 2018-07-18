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

    </div>
    <?php $catquery = new WP_Query( 'cat=7&posts_per_page=4' ); ?>
<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
 <div class="carousel-item colorbox white-text" href="#">

<h3><?php the_title(); ?></h3>
        <p class="white-text flow-text"><?php the_excerpt('my_excerpt_length');?></p>
        <a href="<?php the_permalink()?>" class="btn">read more</a>
    </div>
<?php endwhile;
    wp_reset_postdata();
?>

    

  </div>
</section>

            <!--Carsouel-End-->

</div>

</header><!-- /#header -->
</div>

<div id="main" class="white">
    <div class="mdl-grid">
        <?php the_post(); ?>

        <div id="post-<?php the_ID(); ?>" >

            <?php
            the_content();

            wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'dhhc' ) . '&after=</div>');
            edit_post_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' );
            ?>
            <div class="center-align">
              <div class="row valign-wrapper">
                <!--historyContent-->
                <div class="col s12 m12 l4">
            <h2><b>Preserving History</b></h2>
            <p class="flow-text">
             The USF Libraries Digital Heritage & Humanities Collections (DHHC) initiative documents heritage sites, landscapes, and objects, and creates digital learning tools and collections that promote sustainable heritage tourism and interpretation strategies through the use 3D and imaging technologies.
            </p>
            <a href="#" class="btn blue lighten-1">View Projects</a>
            <a href="#" class="btn blue lighten-1">Our Technology</a>
                 </div>
                <!--historyContent--> 
                 <div class="col s12 m12 l1"></div>
                 <!--flex-box-->
        <div class="col s12 m12 l7">
            <div class="row wrapper">
  <div class="col s6 m4">
    <div class="feature-grid-post">
      <?php query_posts( array(
                   'category_name' => 'latest-projects',
                   'posts_per_page' => 3,
                    )); ?>

                    <?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink();?>" style="display:block">
                        <div class="feature-grid-post" style="background-image:url('<?php the_post_thumbnail_url(''); ?>');">
                        <p class="title">
<?php
$thetitle = $post->post_title; /* or you can use get_the_title() */
$getlength = strlen($thetitle);
$thelength = 35;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?>
</p>
                        
                        </div>
                    </a>
                <?php endwhile; ?>
                        <?php else : ?>
                        <?php endif; ?>
    </div>
  </div>
  <div class="col s6 m4">
    <div class="feature-grid-post-2">
      <?php query_posts( array(
                   'category_name' => 'field-notes',
                   'posts_per_page' => 2,
                    )); ?>

                    <?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink();?>">
                        <div class="feature-grid-post" style="background-image:url('<?php the_post_thumbnail_url(''); ?>');">
                        <p class="title">
<?php
$thetitle = $post->post_title; /* or you can use get_the_title() */
$getlength = strlen($thetitle);
$thelength = 35;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?>
</p>
                        
                        </div>
                    </a>
                <?php endwhile; ?>
                        <?php else : ?>
                        <?php endif; ?>
    </div>
  </div>
  <div class="col s12 m4">
    <div class="feature-grid-post-3">
      <?php query_posts( array(
                   'category_name' => 'software',
                   'posts_per_page' => 1,
                    )); ?>

                    <?php if( have_posts() ): while ( have_posts() ) : the_post(); ?>
                    <a href="<?php the_permalink();?>">
                        <div class="feature-grid-post" style="background-image:url('<?php the_post_thumbnail_url(''); ?>');">
                        <p class="title">
<?php
$thetitle = $post->post_title; /* or you can use get_the_title() */
$getlength = strlen($thetitle);
$thelength = 35;
echo substr($thetitle, 0, $thelength);
if ($getlength > $thelength) echo "...";
?>
</p>
                        
                        </div>
                    </a>
                <?php endwhile; ?>
                        <?php else : ?>
                        <?php endif; ?>
    </div>
  </div>
</div>
        </div>
        <!--flex-box-->
    </div>
</div>

        
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