<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TomoTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="mb-md border">
	<div class="entry-header container content-max-width">
		<div class="entry-meta mb-sm">
			<?php
			tomotheme_posted_on();

			?>
		</div><!-- .entry-meta -->
		<?php
		if (is_singular()) :
			the_title('<h1 class="entry-title bold pb-sm mb-sm fadeInTrigger">', '</h1>');
		else :
			the_title('<h2 class="entry-title fadeInTrigger"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>

		<?php endif; ?>
	</div><!-- .entry-header -->

	<?php tomotheme_post_thumbnail(); ?>



	<div class="entry-content container content-max-width">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'tomotheme'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'tomotheme'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer container content-max-width">
		<?php tomotheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->