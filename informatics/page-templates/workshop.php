<?php
/*
Template Name: Workshop 
Description:  Full width page with css for callout boxes
*/

get_header(); ?>
<style>
.site {
  max-width: 1150px;
}
td, th {    
  padding: 4px 15px 4px 4px;
}
body {
  margin-left: 0px;
}
th {
  height: 15px;
  font-weight: bold;
  text-align: left;
}

</style>

<div id="primary" class="site-content">
  <div id="content" role="main">

      <?php while ( have_posts() ) : the_post(); ?>
	 <?php get_template_part( 'content', 'page' ); ?>
             <div class="entry-content"></div>

		<?php comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

