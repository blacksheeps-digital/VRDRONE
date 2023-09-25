<?php

/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
	exit;
}
global $searchandfilter;
$sf_current_query = $searchandfilter->get(285)->current_query();
if ($query->have_posts()) {
?>

	<!-- Found <?php echo $query->found_posts; ?> Results<br />
	Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br /> -->

	<div class="pagination">

		<div class="nav-previous"><?php next_posts_link('Older posts', $query->max_num_pages); ?></div>
		<div class="nav-next"><?php previous_posts_link('Newer posts'); ?></div>
		<?php
		/* example code for using the wp_pagenavi plugin */
		if (function_exists('wp_pagenavi')) {
			echo "<br />";
			wp_pagenavi(array('query' => $query));
		}
		?>
	</div>

	<div class="row align-items-center justify-content-start h-100 categoria_card">


		<?php
		while ($query->have_posts()) {
			$query->the_post();

		?>
			<?php include(get_template_directory() . '/template-parts/blog/card-blog.php'); ?>

		<?php
		}
		?>
		Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br />
	</div>
	<div class="pagination">

		<div class="nav-previous"><?php next_posts_link('Older posts', $query->max_num_pages); ?></div>
		<div class="nav-next"><?php previous_posts_link('Newer posts'); ?></div>
		<?php
		/* example code for using the wp_pagenavi plugin */
		if (function_exists('wp_pagenavi')) {
			echo "<br />";
			wp_pagenavi(array('query' => $query));
		}
		?>
	</div>
<?php
} else {  ?>
	<section class="no_results pt-0">
		<div class="container h-100">
			<div class="row align-items-center justify-content-center h-100">
				<div class="col-md-8 text-center ">
					<img src='/wp-content/themes/tema-hep/assets/images/emoji.png' class='img-fluid d-block mx-auto mb-3' alt='' title='' loading='lazy'>
					<h3 class=" mb-5 blue">
						Você buscou por
						<strong>
							"<?php echo $sf_current_query->searchterm; ?>"
						</strong>
					</h3>
					<h3 class="mb-4">
						Desculpe, não encontramos nenhum </br>
						resultado para essa pesquisa 😟
					</h3>
					<p>
						Veja se você escreveu corretamente ou tente outros termos que possa <br> facilitar nosso sistema de busca.
					</p>
				</div>
			</div>
	</section>
<?php
}
?>