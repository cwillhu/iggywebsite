<?php
/*
Template Name: genome_respository_template
Description: Standard page with additional Sample Status at the bottom
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


                        <div class="gr_status" id="gr_status">
     <table>
       <tr>
         <th>Repository</th>
         <th>Description</th>
         <th>Source</th>
         <th>Timestamp</th>
         <th>Status</th>
       </tr>

   <?php exec("php /var/www/html/scripts/genome_repo/get_status.php",$out);
$jsonString = $out[0];
$data = json_decode($jsonString);
//print_r($data);
foreach($data as $record) {
  echo "<tr>";
  echo "<td> ".$record->primaryID." </td><td> ".$record->description." </td><td> ".$record->source." </td><td> ".$record->timestamp." </td><td> ".$record->status." </td>";
  echo "</tr>";
}
     ?>
     </table>
                        </div>


<div style="padding-top: 30px;"> 
<p style="text-align: left;"> <a href="http://informatics.fas.harvard.edu/?page_id=1136">Request</a> that a genome or database be added to the repository.</p>
</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

