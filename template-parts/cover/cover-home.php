<section class="cover">
    <div class="container w-16">
        <h1><?php the_field( 'cover_headline' ); ?></h1>
        <p class="lead"><?php the_field( 'cover_lead' ); ?></p>
        <?php $bild = get_field( 'cover_img' ); ?>
		<?php if ( $bild ) : ?>
        <?php $imgWidth = $bild['width']; ?>
            <picture>
                <source media="(max-width: 540px)" srcset="<?php echo $bild['sizes']['cover-sm'] ?> 1x, <?php echo $bild['sizes']['cover-smX2'] ?> 2x">
                <source srcset="<?php echo $bild['sizes']['cover-lg'] ?> 1x <?php if ($imgWidth>=2480) { ?>
                , <?php echo $bild['sizes']['cover-lgX2'] ?> 2x">
                <?php } else { ?>"><?php } ?>
                <img class="w-full mt-10" src="<?php echo $bild['sizes']['cover-lg'] ?>" alt="<?php echo $bild['title']; ?>">
            </picture>
		<?php endif; ?>
    </div>
</section>
