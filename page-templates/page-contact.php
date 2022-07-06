<?php
/**
* Template Name: Page - Kontakt
* Template Post Type: page
*
*/
get_header();
?>

	<article class="content__group">
		<header class="cover__section">
			<?php get_template_part( 'template-parts/cover/cover', 'subpage' ); ?>
		</header>

		<section class="content__section">
			<div class="container">
				<?php gravity_form(1, false, false, false, '', true, 12); ?>
			</div>
		</section>

		<?php get_template_part( 'template-parts/control/flex', 'loop' ); ?>

	</article>

<?php
get_footer();
