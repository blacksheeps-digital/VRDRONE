<!-- Page Content -->


<section class="blog" id="">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-12 mb-4">
                <h2>
                    Nosso Blog
                </h2>
            </div>
        </div>
        <div class="row align-items-center justify-content-center h-100 mb-4 pb-4">
            <div class="col-md-4 text-left">
                <div id="breadcrumbs">
                    <?php
                    // if (!(is_front_page() || is_home() || is_single('') || is_tag() || (basename($template) === 'page-busca.php'))) {
                    //     ah_breadcrumb();
                    // }
                    ?>
                </div>
            </div>
            <div class="col-md-4 text-md-center">
                <?php echo do_shortcode('[searchandfilter id="322"]')  ?>

            </div>
            <div class="col-md-4 text-md-right">
                <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
                <label for="openSidebarMenu" class="sidebarIconToggle">
                <i><img src='<?php echo IMG ?>icon.png' class='img-fluid mr-md-3' alt='' title='' loading='lazy'></i> VER CATEGORIAS
                </label>
                <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
                <label for="openSidebarMenu" class="sidebarIconToggle icon">
                    X
                </label>

                <div id="sidebarMenu">
                    <ul class="sidebarMenuInner">
                    <?php
                                $categorias = get_categories();

                                foreach( $categorias as $c ){
                            ?>
                    
                            <li>
                                <a href="<?php echo SITE; ?>/category/<?php echo $c->slug; ?>">
                                    <?php echo $c->name; ?>
                                </a>
                            </li>
                            <?php
                                }
                            ?> 				
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="filter_cliente ">
    <div class="container h-100">



        <div class="row align-items-center justify-content-center h-100">
            <div class="col-md-12 text-center">
                <?php
                echo do_shortcode('[searchandfilter id="322" show="results"]');
                ?>
            </div>
        </div>
    </div>
</section>