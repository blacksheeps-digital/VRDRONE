<?php


get_header();

?>
<?php
$term = get_queried_object();

$taxonomy_prefix = $term->taxonomy;

$term_id = $term->term_id;

$term_id_prefixed = $taxonomy_prefix . '_' . $term_id;

 ?>

<main>

    <?php single_cat_title(); ?>

    <?php echo $term->description; ?>
 <?php
 

    // Configura a consulta para obter os posts do termo atual
    $args = array(
        'post_type' => 'servicos',
        'posts_per_page' => -1, // Limita a 5 posts
        'tax_query' => array(
            array(
                'taxonomy' => 'tiipos-de-servicos',
                'field' => 'slug',
                'terms' => $term->slug,
            ),
            
        ),
    );

    $query = new WP_Query($args);

    // Loop pelos posts do termo atual
    if ($query->have_posts()) {
        echo '<ul>';

        while ($query->have_posts()) {
            $query->the_post();
            echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }

        echo '</ul>';
        // Botão "Mais Detalhes" para a página da taxonomia
        $term_link = get_term_link($term);
        echo '<a href="' . $term_link . '" class="more-details-button">Mais Detalhes</a>';
    } else {
        echo '<p>Nenhum post encontrado.</p>';
    }

    // Restaura os dados originais
    wp_reset_postdata();
 
?>
 
</main>
<?php get_footer(); ?>