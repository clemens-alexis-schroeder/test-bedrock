<!-- FlEX BLOCK HEADER - starts a new section with optional title depending on cms settings -->
<?php $GLOBALS['flexblock_class'] = "block--gallery"; ?>
<?php $GLOBALS['flexblock_title_class'] = "title-class"; ?>

<?php get_template_part('template-parts/control/header', 'optional'); ?>


    <div class="container block__container <?php echo $GLOBALS['flexblock_class']; ?>">
        <?php $gallery_images = get_sub_field( 'gallery' ); ?>
			<?php if ( $gallery_images ) :  ?>
                <div class="grid grid-cols-3 gap-16">
                    <?php foreach ( $gallery_images as $bild ): ?>
                        <?php $imgWidth = $bild['width']; ?>
                        <a class="glightbox" href="<?php echo $bild['url']; ?>" data-gallery="gallery1">
                            <picture>
                                <source media="(max-width: 540px)" srcset="<?php echo $bild['sizes']['gallery-mobile'] ?> 1x, <?php echo $bild['sizes']['gallery-mobileX2'] ?> 2x">
                                <source srcset="<?php echo $bild['sizes']['gallery'] ?> 1x <?php if ($imgWidth>=2480) { ?>
                                , <?php echo $bild['sizes']['galleryX2'] ?> 2x">
                                <?php } else { ?>"><?php } ?>
                                <img class="w-full" src="<?php echo $bild['sizes']['gallery']; ?>" alt="<?php echo $bild['title']; ?>">
                            </picture>
                        </a>
                    <?php endforeach; ?>
                </div>
			<?php endif; ?>
    </div>



<!-- FlEX BLOCK FOOTER - reset globals-->
<?php get_template_part('template-parts/control/footer', 'optional'); ?>
