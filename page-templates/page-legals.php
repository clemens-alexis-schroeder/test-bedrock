<?php
/**
* Template Name: Page - Legals
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
            <div class="container text--wrap">
                <?php the_field( 'content_page_text_text' ); ?>
            </div>
        </section>

	</article>

<?php
get_footer();
