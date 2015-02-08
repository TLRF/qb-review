<html>
<head>
</head>
<body>
<?php

include("database.php");

$rs=mysql_query("select * from topicfinal where parent='0'");

echo "<table align=center>";
while($row=mysql_fetch_row($rs))
{
	echo "<tr><td align=center ><a href=main2.php?id=". $row['0']."><font size=4>".$row['1']."</font></a>";
}
echo "</table>";
?>
</body>
</html>
