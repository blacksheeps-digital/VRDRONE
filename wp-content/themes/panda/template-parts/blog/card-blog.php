<?php
/* card post*/
?>

<?php
$title = get_the_title($post_post);
$link = get_permalink($post_post->ID);
$id = $post_post->ID;
$description = substr(get_post_meta($post_post->ID, '_yoast_wpseo_metadesc', true), 0, 100);
$image = get_the_post_thumbnail($id, 'full', array('class' => 'img-fluid', 'title' => $title, 'alt' => $title, 'loading' => 'lazy'));
$url = wp_get_attachment_url(get_post_thumbnail_id($post_post->ID), 'thumbnail');

?>

<div id="card_<?php echo $id; ?>" class="col-md-4 style_card">
    <a href="<?php echo $link; ?>">
        <div class="card h-100 text-start">
            <a href="<?php echo $link; ?>">
                <div class="card-header" style="background-image: url('<?php echo $url; ?>')">
                </div>
            </a>
            <div class="card-body">
                <a href="<?php echo $link; ?>">
                    <h3> <?php echo $title; ?></h3>
                    <p class="text-al"><?php echo $description; ?> Teste 1 Teste 1 Teste 1 Teste 1 Teste 1 Teste 1 Teste 1 Teste 1 Teste 1 </p>
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="<?php echo $link; ?>" class="btn ">
                    continuar lendo
                </a>
            </div>
        </div>
    </a>
</div><!-- /.post_<?php echo $id; ?> -->