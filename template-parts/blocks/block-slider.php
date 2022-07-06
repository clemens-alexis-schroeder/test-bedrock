<!-- FlEX BLOCK HEADER - starts a new section with optional title depending on cms settings -->
<?php $GLOBALS['flexblock_class'] = "block--slider"; ?>
<?php $GLOBALS['flexblock_title_class'] = "title-class"; ?>

<?php get_template_part('template-parts/control/header', 'optional'); ?>


    <div class="container block__container <?php echo $GLOBALS['flexblock_class']; ?>">
        <?php if ( have_rows( 'slider' ) ) : ?>
            <!-- Slider main container -->
            <div class="swiper-container">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php while ( have_rows( 'slider' ) ) : the_row(); ?>
                    <div class="swiper-slide">
                        <?php $bild = get_sub_field( 'bild' ); ?>
                		<?php if ( $bild ) : ?>
                        <?php $imgWidth = $bild['width']; ?>
                            <picture>
                                <source media="(max-width: 540px)" srcset="<?php echo $bild['sizes']['cover-sm'] ?> 1x, <?php echo $bild['sizes']['cover-smX2'] ?> 2x">
                                <source srcset="<?php echo $bild['sizes']['cover-lg'] ?> 1x <?php if ($imgWidth>=2480) { ?>
                                , <?php echo $bild['sizes']['cover-lgX2'] ?> 2x">
                                <?php } else { ?>"><?php } ?>
                                <img class="w-full" src="<?php echo $bild['sizes']['cover-lg'] ?>" alt="<?php echo $bild['title']; ?>">
                            </picture>
                		<?php endif; ?>
                        <p class="pt-5 text-center"><?php the_sub_field( 'beschreibung' ); ?></p>
                    </div>
    			<?php endwhile; ?>
              </div>
              <!-- If we need pagination -->
              <div class="swiper-pagination"></div>

              <!-- If we need navigation buttons -->
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>

              <!-- If we need scrollbar -->
              <div class="swiper-scrollbar"></div>
            </div>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>
    </div>



<!-- FlEX BLOCK FOOTER - reset globals-->
<?php get_template_part('template-parts/control/footer', 'optional'); ?>
