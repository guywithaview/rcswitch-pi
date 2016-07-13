<html><head><title>Home Automation</title></head>

<body>
<?php
 $pageName = basename($_SERVER["SCRIPT_NAME"]);
 $pin = 0;
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
<tr>
<td><b>Light 1</b></td>
<td><a href='index.php?off=0'><img width='100' src='off_.png' alt='off'/></a></td>
<td><a href='index.php?on=0'><img width='100' src='on_.png' alt='on'/></a></td>
</tr>
<tr>
<td><b>Light 2</b></td>
<td><a href='<?php echo $pageName; ?>?off=1'><img width='100' src='off_.png' alt='off'/></a></t$
<td><a href='<?php echo $pageName; ?>?on=1'><img width='100' src='on_.png' alt='on'/></a></td>
</tr>
</table>
</body>
</html>
