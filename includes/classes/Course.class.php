<?php

class Course {
    private $db;
    private $code;
    private $courseName;
    private $progression;
    private $syllabus;
    private $term;

    //Constructor
    public function __construct() {
        //Database connection
        $this -> db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

        //Error handling if error with connection
        if($this -> db -> connect_error) {
            die("Connection failed: " . $this -> db -> connect_error);
        }
    }



    /* ADD COURSE TO DATABASE */
    public function addCourse($code, $courseName, $progression, $syllabus, $term) : bool {
        $this -> code = strip_tags($code);
        $this -> courseName = strip_tags($courseName);
        $this -> progression = strip_tags($progression);
        $this -> syllabus = strip_tags($syllabus);
        $this -> term = strip_tags($term);

        $stmt = $this -> db -> prepare("INSERT INTO course (code, courseName, progression, syllabus, term)
        VALUES (?, ?, ?, ?, ?)");
        $stmt -> bind_param("sssss", $this -> code, $this -> courseName, $this -> progression, $this -> syllabus, $this -> term);
        

        //Execute Statement
        if($stmt -> execute()) {
            return true;
        } else {
            return false;
        }

        //Close Statement / database connection
        $stmt -> close();
    }



    /* GET ALL COURSES IN DATABASE */
    public function getCourses() : array {
        $sql = "SELECT * FROM course ORDER BY term;";
        $result = $this -> db -> query($sql);

        //Query returns ASSOC-array
        return $result -> fetch_all(MYSQLI_ASSOC);
    }


    /* GET COURSE BY ID */
    public function getCourse($code) : array {
        $sql = "SELECT * FROM course WHERE code = '" . $code . "';";
        $result = $this -> db -> query($sql);

        //Query returns ASSOC-array
        return $result -> fetch_all(MYSQLI_ASSOC);
    }


    /* UPDATE COURSE BY ID */

    public function updateCourse($code, $courseName, $progression, $syllabus, $term) : bool {
        
        $this -> code = strip_tags($code);
        $this -> courseName = strip_tags($courseName);
        $this -> progression = strip_tags($progression);
        $this -> syllabus = strip_tags($syllabus);
        $this -> term = strip_tags($term);

        $stmt = $this -> db -> prepare("UPDATE course SET courseName=?, progression=?, syllabus=?, term=? WHERE code=?;");
        $stmt -> bind_param("sssss", $this -> courseName, $this -> progression, $this -> syllabus, $this -> term, $this-> code);


        //Execute Statement
        if($stmt -> execute()) {
            return true;
        } else {
            return false;
        }

        //Close Statement / database connection
        $stmt -> close();
    }


    //DELETE COURSE BY CODE
    public function deleteCourse($code) : bool {
        $sql = "DELETE FROM course WHERE code = '" . $code . "';";
        $result = $this -> db -> query($sql);
        
        return $result;
    }
}