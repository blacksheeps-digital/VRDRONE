<?php

$classe = 'contratar-single';

get_header();

the_post();

?>

<main class="main" role="main">
   <section class="onde mt-5">
        <div class="container h-100">
            <div class="row align-items-center justify-content-between h-100">
                <div class="col-md-6">
                    <h1 class="huge black fw-bold"><?php the_title(); ?></h1>
                </div>
                <div class="col-md-6">
                    <p>
                         <?php
                        if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                                the_content();
                            endwhile;
                        else :
                            echo "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
                        endif;
                        ?>
                    </p>
                </div>



                <div class="col-md-12 mt-5">
                    <div class="row align-items-start justify-content-start h-100">

                        <div class="col-md-12">
<?php the_field( 'form' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>