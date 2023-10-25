<?php
/*
Template Name: Contato
*/
get_header();
?>

<section class="contato mt-5">
	<div class="container h-100">
		<div class="row align-items-start justify-content-center h-100">
			<div class="col-md-2"></div>
			<div class="col-md-4 text-start text-md-end">
				<h1 class="huge black mb-3 mb-md-5 fw-bold">
					<?php the_field('vamos_conversar'); ?>
				</h1>
				<p class="mb-4 mb-md-0">
					<?php the_field('texto'); ?>
				</p>
				<div class="col-md-10 col-xl-7 ms-md-auto mt-md-5 pt-md-5 mb-5 mb-md-0">
					<div class="d-flex flex-row align-items-center justify-content-between socials col-md-12 p-0">


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
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5">

				<?php echo do_shortcode('[contact-form-7 id="74" title="Formulário de Contato"]'); ?>

			</div>
		</div>
	</div>
	</div>
</section>




<!-- 
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
<?php endif; ?> -->

<?php
get_footer();
?>