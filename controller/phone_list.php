<?php
    require '../include/db_connect.php';
    
    // $brandFilter = (isset($_GET["brand"])) ? $_GET["brand"] : 0;

    $phones = query("SELECT * FROM phone JOIN ram ON phone.ram_id=ram.ram_id JOIN memory ON phone.memory_id=memory.memory_id JOIN processor ON phone.processor_id=processor.processor_id ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity");
    $brands = query("SELECT * FROM brand");
    $years = query("SELECT * FROM release_year");

    // pagination
    // konfigurasi
    $limit = 10;
    $baris = count($phones);
    $totalHalaman = ceil($baris/$limit);

    $halamanAktif = (isset($_GET["p"])) ? $_GET["p"] : 1;
                            // kondisi ? jika true : jike false
    
    $awalData = ($limit * $halamanAktif) - $limit;

    $phones = query("SELECT * FROM phone JOIN ram ON phone.ram_id=ram.ram_id JOIN memory ON phone.memory_id=memory.memory_id JOIN processor ON phone.processor_id=processor.processor_id ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity LIMIT $awalData, $limit");

    if(isset($_GET["filter"])){
        $brand_id = $_GET["brand"];
        $filter = $_GET["filter"];
        $release_year = $_GET["year"];
        $condition = $_GET["condition"];

        if(empty($release_year)){
            $phones = query("SELECT * FROM phone 
                            JOIN ram ON phone.ram_id=ram.ram_id 
                            JOIN memory ON phone.memory_id=memory.memory_id 
                            JOIN processor ON phone.processor_id=processor.processor_id 
                            JOIN brand ON phone.brand_id=brand.brand_id 
                            WHERE phone.brand_id = $brand_id
                            ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity
                            ");
        } else if(empty($brand_id)){
            $phones = query("SELECT * FROM phone 
                            JOIN ram ON phone.ram_id=ram.ram_id 
                            JOIN memory ON phone.memory_id=memory.memory_id 
                            JOIN processor ON phone.processor_id=processor.processor_id 
                            JOIN brand ON phone.brand_id=brand.brand_id 
                            WHERE phone.phone_release_year = $release_year
                            ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity
                            ");
        } else{
            $phones = query("SELECT * FROM phone 
                            JOIN ram ON phone.ram_id=ram.ram_id 
                            JOIN memory ON phone.memory_id=memory.memory_id 
                            JOIN processor ON phone.processor_id=processor.processor_id 
                            JOIN brand ON phone.brand_id=brand.brand_id 
                            WHERE phone.brand_id = $brand_id $condition phone.phone_release_year = $release_year
                            ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity
                            ");
        }

        // var_dump(!empty($brand_id));die;
        
        // var_dump($phones);die;

        $limit = 10;
        $baris = count($phones);
        $totalHalaman = ceil($baris/$limit);

        $halamanAktif = (isset($_GET["p"])) ? $_GET["p"] : 1;
                                // kondisi ? jika true : jike false

        $awalData = ($limit * $halamanAktif) - $limit;
 
        if(empty($release_year)){
            $phones = query("SELECT * FROM phone 
                            JOIN ram ON phone.ram_id=ram.ram_id 
                            JOIN memory ON phone.memory_id=memory.memory_id 
                            JOIN processor ON phone.processor_id=processor.processor_id 
                            JOIN brand ON phone.brand_id=brand.brand_id 
                            WHERE phone.brand_id = $brand_id
                            ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity
                            LIMIT $awalData, $limit
                            ");
        } else if(empty($brand_id)){
            $phones = query("SELECT * FROM phone 
                            JOIN ram ON phone.ram_id=ram.ram_id 
                            JOIN memory ON phone.memory_id=memory.memory_id 
                            JOIN processor ON phone.processor_id=processor.processor_id 
                            JOIN brand ON phone.brand_id=brand.brand_id 
                            WHERE phone.phone_release_year = $release_year
                            ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity
                            LIMIT $awalData, $limit
                            ");
        } else{
            $phones = query("SELECT * FROM phone 
                            JOIN ram ON phone.ram_id=ram.ram_id 
                            JOIN memory ON phone.memory_id=memory.memory_id 
                            JOIN processor ON phone.processor_id=processor.processor_id 
                            JOIN brand ON phone.brand_id=brand.brand_id 
                            WHERE phone.brand_id = $brand_id $condition phone.phone_release_year = $release_year
                            ORDER BY phone.phone_name, ram.ram_capacity, memory.memory_capacity
                            LIMIT $awalData, $limit
                            ");
        }
        
        // var_dump($phones);die;
    }
?>