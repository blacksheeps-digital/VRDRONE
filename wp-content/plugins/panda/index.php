<?php

/**
 * Plugin Name: Panda VR Drones
 * Description:  
 * Version: 1.0.0
 * Author: Francisco Motta e Mateus Lara
 * Text Domain: panda-vr-drones
 */

 // Função para adicionar a página do plugin ao menu do WordPress
function panda_vr_drones_add_plugin_page() {
    add_menu_page(
        'Panda VR Drones', // Título da página
        'Panda VR Drones', // Título do menu
        'manage_options', // Capacidade de usuário necessária para acessar a página
        'panda-vr-drones', // Slug da página
        'panda_vr_drones_render_plugin_page', // Função de callback para renderizar a página
        'dashicons-admin-generic', // Ícone do menu (opcional)
        20 // Posição do menu (opcional)
    );
}
add_action('admin_menu', 'panda_vr_drones_add_plugin_page');

// Função de callback para renderizar a página do plugin
function panda_vr_drones_render_plugin_page() {
    ?>
    <div class="wrap">
        <h1>Página do Plugin Panda VR Drones</h1>
        <p>ta aqui?</p>
        <!-- Conteúdo da página -->
    </div>
    <?php
}


// Função para adicionar a subpágina de configurações do plugin
function panda_vr_drones_add_settings_page() {
    acf_add_options_sub_page(array(
        'page_title' => 'Configurações',
        'menu_title' => 'Configurações',
        'parent_slug' => 'panda-vr-drones',
    ));
}
add_action('acf/init', 'panda_vr_drones_add_settings_page');

// // Função de callback para renderizar a página de configurações do plugin
// function panda_vr_drones_render_settings_page() {
//     acf_form(array(
//         'post_id' => 'options',
//         'field_groups' => array('group_40'), // Substitua 'group_123' pelo ID do grupo de campos ACF
//         'submit_value' => 'Salvar Configurações',
//     ));
// }
// add_action('acf/render_field_group_settings/panda-vr-drones', 'panda_vr_drones_render_settings_page');



// Função para registrar as abas e campos do ACF
function panda_vr_drones_register_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_plugin_settings',
            'title' => 'Configurações do Plugin',
            'fields' => array(
                // Aba "Logo"
                array(
                    'key' => 'field_tab_logo',
                    'label' => 'Logo',
                    'name' => 'tab_logo',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_logo',
                    'label' => 'Logo',
                    'name' => 'logo',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                    'parent' => 'group_plugin_settings',
                    'conditional_logic' => 0,
                ),
                // Aba "Redes Sociais"
                array(
                    'key' => 'field_tab_social_media',
                    'label' => 'Redes Sociais',
                    'name' => 'tab_social_media',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_social_media',
                    'label' => 'Redes Sociais',
                    'name' => 'social_media',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Adicionar Rede Social',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_social_icon',
                            'label' => 'Ícone',
                            'name' => 'icon',
                            'type' => 'image',
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                            'library' => 'all',
                        ),
                        array(
                            'key' => 'field_social_name',
                            'label' => 'Nome',
                            'name' => 'name',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_social_link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'text',
                        ),
                    ),
                    'parent' => 'group_plugin_settings',
                    'conditional_logic' => 0,
                ),
                // Aba "Localização"
                array(
                    'key' => 'field_tab_location',
                    'label' => 'Localização',
                    'name' => 'tab_location',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_location',
                    'label' => 'Localização',
                    'name' => 'location',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Adicionar Local',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_city',
                            'label' => 'Cidade',
                            'name' => 'city',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'field_country',
                            'label' => 'País',
                            'name' => 'country',
                            'type' => 'text',
                        ),
                    ),
                    'parent' => 'group_plugin_settings',
                    'conditional_logic' => 0,
                ),
                // Aba "Telefones"
                array(
                    'key' => 'field_tab_phones',
                    'label' => 'Telefones',
                    'name' => 'tab_phones',
                    'type' => 'tab',
                ),
                array(
                    'key' => 'field_phones',
                    'label' => 'Telefones',
                    'name' => 'phones',
                    'type' => 'repeater',
                    'layout' => 'block',
                    'button_label' => 'Adicionar Telefone',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_phone_number',
                            'label' => 'Número de Telefone',
                            'name' => 'phone_number',
                            'type' => 'text',
                        ),
                    ),
                    'parent' => 'group_plugin_settings',
                    'conditional_logic' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-configuracoes',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'panda_vr_drones_register_acf_fields');



 
        












// // Função do shortcode
// function panda_vr_drones_shortcode($atts)
// {
//     $atts = shortcode_atts(array(
//         'quantidade' => '5',
//         'tipo' => 'servicos',
//         'slider' => 'false',
//         'tipo-de-servico' => 'vr',
//     ), $atts);

//     $args = array(
//         'post_type' => $atts['tipo'],
//         'posts_per_page' => $atts['quantidade'],
//         'tax_query' => array(
//             array(
//                 'taxonomy' => 'tiipos-de-servicos',
//                 'field' => 'slug',
//                 'terms' => $atts['tipo-de-servico'],
//             ),
//         ),
//     );

//     $query = new WP_Query($args);

//     $output = '';

//     if ($query->have_posts()) {
//         if ($atts['slider'] == 'true') {
//             $output .= '<div class="slider">'; // Adapte a classe CSS para o seu caso
//         }

//         while ($query->have_posts()) {
//             $query->the_post();
//             $output .= '<div class="post">'; // Adapte a classe CSS para o seu caso

//             // Verifica o tipo de post
//             if ($atts['tipo'] == 'depoimentos') {
//                 $output .= '<h2>' . get_the_title() . '</h2>';
//                 $output .= '<div class="video">' . get_field('video') . '</div>';
//                 $output .= '<div class="tipo-servico">' . get_field('tipo_de_servico') . '</div>';
//             } elseif ($atts['tipo'] == 'servicos') {
//                 $output .= '<h2>' . get_the_title() . '</h2>';
//                 $output .= '<ul class="itens-servico">';

//                 // Obter a lista de itens usando o ACF
//                 $itens_servico = get_field('itens_servico');
//                 if ($itens_servico) {
//                     foreach ($itens_servico as $item) {
//                         $output .= '<li>' . $item['item'] . '</li>';
//                     }
//                 }

//                 $output .= '</ul>';
//             } else {
//                 $output .= '<h2>' . get_the_title() . '</h2>';
//                 $output .= '<div class="content">' . get_the_content() . '</div>';
//             }

//             $output .= '</div>';
//         }

//         if ($atts['slider'] == 'true') {
//             $output .= '</div>';
//         }
//     } else {
//         $output = 'nem entrou';
//     }

//     wp_reset_postdata();

//     return $output;
// }
// add_shortcode('panda_vr_drones', 'panda_vr_drones_shortcode');


function panda_vr_drones_posts_shortcode($atts) {
    $atts = shortcode_atts(array(
        'post_type' => 'post',
        'post_count' => 5,
        'slider' => false,
        'taxonomy' => '',
    ), $atts);

    $args = array(
        'post_type' => $atts['post_type'],
        'posts_per_page' => $atts['post_count'],
    );

    if (!empty($atts['taxonomy'])) {
        $taxonomy_parts = explode(':', $atts['taxonomy']);
        $taxonomy = $taxonomy_parts[0];
        $term = $taxonomy_parts[1];

        $args['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $term,
            ),
        );
    }

    $posts = new WP_Query($args);

    ob_start();

    if ($posts->have_posts()) {
        if ($atts['slider']) {
            echo '<div class="slider">';
        }

        while ($posts->have_posts()) {
            $posts->the_post();

            if ($atts['slider']) {
                echo '<div class="slide">';
            }

            echo '<h2>' . get_the_title() . '</h2>';

            // Verifica o tipo de post
            if ($atts['post_type'] == 'depoimentos') {
                // Exibe o campo de vídeo, título e tipo de serviço para depoimentos
                $video = get_field('video');
                $tipo_servico = get_field('tipo_de_servico');
                
                if ($video) {
                    echo 'depoimentos';
                    echo '<div class="video">';
                    echo $video;
                    echo '</div>';
                }

                if ($tipo_servico) {
                    echo '<p>Tipo de serviço: ' . $tipo_servico . '</p>';
                }
            } elseif ($atts['post_type'] == 'servicos') {
                echo 'servicos';
                // Exibe a lista de itens para serviços
                $itens = get_field('itens');
                
                if ($itens) {
                    echo '<ul>';
                    foreach ($itens as $item) {
                        echo '<li>' . $item['item'] . '</li>';
                    }
                    echo '</ul>';
                }
            }
            else{
                echo "posts";
            }

            if ($atts['slider']) {
                echo '</div>';
            }
        }

        if ($atts['slider']) {
            echo '</div>';
        }
    }
    else{
        echo "nem entrou";
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('panda_vr_drones_posts', 'panda_vr_drones_posts_shortcode');
