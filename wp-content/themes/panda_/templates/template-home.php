<?php
/*
Template Name: Página principal
*/
get_header();
?>


<?php include get_template_directory() . '/template-parts/home/banner.php'; ?>
<?php include get_template_directory() . '/template-parts/home/home-tour.php'; ?>

<section class="taxa">
    <div class="container h-100">
        <div class="row align-items-start justify-content-center h-100">
            <?php if ( have_rows( 'cadastro_de_icones' ) ) : ?>
	<?php while ( have_rows( 'cadastro_de_icones' ) ) : the_row(); ?>
 
		
		 <div class="col-md-4 text-center p-5">
                <div class="d-flex flex-row align-items-center justify-content-center"></div>
                <img src="<?php the_sub_field( 'imagem' ); ?>" class="img-fluid" alt="" title="" loading="lazy">
                <h3 class="blue mt-4"><?php the_sub_field( 'titulo' ); ?></h3>
                <p class="mt-4 fst-italic gray">
                    <?php the_sub_field( 'descricao' ); ?>
                </p>
            </div>
	<?php endwhile; ?>
<?php else : ?>
	<?php // No rows found ?>
<?php endif; ?>
           
            <div class="col-md-12 text-center mt-3">
                <a href="/contato" class="btn">CONTACTAR AGORA</a>
            </div>
        </div>
    </div>
</section>

<?php include get_template_directory() . '/template-parts/home/depoimentos.php'; ?>
<?php include get_template_directory() . '/template-parts/home/parceiros.php'; ?>
<?php include get_template_directory() . '/template-parts/global/blog-cta.php'; ?>


 


<?php
get_footer();
?>