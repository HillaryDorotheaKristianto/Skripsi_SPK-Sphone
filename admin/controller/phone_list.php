<?php
    require '../include/db_connect.php';

    $phones = query("SELECT * FROM phone JOIN ram ON phone.ram_id=ram.ram_id JOIN memory ON phone.memory_id=memory.memory_id JOIN processor ON phone.processor_id=processor.processor_id ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity");

    // pagination
    // konfigurasi
    $limit = 10;
    $baris = count($phones);
    $totalHalaman = ceil($baris/$limit);

    $halamanAktif = (isset($_GET["p"])) ? $_GET["p"] : 1;
                            // kondisi ? jika true : jike false
    
    $awalData = ($limit * $halamanAktif) - $limit;

    $phones = query("SELECT * FROM phone JOIN ram ON phone.ram_id=ram.ram_id JOIN memory ON phone.memory_id=memory.memory_id JOIN processor ON phone.processor_id=processor.processor_id ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity LIMIT $awalData, $limit");
?>