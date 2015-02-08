
<?php
$id = $_POST['id'];
$qb = "qb". $id;

# Connect to database
# mysql_connect("localhost","root","1093bgprmnmbr");
# mysql_select_db("qb");


## Here, we should have a table called review with xx number of ids, xx being total no of question banks. First column is thus 'id'. ### datestamp, in case we need it.

## $query = "UPDATE review SET completed = '1' WHERE id=". $id .";"; //select all 
## $data = mysql_query($query) or die(mysql_error());

## Redirect to full list

header("Location:main1.php");
?>