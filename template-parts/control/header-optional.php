<?php if ( $GLOBALS['firstflex'] || $GLOBALS['newsection'] || (get_sub_field( 'create_section' ) == 1) ) {
    $GLOBALS['newsection'] = false;

        if($GLOBALS['firstflex']) {
            $GLOBALS['firstflex'] = false;
        } else { ?>
            </section>
        <?php } ?>

    <section class="content__section">
<?php } ?>


<?php if (get_sub_field( 'title' ) && get_sub_field('create_section')): ?>
    <div class="container">
        <div class="<?php echo $GLOBALS['flexblock_class'] ?> <?php echo $GLOBALS['flexblock_title_class'] ?>">
            <h2><?php the_sub_field( 'title' ); ?></h2>
        </div>
    </div>
<?php endif; ?>
