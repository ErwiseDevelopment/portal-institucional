<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
  
    <?php get_template_part( 'footer-widget' ); ?>
    
    <!-- <footer id="colophon" class="site-footer <php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
        <div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <php echo date('Y'); ?> <php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="WordPress Technical Support" alt="Bootstrap WordPress Theme"><php echo esc_html__('Bootstrap WordPress Theme','wp-bootstrap-starter'); ?></a>

            </div>
        </div>
    </footer> #colophon -->

    <!-- loader
    < echo get_template_part( 'template-parts/content', 'loader' ); >
    end loader -->

    <footer class="l-footer u-bg-folk-primary mt-5">
        
        <div class="container">

            <div class="row">

                <div class="col-12 mt-n4">
                    
                    <div class="row justify-content-center">

                        <div class="col-md-5">

                            <div class="row justify-content-md-end">
                    
                                <div class="col-md-9 mb-3 mr-md-5">
                                    <h3 class="c-title d-block u-font-weight-bold text-center text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                                        <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> endereço
                                    </h3>

                                    <div class="row">

                                        <div class="col-12 mt-2">

                                            <span class="l-footer__text block u-font-weight-semibold text-center text-md-right">
                                                <!-- Rua Cel. Lucas de Oliveira, 845 <br>
                                                Bairro Mont´Serrat <br>
                                                CEP: 90440-011 <br>

                                                <br>

                                                Porto Alegre/RS | Brasil -->

                                                <?php echo get_field( 'endereco', 'option' ) ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">

                            <div class="row">
                                
                                <div class="col-md-9 mb-3 ml-md-5">
                                    <h3 class="c-title d-block u-font-weight-bold text-center text-uppercase u-color-folk-white u-bg-folk-secondary py-3 px-4">
                                        <span class="u-font-weight-medium u-color-folk-white mr-2">//</span> contato
                                    </h3>

                                    <div class="row">

                                        <div class="col-12 mt-2">

                                            <p class="l-footer__text u-font-weight-semibold text-center text-md-left u-color-folk-white">
                                                <!-- contatos@dombosco.net <br>
                                                (51) 3331-7939 -->

                                                <?php echo get_field( 'e-mail', 'option' ) ?> <br>
                                                <?php echo get_field( 'telefone', 'option' ) ?>
                                            </p>
                                              <p class="l-footer__text u-font-weight-semibold text-center text-md-left u-color-folk-white"><a href="https://dombosco.net/politica-de-privacidade">
                                                  Politica de Privacidade </a>
                                                  </p>
                                        </div>

                                        <div class="col-12 mt-2">

                                            <ul class="l-top__social-media d-flex justify-content-center justify-content-md-start mb-0 pl-0">

                                                <?php if(get_field( 'instagram', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'instagram', 'option' ); ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Instagram
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                
                                                <?php if(get_field( 'facebook', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__facebook u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'facebook', 'option' ); ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Facebook
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                
                                                <?php if(get_field( 'youtube', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'youtube', 'option' ); ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Youtube
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                                
                                                <?php if(get_field( 'whatsapp', 'option' )) : ?>
                                                    <li class="l-top__social-media__item d-flex justify-content-center align-items-center mx-1">
                                                        <a 
                                                        class="u-icon__brands u-icon__whatsapp u-font-size-0 before::u-font-size-20 text-decoration-none u-color-folk-primary" 
                                                        href="<?php echo get_field( 'whatsapp', 'option' ); ?>" 
                                                        target="_blank" 
                                                        rel="noreferrer noopener">
                                                            Link do Whatsapp
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex flex-column flex-md-row justify-content-between align-items-center my-4">

                    <p class="u-font-weight-semibold text-center text-md-left u-color-folk-white mb-0">
                        @INSPETORIA SALESIANA SÃO PIO X 2020. TODOS OS DIREITOS RESERVADOS.
                    </p>
                    <div class="row">

                                <div class="col-6">
                                    <a 
                                    href="https://www.dominuscomunicacao.com/" 
                                    target="_blank" 
                                    rel="noreferrer noopener">
                                        <img
                                        class="img-fluid my-3 my-md-0"
                                        src="https://erwise.com.br/wp-content/uploads/2022/06/dominus.png"
                                        alt="Dominus">
                                    </a>
                                </div>

                                <div class="col-6">
                                    <a 
                                    href="https://www.erwise.com.br" 
                                    target="_blank" 
                                    rel="noreferrer noopener">
                                        <img
                                        class="img-fluid my-3 my-md-0"
                                        src="https://erwise.com.br/wp-content/uploads/2022/06/erwise.png"
                                        alt="Erwise">
                                    </a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<script async defer data-website-id="1a9e516c-7869-4ff1-a26c-690d84018d55" src="https://api.analytics.rockcontent.com/api/tracker"></script>
<script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/46c5603e-cbc0-4eeb-a2a4-9356076e33dc-loader.js" ></script>
</body>
</html>