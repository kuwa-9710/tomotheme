<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TomoTheme
 */

get_header();
?>

<main id="primary" class="site-main site-archive container">

		<div class="archive_title pt-lg bold center">
			<h2>制作物一覧</h2>
		</div><!-- .page-header -->

		<div class="row mb-md">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php
					$thumnail_id = get_post_thumbnail_id();
					$data = wp_get_attachment_image_src($thumnail_id, 'full');
					?>
					<div class="col col-lg-4 col-md-6 col-12 mb-sm">
						<a href="<?php the_permalink(); ?>" class="mb-sm">
							<img src="<?php echo $data[0]; ?>" alt="サムネイル">
						</a>
						<a class="button-style-none font-sm pt-sm" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
			<?php endwhile;
			endif; ?>
		</div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
