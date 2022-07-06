<!-- FlEX BLOCK HEADER - starts a new section with optional title depending on cms settings -->
<?php $GLOBALS['flexblock_class'] = "block--video"; ?>
<?php $GLOBALS['flexblock_title_class'] = "title-class"; ?>

<?php get_template_part('template-parts/control/header', 'optional'); ?>

    <div class="container block__container <?php echo $GLOBALS['flexblock_class']; ?>">
        <?php $video = get_sub_field( 'video_link', false, false ); ?>
        <?php $bild = get_sub_field( 'vorschaubild' ); ?>
        <?php $imgWidth = $bild['width']; ?>
            <a class="video--overlay glightbox" href="<?php echo $video; ?>">
                <picture>
                    <source media="(max-width: 540px)" srcset="<?php echo $bild['sizes']['cover-sm'] ?> 1x, <?php echo $bild['sizes']['cover-smX2'] ?> 2x">
                    <source srcset="<?php echo $bild['sizes']['cover-lg'] ?> 1x <?php if ($imgWidth>=2480) { ?>
                    , <?php echo $bild['sizes']['cover-lgX2'] ?> 2x">
                    <?php } else { ?>"><?php } ?>
                    <img class="w-full" src="<?php echo $bild['sizes']['cover-lg']; ?>" alt="<?php echo $bild['title']; ?>">
                </picture>
            </a>
    </div>



<!-- FlEX BLOCK FOOTER - reset globals-->
<?php get_template_part('template-parts/control/footer', 'optional'); ?>
