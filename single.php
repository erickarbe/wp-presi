<?php
/**
 * The single post template file.
 *
 *
 * @package hackwp
 */

get_header(); ?>

  <div id="primary" class="content-area">
      
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>

			<?php endwhile; ?>


		<?php else : ?>

		<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>