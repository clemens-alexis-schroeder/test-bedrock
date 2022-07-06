<?php
/**
 * Template Name: Page - Home
 * Template Post Type: page
 */
get_header();
?>


    <article class="content__group">
		<header class="cover__section">
			<?php get_template_part( 'template-parts/cover/cover', 'home' ); ?>
		</header>

		<?php get_template_part( 'template-parts/control/flex', 'loop' ); ?>

	</article>

<?php
get_footer();
