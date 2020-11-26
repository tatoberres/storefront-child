<?php

// se trae el tema padre
function stchild_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'stchild_enqueue_styles' );

// trae la fecha y los comm si single
if ( ! function_exists( 'storefront_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function storefront_post_meta() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Date.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
        );

		$posted_on = '
			<span class="posted-on">' .
			$time_string .
			'</span>';

		// Comments.
		$comments = '';
        if ( is_single() ) {
            if ( ! post_password_required() && ( comments_open() || 0 !== intval( get_comments_number() ) ) ) {
                $comments_number = get_comments_number_text( __( 'Leave a comment', 'storefront' ), __( '1 Comment', 'storefront' ), __( '% Comments', 'storefront' ) );

                $comments = sprintf(
                    '<span class="post-comments">&mdash; <a href="%1$s">%2$s</a></span>',
                    esc_url( get_comments_link() ),
                    $comments_number
                );
            }
        }

		echo wp_kses(
			sprintf( '%1$s %2$s %3$s', $posted_on, $author, $comments ),
			array(
				'span' => array(
					'class' => array(),
				),
				'a'    => array(
					'href'  => array(),
					'title' => array(),
					'rel'   => array(),
				),
				'time' => array(
					'datetime' => array(),
					'class'    => array(),
				),
			)
		);
	}
}

// trae el titulo y categories
if ( ! function_exists( 'storefront_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_header() {
		?>
		<header class="entry-header">
		<?php

		/**
		 * Functions hooked in to storefront_post_header_before action.
		 *
		 * @hooked storefront_post_meta - 10
		 */
		do_action( 'storefront_post_header_before' );

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        }
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list( ' ・ ' );
        
        if ( $categories_list ) : ?>
			<div class="cat-links">
				<?php echo wp_kses_post( $categories_list ); ?>
			</div>
            <?php endif;

		do_action( 'storefront_post_header_after' );
		?>
		</header><!-- .entry-header -->
		<?php
	}
}

// trae la featured image si no single
if ( ! function_exists( 'storefront_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @var $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @uses has_post_thumbnail()
	 * @uses the_post_thumbnail
	 * @param string $size the post thumbnail size.
	 * @since 1.5.0
	 */

    function storefront_post_thumbnail( $size = 'full' ) {
        if (! is_single() ) {
            if ( has_post_thumbnail() ) {
                ?><div class="thumb"><?php the_post_thumbnail( $size ); ?></div><?php	
            }
        }
    }
	
}

// el content o el extracto
if ( ! function_exists( 'storefront_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function storefront_post_content() {
		?>
		<div class="entry-content">
		<?php

		/**
		 * Functions hooked in to storefront_post_content_before action.
		 *
		 * @hooked storefront_post_thumbnail - 10
		 */
		do_action( 'storefront_post_content_before' );

        if ( is_single() ) {
            the_content( '<p class="content">', '</p>' );
        } else {
            the_excerpt( '<div class="excerpt">', '</div>' ); 
        }

		do_action( 'storefront_post_content_after' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'storefront' ),
				'after'  => '</div>',
			)
		);
		?>
		</div><!-- .entry-content -->
		<?php
	}
}

// boton de read more si no single

// trae cat y etiquetas
if ( ! function_exists( 'storefront_post_taxonomy' ) ) {
	/**
	 * Display the post taxonomies
	 *
	 * @since 2.4.0
	 */
	function storefront_post_taxonomy() {
		?>
		<aside class="entry-taxonomy">
			<?php if ( is_single() ) : ?>
			<ul class="tags-links">
				<?php echo wp_kses_post( the_tags('<li>', '</li><li>', '</li>')); ?>
			</ul>
			<?php endif; ?>
		</aside>

		<?php
	}
}

// modifica los creditos
if ( ! function_exists( 'storefront_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_credit() {
		$links_output = '';

		if ( apply_filters( 'storefront_credit_link', true ) ) {
				$links_output .= '<a href="" target="_blank" title="' . esc_attr__( 'Maco Estudio, for your web projects', 'storefront' ) . '" rel="noreferrer">' . esc_html__( 'Built with ♥︎ by Estudio MACO', 'storefront' ) . '</a>';
		}

		if ( apply_filters( 'storefront_privacy_policy_link', true ) && function_exists( 'the_privacy_policy_link' ) ) {
			$separator    = '<span role="separator" aria-hidden="true"></span>';
			$links_output = get_the_privacy_policy_link( '', ( ! empty( $links_output ) ? $separator : '' ) ) . $links_output;
		}

		$links_output = apply_filters( 'storefront_credit_links_output', $links_output );
		?>
		<div class="site-info">
			<?php echo esc_html( apply_filters( 'storefront_copyright_text', $content = '&copy; ' . get_bloginfo( 'name' ) . ' ' . gmdate( 'Y' ) ) ); ?>

			<?php if ( ! empty( $links_output ) ) { ?>
				<br />
				<?php echo wp_kses_post( $links_output ); ?>
			<?php } ?>
		</div><!-- .site-info -->
		<?php
	}
}
require 'inc/customizer.php';