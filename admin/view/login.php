<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: ../");
        exit;
    }
    
    require '../controller/check_loginuser.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Admin Login</title>
        <link rel="icon" href="../../assets/sphone_logo_white.png">
        <style>
            body{
                font-family: "Arial Rounded MT";
                font-size: 15px;
                position: absolute;
                top: 50%;
                left: 50%;
                -ms-transform: translate(-55%, -55%);
                transform: translate(-55%, -55%);
                /* background-color: #98C9FF; */
                /* background-image: url("../assets/bg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-position: center; */
            }
            .bg-image{
                position: relative;
                left: 5%;
                width: 400px;
                /* height: 400px; */
                /* opacity: 35%; */
                margin-bottom: 20px;
                margin-top: 50px;
                /* top: -50%;
                left: -55%;
                z-index: -1; */
            }
            form{
                background-color: #6ABAFF73;
                border: #004CA8 3px solid;
                /* width: 15%; */
                height: auto;
                padding: 30px 50px;
                border-radius: 50px;
            }
            ul form li{
                list-style-type: none;
            }
            li{
                margin-top: 20px;
                margin-left: 10px;
            }
            input{
                display: block;
                padding: 5px 10px;
                width: 200px;
                background-color: #82C6FF00;
                border: #004CA8 1px solid;
                margin-top: 3px;
            }
            button{
                margin-top: 30px;
                margin-left: 90px;
                padding: 10px 15px;
                background-color: #82C6FF;
                border: #004CA8 2px solid;
                border-radius: 5px;
                transition: .2s;
            }
            button:hover{
                transform: scale(1.05);
                background-color: #6ABAFF73;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <a href="../../"><img src="../../assets/logo.png" class="bg-image"/></a>  

        <?php if(isset($error)) : ?>
            <br><br>
            <i style="color:red; margin-left:135px;">username/password salah!</i>
        <?php endif; ?>

        <ul>
            <form action="" method="post">
                <li>
                    <label for="username">Username</label> <br>
                    <input type="text" name="username" id="username" required autocomplete="off">
                </li>
                <li>
                    <label for="password">Password</label> <br>
                    <input type="password" name="password" id="password" required autocomplete="off">
                </li>
                <button type="submit" name="login">Login</button>
            </form>
        </ul>
    </body>
</html>