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
        background-color: #e4002b;
        color: #ffffff;
        border-bottom: 5px solid #111111;
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
        background-color: #fff5f5;
    }

    /* ตกแต่งรูปภาพเมนูอาหาร */
    img {
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    img:hover {
        transform: scale(1.05);
    }

    /* ครอบปุ่มให้อยู่ในขอบเขตเดียวกับตาราง */
    .container {
        width: 100%;
        max-width: 900px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* ตกแต่งปุ่ม แก้ไข / ลบ ในตาราง */
    .btn-action {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        margin: 2px;
        transition: all 0.2s;
    }

    .btn-edit {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-edit:hover {
        background-color: #e0a800;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #ffffff;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }
</style>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include "action/connect.php";

$sql = "SELECT * FROM menus";
$result = mysqli_query($con, $sql);
?>

<div class="container">
    <a href="index.php" class="btn-kfc" style="background-color: #e4002b;">⬅ กลับหน้าหลัก</a>
    <a href="add_menu.php" class="btn-kfc">+ เพิ่มเมนู</a>
</div>

<table border=0>
<thead>
<th>รหัสเมนู</th>
<th>ชื่อเมนู</th>
<th>ราคา</th>
<th>ภาพ</th>
<th>ประเภท</th>
<th>จัดการ</th>
</thead>

<tbody>
<?php
foreach($result as $menu){
?>
<tr>
    <td><?= $menu["menu_id"] ?></td>
    <td><?= $menu["menu_name"] ?></td>
    <td><strong><?= $menu["menu_price"] ?> บาท</strong></td>
    <td>
    <img
    src="<?= $menu["menu_image"] ?>"
    alt=""
    style="width:120px; height:120px;"
    >
    </td>
    <td><?= $menu["type_id"] ?></td>

    <td>
        <a href="edit_menu.php?id=<?= $menu['menu_id'] ?>" class="btn-action btn-edit">แก้ไข</a>
        <a href="action/delete_menu.php?id=<?= $menu['menu_id'] ?>" class="btn-action btn-delete" onclick="return confirm('ยืนยันการลบเมนูนี้?');">ลบ</a>
    </td>

</tr>
<?php
}
?>
</tbody>

</table>

</body>
</html>