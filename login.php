<?php

   include 'login.html';
   //echo "hello";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "hello";
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "users_db";
        $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        $email = $_POST['email'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $mobile = $_POST['mobile'];

        if(!empty($email) && !empty($password)) {

            //echo "hello";
            //save to database
            $user_id = rand(1,100);
            if(!$con) {
                die("failed to connect to DB");
            }
            else {
                $query = "insert into users (user_id,email,password,age,dob,mobile) values ('$user_id','$email','$password','$age','$dob','$mobile')";
                mysqli_query($con,$query);
                echo "form details submitted";
            }
        // die;
        //header("Location: login.php")
        }
        else {
            echo "Enter valid details";
        }
    }


?>