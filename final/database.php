
<?php
$cn=mysql_connect("localhost","root","1093bgprmnmbr") or die("Could not Connect My Sql");
mysql_select_db("qb",$cn)  or die("Could connect to Database");
if ($cn) {
  echo 'Connected';
} else {
  echo 'not conected';
}
?>

