<?php
/**
 * The single post template file.
 *
 *
 * @package hackwp
 */

get_header(); 

if ( has_post_thumbnail() ) {
		
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
	$url = $thumb['0'];
							
	echo '<style>body { background: url(' . $url . ') no-repeat top center; background-size: cover;} .page { background: transparent; max-width: 100%; width:100%; padding-top: 3em; } </style>';

?>


    
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
        
        <div class="page">
  
          <div class="full-page">
    
            <h1 class="site-title"><?php the_title(); ?></h1>
        
              <div class="callout-content">
          
              <?php the_content(); ?>
        
              </div><!-- END .callout-content -->
          
          </div><!-- END .full-page -->
          
        </div><!-- END .page -->
        
      <?php endwhile; ?>

		<?php endif; ?>

  



<?php } else { ?>




      
		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>
        
        <?php get_template_part('content', 'single'); ?>
        
			<?php endwhile; ?>

		<?php endif; ?>

	



<?php } ?>



<?php get_footer(); ?>