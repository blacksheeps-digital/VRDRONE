<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package panda
 */

?>

<footer id="colophon" class="site-footer">
    <!-- <div class="site-info">
        <?php if (have_rows('social_media', 'option')) : ?>
            <?php while (have_rows('social_media', 'option')) : the_row(); ?>
                <?php $icon = get_sub_field('icon'); ?>
                <?php if ($icon) : ?>
                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                <?php endif; ?>
                <?php the_sub_field('name'); ?>
                <?php the_sub_field('link'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found 
            ?>
        <?php endif; ?>
        <?php if (have_rows('location', 'option')) : ?>
            <?php while (have_rows('location', 'option')) : the_row(); ?>
                <?php the_sub_field('city'); ?>
                <?php the_sub_field('country'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found 
            ?>
        <?php endif; ?>
        <?php if (have_rows('phones', 'option')) : ?>
            <?php while (have_rows('phones', 'option')) : the_row(); ?>
                <?php the_sub_field('phone_number'); ?>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found 
            ?>
        <?php endif; ?>
    </div> -->
    <!-- .site-info -->

    <div class="container">
        <div class="row align-items-start justify-content-center h-100">
            <div class="col-md-3">
                <img src='<?php echo IMG ?>logoText.png' class='img-fluid img-fluid w-100 mb-5 p-4' alt='' title='' loading='lazy'>
                <div class="d-flex flex-row align-items-center justify-content-evenly justify-content-md-between socials col-md-12 p-0 mb-5 mb-md-0">
                    <a href="">
                        <i>
                            <img src='<?php echo IMG ?>facebook.png' class='img-fluid' alt='' title='' loading='lazy'>
                        </i>
                    </a>
                    <a href="">
                        <i><img src='<?php echo IMG ?>instagram.png' class='img-fluid' alt='' title='' loading='lazy'></i>
                    </a>
                    <a href="">
                        <i><img src='<?php echo IMG ?>youtube.png' class='img-fluid' alt='' title='' loading='lazy'></i>
                    </a>
                    <a href="">
                        <i><img src='<?php echo IMG ?>linkedin.png' class='img-fluid' alt='' title='' loading='lazy'></i>
                    </a>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-12 d-block d-md-none mb-4 text-center">
                <p class="fw-bold mb-0 white"><img src='<?php echo IMG ?>phone.png' class='img-fluid me-1' alt='' title='' loading='lazy'>Contato</p>

            </div>
            <div class="col-6 col-md-4  mt-md-5">
                <p class="white"><img src='<?php echo IMG ?>pointer.png' class='img-fluid' alt='' title='' loading='lazy'>
                    <span class="fw-bold">Portugal</span> - <span class="fst-italic">Lisboa</span>
                </p>
                <p class="white"><img src='<?php echo IMG ?>pointer.png' class='img-fluid' alt='' title='' loading='lazy'>
                    <span class="fw-bold">Portugal</span> - <span class="fst-italic">Lisboa</span>
                </p>
            </div>
            <div class="col-6 col-md-4 mt-md-5">
                <p class="fw-bold mb-0 white d-none d-md-block">
                    <img src='<?php echo IMG ?>phone.png' class='img-fluid me-1' alt='' title='' loading='lazy'>Contato
                </p>
                <a href="tel:+" class="text-reset">
                    <p class="ms-3 white mb-md-1"> <span class="fst-italic me-1">+351</span> <span class="fw-bold">91225-3674</span></p>
                    <p class="ms-3 white"> <span class="fst-italic me-1">+351</span> <span class="fw-bold">91225-3674</span></p>
                </a>
            </div>
        </div>
        <div class="row align-items-center justify-content-center h-100 mt-5 mt-md-0">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="" class="text-reset">
                    <p class="fw-bold white">
                        Política de privacidade
                    </p>
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="text-reset">
                    <p class="fw-bold white">
                        Trabalhe conosco
                    </p>
                </a>
            </div>
        </div>
    </div>

    <div class="whatsapp-btn">
        <a href="https://wa.me/+55">
            <img src='<?php echo IMG ?>WHATSAPP.png' class='img-fluid' alt='' title='' loading='lazy'>
        </a>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>