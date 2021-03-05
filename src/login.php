<?php session_start();
require('connect.php');

@$email = $_POST['email'];
@$password=$_POST['password'];

if(isset($_POST['submit'])){
    if($email&&$password){
        $sql = "SELECT * FROM employee where email = '$email' and epassword = '$password'";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
                $_SESSION['emp_id'] = $row['id'];
                $_COOKIE['emp_id'] = $row['id'];
                
                @$role = $row['role'];
                if($role == 'head'){
                    echo '<script>alert("Session id recorded you are loggedin")</script>';
                header("location: Dept/department-dashboard.php");
                }elseif($role == 'HR_Manager'){
                    echo '<script>alert("Session id recorded you are loggedin")</script>';
                    header("location: HR/hr-dashboard.php");
                }elseif($role != 'HR_Manager' && $role != 'head'){
                    echo '<script>alert("Session id recorded you are loggedin")</script>';
                    header("location: employee/employee-dashboard.php");
                }
            }
        }
    }
  else{
    echo '<script>alert("please enter all the details")</script>';
  }
}$conn->close(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login here</title>
    <link rel="stylesheet" href="./css./login.css">
    <!-- Font Awesome -->
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
  rel="stylesheet"
/>
  <style>

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
                <button type="button" class="btn btn-rounded mx-2" style="background-color: #1266f1; color: white">Home</button>
              </li>
              
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
  <div>
<div class="row d-flex justify-content-center">
<div  class="col-md-6 text-center">
<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
  <li class="nav-item" role="presentation">
    <a
      class="nav-link active"
      id="tab-login"
      data-mdb-toggle="pill"
      href="#pills-login"
      role="tab"
      aria-controls="pills-login"
      aria-selected="true"
      >Login</a
    >
  </li>
  <li class="nav-item" role="presentation">
    <a
      class="nav-link"
      id="tab-register"
      data-mdb-toggle="pill"
      href="#pills-register"
      role="tab"
      aria-controls="pills-register"
      aria-selected="false"
      >Register</a
    >
  </li>
</ul>
<!-- Pills navs -->

<!-- Pills content -->


<div class="tab-content" style="witdh:500px">
  <div
    class="tab-pane fade show active"
    id="pills-login"
    role="tabpanel"
    aria-labelledby="tab-login"
  >
  <form action="login.php"   method="POST">
      <div class="text-center mb-3" style="max-witdh:500px" >
        <p>Sign in with:</p>
        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="email" name="email" class="form-control" />
        <label class="form-label" for="loginName">Email or username</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="password" name="password" class="form-control" />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- 2 column grid layout -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <!-- Checkbox -->
          <div class="form-check mb-3 mb-md-0">
            <input
              class="form-check-input"
              type="checkbox"
              value=""
              id="loginCheck"
              checked
            />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>

        <div class="col-md-6 d-flex justify-content-center">
          <!-- Simple link -->
          <a href="#!">Forgot password?</a>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit" name="submit" class="btn btn-primary btn-block mb-4" >Sign in</button>

      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member? <a href="#!">Register</a></p>
      </div>
    </form>
  </div>
  <div
    class="tab-pane fade"
    id="pills-register"
    role="tabpanel"
    aria-labelledby="tab-register"
  >
  <form action="login.php"   method="POST"  onsubmit="return validateForm()">
      <div class="text-center mb-3">
        <p>Sign up with:</p>
        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-primary btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>

      <p class="text-center">or:</p>

      <!-- Name input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" class="form-control" />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <!-- Username input -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" class="form-control" />
        <label class="form-label" for="registerUsername">Username</label>
      </div>

      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" class="form-control" />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerPassword" class="form-control" />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Repeat Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" class="form-control" />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

      <!-- Checkbox -->
      <div class="form-check d-flex justify-content-center mb-4">
        <input
          class="form-check-input me-2"
          type="checkbox"
          value=""
          id="registerCheck"
          checked
          aria-describedby="registerCheckHelpText"
        />
        <label class="form-check-label" for="registerCheck">
          I have read and agree to the terms
        </label>
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
    </form>
  </div>
</div>
</div>
</div>
<!-- Pills content -->
<!-- MDB -->
<footer class="bg-dark text-center text-lg-start" style="z-index:1; botttom: 0; position: relative;">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row alignFooter">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase text-light">HireTech</h5>
      
              <p class="text-light">
                  A single service which can be used by everyone ranging from the interviewees to the HR.
              </p>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase text-light"></h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-light"></a>
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
              role="button"
              ><i class="fab fa-facebook-f"></i
            ></a>
      
            <!-- Twitter -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #55acee;"
              href="https://twitter.com/PillaisAlegria?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"
              role="button"
              ><i class="fab fa-twitter"></i
            ></a>
      
            <!-- Google -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #dd4b39;"
              href="https://www.google.com/search?rlz=1C1SQJL_enIN939IN939&sxsrf=ALeKk02FFtVGhm4I56WBc75Wo0ERSPjYGg%3A1614751870764&ei=fig_YLaGLsKZ4-EPkOuYkAw&q=alegria+the+festival+of+joy&oq=Alegria+the+fes&gs_lcp=Cgdnd3Mtd2l6EAEYADIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeMgYIABAWEB4yBggAEBYQHjIGCAAQFhAeOgcIIxCwAxAnOg0ILhDHARCvARCwAxAnOgcIABBHELADOgQIIxAnOgoILhDHARCvARAnOgQIABBDOgIIADoICC4QxwEQrwE6BwgAELEDEAo6DQgAELEDEIMBEMkDEAo6BAgAEAo6BQguEJMCOgkIABDJAxAWEB46CAgAEBYQChAeUMYzWOVMYIZXaAFwAngAgAGTAYgBmAmSAQMwLjmYAQCgAQGqAQdnd3Mtd2l6yAEKwAEB&sclient=gws-wiz"
              role="button"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #ac2bac;"
              href="https://www.instagram.com/pillaisalegria/?hl=en"
              role="button"
              ><i class="fab fa-instagram"></i
            ></a>
            <!-- Github -->
            <a
              class="btn btn-primary btn-floating m-1"
              style="background-color: #333333;"
              href="#!"
              role="button"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3 text-light" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright:
          <a class="text-light" href="https://mdbootstrap.com/"><i class="fas fa-lightbulb"></i> HierTech Solutions </a>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
></script>


    <script type = "text/javascript">
        function valThisForm() {
            event.preventDefault();
            let socUsername = document.getElementById("email");
            let password = document.getElementById("password");
            if(socUsername.value=="" && password.value=="") {
                alert("Please fill all the fields");
                event.preventDefault();
                socUsername.focus();
            }
            else if(socUsername.value=="") {
                alert("Email cannot be empty");
                event.preventDefault();
                socUsername.focus();
            }
           
            else if(password.value=="") {
                alert("Password cannot be empty");
                password.focus();
            }
            console.log(socUsername);
        }
        
    </script>
</body>

</html>


