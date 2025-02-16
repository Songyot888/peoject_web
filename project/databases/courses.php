<?php

function getCourses(): mysqli_result|bool {
    $conn = getConnection();
    $sql = 'select * from students';
    $result = $conn->query($sql);
    return $result;
}

function getCoursesByKeyword(string $keyword): mysqli_result|bool
{
    $conn = getConnection();
    $sql = 'SELECT * FROM courses WHERE course_code LIKE ? OR course_name LIKE ?';
    $stmt = $conn->prepare($sql);
    $keyword = '%' . $keyword . '%';
    $stmt->bind_param('ss', $keyword, $keyword);
    $stmt->execute();
    return $stmt->get_result();
}