
<?php
$id = $_POST['id'];
$sr = $_POST['sr'];
$qb = "qb". $id;

$q = $_POST['q'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$ans = $_POST['ans'];

# Connect to database
mysql_connect("localhost","root","1093bgprmnmbr");
mysql_select_db("qb");


## Update values

$query = "UPDATE ". $qb ." SET q = '$q', a = '$a', b = '$b', c = '$c', d = '$d', ans = '$ans' WHERE sr=". $sr .";"; //select all 
$data = mysql_query($query) or die(mysql_error());

## Redirect to full list

header("Location:review.php?id=".$id);
?>