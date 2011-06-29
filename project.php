<?php
    include_once 'Common/header.php';
    $pageTitle = "Project";
    include_once 'common/sidebar.php';
?>

</head>

<body>

<img class="mainlogo" src="images/coffeecup.gif"/>
<div class="taskarrows">
<h1><?php echo $pageTitle; ?></h1>
<a id="arrow" class="aleft" href="maintenance.php"></a>
<a id="arrow" class="aright" href="personal.php"></a>
</div>


<div class="main">

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sc_db", $con);


$result = mysql_query("SELECT * FROM task WHERE (Status='Overdue' AND Type='Project')");

?>
<ul class="tasklist">
	<?php while($row = mysql_fetch_array($result)) { ?>
		<li id="task" class="overdue">
			<?php echo $row['Name']. "</br></br>" . $row['Date_LastCompleted']; }?>
	</li>
</ul><?php

$result = mysql_query("SELECT * FROM task WHERE (Status='Due' AND Type='Project')");

?>
<ul class="tasklist">
<?php while($row = mysql_fetch_array($result)) {?>
<li id="task" class="due">
	<?php echo $row['Name']. "</br></br>" . $row['Date_LastCompleted']; }?>
</li>
</ul><?php

$result = mysql_query("SELECT * FROM task WHERE (Status='Complete' AND Type='Project')");

?>

<ul class="tasklist">
<?php while($row = mysql_fetch_array($result)) {?>

<li id="task" class="good"> 
	<?php echo $row['Name']. "</br></br>" . $row['Date_LastCompleted']; }?>
</li>
</ul><?php

mysql_close($con);
?>

</div>
</div>
</body>


</html>