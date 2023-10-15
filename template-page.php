<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Evolutap
 *
 * Template Name: Template Page
 * Template Post Type: page
 */

get_header();
?>

<div id="primary">
<main id="main">

<?php while ( have_posts() ) : the_post(); ?>

<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <?php
                    $altTitle = get_the_title();
                    
                    the_post_thumbnail('post-thumbnail', 
                        array(
                            'class' => 'img-fluid w-100',
                            'alt'   => $altTitle,
                            'order' => 'DESC'
                    ));
                ?>
            </div>
        </div>
    </div>
</section>
	
<section class="my-5">
	
	<div class="container">
			
		<div class="row justify-content-center">
				
			<div class="col-10">
				<?php the_content(); ?>
			</div>
		</div>
	</div>	
</section>

<section class="l-who-we-are">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-md-3">

                        <div class="row">

                            <!-- loop -->
                            <?php if( have_rows( 'conteudos' ) ) : 
                                    while( have_rows( 'conteudos' ) ) : the_row();
                            ?>
                                        <div class="col-12 mb-2 px-md-0">

                                            <div 
                                            class="l-who-we-are__summary d-flex justify-content-center align-items-center js-summary py-4"
                                            data-summary="<?php echo get_sub_field( 'titulo' ) ?>">
                                                <span class="l-who-we-are__summary__item u-font-weight-bold text-center u-color-folk-white">
                                                    <?php echo get_sub_field( 'titulo' ) ?>
                                                </span>
                                            </div>
                                        </div>
                            <?php   endwhile;
                                endif;
                            ?>
                            <!-- end loop -->
                        </div>
                    </div>

                    <div class="col-md-9 pt-4">
                        
                        <div class="row">

                            <!-- loop -->
                            <?php if( have_rows( 'conteudos' ) ) : 
                                    while( have_rows( 'conteudos' ) ) : the_row();
                            ?>
                                        <div 
                                        class="col-12 l-who-we-are__contents js-contents"
                                        data-content="<?php echo get_sub_field( 'titulo' ) ?>">
                                            <?php echo get_sub_field( 'descricao' ) ?>
                                        </div>
                            <?php   endwhile;
                                endif;
                            ?>
                            <!-- end loop -->

                            <!-- <div class="col-12">
                                <h3>
                                    Nossa história
                                </h3>
                            </div>

                            <div class="col-12">
                                <h3>
                                    Missão, visão e valores
                                </h3>
                            </div>

                            <div class="col-12">
                                <h3>
                                    Inspetores de nossa inspetoria
                                </h3>
                            </div> -->
                        </div>
                    </div>
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
