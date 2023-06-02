<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: ../admin/");
        exit;
    }

    require '../controller/phone_detail.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Phone Detail</title>
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

            table{
                margin: auto;
                -ms-transform: translate(0%, 20%);
                transform: translate(0%, 20%);
            }

            ul{
                margin-top: -40px;
            }
            ul li{
                list-style-type: none;
            }
            li{
                margin-top: 30px;
                font-size: 20px;
            }

            a{
                text-decoration: none;
                color: black;
            }
            .btn{
                display: inline;
                padding: 10px 15px;
                border: 2px solid #3576c4;
                background-color: #98C9FF80;
                /* margin-left: 17%; */
                transition: .2s;
            }
            .btn-container{
                /* display: inline; */
                margin-top: 20px;
                margin-bottom: 40px;
                transition: .2s;
            }
            .btn-container:hover{
                transform: scale(1.05);
                cursor: pointer;
            }
            .btn:hover{
                border-radius: 10px;
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <a href="../"><img src="../assets/logo.png" class="logo"></a>
        
        <ul>
            <table border=0>
                <tr>
                    <td style="text-align:center; padding: 30px 50px;">
                        <!-- gambar -->
                        <img src="../assets/phones/<?= $phone['phone_img'] ?>" style="width:300px;"><br>
                        <!-- <input type="file" name="new_phone_img" id="new_phone_img" style="border-style:none; width:220px; margin-top:10px;"> -->
                        <div class="btn-container">
                            <!-- <a href="../" class="btn">Back</a> -->
                            <form action="" method="post">
                                <button name="back" class="btn">Back</button>
                            </form>
                        </div>
                    </td>
                    <td style="width: 450px;">
                        <!-- data smartphone -->
                        <li>Phone Name
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["phone_name"] ?></li>
                        <li>Release Year
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["phone_release_year"] ?></li>
                        <li>RAM
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["ram_capacity"] . " GB" ?></li>
                        <li>Internal Memory
                            &nbsp;
                            : <?= $phone["memory_capacity"] . " GB" ?></li>
                        <li>Processor
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["processor_name"] . "-Core" ?></li>
                        <li>Battery
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["phone_battery"] . " mAh" ?></li>
                        <li>Front Camera
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["phone_front_camera"] . " MP" ?></li>
                        <li>Back Camera
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= $phone["phone_back_camera"] . " MP" ?></li>
                        <li>Price
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            : <?= "Rp. " . number_format($phone["phone_price"],0,".",".") ?></li>
                    </td>
                </tr>
            </table>
        </ul>
    </body>
</html>