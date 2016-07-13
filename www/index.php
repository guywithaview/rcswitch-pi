<html><head><title>Home Automation</title></head>

<body>
<?php
 $pageName = basename($_SERVER["SCRIPT_NAME"]);
 $pin = 0;
 
 // Modify this array to add/remove buttons
 $units = array(
  0 => "Desk Light",
  1 => "Coffee Machine",
  2 => "Downstairs Light");
 
 if (isset($_GET["on"]))
 {
  $state = 1;
  $id = $_GET["on"];
 }
 else if (isset($_GET["off"]))
 {
  $state = 0;
  $id = $_GET["off"];
 }
 if (isset($state))
 {
  $cmd = "sudo /usr/local/bin/send ".$pin." ".$id." ".$state;
  exec($cmd);
  header('Location: '.$pageName);
 }
?>

<table cellspacing='20'>
<?php  
foreach ($units as $k => $v)
{
  echo "<tr><td><b>".$v."</b></td>";
  echo "<td><a href='".$pageName."?off=".$k."'><img width='100' src='off_.png' alt='off'/></a></td>";
  echo "<td><a href='".$pageName."?on=".$k."'><img width='100' src='on_.png' alt='on'/></a></td></tr>";
}
?>
</table>
</body>
</html>
