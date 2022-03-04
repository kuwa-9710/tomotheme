<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TomoTheme
 */

?>

<footer id="colophon" class="site-footer">
	<div class="row container footer-content">
		<div class="pt-sm col col-lg-6 col-md-6 col-12">
			<p class="footer_title font-sm bold">MENU</p>
			<ul class="footer_menu">
				<li class="font-sm"><a href="#service">SERVICE</a></li>
				<li class="font-sm"><a href="#news">NEWS</a></li>
				<li class="font-sm"><a href="#faq">WORKS</a></li>
				<li class="font-sm"><a href="#faq">よくある質問</a></li>
			</ul>
		</div>
		<div class="pt-sm col col-lg-6 col-md-6 col-12">
			<p class="footer_title font-sm bold">ABOUT</p>
			<div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'footer-menu',
						'menu_class'     => 'footer_menu font-sm',
						'add_a_class' => 'footer_item', // liタグへclass追加
					)
				);
				?>
			</div>
		</div>
	</div>
	<div class="copy-right position_center">
		<p class="font-sm bold pt-sm">©Tomoya Kuwashima.</p>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/protonet-jquery.inview/1.1.2/jquery.inview.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
</body>

</html>