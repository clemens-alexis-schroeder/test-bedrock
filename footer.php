<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package localmedia
 */
?>
</main><!-- #main end -->

	<footer class="site-footer">
		<div class="container footer--container">
			<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-16 mb-10">
				<div class="">
					<a href="/" class="brand" name="<?php echo get_bloginfo( 'name' ); ?>">
						<?php get_template_part( 'symbols/brand', 'logo' ); ?>
					</a>
					<p><?php the_field( 'global_adressblock', 'option' ); ?></p>
					<a class="block" href="tel:<?php the_field( 'global_phone_number', 'option' ); ?>"><?php the_field( 'global_phone_number', 'option' ); ?></a>
					<a class="block" href="mailto:<?php the_field( 'global_email', 'option' ); ?>"><?php the_field( 'global_email', 'option' ); ?></a>
				</div>

				<?php if ( have_rows( 'footer_block_repeater', 'option' ) ) : ?>
						<?php while ( have_rows( 'footer_block_repeater', 'option' ) ) : the_row(); ?>
							<div class="">
								<p class="mb-2"><?php the_sub_field( 'block_titel' ); ?></p>
								<?php the_sub_field( 'block_links' ); ?>
							</div>
						<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<div class="grid md:grid-cols-3 gap-4 md:gap-16">
				<div class="">
					<p>© <?php echo date('Y'); ?> <?php the_field( 'global_firmenname', 'option' ); ?></p>
				</div>
				<div class="">
					<?php $impressum_page = get_field( 'impressum_page', 'option' ); ?>
					<?php if ( $impressum_page ) : ?>
						<a href="<?php echo esc_url( $impressum_page); ?>">Impressum</a>
					<?php endif; ?>

					<?php $datenschutz_page = get_field( 'datenschutz_page', 'option' ); ?>
					<?php if ( $datenschutz_page ) : ?>
						<a href="<?php echo esc_url( $datenschutz_page); ?>">Datenschutz</a>
					<?php endif; ?>
				</div>
				<div class="lg:text-right">
					<a href="https://localmedia.ch/" target="_blank" rel="noreferrer">Website by localmedia.ch</a>
				</div>
			</div>
		</div>

	</footer><!-- footer end -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
