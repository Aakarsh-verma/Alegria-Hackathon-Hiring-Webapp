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
</style>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-lightbulb mx-3" style="color: #00B74A ; font-size: 25px;"></i>
                <p></p>CyberTech Solutions
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
                
              <!-- Navbar dropdown -->
              <!-- <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-mdb-toggle="dropdown"
                  aria-expanded="false"
                >
                  Dropdown -->
                </a>
                <!-- Dropdown menu -->
                <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li> -->
              <li class="nav-item">
                <!-- <button type="button" class="btn btn-success mx-2">LOGOUT</button> -->
                <a class="btn btn-success" type="button" href="../logout.php">Log out</a>
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
        <li class="nav-item" role="presentation">
          <a
            class="nav-link font-weight-bold"
            id="ex3-tab-4"
            data-mdb-toggle="tab"
            href="#ex3-tabs-4"
            role="tab"
            aria-controls="ex3-tabs-4"
            aria-selected="false"
            >Another link</a>
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
                        echo "$ename is $role of $dname .<br>";
                        echo "$description";                        
                        }        
                }
                }
        }else{
                echo "error";
        }$conn->close();
        ?>
        </div>
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
        <h3>Vacancy Status</h3>
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
        <div
        class="tab-pane fade"
        id="ex3-tabs-4"
        role="tabpanel"
        aria-labelledby="ex3-tab-4">
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

< type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></>
</body>
</html>
