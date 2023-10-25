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
	<?php
$categories = get_the_category();
if (!empty($categories)) {
    $category_slug = $categories[0]->slug;
    $category_link = home_url('/blog/?_sft_category=' . $category_slug);
    echo '<a href="' . esc_url($category_link) . '" class="text-white fw-bold">' . esc_html($categories[0]->name) . '</a>';
}
?>

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
    <div class="img" style="background-image: url('<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'), array('size' => 100))); ?>')">
    </div>
    <div class="media-body text-start">
        <p class="mb-0">Escrito por</p>
        <p class="name mb-2"><?php the_author(); ?></p>
        <p class="position"><?php echo esc_html(get_the_author_meta('description')); ?></p>
    </div>
</div>

				</div>
			</div>
		</div>
	</section>

	<section class="blog-cta gray-bg">
    <div class="container h-100">
        <div class="row align-items-start justify-content-center h-100">
            
	<?php $posts_relacionados = get_field('posts_relacionados'); ?>

<?php if ($posts_relacionados) : ?>
      <div class="col-md-12 aos-init aos-animate" data-aos="slide-left" data-aos-duration="1000">
                <h2 class=" mb-md-5">Conheça nosso blog</h2>
            </div>
    <?php foreach ($posts_relacionados as $post) : setup_postdata($post); ?>
        <div class="col-md-4 card" data-aos="slide-right" data-aos-duration="1000">
            <div class="card-header">
                <a href="<?php the_permalink(); ?>">
                    <img width="300" height="150" src="<?php echo esc_url(get_the_post_thumbnail_url($post, 'medium')); ?>" class="img-fluid wp-post-image" alt="<?php the_title(); ?>" decoding="async" loading="lazy" title="<?php the_title(); ?>">
                </a>
            </div>
            <div class="card-body">
                <h3 class="text-start smaller mb-3">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>

                <p class="text-start mb-4"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>

                <div class="col-md-12 text-center">
                    <a href="<?php the_permalink(); ?>" class="btn">CONTINUAR LENDO</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <?php
    $category = get_the_category();
    $category_id = $category[0]->cat_ID;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'category__in' => array($category_id),
        'post__not_in' => array(get_the_ID()),
    );
    $related_posts = new WP_Query($args);
    ?>

    <?php if ($related_posts->have_posts()) : ?>
    <div class="col-md-12 aos-init aos-animate" data-aos="slide-left" data-aos-duration="1000">
                <h2 class=" mb-md-5">Conheça nosso blog</h2>
            </div>
        <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
            <div class="col-md-4 card" data-aos="slide-right" data-aos-duration="1000">
                <div class="card-header">
                    <a href="<?php the_permalink(); ?>">
                        <img width="300" height="150" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" class="img-fluid wp-post-image" alt="<?php the_title(); ?>" decoding="async" loading="lazy" title="<?php the_title(); ?>">
                    </a>
                </div>
                <div class="card-body">
                    <h3 class="text-start smaller mb-3">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <p class="text-start mb-4"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>

                    <div class="col-md-12 text-center">
                        <a href="<?php the_permalink(); ?>" class="btn">CONTINUAR LENDO</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php endif; ?>

		</div>
		</div>
	</section>


	<?php //include get_template_directory() . '/template-parts/global/blog-cta.php'; ?>




</main>

<?php get_footer(); ?>