<?php session_start();?>
<!DOCTYPE html>
<html>
<head>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
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
  background-color: #88B2F8
;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #88B2F8
;
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
#remark{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
}
.dropDown{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
}
.registerbtn {
  background-color: #1266f1;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
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
            >Information</a
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
            >Vacancies</a
          >
        </li>
        <li class="nav-item" role="presentation">
          <a
            class="nav-link font-weight-bold" 
            id="ex3-tab-4"
            data-mdb-toggle="tab"
            href="#ex3-tabs-4"
            role="tab"
            aria-controls="ex3-tabs-4"
            aria-selected="false"
            >Applicants</a
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
<!-- Jumbotron -->
        
          
        <div
          class="tab-pane fade col-md-10 mx-auto mt-5"
          id="ex3-tabs-2"
          role="tabpanel"
          aria-labelledby="ex3-tab-2"
        >



        <!-- ajax code -->
        
        <script>
            function showdid(str) {
              if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
              }
              var xmlhttp=new XMLHttpRequest();
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("txtHint").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","getUser.php?q="+str,true);
              xmlhttp.send();
            }
        </script>
        
        <form method="GET" action="hr-dashboard.php">

        <select name="did" id="did" onchange="showdid(this.value)">
        <?php
        require('../connect.php');
        $sql = "SELECT * FROM department";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                @$id    = $row['id'];
                @$dname = $row['name'];
                echo "<option value=$id>$dname</option>";
                }
        }
        $conn->close();
        ?>
        
        </select>
        </form>
         <!-- TABLE  --><!-- Display List of Employees -->
         <div id="txtHint"><b>Person info will be listed here.</b></div>

        


        <!-- ajax code ends -->

        </div>
        <div
          class="tab-pane fade"
          id="ex3-tabs-3"
          role="tabpanel"
          aria-labelledby="ex3-tab-3"
        >
        
        <div class="row d-flex justify-content-center my-5">
        <h3 class="row d-flex justify-content-center my-5">Vacancy Status</h3>
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
                $sql = "SELECT * FROM vacancy";
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
              <h3 class="row d-flex justify-content-center" style="margin-top:30vh;">Add HR Vacancy</h3>
              <div class="container">
                
                <form method="POST" action="hr-dashboard.php">
                  <label for="fname">Role</label>
                  <input type="text" id="role" name="role" placeholder="Role">




                  <label for="subject">Description</label>
                  <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
                  <select name="intid" id="intid" name="employee">
                <?php
                require('../connect.php');

                @$dept_id = $_COOKIE['dept_id'];
                
                $sql = "SELECT * FROM employee ";
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
        <div
          class="tab-pane fade col-md-10 mx-auto mt-5"
          id="ex3-tabs-4"
          role="tabpanel"
          aria-labelledby="ex3-tab-4"
        >
         <!-- TABLE  --><!-- Display List of Applicants -->
         <table class="table table-striped table-responsive  ">
          <tr class="table-success table-hover" style="">
        
            <th class="font-weight-bold" scope="col">Name</th>
            <th class="font-weight-bold" scope="col">Email</th>
            <th class="font-weight-bold" scope="col">Contact</th>
            <th class="font-weight-bold" scope="col">Role</th>
            <th class="font-weight-bold" scope="col">Remark</th>
            <th class="font-weight-bold" scope="col">HR remark</th>
            
                
          </tr>
          <a href="../HR/hire.php">
          <button type="submit" class="registerbtn submit" id='hire' name="hire">HIRE</button> </a>
        <?php
        require('../connect.php');
        @$dept_id = $_GET['did'];
        $sql = "SELECT * FROM applicant";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
                
                while($row = $result->fetch_assoc()) {
                @$ename    = $row['name'];
                @$email    = $row['email'];
                @$contact  = $row['contact'];
                @$vid     = $row['vac_id'];
                @$rem     = $row['remarks'];
                @$hr_rem     = $row['hr_remarks'];
                
                echo "<tr class='table-hover'>
                <td>$ename</td>
                <td>$email</td>
                <td>$contact</td>";

                $sql1 = "SELECT * FROM vacancy where id = $vid";
                
                $result1 = $conn->query($sql1);
                if (!empty($result1) && $result1->num_rows > 0){
                        while($row1 = $result1->fetch_assoc()) {
                                @$rolename=$row1['role_name'];
                        
                                echo "<td>$rolename</td>";
                        }
                }
                echo "<td>$rem</td>
                <td>$hr_rem</td>
                </tr>";
                }
        }
        $conn->close();
        ?>  
          
         </table>
         <h3 class="row d-flex justify-content-center" style="margin-top:17vh;">Approve Resume Selected by Intervieuwer</h3>    
        <form action="hr-dashboard.php" method="POST" >
          <div class="container">

          <label for="aname"><b>Name of Applicant:</b></label>
          <select name="aname" id="aname" class="dropDown">
          <?php
              require('../connect.php');
                  $sql1="SELECT * FROM applicant where remarks='Approved' AND prelim='1'";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0){
                    while($row1 = $result1->fetch_assoc()) {
                      @$apid  =  $row1['id'];
                      @$appname  = $row1['name'];
                      echo "<option  value='$apid'>$appname</option>";
                    
                    
                  }
                }
              $conn->close();
              ?>  
              </select>

            
          <label for="remark"><b>Remark</b></label>
          <select name="hr_remark" id="hr_remark" class="dropDown" >
          <option  value='Approved'>Approve</option>
          <option  value='Denied'>Denied</option>
          </select>
          <input type="hidden" placeholder="Enter Address" name="aaaaddress" id="address" required>


          <button type="submit" class="registerbtn submit" id='posted' name="posted">Submit</button>
        </div>
        

      </form>

      <?php
      require('../connect.php');
      @$remark=$_POST['hr_remark'];
      //echo $remark;
      @$apid=$_POST['aname'];
      echo $apid;
      if(isset($_POST['posted'])){
        $app="UPDATE applicant SET hr_remarks = '$remark' WHERE id =$apid";
        if($conn->query($app)===TRUE){
          echo "<script>alert('updated')</script>";
          $url = "hr-dashboard.php";
                  echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
        }
        else{
          $er = "Error: " . $app . "<br>" . $conn->error;
          echo "<script>alert('$er')</script>";
        }


      }


      ?>


        </div>

      </div>
      <!-- Tabs content -->
<!-- Obsereve Vacancies -->'


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
<?php
?>
