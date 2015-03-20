<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package baseline
 */

get_header(); ?>

	<div id="primary" class="content-area">
  
  
    <?php 
      
      global $query_string;
      query_posts( $query_string . '&order=ASC&posts_per_page=-1' ); 
    
    ?>
      
		<?php if ( have_posts() ) : ?>
      
      <ul>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				
			<?php endwhile; ?>
      
      </ul>

		<?php else : ?>

		<?php endif; ?>

	</div><!-- #primary -->

<?php get_footer(); ?>