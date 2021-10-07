<?php

include("includes/config.php");

$Course = new Course();
//$Course->deleteCourse("DTTEST1111");
//$Course->addCourse("DTTEST", "testCourseSecondd", "B", "https://google.com", 6);
$Course->updateCourse("DT173G", "testCourseSecondd", "B", "https://youtube.com", 1);

echo "<pre>";
var_dump($Course->getCourses());
echo "</pre>";
