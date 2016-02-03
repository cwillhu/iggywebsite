<?php
/*
Template Name: Page with Sample Status
Description: Standard page with additional Sample Status at the bottom
*/

get_header(); ?>

<div id="primary" class="site-content">
<div id="content" role="main">

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>

<div class="entry-content">

<h3>Sample status for the previous month</h3>
<table>
<tbody>
<tr>
<td><div class="statusbox" type="Submission" property="Status" source="smms" title="Small Molecule" color="red"></div></td>	 	 
 <td><div class="statusbox" type="Submission" property="Status" source="bauer" title="Bauer Sequencing" color="steelblue"></div></td>	 	 
 <td><div class="statusbox" type="Submission" property="Status" source="msprl" title="Mass Spec Proteomics" color="purple"></div></td>
</tr>
</tbody>
</table>
</div>
<div id="last_updated"></div>

<script>// <![CDATA[
  $(".statusbox").each(function()    {    $(this).MinilimsStatusBox(); });
  $(".d3chordchart").each(function() {    $(this).D3ChordChart(); });
// ]]></script>

<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>


</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
