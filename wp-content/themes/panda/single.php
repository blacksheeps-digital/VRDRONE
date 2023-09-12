<?php

$classe = 'single-noticias';

get_header();

the_post();

?>

<main class="main" role="main">
	<?php
	$url = wp_get_attachment_url(get_post_thumbnail_id($post_projeto->ID), 'thumbnail');
	?>



	<section class="blog_single pt-0">
		<div class="container-fluid h-100 mb-5" style="background-image: url(<?php echo $url ?>);">

		</div>
		<div class="container h-100">
			<div class="row align-items-center justify-content-center h-100 mb-4 pb-4">
				<div class="col-md-4 text-left">
					<div id="breadcrumbs">
						<?php
						if (is_front_page() || is_home() || is_single('') || is_tag() || (basename($template) === 'page-busca.php')) {
							ah_breadcrumb();
						}
						?>
					</div>
				</div>
				<div class="col-md-4 text-md-center">
					<?php echo do_shortcode('[searchandfilter id="285"]')  ?>

				</div>
				<div class="col-md-4 text-md-right">
					<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
					<label for="openSidebarMenu" class="sidebarIconToggle">
						VER CATEGORIAS <i><img src='<?php echo IMG ?>icon.png' class='img-fluid' alt='' title='' loading='lazy'></i>
					</label>
					<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
					<label for="openSidebarMenu" class="sidebarIconToggle icon">
						X
					</label>

					<div id="sidebarMenu">
						<ul class="sidebarMenuInner">
							<li>Jelena Jovanovic <span>Web Developer</span></li>
							<li><a href="https://vanila.io" target="_blank">Company</a></li>
							<li><a href="https://instagram.com/plavookac" target="_blank">Instagram</a></li>
							<li><a href="https://twitter.com/plavookac" target="_blank">Twitter</a></li>
							<li><a href="https://www.youtube.com/channel/UCDfZM0IK6RBgud8HYGFXAJg" target="_blank">YouTube</a></li>
							<li><a href="https://www.linkedin.com/in/plavookac/" target="_blank">Linkedin</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row align-items-center justify-content-center h-100">
				<div class="col-md-12 blog__content">
					<div class="col-12 text-center categoria my-4">
						<a href="">CATEGORIA</a>
					</div>
					<h2 class="title"><?php the_title(); ?></h2>
					<?php the_content(); ?>

				</div>






				<!-- <section class="blog">
					<div class="container h-100">
						<div class="row align-items-center justify-content-center h-100 blog_card">
							<div class="col-md-12 text-center">
								<h2 class="subtitle text-nowrap">Veja outras postagens relacionadas</h2>
							</div>



							<?php
							// If there are posts
							if ($posts_post) :
								// Loop the posts
								foreach ($posts_post as $post_post) :
									include(get_template_directory() . '/includes/blog/card-blog.php');
								endforeach;
								wp_reset_postdata();
							endif;
							?>


							<div class="col-md-12 text-center">
								<a href="" class="btn">

									Ver todos

								</a>
							</div>
						</div>
					</div>
				</section> -->
			</div>
		</div>
		</div>
	</section>

	<?php
	$id_post = $post->ID;

	// Set the arguments for the query
	$args_posts = array(
		'post_type' => 'post',
		'showposts' => 3,
		'post__not_in' => array($id_post)
	);

	// Get the posts
	$posts_post = get_posts($args_posts);
	?>



	<section class="publicacoes section_blue_bg">
		<div class="container h-100">
			<div class="row align-items-center justify-content-center h-100 blog_card">
				<div class="col-md-12 text-center">
					<h2 class="subtitle text-nowrap">Veja também</h2>
				</div>



				<?php
				// If there are posts
				if ($posts_post) :
					// Loop the posts
					foreach ($posts_post as $post_post) :
						include(get_template_directory() . '/includes/blog/card-post.php');
					endforeach;
					wp_reset_postdata();
				endif;
				?>


				<div class="col-md-12 text-center">
					<a href="" class="btn">

						Ver todos

					</a>
				</div>
			</div>
		</div>
	</section>



</main>

<?php get_footer(); ?>