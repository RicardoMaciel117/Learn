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
        echo "Si jalo senior";
    }
    else{
        echo "No se pudo";
    }
    
    $sql_last_id = "SELECT id_course FROM `COURSES` ORDER BY id_course DESC LIMIT 1;";
    
    $last_id = $db->query($sql_last_id)->fetchArray()['id_course'];
    
    echo $last_id;
    
    
?>