<?php
$args = array(
  'post_type'   => 'testimonials',
  'post_status' => 'publish',
  'tax_query'   => array(
  	array(
  		'taxonomy' => 'testimonial_service',
  		'field'    => 'slug',
  		'terms'    => 'diving'
  	)
  )
 );
 
$testimonials = new WP_Query( $args );
if( $testimonials->have_posts() ) :
?>
  <ul>
    <?php
      while( $testimonials->have_posts() ) :
        $testimonials->the_post();
        ?>
          <li><?php printf( '%1$s - %2$s', get_the_title(), get_the_content() );  ?></li>
        <?php
      endwhile;
      wp_reset_postdata();
    ?>
  </ul>
<?php
else :
  esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
endif;
?>