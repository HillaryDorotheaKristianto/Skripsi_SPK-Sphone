<?php
    require '../../include/db_connect.php';

    $phone_id = $_GET["phone_id"];
    $halamanAktif = $_GET["p"];

    mysqli_query($conn, "DELETE FROM phone WHERE phone_id = $phone_id");

    header("Location: ../?p=$halamanAktif");
?>