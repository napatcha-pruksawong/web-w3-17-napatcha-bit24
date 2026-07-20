<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFC Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
            color: #202124;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            flex-direction: column; /* เปลี่ยนเป็น column เพื่อให้ปุ่มอยู่ด้านบนตาราง */
            align-items: center;
        }

        /* ปุ่มสไตล์ KFC */
        .btn-kfc {
            display: inline-block;
            background-color: #e4002b;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(228, 0, 43, 0.2);
            transition: all 0.2s ease;
            max-width: 900px;
            width: fit-content;
        }

        .btn-kfc:hover {
            background-color: #b30021;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(228, 0, 43, 0.3);
        }

        /* ตกแต่งตารางให้ดูมินิมอลและเป็นระเบียบ */
        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* หัวตาราง สีแดงหลักของ KFC แทรมขอบล่างสีดำ */
        thead {
            background-color: #e4002b; /* สีแดง KFC */
            color: #ffffff;
            border-bottom: 5px solid #111111; /* เส้นสีดำแทรม */
        }

        th {
            font-weight: 600;
            padding: 16px;
            font-size: 16px;
            letter-spacing: 0.5px;
        }

        /* เนื้อหาในตาราง */
        td {
            padding: 16px;
            text-align: center;
            border-bottom: 1px solid #eeeeee;
            font-size: 15px;
            vertical-align: middle;
        }

        /* แถวเว้นแถวให้มีสีเทาอ่อนช่วยให้มองง่าย */
        tbody tr:nth-child(even) {
            background-color: #fdfdfd;
        }

        /* เมื่อเอาเมาส์ไปชี้ที่แถว */
        tbody tr:hover {
            background-color: #fff5f5; /* เปลี่ยนเป็นสีอมแดงอ่อนๆ */
        }

        /* ตกแต่งรูปภาพเมนูอาหาร */
        img {
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        img:hover {
            transform: scale(1.05); /* ชี้แล้วรูปขยายใหญ่ขึ้นเล็กน้อย */
        }

        /* ครอบปุ่มให้อยู่ในขอบเขตเดียวกับตาราง */
        .container {
            width: 100%;
            max-width: 900px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
    </style>
</head>
<body>

    <?php
        
    //แสดง error

    // Report all PHP errors
    error_reporting(E_ALL);

    // Force errors to be displayed on the screen
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

        // ดึงไฟล์
        include "action/connect.php";
        
        // select = ดึงข้อมูล , from = จากตาราง .. 
        $sql = "SELECT * FROM menus" ;

        // result สั่งให้ query ทำงาน
        // ที่อยู่ฐาน-รันที่ไหน รันอะไร
        $result = mysqli_query($con, $sql);

        // ทดสอบ (ในตัวแปรเก็บค่าอะไรอยู่บ้าง)
        // var_dump($result);

    ?>

    <div class="container">
        <a href="manage_menu.php" class="btn-kfc" style="background-color: #202124;">จัดการข้อมูล (Manage) ⚙️</a>
        <a href="menu_types.php" class="btn-kfc">ดูประเภทเมนู ➔</a>
    </div>

    <table border=0>
        <thead>
            <th>รหัสเมนู</th>
            <th>ชื่อเมนู</th>
            <th>ราคา</th>
            <th>ภาพ</th>
            <th>ประเภท</th>
        </thead>
    
    <tbody>
    <?php

        // loop สำหรับวนซ้ำตัวที่เป็น arrey , object
        foreach($result as $menu){
            ?>
            <tr>
                <td><?= $menu["menu_id"] ?></td>
                <td><?= $menu["menu_name"] ?></td>
                <td><strong><?= $menu["menu_price"] ?> บาท</strong></td>
                <td>
                <img src="<?= $menu["menu_image"] ?>" 
                alt=""
                style="width:120px; height:120px;"> </td>
                <td><?= $menu["type_id"] ?></td>
            </tr>
            <?php

        }

        
    ?>
    </tbody>

    </table>
     

</body>
</html>