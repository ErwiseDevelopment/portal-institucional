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

<section id="primary">
<main id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!-- banner -->
<?php echo get_template_part( 'template-parts/content', 'banner' ) ?>
<!-- end banner -->

<!-- news -->
<section class="l-news u-border-top-2 u-border-color-secondary my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">
                    
                    <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mb-3">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Notícias
                        </h3>

                        <p class="c-text-pattern u-line-height-100 u-font-weight-semibold mb-0 ml-3">
                            Fique por dentro de tudo o que está <br>
                            acontecendo em nossas paróquias
                        </p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6 my-3 my-lg-0">
                        
                        <?php
                            $link_pattern = get_field( 'link_padrao_portal', 'option' );
                            $post_link = $link_pattern . get_field( 'link_do_post', 'option' );
                            $categoria_noticia = get_field( 'categoria_da_noticia', 'option' );
                            $categoria_noticia_destaque = get_field( 'categoria_de_destaque', 'option' );
                            $request_posts = wp_remote_get( $post_link );

                            if(!is_wp_error( $request_posts )) :
                                $body = wp_remote_retrieve_body( $request_posts );
                                $data = json_decode( $body );
                                $status = false;

                                if(!is_wp_error( $data )) :
                                    foreach( $data as $rest_post ) :
                                        foreach($rest_post->child_category as $categories) :    
                                            if($categories == $categoria_noticia_destaque) :
                                                $postHighlightID = $rest_post->id;
                                                $status = true;
                        ?>
                                                <div class="card border-0 u-bg-folk-theme">
                                                    <a  href="<?php echo esc_url( $rest_post->link ); ?>" style="text-decoration: none;">    
                                                        <div class="card-img py-2 px-1">
                                                            <img
                                                            class="img-fluid w-100 h-100"
                                                            src="<?php echo $rest_post->featured_image_src; ?>"
                                                            alt="<?php echo $rest_post->title->rendered; ?>">
                                                        </div>

                                                        <div class="card-body mt-n4 pt-0">

                                                            <div class="d-flex justify-content-center">
                                                                <p class="l-news__highlight__card-relevance d-inline-flex u-font-weight-bold u-color-folk-white u-bg-folk-theme py-2 px-5">
                                                                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Destaque
                                                                </p>
                                                            </div>

                                                            <h6 class="l-news__highlight__card-title u-line-height-100 u-font-weight-extrabold u-color-folk-white mt-2">
                                                                <?php echo $rest_post->title->rendered; ?>
                                                            </h6>

                                                            <p class="l-news__highlight__card-info u-line-height-100 mt-3">
                                                                <span class="u-font-weight-semibold u-color-folk-white">por <?php echo $rest_post->post_author; ?></span> <br>
                                                                <span class="u-font-weight-bold u-color-folk-white">em <?php echo $rest_post->post_date; ?></span>
                                                            </p>

                                                            <p class="l-news__highlight__card-excerpt u-font-weight-semibold u-color-folk-white">
                                                                <?php echo $rest_post->post_excerpt; ?>
                                                            </p>

                                                            <div class="row">

                                                                <div class="col-md-6 mt-3">
                                                                    <a
                                                                    class="l-news__highlight__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-secondary py-3 px-5"
                                                                    href="<?php echo esc_url( $rest_post->link ); ?>">
                                                                        Ler mais
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                        <?php               endif;
                                        endforeach;
                                        
                                        if($status) 
                                            break;
                                    endforeach;
                                endif; 
                            endif; 
                        ?>
                    </div>

                    <div class="col-lg-6">

                        <div class="row">
                            
                            <div class="col-12 my-3 my-lg-0">

                                <?php
                                    if(!is_wp_error( $request_posts )) :
                                        $body = wp_remote_retrieve_body( $request_posts );
                                        $data = json_decode( $body );
                                        $status = false;

                                        if(!is_wp_error( $data )) :
                                            foreach( $data as $rest_post ) :
                                                foreach($rest_post->child_category as $categories) :     
                                                    if($categories == $categoria_noticia) :
                                                        if($rest_post->id != $postHighlightID) :
                                                            $postNewID1 = $rest_post->id;
                                                            $status = true;
                                ?>
                                                            <div class="card border-0">
                                                                <a  href="<?php echo esc_url( $rest_post->link ); ?>" style="text-decoration: none;">
                                                                    <div class="card-img l-news__medium__card-img">
                                                                        <img
                                                                        class="img-fluid w-100 h-100"
                                                                        src="<?php echo $rest_post->featured_image_src; ?>"
                                                                        alt="<?php echo $rest_post->title->rendered; ?>">
                                                                    </div>

                                                                    <div class="card-body mt-2 pt-0 px-0">

                                                                        <h6 class="l-news__medium__card-title u-line-height-100 u-font-weight-extrabold mb-0">
                                                                            <?php echo $rest_post->title->rendered; ?>
                                                                        </h6>

                                                                        <p class="l-news__medium__card-info u-line-height-100">
                                                                            <span class="u-font-weight-semibold">por <?php echo $rest_post->post_author; ?></span> <br>
                                                                            <span class="u-font-weight-bold u-color-folk-theme">em <?php echo $rest_post->post_date; ?></span>
                                                                        </p>

                                                                        <div class="row">

                                                                            <div class="col-md-5">
                                                                                <span
                                                                                class="l-news__medium__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5">
                                                                                    Ler mais
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                <?php                   endif;
                                                    endif;
                                                endforeach;
                                                
                                                if($status) 
                                                    break;
                                            endforeach;
                                        endif; 
                                    endif; 
                                ?>
                            </div>

                            <div class="col-md-6 my-3 my-lg-0">
                                    
                                <?php
                                    if(!is_wp_error( $request_posts )) :
                                        $body3 = wp_remote_retrieve_body( $request_posts );
                                        $data3 = json_decode( $body3 );
                                        $status = false;

                                        if(!is_wp_error( $data3 )) :
                                            foreach( $data3 as $rest_post ) :
                                                foreach($rest_post->child_category as $categories) :     
                                                    if($categories == $categoria_noticia) :
                                                        if($rest_post->id != $postHighlightID && $rest_post->id != $postNewID1) :
                                                            $postNewID2 = $rest_post->id;
                                                            $status = true;
                                ?>
                                                            <div class="card h-100 border-0">
                                                                <a  href="<?php echo esc_url( $rest_post->link ); ?>" style="text-decoration: none;">
                                                                    <div class="card-img">
                                                                        <img
                                                                        class="img-fluid w-100 h-100"
                                                                        src="<?php echo $rest_post->featured_image_src; ?>"
                                                                        alt="<?php echo $rest_post->title->rendered; ?>">
                                                                    </div>

                                                                    <div class="card-body d-flex flex-column justify-content-between mt-2 pt-0 px-0">

                                                                        <div>

                                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                                <?php echo $rest_post->title->rendered; ?>
                                                                            </h6>

                                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                                <span class="u-font-weight-semibold">por <?php echo $rest_post->post_author; ?></span> <br>
                                                                                <span class="u-font-weight-bold u-color-folk-theme">em <?php echo $rest_post->post_date; ?></span>
                                                                            </p>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-md-10">
                                                                                <span
                                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5">
                                                                                    Ler mais
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>    
                                                            </div>
                                <?php                   endif;
                                                    endif;
                                                endforeach;
                                                
                                                if($status) 
                                                    break;
                                            endforeach;
                                        endif; 
                                    endif; 
                                ?>
                            </div>
                            
                            
                            <div class="col-md-6 my-3 my-lg-0">
                                <?php
                                    if(!is_wp_error( $request_posts )) :
                                        $body = wp_remote_retrieve_body( $request_posts );
                                        $data = json_decode( $body );
                                        $status = false;

                                        if(!is_wp_error( $data )) :
                                            foreach( $data as $rest_post ) :
                                                foreach($rest_post->child_category as $categories) :     
                                                    if($categories == $categoria_noticia) :                                                        
                                                        if($rest_post->id != $postHighlightID && 
                                                           $rest_post->id != $postNewID1 && 
                                                           $rest_post->id != $postNewID2) :
                                                            $postNewID3 = $rest_post->id;
                                                            $status = true;
                                ?>

                                                            <div class="card h-100 border-0">
                                                                <a  href="<?php echo esc_url( $rest_post->link ); ?>" style="text-decoration: none;">
                                                                    <div class="card-img">
                                                                        <img
                                                                        class="img-fluid w-100 h-100"
                                                                        src="<?php echo $rest_post->featured_image_src; ?>"
                                                                        alt="<?php echo $rest_post->title->rendered; ?>">
                                                                    </div>

                                                                    <div class="card-body d-flex flex-column justify-content-center mt-2 pt-0 px-0">

                                                                        <div>

                                                                            <h6 class="l-news__small__card-title u-line-height-100 u-font-weight-extrabold mb-1">
                                                                                <?php echo $rest_post->title->rendered; ?>
                                                                            </h6>

                                                                            <p class="l-news__small__card-info u-line-height-100">
                                                                                <span class="u-font-weight-semibold">por <?php echo $rest_post->post_author; ?></span> <br>
                                                                                <span class="u-font-weight-bold u-color-folk-theme">em <?php echo $rest_post->post_date; ?></span>
                                                                            </p>
                                                                        </div>

                                                                        <div class="row">

                                                                            <div class="col-md-10">
                                                                                <span
                                                                                class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5">
                                                                                    Ler mais
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                <?php                   endif;
                                                    endif;
                                                endforeach;
                                                
                                                if($status) 
                                                    break;
                                            endforeach;
                                        endif; 
                                    endif; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="row justify-content-end">

                        <div class="col-lg-2 d-flex justify-content-center my-4 px-0">

                            <a 
                            class="l-news__btn-new w-100 u-line-height-100 u-border-2 u-border-color-secondary d-block u-font-weight-bold text-center text-uppercase text-decoration-none u-color-folk-theme hover:u-color-folk-white u-bg-folk-none hover:u-bg-folk-theme p-3 aos-init" 
                            href="<?php echo $link_pattern . 'noticias/?cat=54';?>"
                            data-aos="zoom-in">
                                + Notícias
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end news -->

<!-- most read -->
<?php echo get_template_part( 'template-parts/content', 'most-read' ) ?>
<!-- end most read -->

<!-- blogs -->
<?php echo get_template_part( 'template-parts/content', 'blogs' ) ?>
<!-- end blogs -->

<!-- about -->
<?php echo get_template_part( 'template-parts/content', 'sec-about' ) ?>
<!-- about -->

<!-- mvv -->
<?php echo get_template_part( 'template-parts/content', 'quite' ) ?>
<!-- end mvv -->

<!-- province -->
<?php echo get_template_part( 'template-parts/content', 'province' ) ?>
<!-- end province -->

<!-- digital -->
<section class="l-digital u-border-top-2 u-border-color-primary my-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-6">
                            
                        <h3 class="l-digital__title-secondary d-inline-flex u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-primary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> Saiba mais
                        </h3>

                        <div class="row">
                            
                            <!-- book loop -->
                            <?php
                                $ebook_post_link = $link_pattern . get_field( 'link_do_e-book', 'option' );                              
                                $request_posts = wp_remote_get( $ebook_post_link );
                                $category_ebook = get_field( 'categoria_do_e-book', 'option' );

                                if(!is_wp_error( $request_posts )) :
                                    $body = wp_remote_retrieve_body( $request_posts );
                                    $data = json_decode( $body );
                                    $counta = 0;
                                    if(!is_wp_error( $data )) :
                                        foreach( $data as $rest_post ) :  
											foreach( $rest_post->category as $categories ) :
                                            	if( $categories ==  $category_ebook ) :   
                                                    $counta++; 
                            ?>
													<div class="col-12 my-5">
                                                    <a href="<?php echo $rest_post->archive_download ;?>"
                                                                            target="_blank"
                                                                            rel="noreferrer noopener" style="text-decoration: none;">
														<div class="row">
                                                            
                                                                <div class="col-md-6">
                                                                    <img
                                                                    class="img-fluid"
                                                                    src="<?php echo $rest_post->featured_image; ?>"
                                                                    alt="">
                                                                </div>

                                                                <div class="col-md-6">

                                                                    <p class="l-digital__book__tag u-font-weight-extrabold u-color-folk-theme mb-2">
                                                                        // E-book
                                                                    </p>

                                                                    <h6 class="l-digital__book__title u-font-weight-extrabold mb-4">
                                                                        <?php echo $rest_post->title->rendered; ?>
                                                                    </h6>

                                                                    <div class="row">

                                                                        <div class="col-lg-9">
                                                                            <span 
                                                                            class="l-digital__download u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme p-3" 
                                                                            >
                                                                                Download
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                           
														</div>
                                                         </a>
													</div>
                            <?php           endif;
                                            if($counta == 3) 
                                                break;
											endforeach;
                                        endforeach;
                                    endif;
                                endif;
                            ?>
                            <!-- end book loop -->
                            <div class="col-lg-9">
                                <a 
                                class="l-digital__download u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme p-3" 
                                href="<?php echo $link_pattern . 'e-book'?>"
                                target="_blank"
                                rel="noreferrer noopener">
                                    Mais conteúdos 
                                </a>
                            </div> 
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <h3 class="l-digital__title-secondary d-inline-flex u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-primary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> acontecendo na inspetoria
                        </h3>

                        <div class="row">
                                
                            <!-- loop -->
                            <?php
                                $editorias = array(
                                    'Portal',
                                    'Institucional',
                                    'Paróquia',
                                    'Ensino',
                                    'Pastoral Juvenil',
                                    'Vocacional',
                                    'Obras Sociais',
                                    'Gráfica'
                                );

                                $portal_post_link = $link_pattern . get_field( 'link_da_inspetoria', 'option' );
                                $request_posts = wp_remote_get( $portal_post_link );

                                if(!is_wp_error( $request_posts )) :
                                    $body = wp_remote_retrieve_body( $request_posts );
                                    $data = json_decode( $body );
                                    $count = 0;
                                    
                                    if(!is_wp_error( $data )) :
                                        foreach( $data as $rest_post ) : 
                                            if($rest_post->id != $postHighlightID &&
                                                $rest_post->id != $postNewID1 &&
                                                $rest_post->id != $postNewID2 &&
                                                $rest_post->id != $postNewID3) : 
                                                $count++;
                            ?>
                                                <div class="col-12 u-border-bottom-2 last-child:u-border-none u-border-color-primary my-3 py-3">
                                                <a href="<?php echo esc_url( $rest_post->link ); ?>" style="text-decoration: none;"> 
                                                    <div class="row">
                                                       
                                                        <div class="col-md-5">
                                                            <img
                                                            class="img-fluid w-100"
                                                            src="<?php echo $rest_post->featured_image_src; ?>"
                                                            alt="<?php echo $rest_post->title->rendered; ?>">
                                                        </div>

                                                        <div class="col-md-5 my-2 my-md-0 pr-md-5">

                                                            <?php
                                                                foreach( $rest_post->child_category as $category ) :
                                                                    foreach( $editorias as $editoria ) :
                                                                        if( $category == $editoria ) :
                                                            ?>
                                                                            <p 
                                                                            class="l-digital__inspector__tag d-flex justify-content-center align-items-center u-font-weight-medium u-color-folk-white u-bg-folk-gree mb-2 py-2"
                                                                            style="background-color:<?php echo $rest_post->category_color; ?>;">
                                                                                <?php echo $category; ?>
                                                                            </p>
                                                            <?php       endif;
                                                                    endforeach;
                                                                endforeach;
                                                            ?>

                                                            <p class="l-digital__inspector__date u-font-weight-bold">
                                                                em <?php echo $rest_post->post_date; ?>
                                                            </p>
                                                        </div>

                                                        <div class="col-10 mt-md-3 pr-5">
                                                            <p class="l-digital__inspector__description u-font-weight-extrabold">
                                                                <?php echo $rest_post->title->rendered; ?>
                                                            </p>

                                                            <span
                                                            class="l-news__small__card-read-more u-line-height-100 hover:u-opacity-8 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5"
                                                            >
                                                                Ler mais 
                                                            </span>
                                                        </div>
                                                   
                                                    </div>
                                                     </a>
                                                </div>
                            <?php           endif;
                                            if($count == 4) 
                                                break;
                                        endforeach;
                                    endif;
                                endif;
                            ?>
                            <!-- end loop -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end digital -->

<!-- partners -->
<?php echo get_template_part( 'template-parts/content', 'partners' ) ?>
<!-- end partners -->

<!-- form contact -->
<?php echo get_template_part( 'template-parts/content', 'form-contact' ) ?>
<!-- end form contact -->

<img
class="img-fluid d-none"
data-src="<php echo get_template_directory_uri()>/../wp-bootstrap-starter-child/assets/images/image.png"
alt="">

<?php endwhile; ?>

</main><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
