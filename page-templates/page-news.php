<?php
/**
* Template Name: Page - News
* Template Post Type: page
*
*/

get_header();
?>

	<article class="content__group">
		<header class="cover__section">
			<?php get_template_part( 'template-parts/cover/cover', 'subpage' ); ?>
		</header>

		<?php $args = array (
	    	'post_type'              => array( 'news' ),
	    	'post_status'            => array( 'publish' ),
	    	'nopaging'               => true,
	    	'order'                  => 'ASC',
	    	'orderby'                => 'menu_order',
	    );
	    $cpt = new WP_Query( $args ); ?>

	    <?php $args = array(
	        'taxonomy' => 'kategorien',
	        'orderby' => 'name',
	        'order'   => 'ASC'
	    );
	    $categories = get_categories($args); ?>

		<section class="content__section">

            <div class="container pb-10">
				<ul class="post-filter flex items-center gap-5">
                    <li class="mixitup-control text-xsmall text-uppercase">Kategorien:</li>
                    <li class="mixitup-control post-button" data-filter="all">Alle</li>
                    <?php foreach ( $categories as $category ) { ?>
                    	<li class="mixitup-control post-button" data-filter=".category-<?= $category->term_id; ?>"><?= $category->name; ?></li>
                    <?php } ?>
                </ul>
            </div>

			<div class="container">
				<?php if ( $cpt->have_posts() ) { ?>
		            <div class="mixit--filter grid md:grid-cols-2 lg:grid-cols-3 gap-16">
		                <?php while ( $cpt->have_posts() ) { $cpt->the_post();
		                    $post_id = get_the_ID();
		                    $terms = wp_get_post_terms( $post_id, 'kategorien' );
		                    $aterms = array();
							foreach($terms as $term) {
								$aterms[] = $term->term_taxonomy_id;
							}
							$cs = "category-".implode(" category-", $aterms); ?>

		                    <div class="mix <?= $cs ?>">
		                          <a class="card" href="<?php the_permalink(); ?>">
			                            <?php $bild = get_field( 'cover_img' ); ?>
			                            <?php if ( $bild ) { ?>
											<div class="card--image--wrapper">
												<picture>
							                        <source media="(max-width: 540px)" srcset="<?php echo $bild['sizes']['cover-sm'] ?> 1x, <?php echo $bild['sizes']['cover-smX2'] ?> 2x">
							                        <source srcset="<?php echo $bild['sizes']['cover-lg'] ?> 1x <?php if ($imgWidth>=2480) { ?>
							                        , <?php echo $bild['sizes']['cover-lgX2'] ?> 2x">
							                        <?php } else { ?>"><?php } ?>
							                        <img class="w-full" src="<?php echo $bild['sizes']['cover-lg']; ?>" alt="<?php echo $bild['title']; ?>">
							                    </picture>
											</div>
			                            <?php } ?>

			                          <h2 class="card-title"><?php the_field( 'cpt_title' ); ?></h2>
			                          <p class=""> <?php the_field( 'cpt_lead' ); ?></p>
			                      </a>
		                    </div>
	                   <?php } //endif ?>
		            </div>
				<?php } //endwhile ?>
		        <?php wp_reset_postdata(); ?>
			</div>
        </section>

		<?php get_template_part( 'template-parts/control/flex', 'loop' ); ?>

	</article>

<?php
get_footer();
