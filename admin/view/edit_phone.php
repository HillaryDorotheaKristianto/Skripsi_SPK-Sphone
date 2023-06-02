<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../../");
        exit;
    }

    require '../controller/update_phone.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Edit Phone</title>
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

            table{
                margin: auto;
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
            }
            input.text, select{
                float: left;
                margin-left: 40%;
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
                
                <input type="hidden" name="old_phone_img" id="old_phone_img" value="<?= $phone['phone_img'] ?>">

                <table border=0>
                    <tr>
                        <td style="text-align:center; padding: 30px 50px;" valign="top">
                            <!-- gambar -->
                            <img src="../../assets/phones/<?= $phone['phone_img'] ?>" style="width:220px;"><br>
                            <input type="file" name="new_phone_img" id="new_phone_img" style="border-style:none; width:220px; margin-top:10px;">
                        </td>
                        <td style="width: 450px;">
                            <!-- data smartphone -->
                            <li>
                                <label for="phone_brand">Phone Brand</label>
                                <select name="phone_brand" id="phone_brand">
                                    <?php
                                        foreach($brands as $brand): 
                                            if($brand['brand_id'] === $phone['brand_id']):
                                    ?>
                                                <option value="<?= $brand['brand_id'] ?>" selected><?= $brand['brand_name'] ?></option>
                                            <?php else: ?>
                                                <option value="<?= $brand['brand_id'] ?>"><?= $brand['brand_name'] ?></option>  
                                    <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </select>
                            </li>
                            <li>
                                <label for="phone_name">Phone Name</label>
                                <input type="text" name="phone_name" id="phone_name" value="<?= $phone['phone_name'] ?>" class="text" autocomplete="off">
                            </li>
                            <li>
                                <label for="phone_release_year">Release Year</label>
                                <input type="number" name="phone_release_year" id="phone_release_year" value="<?= $phone['phone_release_year'] ?>" class="text" autocomplete="off">
                            </li>
                            <li>
                                <label for="phone_price">Price</label>
                                <input type="number" name="phone_price" id="phone_price" value="<?= $phone['phone_price'] ?>" class="text" autocomplete="off">
                            </li>
                            
                            <li>
                                <label for="phone_ram">RAM</label>
                                <select name="phone_ram" id="phone_ram">
                                    <?php
                                        foreach($rams as $ram): 
                                            if($ram['ram_id'] === $phone['ram_id']):
                                    ?>
                                                <option value="<?= $ram['ram_id'] ?>" selected><?= $ram['ram_capacity'] . " GB" ?></option>
                                            <?php else: ?>
                                                <option value="<?= $ram['ram_id'] ?>"><?= $ram['ram_capacity'] . " GB" ?></option>  
                                    <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </select>
                            </li>
                            <li>
                                <label for="phone_memory">Internal Memory</label>
                                <select name="phone_memory" id="phone_memory">
                                    <?php
                                        foreach($memories as $memory):
                                            if($memory['memory_id'] === $phone['memory_id']):
                                    ?>
                                                <option value="<?= $memory['memory_id'] ?>" selected><?= $memory['memory_capacity'] . " GB" ?></option>
                                        <?php else: ?>
                                                <option value="<?= $memory['memory_id'] ?>"><?= $memory['memory_capacity'] . " GB" ?></option>
                                    <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </select>
                            </li>
                            <li>
                                <label for="phone_processor">Processor</label>
                                <select name="phone_processor" id="phone_processor">
                                    <?php
                                        foreach($processors as $processor):
                                            if($processor['processor_id'] === $phone['processor_id']):
                                    ?>
                                                <option value="<?= $processor['processor_id'] ?>" selected><?= $processor['processor_name'] . "-Core" ?></option>
                                            <?php else: ?>
                                                <option value="<?= $processor['processor_id'] ?>"><?= $processor['processor_name'] . "-Core" ?></option>
                                    <?php
                                            endif;
                                        endforeach;
                                    ?>
                                </select>
                            </li>
                            
                            <li>
                                <label for="phone_battery">Battery</label>
                                <input type="number" name="phone_battery" id="phone_battery" value="<?= $phone['phone_battery'] ?>" class="text" autocomplete="off">
                            </li>
                            <li>
                                <label for="phone_front_camera">Front Camera</label>
                                <input type="number" name="phone_front_camera" id="phone_front_camera" value="<?= $phone['phone_front_camera'] ?>" class="text" autocomplete="off">
                            </li>
                            <li>
                                <label for="phone_back_camera">Back Camera</label>
                                <input type="number" name="phone_back_camera" id="phone_back_camera" value="<?= $phone['phone_back_camera'] ?>" class="text" autocomplete="off">
                            </li>
                            <li>
                                <button type="submit" name="edit_phone">Edit Phone</button>
                                <button name="cancel" style="margin-left:10px;">Cancel</button>
                            </li>
                        </td>
                    </tr>
                </table>
            </form>
        </ul>
    </body>
</html>