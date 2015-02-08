<html>
<head>
<title>Edit Question</title>
</head>
<body>
### retrieve ID from previous file
<?php
$id = $_POST['id'];
$sr = $_POST['sr'];
$qb = "qb". $id;

# Connect to database
mysql_connect("localhost","root","1093bgprmnmbr");
mysql_select_db("qb");

## retrieve rdetails of the ID row
$query = "SELECT sr, q, a, b, c, d, ans FROM ". $qb ." WHERE sr=". $sr .";"; //select all 
$data = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($data);
?>
<form action=edit2.php method=POST>
<ul>
<li>Question: <textarea cols="50" name="q"><?php echo $row['q']; ?> </textarea></li>
<li>Option 1: <input type="text" name="a" value="<?php echo $row['a']; ?>"></li>
<li>Option 2: <input type="text" name="b" value="<?php echo $row['b']; ?>"></li>
<li>Option 3: <input type="text" name="c" value="<?php echo $row['c']; ?>"></li>
<li>Option 4: <input type="text" name="d" value="<?php echo $row['d']; ?>"></li>
<li>Correct answer: <select name="ans">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
</select></li>
</ul>
<input type="hidden" value="<?php echo $id; ?>" name="id">
<input type="hidden" value="<?php echo $sr; ?>" name="sr">
<button type="submit">Submit</button>
</form>
</body>
</html>


