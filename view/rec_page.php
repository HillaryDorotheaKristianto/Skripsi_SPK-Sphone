<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: ../admin/");
        exit;
    }

    if(isset($_POST["cancel"])){
        header("Location: ../");
    }

    require '../controller/recommendation.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Recommendation Page</title>
        <link rel="icon" href="../assets/sphone_logo_white.png">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: "Arial Rounded MT";
            }
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
                margin: 5% 37%;
                width: 360px;
                /* background-color: #aaa; */
                /* margin: auto; */
            }
            ul{
                list-style-type: none;
            }
            li{
                margin-top: 20px;
            }
            label{
                display: inline-block;
                font-size: 18px;
            }
            select{
                padding: 5px 10px;
                width: 250px;
                font-size: 15px;
                position: absolute;
                left: 0;
                margin-left: 47%;
                margin-top: -5px;
            }

            .btn{
                padding: 10px 30px;
                font-size: 15px;
                float: right;
                margin-top: 20px;
                transition: .2s;
                border: 2px solid #3576c4;
                background-color: #98C9FF80;
            }
            #cancel{
                margin-left: 10px;
            }
            .btn:hover{
                cursor: pointer;
                border-radius: 10px;
                transform: scale(1.1);
            }

            /* tablet */
            @media only screen and (max-width: 768px){
                select{
                    margin-left: 45%;
                }
                form{
                    margin: 10% 27%;
                }
            }

            /* mobile */
            @media only screen and (max-width: 576px) {
                select{
                    margin-left: 200px;
                }
                form{
                    margin: 15% 10%;
                }
            }
        </style>
    </head>
    <body>
        <a href="../"><img src="../assets/logo.png" class="logo"></a>
        
        <!-- <form action="rec_result.php" method="post"> -->
        <form action="" method="post">
            <ul>
                <li>
                    <label for="w_price">Price:</label>
                    <select name="w_price" id="w_price">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="w_ram">RAM:</label>
                    <select name="w_ram" id="w_ram">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="w_memory">Memory:</label>
                    <select name="w_memory" id="w_memory">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="w_processor">Processor:</label>
                    <select name="w_processor" id="w_processor">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="w_battery">Battery:</label>
                    <select name="w_battery" id="w_battery">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="w_front_camera">Front Camera:</label>
                    <select name="w_front_camera" id="w_front_camera">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="w_back_camera">Back Camera:</label>
                    <select name="w_back_camera" id="w_back_camera">
                        <option value="5">So Important</option>
                        <option value="4">Important</option>
                        <option value="3">Neutral</option>
                        <option value="2">Not Important</option>
                        <option value="1">So Not Important</option>
                    </select>
                </li>
                <li>
                    <label for="usage">Usage:</label>
                    <label for="usage" style="font-size:12px;">(Optional)</label>
                    <select name="usage" id="usage">
                        <!-- <option value="" disabled selected></option> -->
                        <option value="" selected></option>
                        <option value="study">Online Study</option>
                        <option value="work">Work</option>
                        <option value="content">Content Creating</option>
                        <option value="game">Gaming</option>
                    </select>
                </li>
                <li>
                    <button name="cancel" id="cancel" class="btn">Cancel</button>
                    <button type="submit" name="recommend" class="btn">Go</button>
                </li>
            </ul>
        </form>
    </body>
</html>