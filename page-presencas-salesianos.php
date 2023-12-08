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

<!-- banner -->
<section>

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <!-- <img 
				height="297" 
				src="http://salesianos.test/wp-content/uploads/2022/02/banner-inspetoria-comissoes.png" 
				class="img-fluid w-100 wp-post-image" 
				alt="Comissões"
				order="DESC" 
				decoding="async" 
				fetchpriority="high" 
				srcset="http://salesianos.test/wp-content/uploads/2022/02/banner-inspetoria-comissoes.png 1920w, http://salesianos.test/wp-content/uploads/2022/02/banner-inspetoria-comissoes-300x46.png 300w, http://salesianos.test/wp-content/uploads/2022/02/banner-inspetoria-comissoes-1024x158.png 1024w, http://salesianos.test/wp-content/uploads/2022/02/banner-inspetoria-comissoes-768x119.png 768w, http://salesianos.test/wp-content/uploads/2022/02/banner-inspetoria-comissoes-1536x238.png 1536w" 
				sizes="(max-width: 1920px) 100vw, 1920px"> -->

				<?php
					the_post_thumbnail('post-thumbnail',
						array(
							'class' => 'img-fluid w-100 wp-post-image',
							'alt' => get_the_title()
						));
				?>
			</div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="pt-5">

	<div class="container">

		<div class="row">
						
			<div class="col-12 d-flex justify-content-end mb-5">
				<div class="col-4">
					<a 
					class="l-news__highlight__card-read-more u-line-height-100 hover:u-opacity-8 d-block u-font-weight-bold text-center text-decoration-none u-color-folk-white py-3 px-5" style="background-color: #0B4DAD;"
					href="<?php echo get_home_url(null, 'mapa-salesianos') ?>">
						Ver as unidades no mapa
					</a>
				</div>
			</div>	
						
			<!-- loop -->
			<?php
				$args = array(
					'posts_per_page' => -1,
					'post_type'      => 'presenca-salesiana',
					'order'          => 'DESC'
				);

				$items = new WP_Query($args);

				if($items->have_posts()) :
					while($items->have_posts()): $items->the_post();
			?>
						<div class="col-4 mb-3">

							<div class="h-100 overflow-hidden shadow-sm rounded bg-light">
								<div class="u-bg-folk-blue py-3">
									<h4 class="font-weight-bold text-center text-white">
										Ascurra
									</h4>
								</div>

								<div class="p-4">
									<img
									class=""
									src=""
									alt="" />

									<h4 class="font-weight-bold mb-4">
										<!-- Colégio Salesianos São Paulo -->
										<?php the_title() ?>
									</h4>

									<hr />

									<!-- <p>
										<strong>
											Endereço:
										</strong>   

										<br />

										<br />

										Rua Mamãe Margarida, 120 - Centro <br />
										Caixa Postal 34 <br />
										89138-000 - Ascurra, SC
									</p> -->

									<span class="d-block">
										<?php echo get_field('enderecos') ?>
									</span>

									<a 
									class="u-line-height-100 hover:u-opacity-8 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-theme py-2 px-5"
									href="<?php the_permalink() ?>">
										Ver mais
									</a>
								</div>
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
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
