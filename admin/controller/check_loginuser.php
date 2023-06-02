<?php
    require '../../include/db_connect.php' ;

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        // var_dump($result);die;

        if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
            
			if(password_verify($password, $row["password"])){
                $_SESSION["login"] = true;
                $_SESSION['user_id'] = $row['user_id'];
                
                // var_dump(isset($_SESSION["login"]));die;

                header("Location: ../");
                exit();
			}
        }

        $error = true;

    }
?>