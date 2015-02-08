<html>
<head>
</head>
<body>
<?php

include("database.php");
$b=$_GET['id'];
$rs=mysql_query("select * from topicfinal where parent='$b'");


echo "<table align=center>";

while($row=mysql_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=main3.php?id=". $row['0']."&last=". $row['3']."><font size=4>".$row['1']."</font></a>";
}
echo "</table>";
mysql_close($cn);
?>
</body>
</html>
