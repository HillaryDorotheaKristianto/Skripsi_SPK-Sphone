<?php
    session_start();
    // echo session_id();

    // var_dump(isset($_SESSION["login"]));die;

    if(isset($_SESSION["login"])){
        header("Location: ../admin/");
        exit;
    }

    require '../controller/phone_list.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Phone List</title>
        <link rel="icon" href="../assets/sphone_logo_white.png">
        <style>
            *{
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                font-family: "Arial Rounded MT";
            }
            .ul-header {
                list-style-type: none;
                margin-top: -8px;
                margin-left: -8px;
                padding: 0;
                width: auto;
                overflow: hidden;
                background-color: #98C9FF;
            }
            .li-header {
                float: left;
                display: block;
                text-align: center;
                padding: 0px 20px;
                font-size: 18px;
                transition: .2s;
            }
            .li-header a{
                cursor: pointer;
                color: black;
                text-decoration: none;
            }
            .li-header:hover{
                /* font-size: 18px; */
                letter-spacing: 1.15px;
                cursor: pointer;
            }
            .right{
                float: right;
                padding: 16px;
                margin-top:25px;
            }   
            .nav{
                transition: .2s;
                font-size: 18px;
            }
            .nav:hover{
                letter-spacing: 1.15px;
                cursor: pointer;
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
                padding: 10px 15px;
                border: 1px solid black;
                margin-left: 10%;
            }
            .btn-container{
                margin-top: 30px;
                margin-bottom: 25px;
                transition: .2s;
            }
            .btn:hover, .btn-container:hover, .clear-filter-btn:hover{
                transform: scale(1.02);
                cursor: pointer;
            }

            .filter-container{
                margin-top: -70px;
                margin-bottom: 30px;
            }
            .filter-label{
                margin-left: 65%;
            }
            #filter_name{
                margin-left: 65.2%;
            }
            #brand, #filter_name{
                width: 150px;
                padding: 5px 10px;
            }
            .filter-btn{
                padding: 5px 10px;
            }
            .filter-btn:hover, .clear-filter-btn:hover{
                cursor: pointer;
            }
            .clear-filter-btn{
                /* margin-top: -20px; */
                margin-left: 68%;
                margin-bottom: 10px;
                padding: 10px 15px;
                font-size: 16px;
                background-color: #FFFFFF00;
                border: 1px solid black;
                transition: .2s;
                /* float: left; */
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

            table{
                border-collapse: collapse;
                margin: auto;
                text-align: center;
            }
            table tr th, table tr td{
                padding: 16px 20px;
            }

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

            /* pagination buttons */
            .pagination-btns{
                text-align: center;
                margin: 40px 0 40px 0;
                /* border: 1px solid black; */
                /* border-radius: 5px; */
                clear: both;
            }
            .pagination-btns a{
                border: 1px solid black;
                padding: 10px 15px;
                margin-left: -5px;
            }

            /* toggle */
            .toggle1{
                position: absolute;
                width: 40px;
                height: 28px;
                left: 73%;
                top: 27px;
                opacity: 0;
                cursor: pointer;
                z-index: 2;
            }
            .toggle2{
                position: absolute;
                width: 40px;
                height: 28px;
                left: 74.5%;
                top: 27px;
                opacity: 0;
                cursor: pointer;
                z-index: 2;
            }

            .filter-toggle{
                background-color: #98C9FF;
                width: 400px;
                padding: 25px 30px;
                margin-left: 63%;
                position: absolute;
                transform: translateY(-145%);
                /* z-index: -1; */
                border-radius: 20px;
                transition: all 1s;
            }
            .slide{
                transform: translateY(-10%);
                overflow: hidden;
            }
            .filter-toggle-select{
                width: 150px;
                padding: 5px 10px;
            }
            .filter-toggle-andor{
                padding: 5px 10px;
            }
            .toggle-btn{
                border: 2px solid #3576c4;
                background-color: #98C9FF80;
                border-radius: 10px;
                transition: .2s;
            }
            .toggle-btn:hover{
                cursor: pointer;
                transform: scale(1.05);
            }

            /* tablet */
            @media only screen and (max-width: 768px){
                .pagination-btns{
                    margin: 40px 0 40px 0;
                }
                .pagination-btns a{
                    padding: 10px 15px;
                }

                .toggle1{
                    left: 45.5%;
                }
                .toggle2{
                    left: 48%;
                }

                .filter-toggle{
                    margin-left: 40%;
                }
            }

            /* mobile */
            @media only screen and (max-width: 576px) {
                .pagination-btns{
                    margin: 40px 0 40px 0;
                }
                .pagination-btns a{
                    padding: 10px 15px;
                }

                .toggle1{
                    left: 87%;
                    top: 15.5%;
                }
                .toggle2{
                    left: 91.5%;
                    top: 15.5%;
                }

                .filter-toggle{
                    margin-left: 28.2%;
                    transform: translateY(-165%);
                }
                .slide{
                    transform: translateY(-9%);
                }
            }
        </style>
    </head>
    <body>
        <ul class="ul-header">
            <li class="left li-header"><a href="../"><img src="../assets/logo.png" class="logo">
            <li class="right nav" style="margin-right:15px;"><a href="../admin/view/login.php">Admin Login</a></li>
            <li class="right nav"><a href="rec_page.php">Recommendation</a></li>

            <div class="menu-toggle" id="menu-toggle">
                <!-- <input type="checkbox" class="toggle1"/>
                <input type="checkbox" class="toggle2"/> -->
                <li class="right nav" class="toggle1">Filter</li>
            </div>
        </ul>

        <div class="filter-toggle">
            <form action="" method="get">
                <ul>
                    <li style="margin-top:10px; list-style-type: none;">
                        <label for="brand" class="filter-toggle-label">Smartphone Brand:</label>
                        <select name="brand" id="brand" class="filter-toggle-select">
                            <option value="" selected></option>
                            <?php 
                                foreach($brands as $brand): 
                                    if(isset($_GET["filter"])):
                                        if($brand["brand_id"] == $_GET["brand"]):
                            ?>
                                            <option value="<?= $brand["brand_id"] ?>" selected><?= $brand["brand_name"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $brand["brand_id"] ?>"><?= $brand["brand_name"] ?></option>
                                <?php 
                                        endif; 
                                    else: 
                                ?>
                                <option value="<?= $brand["brand_id"] ?>"><?= $brand["brand_name"] ?></option>
                            <?php endif; endforeach; ?>
                        </select>
                    </li>

                    <li style="margin-top:5px; list-style-type: none;">
                        <select name="condition" id="condition" class="filter-toggle-andor" style="margin-left: 157px;">
                            <?php 
                                if(isset($_GET["filter"])): 
                                    if($condition === "AND"):
                            ?>
                                        <option value="AND" selected>AND</option>
                                        <option value="OR">OR</option>
                                    <?php else: ?>
                                        <option value="AND">AND</option>
                                        <option value="OR"selected>OR</option>
                                    
                            <?php 
                                    endif; 
                                else: 
                            ?>
                                <option value="AND">AND</option>
                                <option value="OR">OR</option>
                            <?php endif; ?>
                        </select>
                    </li>

                    <li style="margin-top:5px; list-style-type: none;">
                        <label for="year" class="filter-toggle-label">Release Year:</label>
                        <select name="year" id="year" class="filter-toggle-select" style="margin-left: 47px;">
                            <option value="" selected></option>
                            <?php 
                                foreach($years as $year): 
                                    if(isset($_GET["filter"])):
                                        if($year["release_year"] == $_GET["year"]):
                            ?>
                                            <option value="<?= $year["release_year"] ?>" selected><?= $year["release_year"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $year["release_year"] ?>"><?= $year["release_year"] ?></option>
                                <?php 
                                        endif; 
                                    else: 
                                ?>
                                <option value="<?= $year["release_year"] ?>"><?= $year["release_year"] ?></option>
                            <?php endif; endforeach; ?>
                        </select>
                    </li>
                    <li style="list-style-type: none; text-align: center; margin-top: 15px;">
                        <button type="submit" name="filter" style="padding: 10px 15px;" class="toggle-btn" value="true">Filter</button>
                    </li>
                </ul>
            </form>
        </div>
        
        <!-- <div class="filter-back-btn"> -->
            <?php if(isset($_GET["filter"])): ?>
                <div class="btn-container" style="margin-top:20px; margin-bottom:35px;">
                    <a href="../" class="btn" style="float:left;">Back</a>
                </div>
                <button type="submit" name="clearFilter" class="filter-btn clear-filter-btn" style="margin-top:-20px;"><a href="phone_list.php">Clear Filter</a></button>
            <?php else: ?>
                <div class="btn-container">
                    <a href="../" class="btn">Back</a>
                </div>
            <?php endif; ?>

            <!-- <div class="filter-container"> -->
            <!-- <ul class="filter-container">
                <form action="" method="get">
                    <li>
                        <label for="brand" class="filter-label">Smartphone Brand:</label> -->
                        <!-- <select name="filter_name" id="filter_name">
                            <option value="brand">Phone Brand</option>
                            <option value="year">Release Year</option>
                        </select> -->
                <!-- ---------------------------------------------------------------------------------------------------------------- -->
                        <!-- <select name="brand" id="brand">
                            <option value="" disabled selected></option>
                            <?php 
                                foreach($brands as $brand): 
                                    if(isset($_GET["filter"])):
                                        if($brand["brand_id"] == $_GET["brand"]):
                            ?>
                                            <option value="<?= $brand["brand_id"] ?>" selected><?= $brand["brand_name"] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $brand["brand_id"] ?>"><?= $brand["brand_name"] ?></option>
                                <?php 
                                        endif; 
                                    else: 
                                ?>
                                <option value="<?= $brand["brand_id"] ?>"><?= $brand["brand_name"] ?></option>
                            <?php endif; endforeach; ?>
                        </select> -->
                <!-- ---------------------------------------------------------------------------------------------------------------- -->
                        <!-- <button type="submit" name="filter" class="filter-btn" value="true">Filter</button>

                        <?php if(isset($_GET["filter"])): ?>
                            <br>
                            <button type="submit" name="clearFilter" class="filter-btn clear-filter-btn"><a href="phone_list.php">Clear Filter</a></button>
                        <?php endif; ?>
                    </li>
                </form>
            </ul> -->
            <!-- </div> -->
        <!-- </div> -->

        <table border=2>
            <tr>
                <th>No.</th>
                <th style="width: 280px;">Product Name</th>
                <th style="width: 100px;">Release Year</th>
                <th>RAM</th>
                <th style="width: 100px;">Internal Memory</th>
                <th>Processor</th>
                <th style="width: 120px;">Battery</th>
                <th style="width: 100px;">Front Camera</th>
                <th style="width: 100px;">Back Camera</th>
                <th style="width: 170px;">Price</th>
            </tr>
            <?php foreach($phones as $phone): ?>
                <tr>
                    <td><?= $awalData + 1; ?></td>
                    <td><a href="detail.php?phone_id=<?= $phone["phone_id"] ?>&page=list&p=<?= $halamanAktif ?>"><?= $phone["phone_name"] ?></a></td>
                    <td><?= $phone["phone_release_year"] ?></td>
                    <td><?= $phone["ram_capacity"] . " GB" ?></td>
                    <td><?= $phone["memory_capacity"] . " GB" ?></td>
                    <td><?= $phone["processor_name"] . "-Core" ?></td>
                    <td><?= $phone["phone_battery"] . " mAh" ?></td>
                    <td><?= $phone["phone_front_camera"] . " MP" ?></td>
                    <td><?= $phone["phone_back_camera"] . " MP" ?></td>
                    <td><?= "Rp. " . number_format($phone["phone_price"],0,".",".") ?></td>
                </tr>
            <?php
                    $awalData++;
                endforeach;
            ?>
        </table>

        <!-- <div class="phone-list">
            <?php foreach($phones as $phone): ?>
                <div class="phone">
                    <a href="detail.php?phone_id=<?= $phone["phone_id"] ?>&page=list">
                        <img src="../assets/phones/<?= $phone["phone_img"] ?>" alt="image not found" class="phone-img">
                        <br>
                        <p class="phone-name"><?= $phone["phone_name"] . "<br>" . $phone["ram_capacity"] . "GB/" . $phone["memory_capacity"] . "GB" ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div> -->

        <!-- pagination button(s) -->
        <div class="pagination-btns">
            <?php if(!isset($_GET["filter"])): ?>
                <?php if($halamanAktif > 1): ?>
                    
                    <a href="?p=<?= $halamanAktif-1; ?>" >&laquo;</a>
     
                 <?php
                     endif;
     
                     // ---------------------------------------
     
                     for($j=1; $j <= $totalHalaman; $j++):
                         if($j == $halamanAktif):
                 ?>
                     <a href="?p=<?= $j; ?>" style="text-decoration:underline;"><?= $j; ?></a>
     
                     <?php
                         else:
                     ?>
                     <a href="?p=<?= $j; ?>"><?= $j; ?></a>
                 <?php   
                         endif;
                     endfor;
     
                     // ---------------------------------------
     
                     if($halamanAktif < $totalHalaman):
                 ?>
     
                     <a href="?p=<?= $halamanAktif+1; ?>">&raquo;</a>
     
                 <?php endif; ?>
            <?php else: ?>
                <?php if($halamanAktif > 1): ?>
                    
                    <a href="?brand=<?= $brand_id ?>&condition=<?= $condition ?>&year=<?= $release_year ?>&filter=<?= $filter ?>&p=<?= $halamanAktif-1; ?>" >&laquo;</a>
     
                 <?php
                     endif;
     
                     // ---------------------------------------
     
                     for($j=1; $j <= $totalHalaman; $j++):
                         if($j == $halamanAktif):
                 ?>
                     <a href="?brand=<?= $brand_id ?>&condition=<?= $condition ?>&year=<?= $release_year ?>&filter=<?= $filter ?>&p=<?= $j; ?>" style="text-decoration:underline;"><?= $j; ?></a>
     
                     <?php
                         else:
                     ?>
                     <a href="?brand=<?= $brand_id ?>&condition=<?= $condition ?>&year=<?= $release_year ?>&filter=<?= $filter ?>&p=<?= $j; ?>"><?= $j; ?></a>
                 <?php   
                         endif;
                     endfor;
     
                     // ---------------------------------------
     
                     if($halamanAktif < $totalHalaman):
                 ?>
     
                     <a href="?brand=<?= $brand_id ?>&condition=<?= $condition ?>&year=<?= $release_year ?>&filter=<?= $filter ?>&p=<?= $halamanAktif+1; ?>">&raquo;</a>
     
                 <?php endif; ?>
            <?php endif; ?>
        </div>

        <script>
            document.querySelector('.menu-toggle li').addEventListener('click', function(){
                // nav.classList.toggle('slide');
                document.querySelector(".filter-toggle").classList.toggle("slide");
            });

            // document.querySelector('.menu-toggle .toggle2').addEventListener('click', function(){
            //     // nav.classList.toggle('slide');
            //     document.querySelector(".filter-toggle").classList.toggle("slide");
            // });
        </script>
    </body>
</html>