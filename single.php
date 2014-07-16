<?php get_header(); ?>

<div class="row">
  <div class="span8">

	<?php if ( have_posts() ):?>
		<?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('content', null); ?>

        <nav class="nav-single">
            <h3 class="assistive-text"><?php _e('Post navigation', 'twentytwelve'); ?></h3>
            <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'twentytwelve') . '</span> %title'); ?></span>
            <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'twentytwelve') . '</span>'); ?></span>
        </nav><!-- .nav-single -->

        <?php comments_template('', true); ?>

    <?php endwhile; // end of the loop. ?>
	<?php endif; ?>

  </div>
  <div class="span4">
	<?php get_sidebar();?>
  </div>
</div>

<?php get_footer(); ?>