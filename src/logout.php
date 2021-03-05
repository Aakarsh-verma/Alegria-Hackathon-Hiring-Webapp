<?php  session_start();
    unset($_COOKIE['dept_id']);
    session_destroy();  
    header("Location: index.html");
    //<a type='button' href="logout.php">Logout</a>
?>  