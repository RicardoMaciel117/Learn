<?php


include 'sqlite.php';

/*
Mediafire accounts

edgarmaciel@protonmail.com
_Moto_7    -> Completala cabezón

ricardomaciel@protonmail.com
_Moto_7    -> Completala cabezón

JS Hola mundo:
https://www.mediafire.com/file/yj26hoom02phuw7/CursoJS_HolaMundo.mp4/file

*/

?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />

        <title></title>
        <script src="assets/js/jquery.js"></script>
        <!--link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
        <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script-->
        
        <style>
            
            .right-menu{
                border: solid;
                position: fixed;
                left: 98%;
                top: 0px;
                height: calc(99% + 3px);
                width: 300px;
                background: #2b2b2b;
                -webkit-transition-duration:0.4s;
                z-index: 999;
                overflow: scroll;
            }
            
            .right-menu:hover{
                
                left: calc(99% - 290px);
            }
            
            .course-container{
                text-align: center;
                border: solid 2px rgba(0, 124, 240, 0.5);
                border-radius: 3px;
                margin: 3px;
                margin-bottom: 7px;
                background: #3b3b3b;
                padding: 2px;
            }
            
            .label-course{
                padding: 5px;
                
                font-weight: bold;
                text-shadow: 0 0 15px #00FF88;
                color: #00FF88;
                font-size: 22px;
                background: #212121;
            }
            
            .parts-container{
                padding: 3px;
            }
            
            .btn-part{
                background: #007BF0;
                color: white;
                font-weight: bold;
                font-size: 19px;
                border: solid 3px rgba(0, 124, 240, 0.3);
                border-radius: 2px;
                cursor: pointer;
                
            }
            
            .btn-part:hover{
                text-shadow: 0px 0px 1px black;
                box-shadow: 0px 0px 3px 2px blue;
            }
            
            .video-js .vjs-time-control{display:block;}
            .video-js .vjs-remaining-time{display: none;}
            
            #course-video{
                width: 98%;
                height: 97vh;
                border: solid;
                background: #2b2b2b;
            }
            
            .btn-hide{
                width: 99%;
                font-weight: bold;
                margin: 5px;
                background: blueviolet;
                color: white;
                padding: 3px;
                cursor: pointer;
            }
            
            .right-menu-btn{
                position: fixed;
                right: 2%;
                top: 0px;
                background: blueviolet;
                font-weight: bold;
                font-size: 40px;
                color: white;
                border-radius: 2px;
                cursor: pointer;
                padding: 5px;
            }
            
            .right-menu-btn:hover{
                text-shadow: 0 0 3px black;
            }
            
            .top-controls{
              position: fixed;
              top: -50px;
              left: calc(50% - 106px);
              z-index: 9999;
              -webkit-transition-duration:0.4s;
            }
            
            tr{
              text-align: center;
            }
            
          /*Start modal styles*/
          
          /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100vh; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  overflow: hidden;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 9% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 340px; /* Could be more or less, depending on screen size */
  max-height: 85vh;
  font-family: Sans-Serif;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.more-info{
  text-align: center;
  max-width: 300px;
  border: solid;
  padding: 20px;
  background: #ebebeb;
}

.examples-container{
  display: block;
  
}

/*Carrousel*/
.carousel-container {
  width: 100%;
  overflow: hidden;
  position: relative;
  height: 250px;
}

.carousel-slide {
  display: none;
  text-align: center;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
}

.carousel-slide img {
  max-width: 100%;
  height: auto;
}

.active {
  display: block;
}

.carousel-control {
  position: absolute;
  top: 30%;
  transform: translateY(-40%);
  font-size: 30px;
  cursor: pointer;
  z-index: 1;
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
}

.carousel-control:hover {
  text-shadow: 0 0 6px;
}

.prev {
  left: 30%;
}

.next {
  right: 30%;
}

/*End Modal styles *>
            
            
        </style>
        
        
    </head>
    <body>
        
        <div id="top_controls" class="top-controls">
          <table>
            <tbody>
              <tr>
                <td style="background: #2b2b2b; border: 2px solid white; padding: 5px; border-radius: 3px;">
                  <button id="myBtn" class="btn-part">&#10133;&nbsp; New</button>
                  <button onclick="saveCurrentTime();" class="btn-part">	&#128190; &nbsp; Save</button>
                </td>
              </tr>
              <tr style="">
                <td>
                  <button id="btn_toogler" class="btn-part" style="border-radius: 0px 0px 7px 7px;">⇣</button>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
        
        <div id="video_html">
            <video
                id="course-video"
                class="video-js"
                controls
                preload="auto"
                data-setup='{ "playbackRates": [0.5, 0.75, 1, 1.25, 1.5, 1.75, 2] }'
            >
                <source id="src_vid" src="http://supercontrol.atspace.cc/mini-up/uploads/loading.mp4" type="video/mp4" />
            </video>
        </div>
        
        <div onclick="show_courses_list();" class="right-menu-btn">➲</div>
        <div id="courses_list" class="right-menu"></div>
        
        
        
        <div id="myModal" class="modal">
          <div class="modal-content">
            <span class="close">&times;</span>
            <br>
            <div>&nbsp;</div>
            <div class="more-info">
              <form id="new_course">
                <table>
                  <tbody>
                    <tr>
                      <td><label>Curso</label></td>
                      <td>
                        <input type="text" id="course_name" name="course_name" placeholder="Curso"/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>JSON Parts</label></td>
                      <td>
                        <textarea></textarea>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        
                      </td>
                      <td>
                        <button class="btn-part">Cancelar</button>
                        <button class="btn-part">Guardar</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
                  
              </form>
            </div>
            
          </div>
        </div>
        
        <!--video src="https://download2344.mediafire.com/5msv16kud3pg2Yli3JskJizoZkR98hbxjNRWe0xlnKtIsy-jSqH2fvmQNaNCoWTxD0S1MZywYvBHcPWb7E-NWRkeuFKOMA/5qzdlg8twczu9yk/CursoDeGit_parte2.mp4" height="" ></video-->
        <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
        
        <script>
            
            const cursos = JSON.parse(`<?php echo $courses_list; ?>`);
            
            let current_id_course_part = 0;
            
            var video_speed_rate = 1;
            
            function render_courses(){
                
                const html_courses = [`<button onclick="hide_coruse_list();" class="btn-hide">Hide</button>`];
                
                for(course of Object.keys(cursos)){
                    
                    html_courses.push(`
                    <div class="course-container"> 
                        <div class="label-course"> ${course} </div>
                        <div class="parts-container">
                    `);
                    
                    let part_ind = 0;
                    
                    for(part of cursos[course]){
                        part_ind++;
                        const link = part["url"];
                        const id_course_part = part["id_course_part"];
                        const current_time = part["current_time"];
                        
                        if(link){
                            html_courses.push(`
                            <button class="btn-part" onclick="load_video('${link}', ${id_course_part}, '${course} Parte_${(part_ind)}', ${current_time})">Parte_${(part_ind)}</button>
                        `);
                        }

                    }
                    html_courses.push(`</div></div>`);
                    
                }
                
                $("#courses_list").html(html_courses.join(""));
            }
            
            
            window.onload = function(){
                render_courses();
            }
            
        </script>
        
        <script>
            
            function load_video(video, id_course_part, title_course, current_time){
                
                const url = "https://www.nutritionalindexts.com/nik/libs/example/mediafire_lnk.php";
                const vid = window.btoa(video);
                
                current_id_course_part = id_course_part;
                
                document.title = title_course;
                
                $.ajax({                        
                    url: url,
                    type: "POST", 
                    data: "url="+vid,
                    beforeSend: function(){
                        console.log("Porcesando");
                    },
                    success: function(data){
            			//$("#aquiPonLosEtqs").html(data);
                        
                        render_video(data.trim(), current_time);
                    }
                });
                
            }
            
            function render_video(link, current_time){
                
                var player = videojs(document.querySelector('.video-js'));
                player.src({
                    src: link,
                    type: 'video/mp4'/*video type*/
                });
                
                if(current_time){
                  player.currentTime(current_time);
                }
                
                player.play();
                
                /*
                console.log(link);
                var player = document.querySelector('#course-video');
                document.querySelector('#src_vid').src = link;
                player.src = link;
                
                player.play();
                */
            }
            
            function hide_coruse_list(){
                $("#courses_list").css("left", "98%");
            }
            
            function show_courses_list(){
                $("#courses_list").css("left", "calc(99% - 290px)");
            }
            
            function backward(){
                var video = videojs(document.querySelector('.video-js'));
                video.currentTime(video.currentTime() - 5);
            }
            
            function forward(){
                var video = videojs(document.querySelector('.video-js'));
                video.currentTime(video.currentTime() + 5);
            }
            
            function faster(){
                var video = videojs(document.querySelector('.video-js'));
                video_speed_rate += 0.25;
                video.playbackRate(video_speed_rate);
            }
            
            function slow(){
                var video = videojs(document.querySelector('.video-js'));
                video_speed_rate -= 0.25;
                video.playbackRate(video_speed_rate);
                
            }
            
            function saveCurrentTime(){
              
              var player = videojs(document.querySelector('.video-js'));
              player.pause();
              var videoCurrentTime = videojs(document.querySelector('.video-js')).currentTime();
              //alert("Saving: "+current_id_course_part+" => "+videoCurrentTime);
              
              
              $.ajax({
                url: 'saveCurrentTime.php',
                type: "POST", 
                data: {"id_course_part" : current_id_course_part, "current_time" : videoCurrentTime},
                beforeSend: function(){
                    console.log("Porcesando");
                },
                success: function(data){
        			//$("#aquiPonLosEtqs").html(data);
                  alert(data);
                  //render_video(data.trim());
                }
              });
            }
            
            document.addEventListener("keydown",(e)=>{
                if(e.keyCode==37){       //left arrow
                    backward();
                }else if(e.keyCode==39){ //right arrow
                    forward();
                }
                else if(e.keyCode == 38){
                    faster();
                }
                else if(e.keyCode==40){
                    slow();
                }
                else if(e.ctrlKey && String.fromCharCode(e.keyCode) == 'S'){
                  e.preventDefault();
                  saveCurrentTime();
             	    return false;
                }
                
              }
            );
            
            document.querySelector("#btn_toogler").addEventListener('click', function(){
              
              const topControls = document.querySelector("#top_controls");
              topControls.style.top = this.textContent == "⇡" ? "-50px" : "0px";
              
              this.textContent = this.textContent == "⇡" ? "⇣": "⇡";
              
            });
            
            
            //https://videojs.com/guides/options/#useractionshotkeys
            //https://videojs.com/guides/options/
            //https://stackoverflow.com/questions/40444526/video-js-changing-source-but-does-not-show-new-source
            
        </script>
        
        <script>
          //Modal js
          // Get the modal
let modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
          
          
        </script>
        
    </body>
</html>