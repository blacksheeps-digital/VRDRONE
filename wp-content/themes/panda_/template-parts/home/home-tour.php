

<?php $escolha_um_servico_em_destaque = get_field( 'escolha_um_servico_em_destaque' ); ?>
<?php if ( $escolha_um_servico_em_destaque ) : ?>
	<?php foreach ( $escolha_um_servico_em_destaque as $post ) : ?>
		<?php setup_postdata ( $post ); ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>

		<section class="home-tour black-overlay" style="background-image: url('<?php echo $url ?>');">
    <div class="container h-100">
        <div class="row align-items-stretch justify-content-center h-100">
            <a href="#inline" class="col-md-6 video no-bg d-block" data-lity>
                <!-- <a data-lity class="btn">FAZER TOUR VIRTUAL</a> -->
                <iframe id="inline" style="background:#fff" class="lity-hide" width='853' height='480' src='<?php the_field( 'iframe' ); ?>
' frameborder='0' allowfullscreen allow='xr-spatial-tracking'></iframe>
            </a>
            <div class="col-md-6"  data-aos="fade-left" data-aos-duration="1000"  data-aos-delay="50">
                <h2 class="smaller white text-left"><?php the_field( 'texto_destaque' ); ?>
.
                </h2>
                <div class="col-md-12 text-center mt-5"> 
                <?php $contrate = get_field( 'contrate' ); ?>
<?php if ( $contrate ) : ?>
	<a  class="btn" href="<?php echo esc_url( $contrate); ?>"> CONTRATE ESTE SERVIÇO</a>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
		 
	<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>