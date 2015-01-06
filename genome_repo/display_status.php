<html>
<head>

  <link rel="stylesheet" href="/scripts/includes/jquery-ui-1.8.15.custom.css" type="text/css" />

  <script type="text/javascript" src="/scripts/includes/jquery-1.6.2.js"></script>
  <script type="text/javascript" src="/scripts/includes/jquery-ui-1.8.15.custom.js"></script>
  <script type="text/javascript" src="/scripts/includes/d3.js"></script>

<style>
td, th {
 padding: 5px 5px 5px 10px;
}
</style>
</head>
   <body>
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
   </body>
<script>

</script>
</html>

