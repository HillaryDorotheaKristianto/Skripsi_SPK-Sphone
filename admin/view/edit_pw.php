<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../../");
        exit;
    }

    require '../controller/update_pw.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Change Password</title>
        <link rel="icon" href="../../assets/sphone_logo_white.png">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: "Arial Rounded MT";
            }
            /* body{
                background-image: url("../assets/bg.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                background-position: center;
            } */
            a{
                background-color: #98C9FF;
                display: block;
                text-align: center;
                cursor: pointer;
            }
            .logo{
                width: 100px;
            }

            form{
                text-align: center;
                /* width: 15%; */
                height: auto;
                padding: 30px 50px;
                border-radius: 50px;
                -ms-transform: translate(0%, 20%);
                transform: translate(0%, 20%);
            }
            ul form li{
                list-style-type: none;
            }
            li{
                margin-top: 30px;
            }
            label{
                font-size: 15px;
            }
            input{
                margin: auto;
                display: block;
                padding: 10px 15px;
                width: 250px;
                background-color: #FFFFFF80;
                border: #004CA8 1px solid;
                margin-top: 3px;
            }
            button{
                margin-top: 15px;
                padding: 10px 15px;
                background-color: #82C6FF80;
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
        <a href="../"><img src="../../assets/logo.png" class="logo"></a>
        
        <ul>
            <form action="" method="post">
                <li>
                    <label for="old_pw">Old Password</label> <br>
                    <input type="password" name="old_pw" id="old_pw" autocomplete="off">
                </li>
                <li>
                    <label for="new_pw">New Password</label> <br>
                    <input type="password" name="new_pw" id="new_pw" autocomplete="off">
                </li>
                <li>
                    <label for="confirm_new_pw">Confirm New Password</label> <br>
                    <input type="password" name="confirm_new_pw" id="confirm_new_pw" autocomplete="off">
                </li>
                <li>
                    <button type="submit" name="edit_pw">Change Password</button>
                    <button name="cancel" style="margin-left:10px;">Cancel</button>
                </li>
            </form>
        </ul>
    </body>
</html>