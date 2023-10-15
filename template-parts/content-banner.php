<section class="l-banner mt-lg-0">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">

                <!-- swiper -->
                <div class="swiper-container js-swiper-banner">

                    <div class="swiper-wrapper">

                         <!-- slide a-->
                  <?php if(have_rows( 'banner' )) :
                                while(have_rows( 'banner' ) ) : the_row();
                                    if( get_sub_field( 'imagem' ) ) :
                                       
                        ?>
                                        <div class="swiper-slide">
                                           <a href="<?php echo get_sub_field('link') ?>" 
                                           <?php if(get_sub_field( 'nova_guia') == '1') : ?>
                                                target="_blank"
                                            <?php endif; ?>>
                                                <img
                                                class="img-fluid"
                                                src="<?php echo get_sub_field( 'imagem' ) ?>"
                                                alt="<?php the_title() ?>">
                                           </a>
                                        </div>
                        <?php 
                                    endif;
                                endwhile;
                            endif;
                        ?>
                        <!-- end slide -->
                    </div>
                </div>
                <!-- end swiper -->
            </div>
        </div>
    </div>
</section>