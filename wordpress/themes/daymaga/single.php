<?php

/**
 *
 */
get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):

    setPostViews(get_the_ID()); // 閲覧数カウント

    the_post();

    $post_type = get_post_type();
    ?>
    <main class="l-main">
      <?php the_content(); ?>
    </main>
<?php
  endwhile;
endif; ?>

<?php get_template_part("template-parts/cta"); ?>

<?php get_footer(); ?>
