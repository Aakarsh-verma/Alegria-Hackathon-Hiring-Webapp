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

.dropDown{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
}
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
#remark{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
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
            <i class="fas fa-id-card mx-5" style="color: #1266f1;"></i>
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
              <a type="button" class="btn btn-rounded mx-2" style="background-color: #1266f1; color: white" href="../logout.php">Logout</a>
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
            id="ex3-tab-4"
            data-mdb-toggle="tab"
            href="#ex3-tabs-4"
            role="tab"
            aria-controls="ex3-tabs-4"
            aria-selected="false"
            >Applicants</a
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
            >Applicant Approval Request</a>
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
                @$id       =$row['idcard'];

                
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
              <div class='card text-center alignCard col-6 mx-auto'>
                        <div class='card-header'><?php echo 'Upload or Update your ID/Aadhar card '; ?></div>
                        <input type='file' class='custom-file-input' id='customFile' name='filename'>
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
         <table class="table table-striped table-responsive ">
          <tr class="table-success table-hover" style="">
        
            <th class="font-weight-bold" scope="col">Name</th>
            <th class="font-weight-bold" scope="col">Email</th>
            <th class="font-weight-bold" scope="col">Contact</th>
            <th class="font-weight-bold" scope="col">Role</th>
            <th class="font-weight-bold" scope="col">Remark</th>
            <th class="font-weight-bold" scope="col">Hr Remark</th>
            
            
                
          </tr>
          
        <?php
        require('../connect.php');
        @$emp_id = $_SESSION['emp_id'];

        $sql="SELECT * from vacancy where int_id = $empid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                        @$vac_id=$row['id'];
                        @$role = $row['role_name'];
                        
                        $sql1="SELECT * FROM applicant WHERE vac_id = $vac_id";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0){
                                while($row1 = $result1->fetch_assoc()) {
                                        @$apid  =  $row1['id'];
                                        @$appname    = $row1['name'];
                                        @$email    = $row1['email'];
                                        @$contact  = $row1['contact'];
                                        @$rem     = $row1['remarks'];
                                        @$hr_rem     = $row1['hr_remarks'];
                                        echo "<tr class='table-hover'>
                                                <td>$appname</td>
                                                <td>$email</td>
                                                <td>$contact</td>
                                                <td>$role</td>
                                                <td>$rem</td>
                                                <td>$hr_rem</td>
                                               ";
                                                ?>
                                              
                                                <?php
                                                echo "</tr>";
                                                
                                }
                        }
                }
        }
        $conn->close();
        ?>  
          
         </table>


        </div>
        
        
        
        
        
        <div
          class="tab-pane fade show "
          id="ex3-tabs-2"
          role="tabpanel"
          aria-labelledby="ex3-tab-2"
        >
        
        <form action="employee-dashboard.php" method="POST" >
          <div class="container">

    <label for="name"><b>Name of Applicant:</b></label>
    <select name="name" id="name" class="dropDown" >
    <?php
        require('../connect.php');
        @$emp_id = $_SESSION['emp_id'];
        
        $sql="SELECT * from vacancy where int_id = $empid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                        @$vac_id=$row['id'];
                        @$role = $row['role_name'];
                        
                        $sql1="SELECT * FROM applicant WHERE vac_id = $vac_id AND prelim='1'";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0){
                                while($row1 = $result1->fetch_assoc()) {
                                        @$apid  =  $row1['id'];
                                        $_COOKIE['apid']=$apid;
                                        @$appname    = $row1['name'];
                                        echo "<option  value='$id'>$appname</option>";
                                      
                                      
                                      }
                        }
                }
        }
        $conn->close();
        ?>  
         </select>

      
    <label for="remark"><b>Remark</b></label>
    <select name="remark" id="remark" class="dropDown" >
    <option  value='Approved'>Approve</option>
    <option  value='Denied'>Denied</option>
    </select>
    <input type="hidden" placeholder="Enter Address" name="aaaaddress" id="address" required>


    <button type="submit" class="registerbtn submit" name="submit">Submit</button>
  </div>
  

</form>

<?php
require('../connect.php');
@$remark=$_POST['remark'];
@$apid=$_COOKIE['apid'];
if(isset($_POST['submit'])){
  $sql="UPDATE applicant SET remarks = '$remark' WHERE id =$apid";
  if($conn->query($sql)===TRUE){
    echo "<script>alert('updated')</script>";
    $url = "employee-dashboard.php";
            echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
  }
  else{
    $er = "Error: " . $sql . "<br>" . $conn->error;
    echo "<scripalertalert>alert('$er')</scripalertalert>";
  }


}


?>
        </div>
      </div>
      <!-- Tabs content -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</body>
</html>
