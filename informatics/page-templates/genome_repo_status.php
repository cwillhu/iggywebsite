<?php
/*
Template Name: genome_respository_template
Description: Standard page with additional Sample Status at the bottom
*/

get_header(); ?>
<style>
td, th {    
  padding: 5px 15px 5px 5px;
}
body {
  margin-left: 80px;
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
         <th>Species</th>
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
  echo "<td> ".$record->Species." </td><td> ".$record->Source." </td><td> ".$record->Timestamp." </td><td> ".$record->Status." </td>";
  echo "</tr>";
}
     ?>
     </table>
                        </div>


<div style="padding-top: 30px;"> 
<p style="text-align: left;"> <a href="http://informatics.fas.harvard.edu/?page_id=1136">Request</a> that a genome be added to the repository.</p>
</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>



