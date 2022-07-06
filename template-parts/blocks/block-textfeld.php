<!-- FlEX BLOCK HEADER - starts a new section with optional title depending on cms settings -->
<?php $GLOBALS['flexblock_class'] = "block--wysiwyg"; ?>
<?php $GLOBALS['flexblock_title_class'] = "title-class"; ?>

<?php get_template_part('template-parts/control/header', 'optional'); ?>


    <div class="container block__container <?php echo $GLOBALS['flexblock_class']; ?> text--wrap">
        <?php the_sub_field( 'wysiwyg' ); ?>
    </div>



<!-- FlEX BLOCK FOOTER - reset globals-->
<?php get_template_part('template-parts/control/footer', 'optional'); ?>
