<?php
  $showError="false";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '_dbconnect.php';
        $email=$_POST['loginEmail'];
        $pass=$_POST['loginPass'];

        //tocheck wheter the email exists 
        $existSql= "SELECT * FROM `users` WHERE user_email='$email'";
        $result= mysqli_query($conn, $existSql);
        $numRows=mysqli_num_rows($result);
        if($numRows>0){
            $showError= "Email already in use";
        }
    }

?>