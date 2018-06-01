<?php
/**
 * The template for displaying content in the single.php template
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>

	<div class="entry-content">
		
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'dhhc' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- /.entry-content -->

</article><!-- /#post-<?php the_ID(); ?> -->
