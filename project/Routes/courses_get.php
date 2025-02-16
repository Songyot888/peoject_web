<?php
declare(strict_types=1);

if (!isset($_GET['keyword'])) {
    renderView('courses_get');
} elseif ($_GET['keyword'] == '') {
    $result = getCourses();
    renderView('courses_get', array('result' => $result));
} else {
    $result = getCoursesByKeyword($_GET['keyword']);
    renderView('courses_get', array('result' => $result));
}