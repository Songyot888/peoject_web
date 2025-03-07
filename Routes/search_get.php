<?php
declare(strict_types=1);


// ตรวจสอบค่าคำค้นหาใน URL
if (!isset($_GET['keyword']) || $_GET['keyword'] == '') {
    // ถ้าไม่มีคำค้นหาหรือค่าว่าง ให้ดึงข้อมูลทั้งหมด
    $result = getAllEvents();
    randerView('search_get', array('result' => $result));
} else {
    // ถ้ามีคำค้นหาให้ค้นหาตามคำที่ผู้ใช้กรอก
    $keyword = $_GET['keyword'];
    $startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
    $endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
    
    // ค้นหากิจกรรมตามคำค้นหาและช่วงวันที่
    $result = getSearchByKeyword($keyword, $startDate, $endDate);
    randerView('search_get', array('result' => $result));  // แก้ไขการสะกดจาก randerView เป็น renderView
}
