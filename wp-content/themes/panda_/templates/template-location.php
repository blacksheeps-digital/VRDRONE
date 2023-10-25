<?php
/*
Template Name: Onde Estamos
*/
get_header();
?>

<section class="onde mt-5">
	<div class="container h-100">
		<div class="row align-items-start justify-content-between h-100">
			<div class="d-flex flex-row align-items-start justify-content-start col-md-6 flex-wrap">
			<div class="col-md-12">
    <h1 class="huge black fw-bold"><?php the_field('titulo'); ?></h1>
</div>

<div class="col-md-12 my-4">
    <?php $imagem = get_field('imagem'); ?>
    <?php if ($imagem) : ?>
        <img src="<?php echo ($imagem); ?>" class="img-fluid w-100" alt="" title="" loading="lazy">
    <?php endif; ?>
    <!-- iFrame do google no lugar da imagem -->
</div>

<div class="col-6 mt-md-5">
    <?php if (have_rows('location', 'option')) : ?>
        <?php while (have_rows('location', 'option')) : the_row(); ?>
            <p class=" "><img src="<?php echo IMG ?>pointer.png" class="img-fluid" alt="" title="" loading="lazy">
                <span class="fw-bold"><?php the_sub_field('country'); ?></span> - <span class="fst-italic"><?php the_sub_field('city'); ?></span>
            </p>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found 
        ?>
    <?php endif; ?>
</div>

<div class="col-6 mt-md-5">
    <p class="fw-bold mb-0  "><img src="<?php echo IMG ?>phone.png" class="img-fluid me-1" alt="" title="" loading="lazy">Contato</p>
    <?php if (have_rows('phones', 'option')) : ?>
        <?php while (have_rows('phones', 'option')) : the_row(); ?>
            <a href="tel:+<?php the_sub_field('phone_number'); ?>" class="text-reset">
                <p class="ms-3 mb-md-1">
                    <span class="fst-italic me-1"></span> <span class="fw-bold"><?php the_sub_field('phone_number'); ?></span>
                </p>
            </a>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // No rows found 
        ?>
    <?php endif; ?>
</div>

<div class="col-md-4 mt-4">
    <div class="d-flex flex-row align-items-center justify-content-between socials col-md-12 p-0">
        <?php if (have_rows('social_media', 'option')) : ?>
            <?php while (have_rows('social_media', 'option')) : the_row(); ?>
                <?php $icon = get_sub_field('icon'); ?>
                <a href="<?php the_sub_field('link'); ?>">
                    <i>
                        <?php if ($icon) : ?>
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
                        <?php endif; ?>
                    </i>
                </a>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found 
            ?>
        <?php endif; ?>
    </div>
</div>
</div>

			<div class="col-md-5">
				<div class="row align-items-start justify-content-start h-100">
					<div class="col-md-8">
						<h2 class="text-start mb-4">
							Mande sua mensagem pra gente.
						</h2>

					</div>

					<div class="col-md-12">
					    <?php echo do_shortcode('[contact-form-7 id="256" title="Onde estamos"]');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
get_footer();
?>