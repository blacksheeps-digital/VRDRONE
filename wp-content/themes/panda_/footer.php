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
                    <div class="d-flex flex-row align-items-center justify-content-evenly justify-content-md-between socials col-md-12 p-0 mb-5 mb-md-0">
    <?php if (have_rows('social_media', 'option')) : ?>
        <?php while (have_rows('social_media', 'option')) : the_row(); ?>
            <?php $social_icon = get_sub_field('icon'); ?>
            <?php if ($social_icon) : ?>
                <a href="<?php the_sub_field('link'); ?>">
                    <i>
                        <img   src="<?php echo esc_url($social_icon['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($social_icon['alt']); ?>" title="<?php echo esc_attr($social_icon['title']); ?>" loading="lazy">
                    </i>
                </a>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found ?>
    <?php endif; ?>
</div>

                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-12 d-block d-md-none mb-4 text-center">
                <p class="fw-bold mb-0 white"><img src='<?php echo IMG ?>phone.png' class='img-fluid me-1' alt='' title='' loading='lazy'>Contato</p>

            </div>
            <div class="col-6 col-md-4  mt-md-5">
                  <?php if (have_rows('location', 'option')) : ?>
        <?php while (have_rows('location', 'option')) : the_row(); ?>
            <p class=" white"><img src="<?php echo IMG ?>pointer.png" class="img-fluid" alt="" title="" loading="lazy">
                <span class="fw-bold"><?php the_sub_field('country'); ?></span> - <span class="fst-italic"><?php the_sub_field('city'); ?></span>
            </p>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found 
        ?>
    <?php endif; ?>
             </div>
            <div class="col-6 col-md-4 mt-md-5">
                 <?php if (have_rows('phones', 'option')) : ?>
                 <p class="fw-bold mb-0 white d-none d-md-block">
                    <img src='<?php echo IMG ?>phone.png' class='img-fluid me-1' alt='' title='' loading='lazy'>Contato
                </p>
        <?php while (have_rows('phones', 'option')) : the_row(); ?>
            <a href="tel:+<?php the_sub_field('phone_number'); ?>" class="text-reset">
                <p class="fw-bold mb-0 white d-none d-md-block">
                    <span class="fst-italic me-1"></span> <span class="fw-bold"><?php the_sub_field('phone_number'); ?></span>
                </p>
            </a>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found 
        ?>
    <?php endif; ?>
                
              
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