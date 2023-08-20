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
    
    $table1 = <<<sql
    CREATE TABLE IF NOT EXISTS COURSES(
        id_course INTEGER PRIMARY KEY AUTOINCREMENT,
        course VARCHAR(200)
    );
sql;

    $table2 = <<<sql2
    CREATE TABLE IF NOT EXISTS COURSE_PARTS(
        id_course_part INTEGER PRIMARY KEY AUTOINCREMENT,
        id_course INT NOT NULL,
        url TEXT,
        current_time VARCHAR(15),
        FOREIGN KEY (id_course) REFERENCES COURSES(id_course)
    );
sql2;

    //Create tables
    $db->query($table1);
    $db->query($table2);

    $courses = <<<sql
        
    INSERT INTO COURSES VALUES (NULL, 'GitHub');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 1, 'https://www.mediafire.com/file/n6h3s8opqn6m3hp/CursoDeGit_parte1.mp4/file', '');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 1, 'https://www.mediafire.com/file/5qzdlg8twczu9yk/CursoDeGit_parte2.mp4/file', '');
    
    
    
    
    INSERT INTO COURSES VALUES (NULL, 'Asincronismo_Oscar_Naipes');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 2, 'https://www.mediafire.com/file/2p7x1wuexvwbm9d/c_CursoDeASincronismo_JS_Osc4rB4r4j4s.mp4/file', '');
    
    
    
    INSERT INTO COURSES VALUES (NULL, 'V8_JavaScript');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 3, 'https://www.mediafire.com/file/8bxjiuubqt4e5bs/CursoDe_V8_JS.mp4/file', '');
    
    
    
    INSERT INTO COURSES VALUES (NULL, 'Curso_Profesional_JS');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 4, 'https://www.mediafire.com/file/e4x4zutpv3z5kix/comp_Curso_JS_pro_Parte_1.mp4/file', '');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 4, 'https://www.mediafire.com/file/fkz8c4tg3301y71/comp_CursoProfesional_JS_Parte2.mp4/file', '');
    
    
    
    
    INSERT INTO COURSES VALUES (NULL, 'PHP_API_rest');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 5, 'https://www.mediafire.com/file/jg0ltdrox5fkpjr/comp_Curso_Api_Rest_PHP_MauroChoj.mp4/file', '');
    
    
    
    INSERT INTO COURSES VALUES (NULL, 'React');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 6, 'https://www.mediafire.com/file/iq6h5b8yvbzq6az/comp_Curso_React_Parte_1.mp4/file', '');
    INSERT INTO COURSE_PARTS  VALUES (NULL, 6, 'https://www.mediafire.com/file/ih3bsmi0fdb0v3z/c_React_Parte2.mp4/file', '');
sql;

    
    $count = $db->querySingle("SELECT COUNT(*) as count FROM COURSES");
    
    if($count != 0){
        
        $courses = array();
        
        $result = $db->query("SELECT * FROM COURSES JOIN COURSE_PARTS USING(id_course)");
        
        $id_part = 0;
        $last_id_course = 1;
        $course = "";
        $course_parts = [];
        
        while ($row = $result->fetchArray()) {
            
            
            $id_course = $row["id_course"];
            $course = $row["course"];
            $url = stripslashes($row["url"]);
            
            if(!$courses[$course]){
                $courses[$course] = array();
            }
            array_push($courses[$course], array("url" =>  $url, "current_time" => $row["current_time"], "id_course_part" => $row["id_course_part"]));
            
            
            /*
            if($id_course == $last_id_course){
                $id_part++;
            }
            else{
                $courses[] = [$course => $course_parts];
                $course_parts = [];
                $id_part = 1;
                $last_id_course = $id_course;
            }
            $course = $row["course"];
            $course_parts[] = ["Part_$id_part" => ["url" => $row["url"], "current_time" => $row["current_time"]]];
            */
            //print_r("<pre>".$row["id_course"]." => ".$row["course"]."</pre><br>");
        }
        //$courses[] = $course_parts;
        //$courses[] = [$course => $course_parts];
    }
    else{
        $db->query($courses);
    }

    $courses_list = json_encode($courses, JSON_UNESCAPED_SLASHES);


    
    $db->close();









/*
$db = new SQLite3('db/test.db');

$db->exec("CREATE TABLE cars(id INTEGER PRIMARY KEY, name TEXT, price INT)");
$db->exec("INSERT INTO cars(name, price) VALUES('Audi', 52642)");
$db->exec("INSERT INTO cars(name, price) VALUES('Mercedes', 57127)");
$db->exec("INSERT INTO cars(name, price) VALUES('Skoda', 9000)");
$db->exec("INSERT INTO cars(name, price) VALUES('Volvo', 29000)");
$db->exec("INSERT INTO cars(name, price) VALUES('Bentley', 350000)");
$db->exec("INSERT INTO cars(name, price) VALUES('Citroen', 21000)");
$db->exec("INSERT INTO cars(name, price) VALUES('Hummer', 41400)");
$db->exec("INSERT INTO cars(name, price) VALUES('Volkswagen', 21600)");
*/
?>