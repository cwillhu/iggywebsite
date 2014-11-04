<?php

$hostname = "db-internal";
$username = "iggyref";
$password = trim(file_get_contents("/var/pw/IR.txt"));

$db = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
//echo "Connected successfully";

$iggyref = mysql_select_db("iggyref",$db)  // select table
  or die("Could not select database iggyref");

$sql = "SELECT DISTINCT species_id from genome";
$result = mysql_query($sql); 
if($result === FALSE) {
  die(mysql_error()); 
}

$output = array();
while ($row = mysql_fetch_array($result)) {
  $species = $row{'species_id'};
  //print "ID: ".$species."\n";

  $sql = "SELECT * FROM genome WHERE species_id='".$species."' ORDER BY timestamp DESC LIMIT 1";
  //print "sql: ".$sql."\n";
  $res = mysql_query($sql);
  if($res === FALSE) {
    die(mysql_error());
  }
  $recs = mysql_fetch_array($res);
  //print_r($recs);

  $status = $recs{"status"};
  if ($status == "download_complete" || $status == "postprocessing_complete") {
    $status = "Update Complete";
  } else {
    $status = str_replace("_", " ", $status);
    $status = ucwords($status);
  }

  $source = strtoupper($recs{"source"});
  $species = str_replace("_", " ", $species);
  
  array_push($output, array('Species'=>$species, 'Source'=>$source, 'Status'=>$status, 'Timestamp'=>$recs{"timestamp"}));
}
print json_encode($output);

mysql_close($db);

?> 

