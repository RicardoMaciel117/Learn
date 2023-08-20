<?php
/*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
*/
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

    $sql_current_time = "UPDATE COURSE_PARTS SET current_time = '{$_POST['current_time']}' WHERE id_course_part = {$_POST['id_course_part']}";
    
    echo $sql_current_time.PHP_EOL;
    
    $db->query($sql_current_time);

    $db->close();

?>