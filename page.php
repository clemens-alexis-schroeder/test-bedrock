<?php
/**
 * The template for displaying all pages
 * @package localmedia
 */
get_header();
?>


	<article class="content__group">
		<header class="cover__section">
			<?php get_template_part( 'template-parts/cover/cover', 'subpage' ); ?>
		</header>

		<?php get_template_part( 'template-parts/control/flex', 'loop' ); ?>

		<!--
		<section class="content__section">
			<div class="container">
				<?php
					while ( have_posts() ) :
					the_post();
					endwhile; // End of the loop.
				?>
			</div>
		</section> -->

	</article>


<?php
get_footer();
