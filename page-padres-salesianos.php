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

<section class="u-border-top-2 u-border-color-secondary my-5">

    <div class="container">
        
        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> <?php the_title() ?>
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            <?php the_content() ?>
                        </p>
                    </div>
                </div>

                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type'      => 'padres',
                            'order'          => 'DESC'
                        );

                        $items = new WP_Query( $args );

                        if( $items->have_posts() ) :
                            while( $items->have_posts() ) : $items->the_post();
                    ?>
                                <div class="col-md-4 my-3 my-md-0">
                                    
                                    <div class="card border-0">

                                        <div class="l-province__card-img card-img rounded-0">
                                            <img
                                            class="img-fluid"
                                            src="<?php echo get_field( 'foto_do_padre' ) ?>"
                                            alt="<?php echo get_field( 'nome_completo' ) ?>">
                                        </div>

                                        <div class="card-body pt-2 pl-1">

                                            <p class="l-province__name u-font-weight-bold u-color-folk-dark-blue mb-0">
                                                <!-- P. Ademir Ricardo Cwendrych -->
                                                <?php echo get_field( 'nome_completo' ) ?>
                                            </p>

                                            <p class="l-province__office u-font-weight-regular u-color-folk-dark-blue">
                                                <!-- Vice-inspetor -->
                                                <?php echo get_field( 'data_de_nascimento' ) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                    <?php   endwhile;
                        endif;
                    ?>
                    <!-- end loop -->
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
