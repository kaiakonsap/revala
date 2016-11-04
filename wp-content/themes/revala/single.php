<?php

get_header(); ?>


<div class="content">

  <?php
		// Start the loop.
  while ( have_posts() ) : the_post();

  the_title();
  the_content();

  endwhile;
  ?>


</div>

<?php get_footer(); ?>
