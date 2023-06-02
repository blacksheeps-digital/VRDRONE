<?php


get_header();

?>
<?php
$term = get_queried_object();

$taxonomy_prefix = $term->taxonomy;

$term_id = $term->term_id;

$term_id_prefixed = $taxonomy_prefix . '_' . $term_id;

$formulario_correspondente = get_field('escolha_o_formulario_correspondente', $term_id_prefixed);
?>

<main>

    <?php single_cat_title(); ?>

    <?php echo $term->description; ?>



    <?php

    // Verifica se o valor do campo existe
    if ($formulario_correspondente) {

        // Constrói o shortcode substituindo o valor do campo no lugar apropriado
        $shortcode = '[advanced_form form="' . $formulario_correspondente . '" ajax="1" submit_text="Enviar" ]';

        // Exibe o shortcode
        echo do_shortcode($shortcode);
    }


    ?>
</main>
<?php get_footer(); ?>