<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($event_id);
    if(isset($_POST['edit'])){
        $eid = $_POST['eid']  ?? ''; 

        $result = getEventById($event_id);

        randerView('edit_get', ['event_id' => $result]);
    } elseif(isset($_POST['delete'])){
        $eid = $_POST['eid']  ?? ''; 
        $resultdl = deleteEvent($eid);
        if ($resultdl) {
            echo "<script>alert('ลบกิจกรรมเรียบร้อย!'); window.location.href='/event';</script>";
            header('Location: /profile');
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการลบกิจกรรม!'); window.location.href='/event';</script>";
        }
    }
   

    
    
}