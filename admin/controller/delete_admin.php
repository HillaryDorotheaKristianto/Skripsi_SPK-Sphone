<?php
    require '../../include/db_connect.php';

    $id_admin = $_GET["id_admin"];

    mysqli_query($conn, "DELETE FROM user WHERE user_id = $id_admin");

    header("Location: ../view/admin_list.php");
?>