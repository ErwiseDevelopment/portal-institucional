<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<section class="pt-5">

    <div class="container">

        <div class="row">
            
            <?php 
                if(isset($_GET['cidade'])) {
                    $category_id = $_GET['cidade'];

                    $category = get_term_by('id', $category_id, 'estado');
                }
            ?>

            <div class="col-lg-9">

                <div>
                    <h1 class="u-font-size-25 font-weight-bold mb-0">
                        <?php echo $category->name; ?>
                    </h1>

                    <h2 class="font-weight-bold">
                        <?php echo $category->description; ?>
                    </h2>
                </div>

                <?php if(!empty(get_field('atividades', $category))): ?>      
                    <h5 class="font-weight-bold mt-4">
                        Atividades:
                    </h5>
                
                    <div class="d-flex flex-wrap">
                        <?php foreach(get_field('atividades', $category) as $item) : ?>
                            <div class="rounded u-font-size-15 text-white u-bg-folk-primary mb-2 mr-2 px-2">
                                <?php echo $item; ?>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-3 d-none d-lg-block">
                <a 
                    class="u-line-height-100 hover:u-opacity-8 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5"
                    href="<?php echo get_home_url() . '/mapa-salesianos' ?>">
                    Voltar ao mapa
                </a>   
            </div>

            <div class="col-lg-9 mt-5">

                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                                    'post_type'      => 'presenca-salesiana',
                                    'posts_per_page' => -1,
                                    'order'          => 'DESC',
                                    'tax_query'     => array(
                                                            array(
                                                                'taxonomy' => 'estado',
                                                                'field'    => 'slug',
                                                                'terms'    => array($category->slug)
                                                            ))
                                );

                        $post_editorials = new WP_Query($args);

                        if($post_editorials->have_posts()):
                            while($post_editorials->have_posts()): $post_editorials->the_post();
                    ?>
                                <div class="col-lg-4 mb-3">

                                    <div class="overflow-hidden shadow-sm rounded bg-light">
                                        
                                        <a 
                                        style="text-decoration:none" 
                                        href="<?php the_permalink(); ?>">
                                            <div class="u-bg-folk-blue py-3">
                                            </div>

                                            <div class="py-4 px-3">
                                                <h4 class="font-weight-bold">                                            
                                                    <?php the_title(); ?>
                                                </h4>

                                                <p class="font-weight-bold mb-4">
                                                    <?php
                                                        $category_state = get_term_by('id', $category->parent, 'estado');

                                                        $category_editorial = get_the_terms(get_the_ID(), 'editorias')[0];

                                                        echo $category->name . ', ' . $category_state->name . ' - ' . $category_editorial->name;
                                                    ?>
                                                </p>

                                                <hr />

                                                <span class="d-block mb-4">
                                                    <?php echo get_field('content'); ?>
                                                </span>

                                                <span class="u-line-height-100 hover:u-opacity-8 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5 ">
                                                    Ver mais
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                    <?php      
                            endwhile;
                        endif;

                        wp_reset_query();
                    ?>
                    <!-- end loop -->
                </div>
            </div>

            <div class="col-12 d-flex d-lg-none justify-content-center mt-5">
                <a 
                class="u-line-height-100 hover:u-opacity-8 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5"
                href="<?php echo get_home_url() . '/mapa-salesianos' ?>">
                    Voltar ao mapa
                </a>   
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
