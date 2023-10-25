<section class="depoimentos blue-overlay">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-12">
                <h2 class="text-center white" data-aos="slide-left" data-aos-duration="1000">Depoimentos</h2>
            </div>
    <?php
    $args = array(
        'post_type' => 'depoimentos', // Tipo de postagem (depoimentos)
        'posts_per_page' => -1, // Mostrar todos os posts (ou defina o número desejado)
        'order' => 'DESC', // Ordem decrescente (do mais recente para o mais antigo)
    );

    $depoimentos_query = new WP_Query($args);

    if ($depoimentos_query->have_posts()) :
        while ($depoimentos_query->have_posts()) : $depoimentos_query->the_post();
            // Verifique se os campos ACF estão preenchidos
            $video_url = get_field('video', false, false);
            $tipo_de_servico = get_field('tipo_de_servico');
            $empresa = get_field('empresa');
            $imagem_destacada = get_the_post_thumbnail_url($post, 'medium'); // URL da imagem destacada

            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video_url, $match);
            $youtube_id = isset($match[1]) ? $match[1] : '';

            if ($video_url && $tipo_de_servico && $empresa) :
    ?>
                <div class="card col-md-4 p-3" data-aos="slide-right" data-aos-duration="1000">
                    <!-- lity video -->
                    <a href="<?php echo esc_url($video_url); ?>" class="d-block" data-lity="">
                        <div class="card-header video">
                            <?php if ($imagem_destacada) : ?>
                                <img src="<?php echo esc_url($imagem_destacada); ?>" class="img-fluid" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" class="img-fluid" alt="" title="" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="card-body pb-4">
                            <h3 class="blue text-start">
                                <?php the_title(); ?>
                            </h3>
                            <p class="fst-italic text-start">
                                <?php echo esc_html($empresa); ?>
                            </p>
                            <h4>
                                <?php
                                $terms = get_the_terms($post, 'tiipos-de-servicos');
                                if ($terms && !is_wp_error($terms)) {
                                    $tipo_de_servico_names = array();
                                    foreach ($terms as $term) {
                                        $tipo_de_servico_names[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                    }
                                    echo implode(', ', $tipo_de_servico_names);
                                }
                                ?>
                            </h4>
                        </div>
                    </a>
                </div>
            <?php else : ?>
                <!-- Card para o caso em que o campo 'video' ACF não está preenchido -->
                <div class="card col-md-4 p-3" data-aos="slide-right" data-aos-duration="1000">
                    <!-- Conteúdo do card para o caso de 'video' não preenchido -->
                    <div class="card-header video">
                        <?php if ($imagem_destacada) : ?>
                            <img src="<?php echo esc_url($imagem_destacada); ?>" class="img-fluid" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" loading="lazy">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" class="img-fluid" alt="" title="" loading="lazy">
                        <?php endif; ?>
                    </div>
                    <div class="card-body pb-4">
                        <h3 class="blue text-start">
                            <?php the_title(); ?>
                        </h3>
                        <p class="fst-italic text-start">
                            <?php echo esc_html($empresa); ?>
                        </p>
                        <h4>
                            <?php
                            $terms = get_the_terms($post, 'tiipos-de-servicos');
                            if ($terms && !is_wp_error($terms)) {
                                $tipo_de_servico_names = array();
                                foreach ($terms as $term) {
                                    $tipo_de_servico_names[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                }
                                echo implode(', ', $tipo_de_servico_names);
                            }
                            ?>
                        </h4>
                    </div>
                </div>
    <?php
            endif;
        endwhile;
        wp_reset_postdata(); // Restaurar os dados originais do post
    endif;
    ?>

        </div>
    </div>
</section>