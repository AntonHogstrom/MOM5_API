<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Installation</title>
</head>
<body>

<?php

//INSTALL DATABASE

//include config file for database connection
include("includes/config.php");

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

if($db -> connect_errno > 0) {
    die('Error connecting to database: [' . $db -> connect_error . ']');
}
//code varchar 11 PK, courseName varchar 64, progression varchar 1, syllabus varchar 500, term int 1
$sql = "DROP TABLE IF EXISTS course;
        CREATE TABLE course(
            code VARCHAR(11) PRIMARY KEY, 
            courseName VARCHAR(64), 
            progression VARCHAR(1), 
            syllabus VARCHAR(500), 
            term INT(1)
        );"
;

$sql .= "INSERT INTO course(code, courseName, progression, syllabus, term) VALUES ('DT173G', 'Webbutveckling III', 'C', 'https://www.google.com', 3);";


// echo SQL-question
echo "<pre>$sql</pre>";

//Send SQL-question to database
if($db ->multi_query($sql)) {
    echo "<p>Tables are installed on <strong>" . DBHOST . "</strong></p>";
} else {
    echo "<p class='error'>Error installing tables</p>";
}
    
?>

</body>
</html>