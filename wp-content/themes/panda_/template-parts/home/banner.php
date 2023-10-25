 


<section class="banner home blue-overlay" style="background-image: url('<?php the_field( 'banner_de_fundo' ); ?>');">
    <div class="container h-100">
        <div class="row align-items-start justify-content-center h-100">
            <div class="col-md-5 text-end">
                <h1 class="text-start text-md-end " data-aos="fade-right" data-aos-duration="3000">
                    <?php the_field( 'titulo_principal',false ,false ); ?>
                </h1>
            </div>
            <div class="col-md-3" data-aos="fade-left" data-aos-duration="3000">
                <p class="fst-italic white"><?php the_field( 'descricao', false, false ); ?></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row align-items-center justify-content-center h-100">
            <?php 
            $taxonomy = 'tiipos-de-servicos';
$terms = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false, // Certifique-se de que termos vazios sejam incluídos
));

if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term) {
        echo '<div class="card col-md-4" data-aos="flip-down" data-aos-duration="2000" data-aos-delay="500">';
        echo '<div class="card-header">';
        
        // Substitua 'imagem' pelo nome do campo personalizado da imagem da taxonomia
        $imagem = get_field('imagem', $taxonomy . '_' . $term->term_id);
        
        if (!empty($imagem)) {
            echo '<img src="' . esc_url($imagem) . '" class="img-fluid" alt="' . esc_attr($term->name) . '" title="' . esc_attr($term->name) . '" loading="lazy">';
        } else {
            echo '<img src="https://vrdrone.pt/wp-content/themes/panda_/assets/images/placeholder2.png" class="img-fluid" alt="" title="" loading="lazy">';
        }
        
        echo '</div>';
        echo '<div class="card-body big">';
        echo '<div class="title">';
        echo '<h3 class="text-center fw-bold m-0">' . esc_html($term->name) . '</h3>';
        //echo '<h3 class="text-center fw-light m-0">' . esc_html($term->name) . '</h3>';
        echo '</div>';
        echo '<ul>';

        // Substitua 'servicos' pelo nome do seu tipo de post
        $args = array(
            'post_type' => 'servicos',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $term->term_id,
                ),
            ),
        );

        $related_posts = new WP_Query($args);

        if ($related_posts->have_posts()) :
            while ($related_posts->have_posts()) : $related_posts->the_post();
                echo '<li class="italic-text">' . get_the_title() . '</li>';
            endwhile;
            wp_reset_postdata(); // Restaurar os dados originais do post
        else :
            echo '<li class="italic-text">Nenhum post relacionado encontrado.</li>';
        endif;

        echo '</ul>';
        echo '<div class="col-md-12 text-center">';
        echo '<a href="' . esc_url(home_url('/servicos/' . $term->slug . '')) . '" class="btn italic-text">MAIS DETALHES</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>
        </div>
    </div>
</section>