<?php
    include_once 'Common/header.php';
    $pageTitle = "All Tasks";
    include_once 'common/sidebar.php';
?>

<body>

<img class="mainlogo" src="images/coffeecup.gif"/>

<div class="taskarrows">
<h1><?php echo $pageTitle; ?></h1>
<a id="arrow" class="aleft" href="personal.php"></a>
<a id="arrow" class="aright" href="project.php"></a>
</div>

<div class="main">

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("sc_db", $con);


$result = mysql_query("SELECT * FROM task WHERE Status='Overdue'");

while($row = mysql_fetch_array($result))
  {?>
  <div id="task" class="overdue"><?php echo $row['Name']. "</br></br>" . $row['Date_LastCompleted']; ?></div>
<?php
  echo "<br/>";
  }

$result = mysql_query("SELECT * FROM task WHERE Status='Due'");

while($row = mysql_fetch_array($result))
  {?>
  <div id="task" class="due"><?php echo $row['Name']. "</br></br>" . $row['Date_LastCompleted']; ?></div>
<?php
  echo "<br/>";
  }

$result = mysql_query("SELECT * FROM task WHERE Status='Complete'");

while($row = mysql_fetch_array($result))
  {?>
  <div id="task" class="good"><?php echo $row['Name']. "</br></br>" . $row['Date_LastCompleted']; ?></div>
<?php
  echo "<br/>";
  }

mysql_close($con);
?>

</div>
</div>
</body>


</html>