<?php
$result = getStudents();
renderView('student_get', array('result' => $result));