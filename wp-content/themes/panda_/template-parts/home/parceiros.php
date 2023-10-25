<section class="parceiros">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-12" data-aos="slide-left" data-aos-duration="1000">
                <h2>Parceiros</h2>
            </div>
            <div class="d-flex flex-row align-items-stretch justify-content-center col-md-10">
                    <?php
    $args = array(
        'post_type' => 'parceiros', // Tipo de postagem (parceiros)
        'posts_per_page' => 4, // Número de posts para mostrar (4 no seu caso)
        'order' => 'DESC', // Ordem decrescente (do mais recente para o mais antigo)
    );

    $parceiros_query = new WP_Query($args);

    if ($parceiros_query->have_posts()) :
        while ($parceiros_query->have_posts()) : $parceiros_query->the_post();
    ?>
            <div class="col-md-3 d-flex align-items-center justify-content-center" data-aos="slide-right" data-aos-duration="1000">
                <?php $imagem_destacada = get_field( 'logo_do_parceiro' ); ?>
 
                <?php
                 $titulo_do_post = get_the_title(); // Obtém o título do post

                if ($imagem_destacada) :
                ?>
                    <img src="<?php echo esc_url( $imagem_destacada['url'] ); ?>" class="img-fluid" alt="<?php echo esc_attr($titulo_do_post); ?>" title="<?php echo esc_attr($titulo_do_post); ?>" loading="lazy">
                <?php endif; ?>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Restaurar os dados originais do post
    endif;
    ?>
            </div>
        </div>
    </div>
</section>