<?php
/**
 * The Template for displaying Search Results pages.
 */

	get_header();
?>

	<div class="mdl-cell mdl-cell--12-col">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'dhhc' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php dhhc_content_nav( 'nav-above' ); ?>

				<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/* Include the Post-Format-specific template for the content.
						* If you want to overload this in a child theme then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'content', 'index' );

					endwhile;
				?>

			<?php dhhc_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'dhhc' ); ?></h1>
				</header><!-- .entry-header -->

				<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'dhhc' ); ?></p>
				<?php get_search_form(); ?>
			</article><!-- /#post-0 -->

		<?php
			endif;
			wp_reset_postdata(); // end of the loop.
		?>
		
	</div><!-- /.mdl-cell -->
	
<?php get_footer(); ?>
