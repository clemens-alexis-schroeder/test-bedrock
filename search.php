<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package localmedia
 */

get_header();
?>



<article class="content__group">
	<header class="cover__section">
		<section class="cover mt-20">
	        <div class="container">
	            <div class="content--sm">
	                <h1 class="headline--cover text-dark">
						Suchresultate für:
						<?= get_search_query(); ?>
					</h1>


					<form class="search search--form pt-4 mb-8" method="get" action="<?php echo home_url(); ?>" role="search">
				        <input class="search-input mb-4" type="search" name="s" placeholder="<?php echo get_search_query(); ?>">
				        <button class="search-submit button--primary" type="submit" role="button">Suchen</button>
				    </form>


	            </div>
	        </div>
	    </section>
	</header>
	<section class="content__section">
		<div class="container">
			<?php if (have_posts()): while ( have_posts() ) : the_post(); ?>
				<div class="border-b border-light py-4">
					<a href="<?php echo get_the_permalink(); ?>" class="block no-style">
						<h2 class="headline--card"><?php the_title(); ?></h2>

						<?php if (get_field( 'cover_lead' )): ?>
							<p><?php the_field( 'cover_lead' ); ?></p>
						<?php endif; ?>

						<?php if (get_field( 'cpt_lead' )): ?>
							<p><?php the_field( 'cpt_lead' ); ?></p>
						<?php endif; ?>
					</a>
				</div>
			<?php endwhile; ?>
			<?php else: ?>
				<p>Keine Ergebnisse.</p>
			<?php endif; ?>
		</div>
	</section>

</article>

<?php
get_footer();
