<?php

$classe = 'blog-single';

get_header();

the_post();

?>

<main class="main" role="main">
	<?php
	$url = wp_get_attachment_url(get_post_thumbnail_id($post_projeto->ID), 'thumbnail');
	?>



	<section class="blog_single pt-0">
		<div class="container-fluid h-100 mb-5 d-flex flex-column black-overlay" style="background-image: url(<?php echo $url ?>);">

			<div class="col-12 text-center categoria mb-4  mt-auto align-self-end" style="position: relative; z-index: 10;">
				<a href="" class="text-white fw-bold">CATEGORIA</a>
			</div>
			<div class="col-12 text-center mt-2 mb-5" style="position: relative; z-index: 10;">
				<h2 class="title text-center text-white"><?php the_title(); ?></h2>
			</div>
		</div>
		<div class="container h-100">
			<div class="row align-items-center justify-content-center h-100">
				<div class="col-md-10 blog__content">
					<?php the_content(); ?>
				</div>

			</div>
			<div class="row align-items-center justify-content-center h-100">
				<div class="col-md-10 text-center">
					<hr>
					<div class="d-flex flex-row align-items-center justify-content-center author">
						<div class="img" style="background-image: url('<?php echo IMG ?>placeholder.png')">
						</div>
						<div class="media-body text-start">
							<p class="mb-0">Escrito por</p>
							<p class="name mb-2">Nome Sobrenome</p>
							<p class="position">Editor e colaborador VR DRONE</p>
						</div>
					</div>
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



	<!-- <section class="publicacoes section_blue_bg">
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
	</section> -->



	<?php include get_template_directory() . '/template-parts/global/blog-cta.php'; ?>




</main>

<?php get_footer(); ?>