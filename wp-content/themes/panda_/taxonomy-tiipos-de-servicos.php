<?php


get_header();

?>
<?php
$term = get_queried_object();

$taxonomy_prefix = $term->taxonomy;

$term_id = $term->term_id;

$term_id_prefixed = $taxonomy_prefix . '_' . $term_id;
?>
<style>
    h1 {
        font-weight: 700;
    }
</style>
<main>
    <?php
    // Obtenha o ID da categoria ou taxonomia atual
    $current_id = get_queried_object_id();
    // Verifique se o ID corresponde ao ID desejado (ID 31)
    if ($current_id != 31) {
        // Layout para ID 31
    ?>
        <section class="banner slick-cards blue-overlay" style="background-image: url('<?php the_field('banner_de_fundo', $term_id_prefixed); ?>');background-attachment: fixed;">
            <div class="container h-100">
                <div class="row align-items-start justify-content-start h-100">
                    <div class="col-md-12">
                        <h1 class="text-center">
                            <?php single_cat_title(); ?>
                        </h1>
                    </div>

                    <?php
                    // Obtenha a taxonomia atual
                    $current_term = get_queried_object();

                    if ($current_id == 30) {

                        // Crie um loop personalizado para o post type "servicos" com base na taxonomia atual
                        $args = array(
                            'post_type' => 'servicos', // Substitua 'servicos' pelo nome do seu post type
                            'posts_per_page' => 3,
                            'order' => 'asc',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $current_term->taxonomy,
                                    'field' => 'slug',
                                    'terms' => $current_term->slug,
                                ),
                            ),
                        );
                    } 
                    
                    else {
                        $args = array(
                            'post_type' => 'servicos', // Substitua 'servicos' pelo nome do seu post type
                            'posts_per_page' => 3,
                            'order' => 'ASC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => $current_term->taxonomy,
                                    'field' => 'slug',
                                    'terms' => $current_term->slug,
                                ),
                            ),
                        );
                    }

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) : $loop->the_post();
                    ?>
                            <div class="col-md-6 card mb-4">
                                <div class="card-header banner-slick">
                                    <?php if (have_rows('galeria')) : ?>
                                        <?php while (have_rows('galeria')) : the_row(); ?>
                                            <?php if (get_row_layout() == 'video') : ?>
                                                <?php get_sub_field('video'); ?>
                                                <?php $url = get_sub_field('video', false, false);
                                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                                                $youtube_id = $match[1];
                                                ?>
                                                <a href="https://www.youtube.com/watch?v=<?php echo $youtube_id; ?>" data-lity>
                                                    <div class="slick-video video">
                                                        <div class="slick-video video">
                                                            <img src='<?php echo IMG ?>placeholder2.png' class='img-fluid' alt='' title='' loading='lazy'>
                                                        </div>
                                                    </div>
                                                </a>
                                            <?php elseif (get_row_layout() == 'imagem') : ?>
                                                <?php if (get_sub_field('imagem')) : ?>
                                                    <div class="slick-image">
                                                        <img src='<?php the_sub_field('imagem'); ?>' class='img-fluid' alt='' title='' loading='lazy'>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <?php // No layouts found 
                                        ?>
                                    <?php endif; ?>
                                </div>

                                <div class="card-body">
                                    <?php $titulo = get_the_title(); ?>
                                    <?php if (!empty($titulo)) : ?>
                                        <h3 class="black"><?php echo $titulo; ?></h3>
                                    <?php endif; ?>
<?php     if ($current_id == 29) { ?>
<?php if (have_rows('itens')) : ?>
                                        <ul class="list-inline">
                                            <?php while (have_rows('itens')) : the_row(); ?>
                                                <?php $item_titulo = get_sub_field('titulo'); ?>
                                                <?php if (!empty($item_titulo)) : ?>
                                                    <li><?php echo $item_titulo; ?></li>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </ul>
                                                                            <?php endif; ?>

<?php }else { ?>
                                    <?php if (have_rows('itens')) : ?>
                                        <ul>
                                            <?php while (have_rows('itens')) : the_row(); ?>
                                                <?php $item_titulo = get_sub_field('titulo'); ?>
                                                <?php if (!empty($item_titulo)) : ?>
                                                    <li><?php echo $item_titulo; ?></li>
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
               <?php }?>

                                    <?php $slug = $post->post_name; ?>
                                    <div class="col-md-12 mt-3 text-center">
                                        <a href="<?php echo home_url('/contato/' . $current_term->slug); ?>" class="btn transparent">CONTRATAR SERVIÇO</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    wp_reset_postdata(); // Restaurar dados originais do post
                    ?>



                </div>
            </div>
        </section>

    <?php } else { ?>
        <section class="banner slick-cards blue-overlay" style="background-image: url('<?php the_field('banner_de_fundo', $term_id_prefixed); ?>');background-attachment: fixed;">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-12">
                        <h1 class="text-center">
                            <?php single_cat_title(); ?>
                        </h1>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center h-100 info-banner reverse">
                    <div class="col-md-6 " style="color: #fff">
                        <p class="white fst-italic">
                            <?php the_field('primeiro_texto', $term_id_prefixed); ?>

                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src='<?php the_field('imagem_1', $term_id_prefixed); ?>' class='img-fluid w-100' alt='' title='' loading='lazy'>
                    </div>
                    <div class="col-md-6">
                        <img src='<?php the_field('imagem_2', $term_id_prefixed); ?>' class='img-fluid w-100' alt='' title='' loading='lazy'>
                    </div>
                    <div class="col-md-6 " style="color: #fff">
                        <p class="white fst-italic">
                            <?php the_field('texto_2', $term_id_prefixed); ?>

                        </p>

                        <div class="col-md-12 mt-md-5 pt-5 text-center text-md-start">
                            <a href="/contratar/trabalhos-para-telecomunicacoes" class="btn">
                                CONTRATAR SERVIÇO
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="taxa">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-12 text-center">
                    <h2>
                        <?php the_field('titulo_principal', $term_id_prefixed); ?>

                    </h2>
                </div>
                <?php if (have_rows('cadastro_de_beneficios_', $term_id_prefixed)) : ?>
                    <?php while (have_rows('cadastro_de_beneficios_', $term_id_prefixed)) : the_row(); ?>
                        <div class="col-md-4 text-center p-5">
                            <div class="d-flex flex-row align-items-center justify-content-center"></div>
                            <?php if (get_sub_field('imagem')) : ?>
                                <img src="<?php the_sub_field('imagem'); ?>" class="img-fluid" alt="" title="" loading="lazy">
                            <?php endif; ?><br>
                            <?php $titulo = get_sub_field('titulo'); ?>
                            <br>
                            <?php if (!empty($titulo)) : ?>
                                <h3 class="blue mt-4"><?php echo $titulo; ?></h3>
                            <?php endif; ?>
                            <?php the_sub_field('descricao'); ?>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // No rows found 
                    ?>
                <?php endif; ?>

                <div class="col-md-12 text-center mt-3">
                    <a href="" class="btn">CONTACTAR AGORA</a>
                </div>
            </div>
        </div>
    </section>
 
    <?php if ($current_id == 29){?>
     <?php $servicos = get_field('servicos', $term_id_prefixed); ?>
<?php if ($servicos) : ?>
    <?php foreach ($servicos as $post) : setup_postdata($post); ?>
        <section class="tour black-overlay" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'full'); ?>');">
            <div class="container h-100">
                <div class="row align-items-center justify-content-end h-100">
                    <div class="col-md-4">
                        <h2 class="white"><?php the_title(); ?></h2>
                        <h3 class="smaller fw-normal fst-italic white"><?php the_field('outro'); ?></h3>
                        <div class="col-md-12 text-center mt-md-5 pt-md-5">
                            <a href="<?php the_field('iframe'); ?>" data-lity="" class="btn">FAZER TOUR VIRTUAL</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

    
    <?php } ?>
    <?php
    
    // Obtenha a taxonomia atual
    if ($current_id == 30) { ?>
        <section class="exemplo py-md-5">
            <div class="container h-100">
                <div class="row align-items-start justify-content-center h-100">
                    <div class="col-md-12 text-center mb-md-5">
                        <h2><?php the_field('veja_alguns_exemplos', $term_id_prefixed); ?>
                        </h2>
                    </div>
                    <?php $servicos = get_field('servicos', $term_id_prefixed); ?>
                    <?php if ($servicos) : ?>
                        <?php foreach ($servicos as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="col-md-4 card">
                                <?php $url = get_field('videos', false, false);
                                preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
                                $youtube_id = $match[1];
                                ?>
                                <a href="https://www.youtube.com/watch?v=<?php echo $youtube_id; ?>" data-lity>
                                    <div class="card-header video">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            // Exibe a imagem destacada do post
                                            echo get_the_post_thumbnail(null, 'large', array('class' => 'img-fluid', 'alt' => '', 'title' => '', 'loading' => 'lazy'));
                                        } else {
                                            // Se não houver imagem destacada, use uma imagem de placeholder
                                            echo '<img src="https://vrdrone.pt/wp-content/themes/panda_/assets/images/placeholder2.png" class="img-fluid" alt="" title="" loading="lazy">';
                                        }
                                        ?>
                                    </div>
                                </a>
                                <div class="card-body">
                                    <h3 class="blue"><?php the_title(); ?></h3>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>
        <section class="blog-cta gray-bg">
            <div class="container h-100">
                <div class="row align-items-start justify-content-center h-100">
                    <div class="col-md-12 aos-init aos-animate" data-aos="slide-left" data-aos-duration="1000">
                        <h2 class=" mb-md-5"><?php the_field('posts_relacionados', $term_id_prefixed); ?>
                        </h2>
                    </div>


                    <?php $posts_ = get_field('posts_', $term_id_prefixed); ?>
                    <?php if ($posts_) : ?>
                        <?php foreach ($posts_ as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="col-md-4 card aos-init aos-animate" data-aos="slide-right" data-aos-duration="1000">
                                <div class="card-header">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full', array('class' => 'img-fluid wp-post-image', 'alt' => get_the_title(), 'title' => get_the_title())); ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="text-start smaller mb-3">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-start mb-4"><?php the_excerpt(); ?></p>
                                    <div class="col-md-12 text-center">
                                        <a href="<?php the_permalink(); ?>" class="btn">CONTINUAR LENDO</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <div class="col-md-12 text-center">
                        <a href="/blog" class="btn blue-btn">
                            ver todos os artigos
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
    // Obtenha a taxonomia atual
    if ($current_id == 31) { ?>
        <section class="blog-cta gray-bg">
            <div class="container h-100">
                <div class="row align-items-start justify-content-center h-100">
                    <div class="col-md-12 aos-init aos-animate" data-aos="slide-left" data-aos-duration="1000">
                        <h2 class=" mb-md-5"><?php the_field('posts_relacionados', $term_id_prefixed); ?>
                        </h2>
                    </div>


                    <?php $posts_ = get_field('posts_', $term_id_prefixed); ?>
                    <?php if ($posts_) : ?>
                        <?php foreach ($posts_ as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="col-md-4 card aos-init aos-animate" data-aos="slide-right" data-aos-duration="1000">
                                <div class="card-header">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full', array('class' => 'img-fluid wp-post-image', 'alt' => get_the_title(), 'title' => get_the_title())); ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="text-start smaller mb-3">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-start mb-4"><?php the_excerpt(); ?></p>
                                    <div class="col-md-12 text-center">
                                        <a href="<?php the_permalink(); ?>" class="btn">CONTINUAR LENDO</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <div class="col-md-12 text-center">
                        <a href="/blog" class="btn blue-btn">
                            ver todos os artigos
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    
    <?php
    // Obtenha a taxonomia atual
    if ($current_id == 29) { ?>
        <section class="blog-cta gray-bg">
            <div class="container h-100">
                <div class="row align-items-start justify-content-center h-100">
                    <div class="col-md-12 aos-init aos-animate" data-aos="slide-left" data-aos-duration="1000">
                        <h2 class=" mb-md-5"><?php the_field('posts_relacionados', $term_id_prefixed); ?>
                        </h2>
                    </div>


                    <?php $posts_ = get_field('posts_', $term_id_prefixed); ?>
                    <?php if ($posts_) : ?>
                        <?php foreach ($posts_ as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="col-md-4 card aos-init aos-animate" data-aos="slide-right" data-aos-duration="1000">
                                <div class="card-header">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('full', array('class' => 'img-fluid wp-post-image', 'alt' => get_the_title(), 'title' => get_the_title())); ?>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h3 class="text-start smaller mb-3">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <p class="text-start mb-4"><?php the_excerpt(); ?></p>
                                    <div class="col-md-12 text-center">
                                        <a href="<?php the_permalink(); ?>" class="btn">CONTINUAR LENDO</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <div class="col-md-12 text-center">
                        <a href="/blog" class="btn blue-btn">
                            ver todos os artigos
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>
<?php get_footer(); ?>