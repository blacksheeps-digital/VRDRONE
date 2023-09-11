<section class="banner home blue-overlay" style="background-image: url('./assets/images/bannerPlaceholder.png');">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-5 text-end">
                <h1 class="text-start text-md-end">
                    Empresa de engenharia focada na
                    <span class="fw-bold text-reset">criação de modelagem 3D e ambiente virtual</span>
                </h1>
            </div>
            <div class="col-md-3">
                <p class="fst-italic white">Criada em 2022 com o objetivo de solucionar , otimizar o trabalho e prevenir
                    situações
                    adversas que o mercado de construção civil, imobiliário e de georeferenciamento exigem.</p>
            </div>
            <div class="col-md-2"></div>
        </div>


        <?php
        // Obtém todos os termos da taxonomia "tipos-de-servicos"
        $terms = get_terms(array(
            'taxonomy' => 'tiipos-de-servicos',
            'hide_empty' => false,
        ));

        // Loop pelos termos da taxonomia
        foreach ($terms as $term) {
            echo '<h3>' . $term->name . '</h3>';

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

        <div class="row align-items-center justify-content-center h-100">
            <div class="card col-md-4">
                <div class="card-header">
                    <img src='<?php echo IMG ?>placeholder2.png' class='img-fluid' alt='' title='' loading='lazy'>
                </div>
                <div class="card-body big">
                    <div class="title">
                        <h3 class="text-center fw-bold m-0">
                            teste
                        </h3>
                        <h3 class="text-center fw-light m-0">
                            teste
                        </h3>
                    </div>
                    <ul>
                        <li class="italic-text">um</li>
                        <li class="italic-text">um</li>
                        <li class="italic-text">um</li>

                    </ul>

                    <div class="col-md-12 text-center">
                        <a href="" class="btn italic-text">
                            MAIS DETALHES
                        </a>
                    </div>
                </div>
            </div>
            <div class="card col-md-4">
                <div class="card-header">
                    <img src='<?php echo IMG ?>placeholder2.png' class='img-fluid' alt='' title='' loading='lazy'>
                </div>
                <div class="card-body big">
                    <div class="title">
                        <h3 class="text-center fw-bold m-0">
                            teste
                        </h3>
                        <h3 class="text-center fw-light m-0">
                            teste
                        </h3>
                    </div>
                    <ul>
                        <li class="italic-text">um</li>
                        <li class="italic-text">um</li>
                        <li class="italic-text">um</li>

                    </ul>

                    <div class="col-md-12 text-center">
                        <a href="" class="btn italic-text">
                            MAIS DETALHES
                        </a>
                    </div>
                </div>
            </div>
            <div class="card col-md-4">
                <div class="card-header">
                    <img src='<?php echo IMG ?>placeholder2.png' class='img-fluid' alt='' title='' loading='lazy'>
                </div>
                <div class="card-body big">
                    <div class="title">
                        <h3 class="text-center fw-bold m-0">
                            teste
                        </h3>
                        <h3 class="text-center fw-light m-0">
                            teste
                        </h3>
                    </div>
                    <ul>
                        <li class="italic-text">um</li>
                        <li class="italic-text">um</li>
                        <li class="italic-text">um</li>

                    </ul>

                    <div class="col-md-12 text-center">
                        <a href="" class="btn italic-text">
                            MAIS DETALHES
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>