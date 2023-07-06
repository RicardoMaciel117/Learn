CREATE TABLE COURSES(
    id_course INT NOT NULL AUTO_INCREMENT,
    course VARCHAR(200),
    PRIMARY KEY(id_course)
)ENGINE=INNODB;


CREATE TABLE COURSE_PARTS(
    id_course_part INT NOT NULL AUTO_INCREMENT,
    id_course INT NOT NULL,
    url TEXT,
    current_time VARCHAR(15),
    PRIMARY KEY (id_course_part),
    FOREIGN KEY (id_course) REFERENCES COURSES(id_course)
);

INSERT INTO COURSES VALUES (NULL, 'GitHub');
INSERT INTO COURSES_PARTS  VALUES (NULL, 1, 'https://www.mediafire.com/file/n6h3s8opqn6m3hp/CursoDeGit_parte1.mp4/file', '');
INSERT INTO COURSES_PARTS  VALUES (NULL, 1, 'https://www.mediafire.com/file/5qzdlg8twczu9yk/CursoDeGit_parte2.mp4/file', '');




INSERT INTO COURSES VALUES (NULL, 'Asincronismo_Oscar_Naipes');
INSERT INTO COURSES_PARTS  VALUES (NULL, 2, 'https://www.mediafire.com/file/2p7x1wuexvwbm9d/c_CursoDeASincronismo_JS_Osc4rB4r4j4s.mp4/file', '');



INSERT INTO COURSES VALUES (NULL, 'V8_JavaScript');
INSERT INTO COURSES_PARTS  VALUES (NULL, 3, 'https://www.mediafire.com/file/8bxjiuubqt4e5bs/CursoDe_V8_JS.mp4/file', '');



INSERT INTO COURSES VALUES (NULL, 'Curso_Profesional_JS');
INSERT INTO COURSES_PARTS  VALUES (NULL, 4, 'https://www.mediafire.com/file/e4x4zutpv3z5kix/comp_Curso_JS_pro_Parte_1.mp4/file', '');
INSERT INTO COURSES_PARTS  VALUES (NULL, 4, 'https://www.mediafire.com/file/fkz8c4tg3301y71/comp_CursoProfesional_JS_Parte2.mp4/file', '');




INSERT INTO COURSES VALUES (NULL, 'PHP_API_rest');
INSERT INTO COURSES_PARTS  VALUES (NULL, 5, 'https://www.mediafire.com/file/jg0ltdrox5fkpjr/comp_Curso_Api_Rest_PHP_MauroChoj.mp4/file', '');



INSERT INTO COURSES VALUES (NULL, 'React');
INSERT INTO COURSES_PARTS  VALUES (NULL, 6, 'https://www.mediafire.com/file/iq6h5b8yvbzq6az/comp_Curso_React_Parte_1.mp4/file', '');
INSERT INTO COURSES_PARTS  VALUES (NULL, 6, 'https://www.mediafire.com/file/ih3bsmi0fdb0v3z/c_React_Parte2.mp4/file', '');