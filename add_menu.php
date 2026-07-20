<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            flex-direction: column;
            align-items: center;
        }

        .card {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-top: 6px solid #e4002b;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 24px;
            color: #e4002b;
            text-align: center;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-family: 'Kanit', sans-serif;
            font-size: 15px;
            transition: border-color 0.2s;
            background-color: #ffffff;
        }

        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #e4002b;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
        }

        button {
            background-color: #e4002b;
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(228, 0, 43, 0.2);
            transition: all 0.2s ease;
            width: 100%;
        }

        button:hover {
            background-color: #b30021;
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(228, 0, 43, 0.3);
        }
    </style>
</head>
<body>
    
    <div class="card">
        <h2>เพิ่มเมนูอาหาร</h2>

        <form action="action/insert_menu.php" method="post">

            <div class="form-group">
                <label for="">รหัสเมนู</label>
                <input type="text" name="menu_id">
            </div>

            <div class="form-group">
                <label for="">ชื่อเมนู</label>
                <input type="text" name="menu_name">
            </div>

            <div class="form-group">
                <label for="">ราคา</label>
                <input type="text" name="menu_price">
            </div>

            <div class="form-group">
                <label for="">รูปภาพ</label>
                <input type="text" name="menu_image">
            </div>

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
            $sql = "SELECT * FROM menu_types" ;

            // ดึงข้อมูลมาเก็บไว้ใน result 

            // result สั่งให้ query ทำงาน
            // ที่อยู่ฐาน-รันที่ไหน รันอะไร
            $result = mysqli_query($con, $sql);

            // ทดสอบ (ในตัวแปรเก็บค่าอะไรอยู่บ้าง)
            // var_dump($result);

            ?>

            <div class="form-group">
                <label for="">ประเภทเมนู</label>
                <select name="type_id">

                    <?php        
                        foreach($result as $type){
                        ?>
                            <option value="<?= $type["type_id"] ?>"> <?= $type["type_name"] ?> </option>
                        <?php
                        }
                    ?>

                </select>
            </div>

            <br>

            <button>บันทึก</button>

        </form>
    </div>

</body>
</html>