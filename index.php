<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TomoTheme
 */

get_header();
?>

<main id="primary" class="site-main">

	<section id="title" class="pt-md">
		<div class="first-view">
			<div class="bigTitle center">
				<div class="container pb-sm">
					<h1 class="title_main mb-sm font-lg italic backInLeftTrigger">Make your<br><span class="purple_str">Web</span> Site<br>Better<span class="purple_str">.</span></h1>
					<p class="title_sub font-sm italic mb-md backInLeftTrigger animate__delay-1s">はじめまして。私は仙台に住む<br>Web DesignerのTomoyaです。</p>
					<button class="first_button fadeInTrigger animate__delay-2s" onclick="location.href='<?php echo get_template_directory_uri(); ?>/contact'">Contact <i class="fas fa-angle-right"></i></button>
				</div>
				<div class="bigImage container backInRightTrigger animate__delay-2s">
					<img src="<?php echo get_template_directory_uri(); ?>/images/title.png" alt="">
				</div>
			</div>
		</div>
		<div class="scroll"></div>
	</section>

	<section id="apeal" class="pt-lg pb-lg mb-md fadeInTrigger ">
		<div class="apeal_content container">
			<h2 class="apeal_title bold font-md mb-sm italic">A lot of times, people don’t know what they want until you show it to them.</h2>
			<h3 class="apeal_sub font-sm">多くの場合、人々は形にして見せてもらうまで何が欲しいのかわからない。</h3>
			<span class="name block mb-sm">Steve Jobs.</span>
			<p class="mb-md font-sm">
				何かを作り出す場合、<br>
				全くイメージが湧かない場合もあります。<br>
				そのような時にあなたの思いに寄り添い、<br>
				その思いを形にするお手伝いをします。
			</p>
			<p class="mb-md font-sm">「自分のホームページが欲しい」<br>
				「現在のホームページをリニューアルしたい」<br>
				「SEOの対策をしたい」
			</p>
			<p class="font-sm">などがあればぜひお気軽にご連絡ください。</p>
			<span class="name block mb-sm">Tomoya Kuwashima</span>
			<div class="position_center pt-md">
				<button class="button block" onclick="location.href='<?php echo get_template_directory_uri(); ?>/profile'">私について <i class="fas fa-angle-right"></i></button>
			</div>
		</div>
	</section>

	<section id="service" class="mb-md">
		<div class="section_title container center pt-md mb-sm fadeInTrigger">
			<div class="back_str">SERVICE</div>
			<span class="purple_str font-min">デザイン・コーディング</span>
			<h2 class="main_title font-lr bold">Web制作</h2>
			<div class="path"></div>
		</div>

		<div class="section_items container">
			<div class="section_card center mb-sm fadeInUpTrigger">
				<span class="font-sm pt-sm block bold green_str">Web制作</span>
				<div class="image position_center">
					<img class="" src="<?php echo get_template_directory_uri(); ?>/images/pc.png" alt="">
				</div>
				<h3 class="item_title mb-sm bold font-md">デザインからコーディングまで一括で。</h3>
				<p class="font-min">モダンなデザインを得意としています。これから長く愛されるデザインをするよう心がけています。</p>
			</div>
			<div class="section_card center mb-sm fadeInUpTrigger">
				<span class="pt-sm block bold blue_str">WordPress構築</span>
				<div class="image position_center">
					<img class="wordpress" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="">
				</div>
				<h3 class="item_title mb-sm bold font-md">更新可能な<br>Webサイト作成</h3>
				<p class="font-min">ご要望に合わせて、ニュースやブログなどの更新機能がついたWebサイトを作成可能です。</p>
			</div>
			<div class="section_card center mb-sm fadeInUpTrigger">
				<span class="pt-sm block bold orenge_str">SEO対策</span>
				<div class="image position_center">
					<img class="seo" src="<?php echo get_template_directory_uri(); ?>/images/seo.png" alt="">
				</div>
				<h3 class="item_title mb-sm bold font-md seo_title">集客対策もおまかせ。</h3>
				<p class="font-min">Google Serch Consoleなどのツールを使用できるようにするなど、簡単なSEO対策を行います。</p>
			</div>
		</div>
	</section><!-- #service -->

	<section id="news" class="pt-sm pb-sm mb-md row justify-content-center align-items-lg-center">
		<div class="news_content">
			<div class="section_title container center pt-md mb-sm fadeInTrigger col-md-12 col-lg-3">
				<span class="sub_title font-min">最新情報</span>
				<h2 class="main_title font-lr bold">NEWS</h2>
				<div class="path"></div>
			</div>
			<div class="pt-sm pb-sm news_box col col-lg-6">
				<?php
				$args = [
					'post_type' => 'news',
					'posts_per_page' => 5, // 表示する数
				];
				$my_query = new WP_Query($args); ?>
				<?php if ($my_query->have_posts()) : // 投稿がある場合 
				?>

					<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<!-- ▽ ループ開始 ▽ -->
						<div class="news_item">
							<p class="news_date font-min"><?php the_modified_date(get_option('date_format')); ?></p>
							<p><a class="news_title font-sm button-style-none-w" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<p class="news_excerpt font-min"><?php echo get_the_excerpt(); ?></p>
						</div>
					<?php endwhile; ?>

				<?php else : // 投稿がない場合
				?>
					<p>まだ投稿がありません。</p>
				<?php endif;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

	<section id="feature" class="mb-md">
		<div class="section_title container center pt-md mb-sm fadeInTrigger">
			<div class="back_str">FEATURE</div>
			<span class="purple_str font-min">私の強み</span>
			<h2 class="main_title font-lr bold">特徴&強み</h2>
			<div class="path"></div>
		</div>
		<div class="feature_box container">
			<div class="feature_title">
				<h3 class="bold center mb-sm pt-sm pb-sm">見えないところまで丁寧に。</h3>
			</div>
			<div class="flex">
				<div class="feature_content mb-sm fadeInUpTrigger">
					<div><i class="mb-sm fas fa-mail-bulk fa-2x"></i></div>
					<h4 class="feature_sub bold">早く、そして丁寧に。</h4>
					<p>ご連絡を頂いた際には3営業日以内に必ず返信します。デザインを作り上げる際はヒアリングをしっかり行い、お客様の思いをカタチにします。Webサイトの作成期間は、デザイン〜コーディングまでで2週間から1ヶ月程度で仕上げます。</p>
					<p><a href="<?php echo get_template_directory_uri(); ?>/work-flow" class="purple_str">仕事の流れについてさらに詳しく></a></p>
				</div>
				<div class="feature_content mb-sm fadeInUpTrigger">
					<div><i class="mb-sm fas fa-pencil-ruler fa-2x"></i></i></div>
					<h4 class="feature_sub bold">2回まで無料で修正。</h4>
					<p>デザインを作成し、納品後2回まで修正を承ります。「やっぱりここの色は違う色がいい」「文章を変えたい」などご要望の際はご連絡をお願いします。</p>
					<p><a href="<?php echo get_template_directory_uri(); ?>/re-design" class="purple_str">修正依頼についてさらに詳しく></a></p>
				</div>
				<div class="feature_content mb-sm fadeInUpTrigger">
					<div><i class="mb-sm fas fa-mobile-alt fa-2x"></i></div>
					<h4 class="feature_sub bold">レスポンシブに対応。</h4>
					<p>Webサイトをスマートフォン、タブレット、PCに対応させられます。。モバイルファーストのデザインで今の時代に適したWebサイトを作成します。</p>
					<p><a href="<?php echo get_template_directory_uri(); ?>/responsive" class="purple_str">レスポンシブについてさらに詳しく></a></p>
				</div>
				<div class="feature_content mb-sm fadeInUpTrigger">
					<div><i class="mb-sm fas fa-desktop fa-2x"></i></div>
					<h4 class="feature_sub bold">作成後もサポート。</h4>
					<p>Webサイトは作って終わりではなく、成長させていくことが大切です。Webサイトを更新したくなった場合などはご連絡をいただければ、対応させていただきます。</p>
					<p><a href="<?php echo get_template_directory_uri(); ?>/web-site" class="purple_str">Webサイトの成長についてさらに詳しく></a></p>
				</div>
			</div>
		</div>
	</section><!-- #feature -->


	<section id="portfolio" class="mb-md">
		<div class="section_title container center pt-md mb-sm fadeInTrigger">
			<div class="back_str">WORKS</div>
			<span class="purple_str font-min">制作物一覧</span>
			<h2 class="main_title font-lr bold">PortFolio</h2>
			<div class="path"></div>
		</div>
		<div class="thumbnails_box flex mb-md">
			<?php query_posts('posts_per_page=6'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php
					$thumnail_id = get_post_thumbnail_id();
					$data = wp_get_attachment_image_src($thumnail_id, 'full');
					?>
					<div class="thumbnail_content mb-sm">
						<a href="<?php the_permalink(); ?>" class="thumbnail block">
							<img src="<?php echo $data[0]; ?>" alt="サムネイル">
						</a>
						<a class="block work_title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</div>
			<?php endwhile;
			endif; ?>
		</div>
		<div class="center">
			<?php
			function nowUrl()
			{
				$url = '';
				if (isset($_SERVER['HTTPS'])) {
					$url .= 'https://';
				} else {
					$url .= 'http://';
				}
				$url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				return $url;
			}
			?>
			<button class="button" onclick="location.href='<?php echo nowUrl(); ?>works'">制作物一覧へ <i class="fas fa-angle-right"></i></button>
		</div>
	</section><!-- #works -->

	<section id="faq" class="mb-md">
		<div class="section_title container center pt-md mb-sm fadeInTrigger">
			<div class="back_str">QUESTION</div>
			<span class="purple_str font-min">Frequently Asked Questions</span>
			<h2 class="main_title font-lr bold">FAQ</h2>
			<div class="path"></div>
		</div>
		<div>
			<ul class="accordion-area">
				<li>
					<section>
						<h3 class="title font-sm">お見積もりの目安を教えてください。</h3>
						<div class="box">
							<p class="font-sm">内容によって変化いたしますのでまずはお問い合わせフォームよりご相談ください。</p>
						</div>
					</section>
				</li>
				<li>
					<section>
						<h3 class="title font-sm">集客対策ではどのようなことをしますか？</h3>
						<div class="box">
							<p class="font-sm">ホームページに更新機能を付け加え、お客様の業種・業態に合わせたブログを更新できるようにしたり、SNSを運用するお手伝いをさせていただきます。</p>
						</div>
					</section>
				</li>
				<li>
					<section>
						<h3 class="title font-sm">他のWebデザイナーの方との違いはなんですか？</h3>
						<div class="box">
							<p class="font-sm">海外のデザイン動向をいち早く取り入れる点です。ご要望に合わせて海外のデザインを取り入れ、デザインに”真新しさ”を付け加えます。</p>
						</div>
					</section>
				</li>
				<li>
					<section>
						<h3 class="title font-sm">パートナー契約はできますか？</h3>
						<div class="box">
							<p class="font-sm">できます。むしろお願いします、、!</p>
						</div>
					</section>
				</li>
				<li>
					<section>
						<h3 class="title font-sm">パソコンが苦手で、サーバーとかはわからないんですけどWebサイトは作れますか？</h3>
						<div class="box">
							<p class="font-sm">お客様がWebサイトを公開するまで徹底的にサポートさせていただきます。ブログ機能付きの場合は操作方法の解説までお手伝いさせていただきます。</p>
						</div>
					</section>
				</li>
			</ul>
		</div>
	</section>

	<section class="cta mb-md">
		<div class="center">
			<button class="button" onclick="location.href='<?php echo get_template_directory_uri(); ?>/contact'">お問い合わせ <i class="fas fa-angle-right"></i></button>
		</div>
	</section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
