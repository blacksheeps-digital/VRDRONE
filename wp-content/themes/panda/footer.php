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
    <div class="site-info">
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
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>