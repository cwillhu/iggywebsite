<?php

$source = "msprl";
$startdate = "1969-12-31";

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
   $host = '"https://smallmoleculelims1.rc.fas.harvard.edu/minilims/misc/getChordData.php?';
} else if ($source == "bauer") {
   $host = '"https://bauer-minilims.rc.fas.harvard.edu/minilims/misc/getChordData.php?';
}  else if ($source == "msprl") {
   $host = '"http://msprl.rc.fas.harvard.edu/minilims/misc/getChordData.php?';
} else if ($source == "helium") {
   $host = '"http://helium.rc.fas.harvard.edu/minilims-dev/misc/getChordData.php?';
}

$cmd = "curl " . $host . "startdate=$startdate\"";
#print $cmd;
exec($cmd,$out);

foreach ($out as $o) {
    print $o;
}
