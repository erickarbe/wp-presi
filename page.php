<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package baseline
 */

get_header(); ?>

	<div class="container">
	
	  <div class="row">
	    
	    <div class="span-8">

			  <?php while ( have_posts() ) : the_post(); ?>

				  <?php get_template_part( 'content', 'page' ); ?>

        <?php endwhile; // end of the loop. ?>
        
	    </div><!-- END .span-8 -->
	    
	    <div class="span-4">
	    
	      <?php get_sidebar(); ?>
	     
	    </div><!-- END .span-4 -->
	      
		</div><!-- END .row -->
		
	</div><!-- END .container -->

<?php get_footer(); ?>
