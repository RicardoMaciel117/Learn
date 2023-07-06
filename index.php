<?php


include 'sqlite.php';

/*
Mediafire accounts

edgarmaciel@protonmail.com
_Moto_7    -> Completala cabezón

ricardomaciel@protonmail.com
_Moto_7    -> Completala cabezón

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
            
        </style>
        
        
    </head>
    <body>
        
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
        
        
        <!--video src="https://download2344.mediafire.com/5msv16kud3pg2Yli3JskJizoZkR98hbxjNRWe0xlnKtIsy-jSqH2fvmQNaNCoWTxD0S1MZywYvBHcPWb7E-NWRkeuFKOMA/5qzdlg8twczu9yk/CursoDeGit_parte2.mp4" height="" ></video-->
        <script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
        
        <script>
            
            const cursos = JSON.parse(`<?php echo $courses_list; ?>`);
            
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
                        
                        if(link){
                            html_courses.push(`
                            <button class="btn-part" onclick="load_video('${link}')">Parte_${(part_ind)}</button>
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
            
            function load_video(video){
                
                //const url = "http://supercontrol.atspace.cc/api_mediafire_link.php";
                
                const url = "https://www.nutritionalindexts.com/nik/libs/example/mediafire_lnk.php";
                
                const vid = window.btoa(video);
                
                
                $.ajax({                        
                    url: url,
                    type: "POST", 
                    data: "url="+vid,
                    beforeSend: function(){
                        console.log("Porcesando");
                    },
                    success: function(data){
            			//$("#aquiPonLosEtqs").html(data);
                        
                        render_video(data.trim());
                    }
                });
                
            }
            
            function render_video(link){
                
                var player = videojs(document.querySelector('.video-js'));
                player.src({
                    src: link,
                    type: 'video/mp4'/*video type*/
                });
                
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
              }
            );
            
            //https://videojs.com/guides/options/#useractionshotkeys
            //https://videojs.com/guides/options/
            //https://stackoverflow.com/questions/40444526/video-js-changing-source-but-does-not-show-new-source
            
        </script>
        
    </body>
</html>