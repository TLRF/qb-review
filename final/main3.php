<?php
include("database.php");
$b=$_GET['id'];
$c=$_GET['last'];
$rs=mysql_query("select id from topicfinal where parent='$b'");


if($c=="0")
{
header("Location:main2.php?id=".$b);
}
else 
{session_start();
header("Location:quiz.php?id=qb".$b);}

?>
