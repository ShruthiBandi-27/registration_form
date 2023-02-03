 <?php
    echo "this profile";
    echo $_SERVER['REQUEST_METHOD'];
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //alert("profile page");
        echo "hello";
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "users_db";
        $con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($email) && !empty($password)) {

            //echo "hello";
            //save to database
            $user_id = rand(1,100);
            if(!$con) {
                die("failed to connect to DB");
            }
            else {
               // $query = "insert into users (user_id,email,password) values ('$user_id','$email','$password')";
                $query = "select * from users where email = '$email'" ;
                $result = mysqli_query($con,$query);
                alert($result);
                if($result) {
                    $user_data = mysqli_fetch_assoc($result);  

                    echo "<h1>Hello User, </h1> <p>Welcome to {$user_data}</p>";
                }
                
            }
        // die;
        //header("Location: login.php")
        }
        else {
            echo "Enter valid details";
        }
    }
    else {
        echo "no GET in profile";
    }
?>
