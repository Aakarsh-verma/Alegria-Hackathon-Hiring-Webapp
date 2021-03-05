<?php session_start();?>

<!DOCTYPE html>
<html>
<head>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department dashboard</title>
    <link rel="stylesheet" href="./css/index.css">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"/>
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"/>
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"/>
</head>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.alignCard{
  display: flex;
  align-self: center;
  margin-top: 10%;

}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light py-3" style="background-color: #ededed;">
        <!-- Container wrapper -->
        <div class="container-fluid" >
            <a class="navbar-brand" href="#">
            <i class="fas fa-id-card mx-5" style="color: #1266f1; size="25px"></i>
                <p></p>HireTech
            </a> 
          <!-- Toggle button -->
          <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarRightAlignExample"
            aria-controls="navbarRightAlignExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <!-- Left links -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
             
              </li>

                </a>

              </li>
              <li class="nav-item"> <a href="../logout.php">
                <a type="button" class="btn btn-rounded mx-2" style="background-color: #1266f1; color: white" href="../logout.php">Logout</a>
                </a>
              </li>
              
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>







      <!-- Tabs navs -->
      <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
        <li class="nav-item" role="presentation">
          <a
            class="nav-link active font-weight-bold"
            id="ex3-tab-1"
            data-mdb-toggle="tab"
            href="#ex3-tabs-1"
            role="tab"
            aria-controls="ex3-tabs-1"
            aria-selected="true"
            >Department</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link font-weight-bold" 
            id="ex3-tab-2"
            data-mdb-toggle="tab"
            href="#ex3-tabs-2"
            role="tab"
            aria-controls="ex3-tabs-2"
            aria-selected="false"
            >Employees</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link font-weight-bold"
            id="ex3-tab-3"
            data-mdb-toggle="tab"
            href="#ex3-tabs-3"
            role="tab"
            aria-controls="ex3-tabs-3"
            aria-selected="false"
            >Add vacancies</a
          >
        </li>
      </ul>
      <!-- Tabs navs -->

      <!-- Tabs content -->
      <div class="tab-content" id="ex2-content">
        <div
          class="tab-pane fade show active"
          id="ex3-tabs-1"
          role="tabpanel"
          aria-labelledby="ex3-tab-1"
        ><!-- Display Dept Details -->
         <?php
        require('../connect.php');
        $_SESSION['emp_id'] = 1;
        @$empid = $_SESSION['emp_id']; 
        $sql = "SELECT * FROM employee where id = $empid";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                @$ename    = $row['name'];
                @$dob      = $row['dob'];
                @$email    = $row['email'];
                @$contact  = $row['contact'];
                @$role     = $row['role'];
                @$deptid   = $row['deptid'];
                
                $_COOKIE['dept_id'] = $deptid;
                

                $dept = "SELECT * FROM department where id = $deptid";
                $res = $conn->query($dept);
                if ($res->num_rows > 0){
                        while($row = $res->fetch_assoc()) {
                        @$dname         =  $row['name'];
                        @$description   =  $row['description'];
                                               
                        }        
                }
                }
        }else{
                echo "error";
        }$conn->close();
        
        ?>

          <div class="bg-image p-5  shadow-1-strong rounded"
                      style="background-image: url('https://cdn.discordapp.com/attachments/816526694151618560/816916446646108180/hr-image-01.jpg'); height:83.3vh; margin-bottom:0">

                      <div class="card text-center alignCard col-6 mx-auto">
                      <div class="card-header"><?php echo "$description"; ?></div>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo "$role"; ?></h5>
                        <p class="card-text">
                          <?php echo "$ename is $role of $dname .<br>";?>
                        </p>
                      </div>
                        <div class="card-footer text-muted">HireTech</div>
                      </div>
                    </div>
        
      </div>
        
        <div
          class="tab-pane fade col-md-10 mx-auto mt-5"
          id="ex3-tabs-2"
          role="tabpanel"
          aria-labelledby="ex3-tab-2"
        >
         <!-- TABLE  --><!-- Display List of Employees -->
         <table class="table table-striped table-responsive ">
          <tr class="table-success table-hover" style="">
        
            <th class="font-weight-bold" scope="col">Name</th>
            <th class="font-weight-bold" scope="col">Email</th>
            <th class="font-weight-bold" scope="col">Contact</th>
            <th class="font-weight-bold" scope="col">Role</th>    
          </tr>
          
        <?php
        require('../connect.php');
        @$dept_id = $_COOKIE['dept_id'];
        $sql = "SELECT * FROM employee where deptid = $dept_id";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                @$ename    = $row['name'];
                @$email    = $row['email'];
                @$contact  = $row['contact'];
                @$role     = $row['role'];
                echo "<tr class='table-hover'>
                <td>$ename</td>
                <td>$email</td>
                <td>$contact</td>
                <td>$role</td>
                </tr>";
                }
        }
        $conn->close();
        ?>  
          
         </table>


        </div>
        <div
          class="tab-pane fade row d-flex justify-content-center my-5"
          id="ex3-tabs-3"
          role="tabpanel"
          aria-labelledby="ex3-tab-3"
          
        >
        <h3 class="d-flex justify-content-center">Vacancy Status</h3>
              <div  class="col-md-6 text-center">
              <table class="table table-striped table-responsive ">
              <tr class="table-success table-hover" style="">
            
                <th class="font-weight-bold" scope="col">Role</th>
                <th class="font-weight-bold" scope="col">Dept.</th>
                <th class="font-weight-bold" scope="col">Intviewer</th>
                <th class="font-weight-bold" scope="col">Date Started</th>    
                <th class="font-weight-bold" scope="col">Date Ended</th>    
              </tr>
              <?php
                require('../connect.php');
                @$dept_id = $_COOKIE['dept_id'];
                $sql = "SELECT * FROM vacancy where dept_id = $dept_id";
                $result = $conn->query($sql);
                if (!empty($result) && $result->num_rows > 0){
                  while($row = $result->fetch_assoc()) {
                  @$rname    = $row['role_name'];
                  @$depid    = $row['dept_id'];
                  @$dtstart  = $row['date_start'];
                  @$dtend    = $row['date_end'];
                  @$intid    = $row['int_id'];
                  echo "<tr class='table-hover'>
                        <td>$rname</td>";
                  $sql1 = "SELECT * FROM department where id = $depid";
                  $result1 = $conn->query($sql1);
                  if (!empty($result1) && $result1->num_rows > 0){
                    while($row1 = $result1->fetch_assoc()) {
                      $dname = $row1['name'];
                      echo "<td>$dname</td>";
                      $sql2 = "SELECT * FROM employee where id = $intid";
                      $result2 = $conn->query($sql2);
                      if (!empty($result2) && $result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc()) {
                          @$intname = $row2['name'];
                          echo "<td>$intname</td>";
                        }
                      }
                    }
                  }
                  
                  echo "<td>$dtstart</td>";
                  if($dtend!=NULL){
                    echo "<td>$dtend</td>
                        </tr>";
                  }else{
                    echo "<td>ONGOING</td>
                        </tr>";
                  }
                  
                  }
                }
                ?>
              </table>
        <div class="row d-flex justify-content-center my-5">
              <div  class="col-md-6 text-center">
              <div class="container">
                <form method="POST" action="department-dashboard.php">
                  <label for="fname">Role</label>
                  <input type="text" id="role" name="role" placeholder="Role">




                  <label for="subject">Description</label>
                  <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
                  <select name="intid" id="intid" name="employee">
                <?php
                require('../connect.php');
                @$dept_id = $_COOKIE['dept_id'];
                $sql = "SELECT * FROM employee where deptid = $dept_id";
                $result = $conn->query($sql);
                if (!empty($result) && $result->num_rows > 0){

                        while($row = $result->fetch_assoc()) {

                        @$id    = $row['id'];
                        @$ename = $row['name'];
                        echo "<option value='$id'>$ename</option>";
                        }
                }
                $conn->close();
                ?>
                
                </select>

                  <label for="comment">Comment</label>
                  <input type="text" id="comment" name="comment" placeholder="Comment">
                  <input type="submit" name="submit" value="Submit" >
                </form>
              </div>
              </div>
              </div>
        </div>
      </div>
      <!-- Tabs content -->
<!-- Obsereve Vacancies -->
<?php
require('../connect.php');
@$rolename = $_POST['role'];
@$roledesc = $_POST['description'];
@$comments = $_POST['comment'];
@$dept_id = $_COOKIE['dept_id']; 
@$intid = $_POST['intid'];
date_default_timezone_set('Asia/Kolkata');
$dtime= date("Y-m-d");
if(isseT($_POST['submit'])){
        $write = "INSERT INTO vacancy VALUES ('', '$rolename', '$roledesc', '$comments', '$dept_id', '$dtime', NULL, $intid)";
        if ($conn->query($write) === TRUE) {
                echo "New record created successfully";
        } else {
                echo "Error: " . $write . "<br>" . $conn->error;
        }
}
$conn->close();
?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</body>
</html>
