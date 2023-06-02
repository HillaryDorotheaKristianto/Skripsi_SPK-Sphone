<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location: ../admin/");
        exit;
    }

    if(!isset($_SESSION["recommend"])){
        header("Location:rec_page.php");
        exit;
    }

    if(isset($_POST["break_rec_result"])){
        // var_dump("session break");die;
        $_SESSION = [];
        session_unset();
        session_destroy();
        
        header("Location: ../");
        exit;
    }

    require '../controller/recommendation.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Recommendation Result</title>
        <link rel="icon" href="../assets/sphone_logo_white.png">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: "Arial Rounded MT";
            }
            .logo-form{
                background-color: #98C9FF;
                display: block;
                text-align: center;
                cursor: pointer;
                width: 100%;
                border-width: 0px;
            }
            .logo{
                width: 100px;
            }

            h2{
                text-decoration: underline;
                text-align: center;
                margin-top: 40px;
            }

            .phone-list{
                margin-top: 30px; 
                padding: 15px 20px;
                text-align: center;
                /* width: 1000px; */
                margin: auto;
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
            .phone-href, .phone-href-10{
                background-color: #00000000;
                color: black;
                text-decoration: none;
            }

            .result-wp{
                margin-top: 570px;
            }
            .result-saw-wp{
                margin-top: 570px;
            }

            .phone-10{
                float: left;
                margin-left: 10px;
                width: 130px;
                /* text-align: center; */
                transition: .2s;
            }
            .phone-img-10{
                width: 130px;
            }
            .phone-name-10{
                font-size: 13px;
                margin-bottom: 20px;
            }
            .phone-list-10{
                margin-left: 40px;
            }
            .phone-10:hover{
                transform: scale(1.05);
            }

            /* tablet */
            @media only screen and (max-width: 768px){
                .result-wp, .result-saw-wp{
                    clear: both;
                }
                .phone{
                    margin-left: 10%;
                }
                .phone-10{
                    margin-left: 7%;
                }
            }

            /* mobile */
            @media only screen and (max-width: 576px) {
                .result-wp, .result-saw-wp{
                    clear: both;
                }
                .phone{
                    margin-left: 17%;
                }
                .phone-10{
                    margin-left: 7%;
                }
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <button name="break_rec_result" class="logo-form">
                <img src="../assets/logo.png" class="logo">
            </button>
        </form>

        <h2>Recommendation Result</h2>
        
        <div class="result-saw phone-list">
            <h3>Method: Simple Additive Weighting</h3>
            <?php 
                $saw_phones = $_SESSION["saw_phones_5"];
                $saw_phone_lists = $_SESSION["saw_phones_10"];
                
                $i = 1;
                foreach($saw_phones as $saw_phone): 
            ?>
                <div class="phone">
                    <a href="detail.php?phone_id=<?= $saw_phone["phone_id"] ?>&page=recommendation" class="phone-href">
                        <img src="../assets/phones/<?= $saw_phone["phone_img"] ?>" alt="image not found" class="phone-img">
                        <br>
                        <p class="phone-name"><?= $i . ". " . $saw_phone["phone_name"] . "<br>" . $saw_phone["phone_ram"] . "GB/" . $saw_phone["phone_memory"] . "GB" ?></p>
                    </a>
                    <p><?= "Nilai: " . number_format($saw_phone["v"], 2, ".", "") ?></p>
                </div>
            <?php 
                $i++;
                endforeach; 
            ?>
            <!-- ------------------------------------------------------------------------------------ -->
            <div class="phone-list-10">
                <?php 
                    $i = 6;
                    foreach($saw_phone_lists as $saw_phone_list): 
                ?>
                    <div class="phone-10">
                        <a href="detail.php?phone_id=<?= $saw_phone_list["phone_id"] ?>&page=recommendation" class="phone-href-10">
                            <img src="../assets/phones/<?= $saw_phone_list["phone_img"] ?>" alt="image not found" class="phone-img-10">
                            <br>
                            <p class="phone-name-10"><?= $i . ". " . $saw_phone_list["phone_name"] . "<br>" . $saw_phone_list["phone_ram"] . "GB/" . $saw_phone_list["phone_memory"] . "GB" ?></p>
                        </a>
                        <!-- <p><?= "Nilai: " . number_format($saw_phone_list["v"], 2, ".", "") ?></p> -->
                    </div>
                <?php 
                    $i++;
                    endforeach; 
                ?>
            </div>
        </div>
        
        <div class="result-wp phone-list">
            <h3>Method: Weighted Product</h3>
            <?php 
                $wp_phones = $_SESSION["wp_phones_5"];
                $wp_phone_lists = $_SESSION["wp_phones_10"];

                $j = 1;
                foreach($wp_phones as $wp_phone): 
            ?>
                <div class="phone">
                    <a href="detail.php?phone_id=<?= $wp_phone["phone_id"] ?>&page=recommendation" class="phone-href">
                        <img src="../assets/phones/<?= $wp_phone["phone_img"] ?>" alt="image not found" class="phone-img">
                        <br>
                        <p class="phone-name"><?= $j . ". " . $wp_phone["phone_name"] . "<br>" . $wp_phone["phone_ram"] . "GB/" . $wp_phone["phone_memory"] . "GB" ?></p>
                    </a>
                    <p><?= "Nilai: " . number_format($wp_phone["v_wp"], 2, ".", "") ?></p>
                </div>
            <?php 
                $j++;
                endforeach; 
            ?>
            <!-- ------------------------------------------------------------------------------------ -->
            <div class="phone-list-10">
                <?php 
                    $j = 6;
                    foreach($wp_phone_lists as $wp_phone_list): 
                ?>
                    <div class="phone-10">
                        <a href="detail.php?phone_id=<?= $wp_phone_list["phone_id"] ?>&page=recommendation" class="phone-href-10">
                            <img src="../assets/phones/<?= $wp_phone_list["phone_img"] ?>" alt="image not found" class="phone-img-10">
                            <br>
                            <p class="phone-name-10"><?= $j . ". " . $wp_phone_list["phone_name"] . "<br>" . $wp_phone_list["phone_ram"] . "GB/" . $wp_phone_list["phone_memory"] . "GB" ?></p>
                        </a>
                        <!-- <p><?= "Nilai: " . number_format($wp_phone_list["v"], 2, ".", "") ?></p> -->
                    </div>
                <?php 
                    $j++;
                    endforeach; 
                ?>
            </div>
        </div>
        
        <div class="result-saw-wp phone-list">
            <h3>Method: Simple Additive Weighting & Weighted Product</h3>
            <?php 
                $saw_wp_phones = $_SESSION["saw_wp_phones_5"];
                $saw_wp_phone_lists = $_SESSION["saw_wp_phones_10"];

                $k = 1;
                foreach($saw_wp_phones as $saw_wp_phone): 
            ?>
                <div class="phone">
                    <a href="detail.php?phone_id=<?= $saw_wp_phone["phone_id"] ?>&page=recommendation" class="phone-href">
                        <img src="../assets/phones/<?= $saw_wp_phone["phone_img"] ?>" alt="image not found" class="phone-img">
                        <br>
                        <p class="phone-name"><?= $k . ". " . $saw_wp_phone["phone_name"] . "<br>" . $saw_wp_phone["phone_ram"] . "GB/" . $saw_wp_phone["phone_memory"] . "GB" ?></p>
                    </a>
                    <p><?= "Nilai: " . number_format($saw_wp_phone["v_saw_wp"], 2, ".", "") ?></p>
                </div>
            <?php 
                $k++;
                endforeach; 
            ?>
            <!-- ------------------------------------------------------------------------------------ -->
            <div class="phone-list-10">
                <?php 
                    $k = 6;
                    foreach($saw_wp_phone_lists as $saw_wp_phone_list): 
                ?>
                    <div class="phone-10">
                        <a href="detail.php?phone_id=<?= $saw_wp_phone_list["phone_id"] ?>&page=recommendation" class="phone-href-10">
                            <img src="../assets/phones/<?= $saw_wp_phone_list["phone_img"] ?>" alt="image not found" class="phone-img-10">
                            <br>
                            <p class="phone-name-10"><?= $k . ". " . $saw_wp_phone_list["phone_name"] . "<br>" . $saw_wp_phone_list["phone_ram"] . "GB/" . $saw_wp_phone_list["phone_memory"] . "GB" ?></p>
                        </a>
                        <!-- <p><?= "Nilai: " . number_format($wp_psaw_wp_phone_listhone_list["v"], 2, ".", "") ?></p> -->
                    </div>
                <?php 
                    $k++;
                    endforeach; 
                ?>
            </div>
        </div>
    </body>
</html>