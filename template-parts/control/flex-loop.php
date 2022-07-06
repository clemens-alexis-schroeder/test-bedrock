<?php
$GLOBALS['firstflex'] = true;

if (have_posts()): while (have_posts()) : the_post();
if( have_rows('flexible_content') ): // are there any rows within within our flexible content?
  while ( have_rows('flexible_content') ) : the_row(); // loop through all the rows of flexible content

  $layout_name = get_row_layout();
  get_template_part('template-parts/blocks/block', $layout_name);

endwhile; // close the loop of flexible content
endif; // close flexible content conditional
?>
<?php endwhile; ?>
<?php endif; ?>


<?php if(!$GLOBALS['firstflex']): ?>
</section>
<?php endif; ?>
