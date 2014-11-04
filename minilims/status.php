<?php


$source = "msprl";
$type   = "Submission";
$prop   = "Status";
$startdate = "previousmonth";

if (isset($_REQUEST) && isset($_REQUEST['source'])) {
   $source = $_REQUEST['source'];
}
if (isset($_REQUEST) && isset($_REQUEST['type'])) {
   $type= $_REQUEST['type'];
}
if (isset($_REQUEST) && isset($_REQUEST['property'])) {
   $prop= $_REQUEST['property'];
}
if (isset($_REQUEST) && isset($_REQUEST['startdate'])) {
   $startdate = $_REQUEST['startdate'];
}
if ($source == "smms") {
   $host = '"https://smallmoleculelims1.rc.fas.harvard.edu/minilims/plugins/Core/status_listing.php?';
} else if ($source == "bauer") {
   $host = '"https://bauer-minilims.rc.fas.harvard.edu/minilims/plugins/Core/status_listing.php?';
}  else if ($source == "msprl") {
   $host = '"http://msprl.rc.fas.harvard.edu/minilims/plugins/Core/status_listing.php?';
}

$cmd = "curl " . $host . "type=$type&property=$prop&startdate=$startdate\"";
#print $cmd;
exec($cmd,$out);

foreach ($out as $o) {
    print $o;
}
