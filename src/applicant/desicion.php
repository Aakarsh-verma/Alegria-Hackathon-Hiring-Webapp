<?php 
require('../connect.php');
$command = escapeshellcmd('DecisionTree.py');
$output = shell_exec($command);
$res = $output;
echo $output;
$prelim = (int)$res;
@$apid = $_SESSION['apid'];
$ins = "UPDATE applicant SET prelim=$prelim WHERE id = $apid";
if ($conn->query($ins)) {
  echo "<script>alert('New record created successfully')</script>";
}
$conn->close();
?>