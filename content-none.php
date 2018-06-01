<?php
/**
 * The template for displaying "not found" content in the Blog Archives
 */
?>

	<article id="post-0" class="post no-results not-found mdl-cell mdl-cell--12-col">
		<header class="entry-header">
			<h1 class="entry-title"><?php _e( 'Nothing Found', 'dhhc' ); ?></h1>
		</header><!-- .entry-header -->
		
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'dhhc' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- /.entry-content -->
	</article><!-- /#post-0 -->