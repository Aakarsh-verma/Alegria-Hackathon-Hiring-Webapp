<?php
require('../connect.php');
$sql = "SELECT * FROM applicant WHERE remarks='Approved' and hr_remarks= 'Approved'";
$result = $conn->query($sql);
  if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
      @$ename    = $row['name'];
      @$email    = $row['email'];
      @$contact  = $row['contact'];
      @$dob    = $row['dob'];
      @$vac_id = $row['vac_id'];
      $sql2 = "SELECT * FROM vacancy WHERE id = $vac_id";
      $res2 = $conn->query($sql2);
      if ($res2->num_rows > 0){
        while($row1 = $res2->fetch_assoc()) {
          @$dept_id = $row1['dept_id'];
          @$role = $row1['role_name'];
          $sql3 = "SELECT * FROM department WHERE id = $dept_id";
          $res3 = $conn->query($sql3);
          if ($res3->num_rows > 0){
            while($row2 = $res3->fetch_assoc()) {
              @$depname = $row2['name'];
              $epassword = 123456;
              $welcome = "INSERT INTO employee VALUES ('','$ename','$dob','$email', '$epassword', '$contact', '$role', '50000', '2', '$dept_id')";  //"INSERT INTO employee VALUES ('','$ename','$dob','$email', '$password', '$role', '', '$dept_id', '','','')";
              if ($conn->query($welcome) === TRUE) {
                echo "<script>console.log(New record created successfully)</script>";
                $name = $ename;
                $email = $email;
                $feedback = "$name Has been added to the " .$depname. "Dept.";
                $subjectForUser = "Welcome to HireTech !";
                $feedbackForUser = "Your're in ".$name.". Welcome to your new job!! Use your emailid and here is your password for login $epassword.";
                $headerForUser = 'admin@hiretech.com';
                mail($email, $subjectForUser, $feedbackForUser, $headerForUser);
                $mailForAdmin = "Name : ".$name."\n Email : ".$email."\n Feedback : ".$feedback;
                mail('vermaaakku18it@student.mes.ac.in', 'Feedback from '.$name, $mailForAdmin);
              }
            }
          }
        }
      }
    }
  }
?>
        