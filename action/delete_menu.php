<?php

    error_reporting(E_ALL);
   
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    // รับค่า
    $id = $_GET['id'];

    include "connect.php";
        
    $sql = "DELETE FROM menus WHERE menu_id= '$id' " ;

    $result = mysqli_query($con, $sql);

    if(!$result){
        echo "Error";
    }else{
        // ถ้าไม่ error ให้กลับไปที่หน้า index
        header("Location: ../manage_menu.php");
        exit; 
    }