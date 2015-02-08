<html>
<head>
<title>test</title>

</head>

<body>

<?php
$id = $_GET['id'];
$qb = "qb". $id;

## Connect to database
mysql_connect("localhost","root","1093bgprmnmbr");
mysql_select_db("qb");
## Retrieve all questions of given ID

$query = "SELECT sr, q, a, b, c, d, ans FROM ". $qb .";"; //select all 
$data = mysql_query($query) or die(mysql_error());
echo "<ul>";
while($row = mysql_fetch_array($data))
{
switch ($row['ans']) {
    case 1:
        $answer = $row['a'];
        break;
    case 2:
        $answer = $row['b'];
        break;
    case 3:
       $answer = $row['c'];
        break;
    case 4:
        $answer = $row['d'];
        break;
}
## Start question
echo "<li>";
echo $row['q'];
echo "<ul>";
echo "<li>". $row['a']."</li>";
echo "<li>". $row['b']."</li>";
echo "<li>". $row['c']."</li>";
echo "<li>". $row['d']."</li>";
echo "</ul>";
echo "Correct answer: " . $answer;
echo "<br>";
# Edit Button
echo "<form action=edit.php method=POST><input type=hidden value=". $row['sr'] ." name=sr><input type=hidden value=". $id ." name=id><button type=submit value=Edit>Edit</button></form>";
echo "</li>";

## End question
}
echo "</ul>";
?>
<form action="done.php" method="POST">
<input type="hidden" value="<?php echo $id; ?>" name=id>
<button type=submit value="submit">Submit All</button>
</form>




</body>
</html>



