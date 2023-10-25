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
        <div class="card h-100 text-left">
            <a href="<?php echo $link; ?>">
                <div class="card-header" style="background-image: url('<?php echo $url; ?>')">
                </div>
            </a>
            <div class="card-body">

                <?php
                $categories = get_the_category($post_post);

                foreach ($categories as $category) {

                    $cat_link = get_category_link($category->cat_ID);
                    echo '<a class="cat text-uppercase mt-3 d-inline-block" href="' . $cat_link . '">' . $category->name . '</a>'; // category link
                }

                ?>
                <a href="<?php echo $link; ?>">
                    <h3> <?php echo $title; ?></h3>
                    <p><?php echo $description; ?></p>
                </a>
            </div>
            <div class="card-footer">
                <a href="<?php echo $link; ?>" class="leia_link">
                    Ver notícia
                </a>
            </div>
        </div>
    </a>
</div><!-- /.post_<?php echo $id; ?> -->