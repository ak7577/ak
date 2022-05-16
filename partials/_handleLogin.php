<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include '_dbconnect.php';
        $email=$_POST['loginEmail'];
        $pass=$_POST['loginPass'];

        //tocheck login details
        $sql= "SELECT * FROM `users` WHERE user_email='$email'";
        $result= mysqli_query($conn, $sql);// here we got details of email from USERS table
        $numRows=mysqli_num_rows($result);
        if($numRows==1){
           $row=mysqli_fetch_assoc($result);
               if(password_verify($pass, $row['user_pass'])){
                   session_start();
                   $_SESSION['loggedin']=true;
                   $_SESSION['useremail']=$email;
                   echo "logged in"; 
                  // header("Location: /ak/index.php");
               }
               else{
                   echo "Email already in use";                 
               }
           }
           
    }

?>