<!-- FlEX BLOCK HEADER - starts a new section with optional title depending on cms settings -->
<?php $GLOBALS['flexblock_class'] = "block--textbildelement"; ?>
<?php $GLOBALS['flexblock_title_class'] = "title-class"; ?>

<?php get_template_part('template-parts/control/header', 'optional'); ?>


    <div class="container block__container <?php echo $GLOBALS['flexblock_class']; ?>">
        <div class="grid lg:grid-cols-2 gap-16 p-10 bg-light items-center">
            <?php $ausrichtung = get_sub_field( 'ausrichtung' ); ?>
            <?php
            switch ($ausrichtung) {
                case "left":
                    $order_bild = "order-first";
                    $order_text = "order-last";
                    break;
                case "right":
                    $order_bild = "lg:order-last";
                    $order_text = "lg:order-first";
                    break;
            }
             ?>
            <div class="<?php echo $order_bild; ?>">
                <?php $bild = get_sub_field( 'bild' ); ?>
        		<?php if ( $bild ) : ?>
                <?php $imgWidth = $bild['width']; ?>
                    <picture>
                        <source media="(max-width: 540px)" srcset="<?php echo $bild['sizes']['cover-sm'] ?> 1x, <?php echo $bild['sizes']['cover-smX2'] ?> 2x">
                        <source srcset="<?php echo $bild['sizes']['cover-lg'] ?> 1x <?php if ($imgWidth>=2480) { ?>
                        , <?php echo $bild['sizes']['cover-lgX2'] ?> 2x">
                        <?php } else { ?>"><?php } ?>
                        <img class="w-full" src="<?php echo $bild['sizes']['cover-lg']; ?>" alt="<?php echo $bild['title']; ?>">
                    </picture>
        		<?php endif; ?>
            </div>
            <div class="<?php echo $order_text; ?> text--wrap">
                <?php the_sub_field( 'text' ); ?>
            </div>
        </div>
    </div>



<!-- FlEX BLOCK FOOTER - reset globals-->
<?php get_template_part('template-parts/control/footer', 'optional'); ?>
