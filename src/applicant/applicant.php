<?php session_start();?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
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

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

.dropDown{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
</style>
<link rel="stylesheet" href="css/applicant.css">
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
                <button type="button" class="btn btn-rounded mx-2" style="background-color: #1266f1; color: white">Home</button>
              </li>
              
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>


      <form action="" method="POST" >
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" id="email" required>

    <label for="contact"><b>Phone No.</b></label>
    <input type="number" placeholder="Contact Number" name="contact" id="contact" maxlength="10" required>
    
    <label for="dob"><b>Date of birth</b></label>
    <input placeholder="dd-mm-yyyy"  type="date"  required name="dob">

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" id="address" required>




    <label for="qualification"><b>Qualification</b></label>
    <select name="qualification" id="qualification" class="dropDown">



            <option value="HSC Passed">HSC Passed</option>
            <option value="B.E">B.E</option>
            <option value="M.E">M.E</option>
            <option value="M.S">M.S</option>
            <option value="Others">Others</option>


      </select>

    <label for="vacancy"><b>Vacancy</b></label>
    <select name="vacancy" id="vacancy" class="dropDown" >
        <?php
        require('../connect.php');
        $sql = "SELECT * FROM vacancy";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                @$id    = $row['id'];
                @$vname = $row['role_name'];
                echo "<option value=$id>$vname</option>";
                }

                

        }


        $conn->close();
        ?>
    <input type="hidden" placeholder="Enter Address" name="aaaaddress" id="address" required>


    <button type="submit" class="registerbtn submit" name="submit">Submit</button>
  </div>
  
</form>




<footer class="bg-dark text-center text-lg-start ">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row alignFooter">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase text-light">Footer Content</h5>
      
              <p class="text-light">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
                voluptatem veniam, est atque cumque eum delectus sint!
              </p>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase text-light">Links</h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-light">Careers</a>
                </li>
                
              </ul>
            </div>
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->
        <div class="container p-4 pb-0 text-center">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #3b5998;"
              href="https://www.facebook.com/pillaisalegria"
              role="button" target="_blank"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #55acee;"
              href="https://twitter.com/PillaisAlegria?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
              role="button" target="_blank" 
              ><i class="fab fa-twitter"></i
            ></a>
      
            <!-- Google -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #dd4b39;"
              href="https://www.google.com/search?rlz=1C1SQJL_enIN939IN939&sxsrf=ALeKk02FFtVGhm4I56WBc75Wo0ERSPjYGg%3A1614751870764&ei=fig_YLaGLsKZ4-EPkOuYkAw&q=alegria+the+festival+of+joy&oq=Alegria+the+fes&gs_lcp=Cgdnd3Mtd2l6EAEYADIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeOgcIIxCwAxAnOg0ILhDHARCvARCwAxAnOgcIABBHELADOgQIIxAnOgoILhDHARCvARAnOgQIABBDOgIIADoICC4QxwEQrwE6BwgAELEDEAo6DQgAELEDEIMBEMkDEAo6BAgAEAo6BQguEJMCOgkIABDJAxAWEB46CAgAEBYQChAeUMYzWOVMYIZXaAFwAngAgAGTAYgBmAmSAQMwLjmYAQCgAQGqAQdnd3Mtd2l6yAEKwAEB&sclient=gws-wiz"
              role="button" target="_blank"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #ac2bac;"
              href="https://www.instagram.com/pillaisalegria/?hl=en"
              role="button" target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>
            <!-- Github -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #333333;"
              href="#!"
              role="button" target="_blank"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3 text-light" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright:
          <a class="text-light" href="https://mdbootstrap.com/"><i class="fas fa-lightbulb"></i> CyberTech Solutions </a>
        </div>
        <!-- Copyright -->
      </footer>

<script>

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>


  
        <div class="footer-container">



        <?php
require('../connect.php');
@$name = $_POST['name'];
@$address = $_POST['address'];
@$dob = $_POST['dob'];
@$email = $_POST['email'];
@$contact = $_POST['contact'];
@$vacid=$_POST['vacancy'];

if(isset($_POST['submit'])){
 
    
          $sql = "INSERT INTO applicant VALUES ('', '$name', '$dob', '$email', '$contact', '$address', '$vacid', NULL,'Pending','Pending')";
          
          if ($conn->query($sql)) {
            echo "<script>alert('New record created successfully')</script>";
            $_SESSION['app_id'] = $row['id'];

            $url = "resume.php";
            echo '<script language="javascript">window.location.href ="'.$url.'"</script>';

          } 
          else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
            // $conn->close();
      }

?>
</body>
</html>
