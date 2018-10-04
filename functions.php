<?php

$theme_version = '1.0';

	/**
	 * Include Theme Customizer
	 *
	 * @since v1.0
	 */
	$theme_customizer = get_template_directory() . '/inc/customizer.php';
	if ( is_readable( $theme_customizer ) ) {
		require_once( $theme_customizer );
	}


	/**
	 * Include Meta Boxes to Page-Edit: class/style
	 *
	 * @since v1.0
	 */
	$theme_metaboxes = get_template_directory() . '/inc/metaboxes.php';
	if ( is_readable( $theme_metaboxes ) ) {
		require_once( $theme_metaboxes );
	}


	/**
	 * Include Support for wordpress.com-specific functions.
	 *
	 * @since v1.0
	 */
	$theme_wordpresscom = get_template_directory() . '/inc/wordpresscom.php';
	if ( is_readable( $theme_wordpresscom ) ) {
		require_once( $theme_wordpresscom );
	}


	/**
	 * Set the content width based on the theme's design and stylesheet
	 *
	 * @since v1.0
	 */
	if ( ! isset( $content_width ) ) {
		$content_width = 800;
	}


	/**
	 * General Theme Settings
	 *
	 * @since v1.0
	 */
	if ( ! function_exists( 'dhhc_setup_theme' ) ) :
		function dhhc_setup_theme() {

			// Make theme available for translation: Translations can be filed in the /languages/ directory
			load_theme_textdomain( 'dhhc', get_template_directory() . '/languages' );

			// Theme Support
			add_theme_support( 'title-tag' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
			) );

			// Date/Time Format
			$theme_dateformat = get_option( 'date_format' );
			$theme_timeformat = 'H:i';

			// Default Attachment Display Settings
			update_option( 'image_default_align', 'none' );
			update_option( 'image_default_link_type', 'none' );
			update_option( 'image_default_size', 'large' );

			// Custom CSS-Styles of Wordpress Gallery
			add_filter( 'use_default_gallery_style', '__return_false' );

		}
		add_action( 'after_setup_theme', 'dhhc_setup_theme' );
	endif;


	/**
	 * Add title tag if < 4.1: https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1
	 *
	 * @since v1.0
	 */
	if ( ! function_exists( '_wp_render_title_tag' ) ) :
		function dhhc_render_title() {
		?>
			<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
		}
		add_action( 'wp_head', 'dhhc_render_title' );
	endif;


	/**
	 * Add new User fields to Userprofile
	 *
	 * @since v1.0
	 */
	if ( ! function_exists( 'dhhc_add_user_fields' ) ) :
		function dhhc_add_user_fields( $fields ) {
			// Add new fields
			$fields['facebook_profile'] = 'Facebook URL';
			$fields['twitter_profile'] = 'Twitter URL';
			$fields['google_profile'] = 'Google+ URL';
			$fields['linkedin_profile'] = 'LinkedIn URL';
			$fields['xing_profile'] = 'Xing URL';
			$fields['github_profile'] = 'GitHub URL';

			return $fields;
		}
		add_filter( 'user_contactmethods', 'dhhc_add_user_fields' ); // get_user_meta( $user->ID, 'facebook_profile', true );
	endif;


	/**
	 * Test if a page is a blog page
	 * if ( is_blog() ) { ... }
	 *
	 * @since v1.0
	 */
	function is_blog() {
		global $post;
		$posttype = get_post_type( $post );
		return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( 'post' === $posttype ) ) ? true : false ;
	}


	/**
	 * Get the page number
	 *
	 * @since v1.0
	 */
	function get_page_number() {
		if ( get_query_var( 'paged' ) ) {
			print ' | ' . __( 'Page ' , 'dhhc') . get_query_var( 'paged' );
		}
	}


	/**
	 * Disable comments for Media (Image-Post, Jetpack-Carousel, etc.)
	 *
	 * @since v1.0
	 */
	function dhhc_filter_media_comment_status( $open, $post_id ) {
		$media_post = get_post( $post_id );
		if ( 'attachment' === $media_post->post_type ) {
			return false;
		}
		return $open;
	}
	add_filter( 'comments_open', 'dhhc_filter_media_comment_status', 10 , 2 );


	/**
	 * Style Edit buttons as badges: http://getbootstrap.com/components/#badges
	 *
	 * @since v1.0
	 */
	function dhhc_custom_edit_post_link( $output ) {
		$output = str_replace( 'class="post-edit-link"', 'class="post-edit-link badge badge-info"', $output );
		return $output;
	}
	add_filter( 'edit_post_link', 'dhhc_custom_edit_post_link' );


	/**
	 * Responsive oEmbed filter: http://getbootstrap.com/components/#responsive-embed
	 *
	 * @since v1.0
	 */
	function dhhc_oembed_filter( $html, $url, $attr, $post_id ) {
		$return = '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
		return $return;
	}
	add_filter( 'embed_oembed_html', 'dhhc_oembed_filter', 10, 4 );


	if ( ! function_exists( 'dhhc_content_nav' ) ) :
		/**
		 * Display a navigation to next/previous pages when applicable: http://getbootstrap.com/components/#pagination-pager
		 *
		 * @since v1.0
		 */
		function dhhc_content_nav( $nav_id ) {
			global $wp_query;

			if ( $wp_query->max_num_pages > 1 ) : ?>
				<nav id="<?php echo $nav_id; ?>" class="blog-nav mdl-cell mdl-cell--12-col">
					<?php next_posts_link( '<button class="mdl-button mdl-js-button mdl-button--icon mdl-color--pink-500 mdl-color-text--white"><i class="material-icons">arrow_back</i></button> ' . __( 'Older posts', 'dhhc' ) ); ?>
					<div class="mdl-layout-spacer"></div>
					<?php previous_posts_link( __( 'Newer posts', 'dhhc' ) . ' <button class="mdl-button mdl-js-button mdl-button--icon mdl-color--pink-500 mdl-color-text--white"><i class="material-icons">arrow_forward</i></button>' ); ?>
				</nav><!-- /.blog-nav -->
			<?php
			endif;
		}

		// Add Class
		/**
		function posts_link_attributes() {
			return 'class=""';
		}
		add_filter('next_posts_link_attributes', 'posts_link_attributes');
		add_filter('previous_posts_link_attributes', 'posts_link_attributes');
		*/

	endif; // content navigation


	/**
	 * Init Widget areas in Sidebar
	 *
	 * @since v1.0
	 */
	function dhhc_widgets_init() {
		// Area 1
		register_sidebar( array(
			'name' => 'Primary Widget Area (Sidebar)',
			'id' => 'primary_widget_area',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		// Area 2
		register_sidebar( array(
			'name' => 'Secondary Widget Area (Footer)',
			'id' => 'secondary_widget_area',
			'before_widget' => '<div class="mdl-mega-footer__drop-down-section mdl-mega-footer__link-list">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title mdl-mega-footer__heading">',
			'after_title' => '</h3>',
		) );
	}
	function create_post_type() {
  		register_post_type( 'team_member',
    	array(
      	'labels' => array(
        'name' => __( 'Team Members' ),
        'singular_name' => __( 'Team Member' )
      	),
      'public' => true,
      'has_archive' => true,
    	)
  	);
	}
add_action( 'init', 'create_post_type' );
	add_action( 'widgets_init', 'dhhc_widgets_init' );

	$preset_widgets = array(
		'primary_widget_area' => array( 'search', 'pages', 'categories', 'archives' ),
		'secondary_widget_area' => array( 'links', 'meta' ),
		'third_widget_area' => array( 'links', 'meta' ),
	);
	if ( isset( $_GET['activated'] ) ) {
		update_option( 'sidebars_widgets', $preset_widgets );
	}
	// update_option( 'sidebars_widgets', NULL );

	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ) {
		global $wp_registered_sidebars;

		$widgetcolums = wp_get_sidebars_widgets();

		if ( $widgetcolums[$index] ) {
			return true;
		}

		return false;
	}


	if ( ! function_exists( 'dhhc_article_posted_on' ) ) :
		/**
		 * "Theme posted on" pattern
		 *
		 * @since v1.0
		 */
		function dhhc_article_posted_on() {
			global $theme_dateformat, $theme_timeformat;

			printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author-meta vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'dhhc' ),
				esc_url( get_the_permalink() ),
				esc_attr( get_the_date( $theme_dateformat ) . ' - ' . get_the_time( $theme_timeformat ) ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date( $theme_dateformat ) . ' - ' . get_the_time( $theme_timeformat ) ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'dhhc' ), get_the_author() ) ),
				get_the_author()
			);

		}
	endif;


	/**
	 * Template for Password protected post form
	 *
	 * @since v1.0
	 */
	function dhhc_password_form() {
		global $post;
		$label = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );

		$output = '<div class="mdl-grid">';
			$output .= '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">';
			$output .= '<h4 class="mdl-cell mdl-cell--12-col">' . __( 'This content is password protected. To view it please enter your password below.', 'dhhc' ) . '</h4>';
				$output .= '<div class="mdl-cell mdl-cell--6-col mdl-cell mdl-cell--12-col-phone">';
					$output .= '<div class="mdl-textfield mdl-js-textfield">';
						$output .= '<input name="post_password" id="' . $label . '" type="password" placeholder="' . __( 'Password', 'dhhc' ) . '" class="mdl-textfield__input" />';
						$output .= '<input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised" value="' . esc_attr( __( 'Submit', 'dhhc' ) ) . '" />';
					$output .= '</div><!-- /.input-group -->';
				$output .= '</div><!-- /.mdl-cell -->';
			$output .= '</form>';
		$output .= '</div><!-- /.mdl-grid -->';
		return $output;
	}
	add_filter( 'the_password_form', 'dhhc_password_form' );


	if ( ! function_exists( 'dhhc_comment' ) ) :

		/**
		 * Style Reply link
		 *
		 * @since v1.0
		 */
		function dhhc_replace_reply_link_class( $class ) {
			$class = str_replace( "class='comment-reply-link", "class='mdl-button mdl-js-button mdl-button--raised", $class );
			return $class;
		}
		add_filter( 'comment_reply_link', 'dhhc_replace_reply_link_class' );

		/**
		 * Template for comments and pingbacks:
		 * add function to comments.php ... wp_list_comments( array( 'callback' => 'dhhc_comment' ) );
		 *
		 * @since v1.0
		 */
		function dhhc_comment( $comment, $args, $depth ) {
			global $theme_dateformat, $theme_timeformat;

			$GLOBALS['comment'] = $comment;
			switch ( $comment->comment_type ) :
				case 'pingback' :
				case 'trackback' :
			?>
			<li class="post pingback">
				<p><?php _e( 'Pingback:', 'dhhc' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' ); ?></p>
			<?php
					break;
				default :
			?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<article id="comment-<?php comment_ID(); ?>" class="comment">
					<footer class="comment-meta">
						<div class="comment-author vcard">
							<?php
								$avatar_size = 136;
								if ( '0' !== $comment->comment_parent ) {
									$avatar_size = 68;
								}
								echo get_avatar( $comment, $avatar_size );
								
								/* translators: 1: comment author, 2: date and time */
								printf( __( '%1$s, %2$s', 'dhhc' ),
									sprintf( '<span class="fn">%s</span>', get_comment_author_link() ),
									sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
										esc_url( get_comment_link( $comment->comment_ID ) ),
										get_comment_time( 'c' ),
										/* translators: 1: date, 2: time */
										//sprintf( __( '%1$s - %2$s', 'dhhc' ), get_comment_time( $theme_dateformat ), get_comment_time( $theme_timeformat ) )
										sprintf( __( '%1$s ago', 'dhhc' ), human_time_diff( get_comment_time('U'), current_time('timestamp') ) )
									)
								);
							?>

							<?php edit_comment_link( __( 'Edit', 'dhhc' ), '<span class="edit-link">', '</span>' ); ?>
						</div><!-- .comment-author .vcard -->

						<?php if ( '0' === $comment->comment_approved ) : ?>
							<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'dhhc' ); ?></em>
							<br />
						<?php endif; ?>

					</footer>

					<div class="comment-content"><?php comment_text(); ?></div>

					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'dhhc' ) . ' <i class="material-icons">reply</i>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div><!-- .reply -->
				</article><!-- #comment-## -->

			<?php
					break;
			endswitch;

		}

		/**
		 * Custom Comment form
		 *
		 * @since v1.0
		 *
		 * @since v1.1: 'submit_button' and 'submit_field'
		 */
		function dhhc_custom_commentform( $args = array(), $post_id = null ) {
			if ( null === $post_id ) {
				$post_id = get_the_ID();
			}

			$commenter = wp_get_current_commenter();
			$user = wp_get_current_user();
			$user_identity = $user->exists() ? $user->display_name : '';

			$args = wp_parse_args( $args );

			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true' required" : '' );
			$fields = array(
				'author' => '<p class="mdl-textfield mdl-js-textfield">' .
							'<input id="author" name="author" class="mdl-textfield__input" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />' .
							'<label class="mdl-textfield__label" for="author">' . __( 'Name', 'dhhc' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label></p>',
				'email'  => '<p class="mdl-textfield mdl-js-textfield">' .
							'<input id="email" name="email" class="mdl-textfield__input" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '"' . $aria_req . ' />' .
							'<label class="mdl-textfield__label" for="email">' . __( 'Email', 'dhhc' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label></p>',
				'url'    => '',
			);

			$fields = apply_filters( 'comment_form_default_fields', $fields );
			$defaults = array(
				'fields'               => $fields,
				'comment_field'        => '<fieldset class="mdl-textfield mdl-js-textfield">' .
														'<textarea id="comment" name="comment" class="mdl-textfield__input" rows="3" aria-required="true" required></textarea>' .
														'<label class="mdl-textfield__label" for="comment">' . __( 'Comment', 'dhhc' ) . ( $req ? '*' : '' ) . '</label></fieldset>',
				/** This filter is documented in wp-includes/link-template.php */
				'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'dhhc' ), wp_login_url( apply_filters( 'the_permalink', get_the_permalink( get_the_ID() ) ) ) ) . '</p>',
				/** This filter is documented in wp-includes/link-template.php */
				'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'dhhc' ), get_edit_user_link(), $user->display_name, wp_logout_url( apply_filters( 'the_permalink', get_the_permalink( get_the_ID() ) ) ) ) . '</p>',
				'comment_notes_before' => '',
				'comment_notes_after'  => '<p class="small comment-notes">' . __( 'Your Email address will not be published.', 'dhhc' ) . '</p>',
				'id_form'              => 'commentform',
				'id_submit'            => 'submit',
				'class_submit'         => 'mdl-button mdl-js-button mdl-button--raised',
				'name_submit'          => 'submit',
				'title_reply'          => '',
				'title_reply_to'       => __( 'Leave a Reply to %s', 'dhhc' ),
				'cancel_reply_link'    => __( 'Cancel reply', 'dhhc' ),
				'label_submit'         => __( 'Post Comment', 'dhhc' ),
				'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
				'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
				'format'               => 'html5',
			);

			return $defaults;

		}
		add_filter( 'comment_form_defaults', 'dhhc_custom_commentform' );

	endif;


	/**
	 * Nav menus
	 *
	 * @since v1.0
	 */
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus( array(
			'main-menu' => 'Main Navigation Menu',
			'footer-menu' => 'Footer Menu',
		) );
	}

	// Custom Nav Walker: mdl_navwalker()
	$custom_walker = get_template_directory() . '/inc/mdl_navwalker.php';
	if ( is_readable( $custom_walker ) ) {
		require_once( $custom_walker );
	}


	/**
	 * Loading All CSS Stylesheets and Javascript Files
	 *
	 * @since v1.0
	 */
	function dhhc_scripts_loader() {
		global $theme_version;

		// 1. Styles
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', false, $theme_version, 'all' );
		wp_enqueue_style( 'robotofont', '//fonts.googleapis.com/css?family=Roboto:300,400,500,700', false, $theme_version, 'all' );
		wp_enqueue_style( 'materialiconsfont', '//fonts.googleapis.com/icon?family=Material+Icons', false, $theme_version, 'all' );
		// wp_enqueue_style( 'materialdesign', get_template_directory_uri() . '/bower_components/material-design-lite/material.min.css', false, $theme_version, 'all' );
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css', false, $theme_version, 'all' ); // main.scss: Compiled Framework source + custom styles
		if ( is_rtl() ) {
			wp_enqueue_style( 'rtl', get_template_directory_uri() . '/css/rtl.min.css', false, $theme_version, 'all' );
		}

		// 2. Scripts
		wp_enqueue_script( 'materialjs', get_template_directory_uri() . '/bower_components/material-design-lite/material.min.js', false, $theme_version, true );
		wp_enqueue_script( 'mainjs', get_template_directory_uri() . '/js/main.min.js', array( 'jquery' ), $theme_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'dhhc_scripts_loader' );


	/**
	 * Compatibility shims for old IE versions
	 *
	 * @since v1.0
	 */
	function dhhc_add_ie_html5_shims() {
		echo '
			<!-- IE Compatibility shims -->
			<!--[if lt IE 9]>
				<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js""></script>
			<![endif]-->
			
			<!--[if IE]>
				<script src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.5.9/es5-shim.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/classlist/2014.01.31/classList.min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
				<script src="//cdnjs.cloudflare.com/ajax/libs/flexie/1.0.3/flexie.min.js"></script>
			<![endif]-->
			<!-- end shims -->
			';
	}
	add_action( 'wp_footer', 'dhhc_add_ie_html5_shims', 1 );

?>
