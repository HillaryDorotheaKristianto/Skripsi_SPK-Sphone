<?php
    require '../include/db_connect.php';

    $phone_id = $_GET["phone_id"];

    $phone = query("SELECT * FROM phone JOIN ram ON phone.ram_id=ram.ram_id JOIN memory ON phone.memory_id=memory.memory_id JOIN processor ON phone.processor_id=processor.processor_id WHERE phone_id = $phone_id")[0];
    // var_dump($phone);die;

    $page = $_GET["page"];

    if(isset($_POST["back"])){
        if($page === "home"){
            header("Location: ../");
            exit;
        } else if($page === "list"){
            $halamanAktif = $_GET["p"];

            header("Location: phone_list.php?p=$halamanAktif");
            exit;
        } else if($page === "recommendation"){
            header("Location: rec_result.php");
            exit;
        }
    }
?>