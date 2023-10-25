<section class="blog-cta gray-bg">
    <div class="container h-100">
        <div class="row align-items-start justify-content-center h-100">
            <div class="col-md-12" data-aos="slide-left" data-aos-duration="1000">
                <h2 class=" mb-md-5">Conheça nosso blog</h2>
            </div>
     <?php
    $args = array(
        'post_type' => 'post', // Tipo de postagem (postagens regulares)
        'posts_per_page' => 3, // Número de posts para mostrar (3 no seu caso)
        'order' => 'DESC', // Ordem decrescente (do mais recente para o mais antigo)
    );

    $recent_posts = new WP_Query($args);

    if ($recent_posts->have_posts()) :
        while ($recent_posts->have_posts()) : $recent_posts->the_post();
    ?>
            <div class="col-md-4 card aos-init aos-animate" data-aos="slide-right" data-aos-duration="1000">
                <div class="card-header">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', ['class' => 'img-fluid', 'alt' => get_the_title(), 'title' => get_the_title()]); ?>
                        </a>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder2.png" class="img-fluid" alt="" title="" loading="lazy">
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <h3 class="text-start smaller mb-3">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>

                    <p class="text-start mb-4">
                        <?php the_excerpt(); ?>
                    </p>

                    <div class="col-md-12 text-center">
                        <a href="<?php the_permalink(); ?>" class="btn">CONTINUAR LENDO</a>
                    </div>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Restaurar os dados originais do post
    endif;
    ?>
 
            <div class="col-md-12 text-center">
                <a href="/blog" class="btn blue-btn">
                    ver todos os artigos
                </a>
            </div>
        </div>
    </div>
</section>