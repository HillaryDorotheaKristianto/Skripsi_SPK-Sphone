<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../../");
        exit;
    }

    require '../controller/insert_phone.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Add Phone</title>
        <link rel="icon" href="../../assets/sphone_logo_white.png">
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
                /* text-align: center; */
                /* margin: auto; */
                /* width: 15%; */
                height: auto;
                padding: 30px 50px;
                border-radius: 50px;
                /* column-count: 2; */
            }
            ul form li{
                list-style-type: none;
            }
            li{
                margin-top: 25px;
                /* clear: both; */
            }
            label{
                font-size: 15px;
                display: inline-block;
                margin-left: -400px;
                margin-top: 10px;
            }
            input, select{
                margin: auto;
                display: inline-block;
                padding: 10px 15px;
                width: 250px;
                background-color: #82C6FF00;
                border: #004CA8 1px solid;
                margin-top: 3px;
                float: left;
                margin-left: 45%;
            }
            button{
                margin-top: 15px;
                margin-left: 48%;
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
            <form action="" method="post" enctype="multipart/form-data">
                <li>
                    <label for="phone_img">Phone Image</label>
                    <input type="file" name="phone_img" id="phone_img">
                </li>
                <li>
                    <label for="phone_brand">Phone Brand</label>
                    <select name="phone_brand" id="phone_brand">
                        <?php
                            foreach($brands as $brand):
                        ?>
                                <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand_name'] ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </li>
                <li>
                    <label for="phone_name">Phone Name</label>
                    <input type="text" name="phone_name" id="phone_name" autocomplete="off">
                </li>
                <li>
                    <label for="phone_release_year">Release Year</label>
                    <input type="number" name="phone_release_year" id="phone_release_year" autocomplete="off">
                </li>
                <li>
                    <label for="phone_price">Price</label>
                    <input type="number" name="phone_price" id="phone_price" autocomplete="off">
                </li>
                
                <li>
                    <label for="phone_ram">RAM</label>
                    <select name="phone_ram" id="phone_ram">
                        <?php
                            foreach($rams as $ram):
                        ?>
                                <option value="<?= $ram['ram_id'] ?>"><?= $ram['ram_capacity'] . " GB" ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </li>
                <li>
                    <label for="phone_memory">Internal Memory</label>
                    <select name="phone_memory" id="phone_memory">
                        <?php
                            foreach($memories as $memory):
                        ?>
                                <option value="<?= $memory['memory_id'] ?>"><?= $memory['memory_capacity'] . " GB" ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </li>
                <li>
                    <label for="phone_processor">Processor</label>
                    <select name="phone_processor" id="phone_processor">
                        <?php
                            foreach($processors as $processor):
                        ?>
                                <option value="<?= $processor['processor_id'] ?>"><?= $processor['processor_name'] . "-Core" ?></option>
                        <?php
                            endforeach;
                        ?>
                    </select>
                </li>
                
                <li>
                    <label for="phone_battery">Battery</label>
                    <input type="number" name="phone_battery" id="phone_battery" autocomplete="off">
                </li>
                <li>
                    <label for="phone_front_camera">Front Camera</label>
                    <input type="number" name="phone_front_camera" id="phone_front_camera" autocomplete="off">
                </li>
                <li>
                    <label for="phone_back_camera">Back Camera</label>
                    <input type="number" name="phone_back_camera" id="phone_back_camera" autocomplete="off">
                </li>
                <li>
                    <button type="submit" name="add_phone">Add Phone</button>
                    <button name="cancel" style="margin-left:10px;">Cancel</button>
                </li>
            </form>
        </ul>
    </body>
</html>