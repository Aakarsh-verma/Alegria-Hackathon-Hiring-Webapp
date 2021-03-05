<?php session_start();?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
body{
  background: rgba(0,0,0,0.9);
}
.files input {
    outline: 2px dashed #92b0b3;
    outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear;
    padding: 120px 0px 85px 35%;
    text-align: center !important;
    margin: 0;
    width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
    -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
    transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
 }
.files{ position:relative}
.files:after {  pointer-events: none;
    position: absolute;
    top: 60px;
    left: 0;
    width: 50px;
    right: 0;
    height: 56px;
    content: "";
    background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
    display: block;
    margin: 0 auto;
    background-size: 100%;
    background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
    position: absolute;
    bottom: 10px;
    left: 0;  pointer-events: none;
    width: 100%;
    right: 0;
    height: 57px;
    content: " or drag it here. ";
    display: block;
    margin: 0 auto;
    color: #2ea591;
    font-weight: 600;
    text-transform: capitalize;
    text-align: center;
}


.button{
  display: flex;
  align-self: center;
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
              <a type="button" class="btn btn-rounded mx-2" style="background-color: #1266f1; color: white" href="../index.html">HOme</a>
              </li>
              
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>

      <?php
        require('../connect.php');
        $sql = "SELECT * FROM applicant ORDER BY id DESC LIMIT 1";
        $result = $conn->query($sql);
        if (!empty($result) && $result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                $_COOKIE['apid']     = $row['id'];
                $_SESSION['apid']     = $row['id'];
                $_COOKIE['apname']    = $row['name'];
                @$apname   = $row['name'];
                
                @$email    = $row['email'];
                }
        }else{
                echo "error";
        }$conn->close();
        ?>


      <div class="container">
	<div class="row d-flex justify-content-center my-5 mx-5">
	  
	   <div class="col-md-6">
	      <form method="POST" action="resume.php" id="" enctype="multipart/form-data">

              <div class="form-group files color">
                <label>Upload Your Resume</label>
                <input type="file" name="file" accept="application/pdf" class="form-control" multiple="">   
              </div>
              <input class="row d-flex my-5 btn btn-primary" style="display: block;margin-right: auto; margin-left: auto;" 
                type="submit" id="submit" name="submit">
        </form>
        <?php

@$apid = $_COOKIE['apid'];

@$apname = $_COOKIE['apname'];
@$filename = "$apid"."_"."$apname";

$targetfolder = "cv/";

if(isset($_POST["submit"]))

{

if (isset($_FILES['file'])) {

        $file   = $_FILES['file'];

        // print_r($file);  just checking File properties

        // File Properties
        $file_name  = $file['name'];
        $file_tmp   = $file['tmp_name'];
        $file_size  = $file['size'];
        $file_error = $file['error'];
        
        // Working With File Extension
        $file_ext   = explode('.', $file_name);
        $file_fname = explode('.', $file_name);

        $file_fname = strtolower(current($file_fname));
        $file_ext   = strtolower(end($file_ext));
        $allowed    = array('txt','pdf','doc','ods');


        if (in_array($file_ext,$allowed)) {
            //print_r($_FILES);


            if ($file_error === 0) {
                if ($file_size <= 5000000) {
                        $file_name_new     =  $filename .'.'. $file_ext;
                        $file_name_new    =  $filename .'.' . $file_ext;
                        $file_destination =  'cv/' . $file_name_new;
                        $_COOKIE['fileurl'] = $file_destination;
                        // echo $file_destination;
                        if (move_uploaded_file($file_tmp, $file_destination)) {
                                echo "<script>alert('Cv uploaded')</script>";
                        }
                        else
                        {
                            echo "<script>alert('error in uploading')</script>".mysql_error();
                        }
//                        
                }
                else
                {
                    echo "<script>alert('size must le less than 5mb')</script>";
                }
            }

        }
        else
        {
            echo "<script>alert('invalid')</script>";
        }
}
require('../connect.php');
require_once('desicion.php');
}
?>
	  </div>
    
   


    
	</div>




</div>
    


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
          <a class="text-light" href="https://mdbootstrap.com/"><i class="fas fa-lightbulb"></i> HireTech Solutions </a>
      </footer>

<script>

$(document).ready(function(){
  $('form input').change(function () {
    $('form p').text(this.files.length + " file(s) selected");
  });
});

</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>


  
        <div class="footer-container">



        
</body>
</html>