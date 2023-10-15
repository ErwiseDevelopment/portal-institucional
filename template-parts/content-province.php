<section class="l-province u-border-top-2 u-border-color-secondary mb-5 pb-5">
    
    <div class="container">

        <div class="row">

            <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mb-3">
                <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-5">
                    <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> a inspetoria
                </h3>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
    
        <div class="row justify-content-center">
            
            <div class="col-10">
            <?php if(!empty(get_field( 'cargos_governo', 'option' ))): ?> 
                <div class="row">

                    <div class="col-lg-10 offset-md-1 d-flex flex-column flex-md-row align-items-center mt-5 mb-3 pl-5">
                        <h3 class="c-title u-font-weight-bold text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-5">
                            <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> governo inspetorial
                        </h3>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12">

                        <div class="swiper-container js-swiper-province">

                            <div class="swiper-wrapper">

                                <!-- swiper -->
                                <?php if( have_rows( 'cargos_governo', 'option' ) ) : 
                                        while( have_rows( 'cargos_governo', 'option' ) ) : the_row();
                                ?>
                                            <div class="swiper-slide align-items-start">

                                                <div class="card border-0">

                                                    <div class="l-province__card-img card-img rounded-0">
                                                        <img
                                                        class="img-fluid"
                                                        src="<?php echo get_sub_field( 'foto_governo' )?>"
                                                        alt="<?php echo get_sub_field( 'nome_cargo' )?>">
                                                    </div>

                                                    <div class="card-body pt-2 pl-1">

                                                        <p class="l-province__office u-font-weight-bold u-color-folk-dark-blue mb-0">
                                                            <?php echo get_sub_field( 'cargo_governo' )?>
                                                        </p>

                                                        <p class="l-province__name u-color-folk-dark-blue">
                                                            <?php echo get_sub_field( 'nome_cargo' )?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                <?php endwhile;
                                    endif;
                                ?>
                                <!-- end swiper -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-end">

            <div class="col-md-6 pl-0 pl-md-3 pr-0">

                <div class="d-flex flex-wrap u-bg-folk-dark-blue py-5 px-md-3 px-md-4">
                        
                    <div class="col-12 pb-3">

                        <h6 class="l-province__department__title u-font-weight-extrabold text-uppercase text-center u-color-folk-white u-bg-folk-dark-red py-2 py-md-3 px-4 px-md-5">
                            Conselheiros <br>
                            Inspetoriais
                        </h6>

                        <span class="l-province__department__item d-block u-font-weight-medium u-color-folk-white">
                            <?php echo get_field( 'conselheiros_conselheiros', 'option' ) ?>
                        </span>
                    </div>

                    <div class="col-12 pb-3">

                        <h6 class="l-province__department__title u-font-weight-extrabold text-uppercase text-center u-color-folk-white u-bg-folk-dark-red py-2 py-md-3 px-4 px-md-5">
                            Delegados <br>
                            Inspetoriais
                        </h6>

                        <span class="l-province__department__item d-block u-font-weight-medium u-color-folk-white">
                            <?php echo get_field( 'delegados_delegados', 'option' ) ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
        
        <div class="row justify-content-center">

            <div class="col-10 mt-5 pt-0 pt-md-5">

                <div class="row">
                    
                    <?php if( have_rows( 'departamentos', 'option' ) ) : 
                            while( have_rows( 'departamentos', 'option' ) ) : the_row();
                    ?>
                                <div class="col-md-4 my-3 my-md-0">
                                    
                                    <a 
                                    class="hover:u-opacity-8"
                                    href="<?php echo get_sub_field( 'link_departamento' ) ?>">
                                        <img
                                        class="img-fluid w-100 h-100"
                                        src="<?php echo get_sub_field( 'imagem_departamentos' ) ?>"
                                        alt="">
                                    </a>
                                </div>
                    <?php endwhile;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</section>