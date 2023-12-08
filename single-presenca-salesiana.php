<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

            <div class="col-9">

                <?php 
                    the_post_thumbnail('post-thumbnail', 
                        array(
                            'class' => 'w-100',
                            'style' => 'height:220px;object-fit:cover',
                            'alt'   => get_the_title()
                        ))
                ?>

                <h1 class="font-weight-bold mt-3">
                    <?php the_title() ?>
                </h1>
                            
                <div>
                    <?php
                        $categories = get_the_terms($post->ID, 'estado');
                        $states_categories = [];
                        $categories_ids = [];

                        foreach($categories as $category) {
                            array_push($categories_ids, $category->term_id);
                        }

                        foreach($categories as $category) {
                            if($category->parent != 0) {
                                array_push($states_categories, $category->name);
                            }
                        }

                        foreach($categories as $category) {
                            if($category->parent == 0) {
                                array_push($states_categories, $category->name);
                            }
                        }
                    ?>

                    <p class="u-font-size-14 font-weight-bold">
                        <?php echo $states_categories[0] . ', ' . $states_categories[1]; ?>
                    </p>
                </div>

                <span class="d-block">
                    <?php echo get_field('comunidade_salesiana') ?>
                </span>

                <h5 class="font-weight-bold">
                    Atividades:
                </h5>

                <div class="d-flex flex-wrap">
                    <?php foreach(get_field('atividades') as $item) : ?>
                        <div class="rounded u-font-size-12 text-white u-bg-folk-primary mb-2 mr-2 px-2">
                            <?php echo $item; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <hr />

                <h5 class="font-weight-bold">
                    Endereço:
                </h5>

                <span class="d-block">
                    <?php echo get_field('enderecos') ?>
                </span>

                <hr />

                <h5 class="font-weight-bold">
                    Observações:
                </h5>

                <span class="d-block">
                    <?php echo get_field('outros') ?>
                </span>
            </div>

            <div class="col-3">

                <h4 class="font-weight-bold">
                    Posts relacionados:
                </h4>

                <div class="row mt-4">
                    
                    <!-- posts other -->
                    <?php 
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type'      => 'presenca-salesiana',
                            'order'          => 'DESC',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'estado',
                                    'field' => 'id',
                                    'terms' => $categories_ids
                                 )),
                            'post__not_in'   => array($post->ID),
                        );

                        $other_posts = new WP_Query($args);

                        if($other_posts->have_posts()):
                            while($other_posts->have_posts()): $other_posts->the_post();
                    ?>
                                <div class="col-12">

                                    <a href="<?php the_permalink() ?>">
                                        <div style="width:100%;height:80px">
                                            <?php 
                                                the_post_thumbnail('post-thumbnail', 
                                                    array(
                                                        'class' => 'w-100 h-100',
                                                        'style' => 'object-fit:cover',
                                                        'alt'   => get_the_title()
                                                    ))
                                            ?>
                                        </div>

                                        <h6 class="font-weight-bold mt-2">
                                            <?php the_title() ?>
                                        </h6>

                                        <div>
                                            <?php
                                                $categories = get_the_terms($other_posts->ID, 'estado');
                                                $states_categories = [];
                        
                                                foreach($categories as $category) {
                                                    if($category->parent != 0) {
                                                        array_push($states_categories, $category->name);
                                                    }
                                                }
                        
                                                foreach($categories as $category) {
                                                    if($category->parent == 0) {
                                                        array_push($states_categories, $category->name);
                                                    }
                                                }
                                            ?>

                                            <p class="u-font-size-12 font-weight-bold">
                                                <?php echo $states_categories[0] . ', ' . $states_categories[1]; ?>
                                            </p>
                                        </div>

                                        <hr />
                                    </a>
                                </div>
                    <?php      
                            endwhile;
                        endif;
                        
                        wp_reset_query();
                    ?>
                    <!-- end posts other -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
