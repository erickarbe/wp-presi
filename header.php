<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<a href="#" class="menu-toggle">M</a>

<div class="offcanvas off">
  
  <?php 
    
    $args = array(
    	'posts_per_page'=>-1,
    	'order' => 'ASC',
    );

    // The Query
    $the_query = new WP_Query( $args );
    
    // The Loop
    if ( $the_query->have_posts() ) {
    	echo '<ul>';
    	while ( $the_query->have_posts() ) {
    		$the_query->the_post();
    		echo '<li><a href="'.get_permalink().'">' . get_the_title() . '</a></li>';
    	}
    	echo '</ul>';
    } else {
    	// no posts found
    }
    /* Restore original Post Data */
    wp_reset_postdata();

  ?>
  
</div><!-- END .offcanvas -->

<div class="page">