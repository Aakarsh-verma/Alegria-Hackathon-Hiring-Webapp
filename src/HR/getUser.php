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



    <table class="table table-striped table-responsive ">
          <tr class="table-success table-hover" style="">
        
            <th class="font-weight-bold" scope="col">Name</th>
            <th class="font-weight-bold" scope="col">Email</th>
            <th class="font-weight-bold" scope="col">Contact</th>
            <th class="font-weight-bold" scope="col">Role</th>    
          </tr>
          
        <?php
        $q = intval($_GET['q']);
        require('../connect.php');
        $sql = "SELECT * FROM employee where deptid = $q";
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


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
</body>
</html>
