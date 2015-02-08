<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);
?>

<html>
<head>
<title>test</title>
<script type="text/javascript">

   function Check(a,b){
   if( a == b ){
      alert("CORRECT");}
	else if(a != b) {
alert("WRONG");}
   }
function DoSubmit(a){
  document.myfm.answer.value = a;
  return true;
}

</script>
</head>

<body>
<?php


$b=$_GET['id'];
$rs=mysql_query("select * from $b ",$cn) or die(mysql_error());

		if($submit=='Next Question' && isset($ans))
		{
mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);
				
				mysql_query("insert into mst_useranswer(que_des,ans1,ans2,ans3,ans4,true_ans,your_ans) values ('$row[1]','$row[2]','$row[3]','$row[4]', '$row[5]','$row[6]','$ans')");
				if($ans==$row[6])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
				}
				$_SESSION[qn]=$_SESSION[qn]+1;
		}
		else if($submit=='Get Result' && isset($ans))
		{
				mysql_data_seek($rs,$_SESSION[qn]);
				$row= mysql_fetch_row($rs);	
				mysql_query("insert into mst_useranswer(que_des, ans1,ans2,ans3,ans4,true_ans,your_ans) values ('$row[1]','$row[2]','$row[3]','$row[4]', '$row[5]','$row[6]','$ans')") ;
				if($ans==$row[6])
				{
							$_SESSION[trueans]=$_SESSION[trueans]+1;
							
  							
				}
				echo "<h1 > Result</h1>";
				$_SESSION[qn]=$_SESSION[qn]+1;
				echo "<Table align=center><tr ><td>Total Question<td> $_SESSION[qn]";
				echo "<tr ><td>True Answer<td>".$_SESSION[trueans];
				$w=$_SESSION[qn]-$_SESSION[trueans];
				echo "<tr><td>Wrong Answer<td> ". $w;
				echo "</table>";
				unset($_SESSION[qn]);
				unset($_SESSION[sid]);
				unset($_SESSION[tid]);
				unset($_SESSION[trueans]);
				$sql = mysql_query("DELETE FROM `mst_useranswer` WHERE 1");
				$count = $cn->exec($sql); 
				exit;
		}

$rs=mysql_query("select * from $b ",$cn) or die(mysql_error());

mysql_data_seek($rs,$_SESSION[qn]);
$row= mysql_fetch_row($rs);

#inside check 2nvalue change
echo "<form name=myfm method=post action=quiz.php?id=".$b." onsubmit='Check(".$row[6].", document.myfm.answer.value)'>";
# change over
echo "<table width=100%> <tr> <td width=30>&nbsp;<td> <table border=0>";
$n=$_SESSION[qn]+1;

##all change onclick
echo "<tR><td><span class=style2>Que ".  $n .": $row[1]</style>";
echo "<tr><td ><input type=radio name=ans value=1 onclick='DoSubmit(1)'>$row[2]";
echo "<tr><td > <input type=radio name=ans value=2 onclick='DoSubmit(2)'>$row[3]";
echo "<tr><td ><input type=radio name=ans value=3 onclick='DoSubmit(3)'>$row[4]";
echo "<tr><td ><input type=radio name=ans value=4 onclick='DoSubmit(4)'>$row[5]";
# new
echo "<tr><td ><input type=hidden name=answer>";
# new over
if($_SESSION[qn]<mysql_num_rows($rs)-1)
echo "<tr><td><input type=submit name=submit value='Next Question')></form>";
else
echo "<tr><td><input type=submit name=submit value='Get Result')></form>";
echo "</table></table>";
?>
</body>
</html>



### retrieve all question rows as arrays. Loop through row, with each oclumn name used to display one by one.


### loop for all $row
## print Q: $row[question]
## print Ans1,2,3,4L $row[a,b,c,d]
## print correct ans $row[ans]
## Correct? No -> Open edit page in new window, and reopen the question/ans window, yes -> change font color

### Submit all now:
