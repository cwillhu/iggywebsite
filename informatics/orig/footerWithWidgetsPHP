<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->

<div id="footerwidgets"> 
<div id="footer-left"> 
<ul> 
<?php if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar('Footer Widgets Left') ) : ?> <li> <?php endif; ?> 
</ul> 
</div> 
<div id="footer-middle"> 
<ul> 
<?php if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar('Footer Widgets Center') ) : ?> <li> <?php endif; ?> 
</ul> 
</div> 
<div id="footer-right"> 
<ul> <?php if ( !function_exists('dynamic_sidebar') || 
!dynamic_sidebar('Footer Widgets Right') ) : ?> <li> <?php endif; ?> 
</ul> 
</div> 
</div> 
<br /> 
<br clear="all">
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
