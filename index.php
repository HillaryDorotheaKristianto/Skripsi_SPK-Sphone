<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: admin/");
        exit;
    }

    require 'include/db_connect.php';

    // var_dump($_SESSION["login"]);

    $phones = query("SELECT * FROM phone
                    JOIN ram ON phone.ram_id=ram.ram_id
                    JOIN memory ON phone.memory_id=memory.memory_id
                    ORDER BY RAND()
                    LIMIT 10;
                    ");

    // var_dump($phones);die;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone</title>
        <link rel="icon" href="assets/sphone_logo_white.png">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: "Arial Rounded MT";
            }
            ul {
                list-style-type: none;
                margin-top: -8px;
                margin-left: -8px;
                padding: 0;
                width: auto;
                overflow: hidden;
                background-color: #98C9FF;
            }
            li {
                float: left;
                display: block;
                text-align: center;
                padding: 0px 20px;
                font-size: 18px;
                transition: .2s;
            }
            li a{
                cursor: pointer;
                color: black;
                text-decoration: none;
            }
            li:hover{
                letter-spacing: 1.15px;
                cursor: pointer;
            }
            .right{
                float: right;
                padding: 16px;
                margin-top: 25px;
            }   

            .logo{
                width: 100px;
                margin-left: 10px;
                margin-top: 10px;
            }

            a{
                text-decoration: none;
                color: black;
            }
            .btn{
                padding: 5px 10px;
                border: 1px solid black;
            }
            .btn-container{
                margin-right: 5%;
                margin-top: 15px;
                transition: .2s;
            }
            .btn-container:hover{
                transform: scale(1.08);
                cursor: pointer;
            }

            /* Style the tab */
            /* .tab {
                float: left;
                border: 1px solid #ccc;
                background-color: #f1f1f1;
                width: 30%;
            } */
            
            /* Style the buttons that are used to open the tab content */
            /* .tab button {
                display: block;
                background-color: inherit;
                color: black;
                padding: 22px 16px;
                width: 100%;
                border: none;
                outline: none;
                text-align: left;
                cursor: pointer;
            } */
            
            /* Change background color of buttons on hover */
            /* .tab button:hover {
                background-color: #ddd;
            } */

            .phone-list{
                margin-top: 50px; 
                padding: 15px 20px;
            }
            .phone{
                float: left;
                margin-top: 20px;
                margin-left: 40px;
                margin-bottom: 30px;
                transition: .2s;
            }
            .phone:hover{
                transform: scale(1.05);
            }
            .phone-img{
                width: 250px;
            }
            .phone-name{
                font-size: 15px;
                width: 250px;
                text-align: center;
            }

            /* tablet */
            @media only screen and (max-width: 768px){
                .phone{
                    margin-left: 10%;
                }
            }

            /* mobile */
            @media only screen and (max-width: 576px) {
                .phone{
                    margin-left: 20%;
                }
            }
        </style>
    </head>
    <body>
        <ul>
          <li class="left"><a href=""><img src="assets/logo.png" class="logo">
          <li class="right" style="margin-right:15px;"><a href="admin/view/login.php">Admin Login</a></li>
          <li class="right"><a href="view/phone_list.php">Phone List</a></li>
        </ul>
        
        <!-- <div class="tab">
            <a href=""><button class="tablinks">asdfa</button></a>
        </div> -->

        <div class="btn-container right">
            <a href="view/rec_page.php" class="btn">Recommendation</a>
        </div>

        <div class="phone-list">
            <?php foreach($phones as $phone): ?>
                <div class="phone">
                    <a href="view/detail.php?phone_id=<?= $phone["phone_id"] ?>&page=home">
                        <img src="assets/phones/<?= $phone["phone_img"] ?>" alt="image not found" class="phone-img">
                        <br>
                        <p class="phone-name"><?= $phone["phone_name"] . "<br>" . $phone["ram_capacity"] . "GB/" . $phone["memory_capacity"] . "GB" ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>