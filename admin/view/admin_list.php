<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../../");
        exit;
    }

    require '../../include/db_connect.php';

    $admins = query("SELECT * FROM user");

    // pagination
	// konfigurasi
	$limit = 5;
	$baris = count(query("SELECT * FROM user"));
	$totalHalaman = ceil($baris/$limit);
	// var_dump($baris/$limit);

	$halamanAktif = (isset($_GET["p"])) ? $_GET["p"] : 1;
							// kondisi ? jika true : jike false
	
	$awalData = ($limit * $halamanAktif) - $limit;

	$cabangs = query("SELECT * FROM user LIMIT $awalData, $limit");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SPK S-Phone - Admin List</title>
        <link rel="icon" href="../../assets/sphone_logo_white.png">
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
                font-size: 17px;
                transition: .2s;
            }
            li a{
                cursor: pointer;
                color: black;
                text-decoration: none;
            }
            li:hover{
                /* font-size: 18px; */
                letter-spacing: 1.15px;
                cursor: pointer;
            }
            .right{
                float: right;
                padding: 16px;
                margin-top:25px;
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
            }
            .btn-container{
                margin-top: 50px;
                margin-bottom: 50px;
                transition: .2s;
                margin-left: 55%;
            }
            .btn-container:hover{
                transform: scale(1.05);
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

            table{
                border-collapse: collapse;
                margin: auto;
                text-align: center;
            }
            table tr th, table tr td{
                padding: 16px 20px;
            }

            .btn-action img{
                width: 30px;
                transition: .2s;
            }
            .btn-action img:hover{
                transform: scale(1.05);
            }

            /* pagination buttons */
            .pagination-btns{
                text-align: center;
                margin: 40px 0 20px 0;
                /* border: 1px solid black; */
                /* border-radius: 5px; */
            }
            .pagination-btns a{
                border: 1px solid black;
                padding: 10px 15px;
                margin-left: -5px;
            }
        </style>
    </head>
    <body>
        <ul>
          <li class="left"><a href="../"><img src="../../assets/logo.png" class="logo">
          <li class="right"><a href="../controller/logout.php">Logout</a></li>
          <li class="right"><a href="edit_pw.php?page=adminlist">Change Password</a></li>
          <li class="right"><a href="../">Product List</a></li>
        </ul>
        
        <div class="btn-container">
            <a href="add_admin.php" class="btn">+ Add Admin</a>
        </div>

        <table border=2>
            <tr>
                <th>No.</th>
                <th style="width: 200px;">Name</th>
                <th style="width: 150px;">Username</th>
                <!-- <th>Action</th> -->
            </tr>
            <?php
                foreach($admins as $admin):
            ?>
                <tr>
                    <td><?= $awalData + 1; ?></td>
                    <td><?= $admin["name"] ?></td>
                    <td><?= $admin["username"] ?></td>
                    <!-- <td> -->
                        <!-- <a href="" class="btn-action"><img src="../assets/edit.png"></a> -->
                        <!-- <a href="../controller/delete_admin.php?id_admin=<?= $admin["user_id"] ?>" class="btn-action"><img src="../assets/delete.png"></a> -->
                    <!-- </td> -->
                </tr>
            <?php
                $awalData++;
                endforeach;
            ?>
        </table>

        <!-- pagination button(s) -->
        <div class="pagination-btns">
            <?php if($halamanAktif > 1): ?>
                    
                <a href="?p=<?= $halamanAktif-1; ?>" >&laquo;</a>

            <?php
                endif;

                for($j=1; $j <= $totalHalaman; $j++):
                    if($j == $halamanAktif):
            ?>
                <a href="?p=<?= $j; ?>" style="font-weight:bold;"><?= $j; ?></a>

            <?php
                else:
            ?>
                <a href="?p=<?= $j; ?>"><?= $j; ?></a>
            <?php   
                    endif;
                endfor;

                if($halamanAktif < $totalHalaman):
            ?>

                <a href="?p=<?= $halamanAktif+1; ?>">&raquo;</a>

            <?php 
                endif; 
            ?>
        </div>
    </body>
</html>