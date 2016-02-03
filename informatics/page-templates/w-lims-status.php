<?php
/*
Template Name: Page with LIMS Activity
Description: Standard page with LIMS Activity Chord Charts
*/

get_header(); ?>

<div id="primary" class="site-content">
<div id="content" role="main">

<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>

<div class="entry-content">

<table><tbody><tr>
<tr>   <td><div class="d3chordchart" source="smms"  startdate="2015-03-12" title="Small Molecule Mass Spec" color="red"></div></td></tr>
<tr>   <td><div class="d3chordchart" source="bauer" startdate="2015-03-12" title="Bauer Sequencing Core" color="steelblue"></div></td></tr>
<tr>   <td><div class="d3chordchart" source="msprl" startdate="2015-03-12" title="Mass Spec Proteomics Core" color="purple"></div></td></tr>
<tr>   <td><div class="d3chordchart" source="helium" startdate="2015-03-12" title="Helium" color="purple"></div></td></tr>
  </tr>
  </tbody></table>
</div>
<div id="last_updated"></div>

<script>// <![CDATA[
  $(".d3chordchart").each(function() {    $(this).D3ChordChart(); });
// ]]></script>

<?php comments_template( '', true ); ?>
<?php endwhile; // end of the loop. ?>


</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
