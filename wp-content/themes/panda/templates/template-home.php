<?php
/*
Template Name: Página principal
*/
get_header( );
?>


<h1>home</h1>


<?php 
			// get_template_part( 'template-parts/content', 'page' );

?>
<h2>topo</h2>
<?php 
// Obtém todos os termos da taxonomia "tipos-de-servicos"
$terms = get_terms(array(
    'taxonomy' => 'tiipos-de-servicos',
    'hide_empty' => false,
));

// Loop pelos termos da taxonomia
foreach ($terms as $term) {
    echo '<h2>' . $term->name . '</h2>';

    // Configura a consulta para obter os posts do termo atual
    $args = array(
        'post_type' => 'servicos',
        'posts_per_page' => 5, // Limita a 5 posts
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
}

?>
    <h2>Serviços</h2>
    <?php echo do_shortcode('[panda_vr_drones_posts post_type="servicos" post_count=5 slider="true" taxonomy="tiipos-de-servicos:vr"]');?>

    <h2>Depoimentos</h2>
    <?php echo do_shortcode('[panda_vr_drones_posts post_type="depoimentos" post_count=3 slider="false"]');?>

    <h2>Conheça nosso blog</h2>
    <?php echo do_shortcode('[panda_vr_drones_posts post_type="post" post_count=3 slider="false"]');?>


 

<?php 
get_footer();
?>