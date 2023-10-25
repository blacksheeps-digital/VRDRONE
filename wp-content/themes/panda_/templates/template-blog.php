<?php

/*
Template name: Blog
*/

$classe = 'page-blog';

get_header();

the_post();

?>


<main class="main" role="main">

	<?php include get_template_directory() . '/template-parts/blog/page-content.php'; ?>

</main>



<?php get_footer(); ?>