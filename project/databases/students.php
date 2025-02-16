<?php

function getStudents(): mysqli_result|bool {
    $conn = getConnection();
    $sql = 'select * from students';
    $result = $conn->query($sql);
    return $result;
}

function getStudentsByKeyword(string $keyword): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'select * from students where first_name like ? or last_name like ?';
    $stmt = $conn->prepare($sql);
    $keyword = '%'. $keyword .'%';
    $stmt->bind_param('ss',$keyword, $keyword);
    $res = $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}