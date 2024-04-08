<?php
//*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
// */
    class DB extends SQLite3{
        
        public function __construct(){
            $this->open("db/courses.db");
        }
        
    }
    
    $db = new DB();
    
    if($db){
        //echo "Si jalo senior";
    }
    else{
        echo "No se pudo";
    }

    $course_name = $_POST['course_name'];
    $course_url_part = $_POST['course_url_part'];

    $sql_new_course = <<<sql
    INSERT INTO COURSES VALUES (NULL, '$course_name');";
sql;
    $result_course = $db->query($sql_new_course);

    $sql_last_id = "SELECT id_course FROM `COURSES` ORDER BY id_course DESC LIMIT 1;";
    $last_id = $db->query($sql_last_id)->fetchArray()['id_course'];

    $sql_part_course = "INSERT INTO COURSE_PARTS VALUES (NULL, $last_id, '$course_url_part', '');";
    //echo $sql_new_course.PHP_EOL;
    
    $result_part = $db->query($sql_part_course);
    

    if($result_course && $result_part){
      echo "Se ha guardado el video";
    }
    else{
      echo "Algo salió mal";
    }

    $db->close();

?>