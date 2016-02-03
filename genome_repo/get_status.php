<?php

$hostname = "db-internal";
$username = "iggy";
$password = trim(file_get_contents("/var/pw/IR.txt"));

$db = mysql_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
//echo "Connected successfully";

$iggyref = mysql_select_db("iggyref",$db)  // select table
  or die("Could not select database iggyref");

###
## Make hash table of species vs. common names
###

$sql = "select * from common_name";
$result = mysql_query($sql); 
if($result === FALSE) { die(mysql_error()); }

$commonName = array();
while ($row = mysql_fetch_array($result)) {
  $commonName[$row{'species_id'}] = $row{'common_name'};
}
//print_r($commonName);

###
## Get status of collections
###

$sql = "select c.primary_id,c.secondary_id,c.type,c.source,c.status,c.timestamp from collection c, (select primary_id,secondary_id,type,source,max(id) mid from collection group by primary_id,secondary_id,type,source) latest where latest.primary_id=c.primary_id and latest.secondary_id=c.secondary_id and latest.type=c.type and latest.source=c.source and latest.mid=c.id;";
$result = mysql_query($sql); 
if($result === FALSE) { die(mysql_error()); }

$output = array();
while ($row = mysql_fetch_array($result)) {
  $primaryID = $row{'primary_id'};
  $secondaryID = (is_null($row{"secondary_id"})? "" : $row{"secondary_id"});
  $source = $row{'source'};
  $type = $row{'type'};
  $status = $row{'status'};
  $timestamp = (is_null($row{"timestamp"})? "" : $row{"timestamp"});

  //print "primaryID: ".$primaryID."\n";
  //print "secondaryID: ".$secondaryID."\n";
  //print "source: ".$source."\n";
  //print "type: ".$type."\n";

  if (preg_match('/copying_to_final|fail/i', $status)) {
    $status = "Incomplete";
  } else {
    $status = "Complete";
  }

  $comName = "";
  if ($type == 'genome') {
    $comName = $commonName[ucfirst(strtolower($secondaryID))];
    $description = $comName . " (" . ucfirst(strtolower(str_replace("_", " ", $secondaryID))) . ")"; 
  } else {
    $description = $secondaryID;
  }
  $source = strtoupper($source);

  array_push($output, array('primaryID'=>$primaryID, 'description'=>$description, 'source'=>$source, 'status'=>$status, 'timestamp'=>$timestamp));
}
print json_encode($output);

mysql_close($db);

?> 

