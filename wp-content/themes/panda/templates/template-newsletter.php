<?php
/*
Template Name: Newsletter
*/
get_header( );
?>

<main>


<?php if ( get_field( 'imagem_' ) ) : ?>
	<img src="<?php the_field( 'imagem_' ); ?>" />
<?php endif ?>
<?php the_field( 'onde_estamos' ); ?>
<?php the_field( '' ); ?>

<?php echo do_shortcode('[contact-form-7 id="69" title="Formulário de Newsletter"]');?>
 
<?php if ( have_rows( 'social_media', 'option' ) ) : ?>
	<?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>
		<?php $icon = get_sub_field( 'icon' ); ?>
		<?php if ( $icon ) : ?>
			<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>" />
		<?php endif; ?>
		<?php the_sub_field( 'name' ); ?>
		<?php the_sub_field( 'link' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // No rows found ?>
<?php endif; ?>
<?php if ( have_rows( 'location', 'option' ) ) : ?>
	<?php while ( have_rows( 'location', 'option' ) ) : the_row(); ?>
		<?php the_sub_field( 'city' ); ?>
		<?php the_sub_field( 'country' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // No rows found ?>
<?php endif; ?>
<?php if ( have_rows( 'phones', 'option' ) ) : ?>
	<?php while ( have_rows( 'phones', 'option' ) ) : the_row(); ?>
		<?php the_sub_field( 'phone_number' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // No rows found ?>
<?php endif; ?>

</main>

<?php 
get_footer();
?>