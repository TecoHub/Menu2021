<?php

header('Content-Type: text/html; charset=utf-8');

session_start();
include 'common/inc.common.php';

$sql="select * from discount where active=1";
 $disarr = $Cobj->union($sql);

//sited down
//header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
//header("Cache-Control: post-check=0, pre-check=0", false);
//header("Pragma: no-cache");

?>

<!DOCTYPE html>
<html lang="ja-jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    
    <meta name="theme-color" content="#c9ad86">
    <meta name="msapplication-navbutton-color" content="#c9ad86">
    <meta name="apple-mobile-web-app-status-bar-style" content="#c9ad86">

    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">

    <link rel="icon" href="images/top-icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <!-- jQuery library -->
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <!-- Latest compiled JavaScript -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <title>Menu</title>



</head>  

<body style="background-color: #e3d3bf;">
  <div class="containerPlus2">
       <img style="width:384px;height:auto;"  src="images/cutout/top-mid-menu.png" usemap="#image-map">


            <map name="image-map" style="cursor: pointer; ">
<!----------------------------------Top Menu------------------------------------->

                           <!--guest name and room number-->
                           <div class="top-left-room"><p>381</p></div>
                           <div class="top-left-guest"><p>MADIH EL MEHDI</p></div>
                           
                           <!--Change User-->
                           <area target="" alt="" title="" href="login.php" coords="220,10,281,62" shape="rect">

                           <!--Home-->
                           <area target="" alt="" title="" href="menu01.php" coords="285,10,329,62" shape="rect">

                           <!--History-->
                           <area target="" alt="" title="" href="order01.php" coords="334,10,378,62" shape="rect">

<!----------------------------------- Mid-Top Menu ------------------------------->

                            <!-- オリジナルボトル -->
                            <area target="" alt="" title="" class="tablinks" onclick="openCity(event, 'menu01')" coords="128,156,3,74" shape="rect" >

　　　　　　　　　　　　　　　　<!-- 日本酒　。焼酎 -->
                            <area target="" alt="" title="" class="tablinks" onclick="openCity(event, 'menu02')" coords="255,156,130,74" shape="rect">

                            <!--ビール　。ウイスキー　-->
                            <area target="" alt="" title="" class="tablinks" onclick="openCity(event, 'menu03')" coords="383,156,258,74" shape="rect">

                          

　　　　　　　　　　　　　　　<!-- サワー　。　果実酒　-->
                            <area target="" alt="" title="" class="tablinks" onclick="openCity(event, 'menu04')" coords="128,240,3,158" shape="rect">

                            <!--ワイン-->
                            <area target="" alt="" title="" class="tablinks" onclick="openCity(event, 'menu05')" coords="255,240,130,158" shape="rect">

                            <!--ソフトドリンク-->
                            <area target="" alt="" title="" class="tablinks" onclick="openCity(event, 'menu06')" coords="383,240,258,158" shape="rect">


           </map> 

<!-- Button trigger modal -->


<!-- Modal 1-->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: #e3d3bf;">
      <div class="modal-header">
        <h5 class="modal-title">1</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
            <div class="modal-body">
              Body
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal 2-->
<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">2</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
            <div class="modal-body">
              Body
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!----------------------------------Menu Items--------------------------------->

      <!-- オリジナルボトル -->
        <div id="menu01" class="tabcontent" >
            <img style="width: 384px; height:auto;" src="images/cutout/Menu01.png" alt="" usemap="#m01">
                        <map name="m01" style="cursor: pointer;">
                                    <area target="" alt="" title="" href="" data-toggle="modal" data-target="#modelId" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" data-toggle="modal" data-target="#modelId1"coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>
        </div>


      <!-- 日本酒　。焼酎 -->
        <div id="menu02" class="tabcontent" style="display: none;">
           <img style="width: 384px; height:auto;" src="images/cutout/Menu02.png" alt="" usemap="#m02">
           <map name="m02" style="cursor: pointer; ">
                                                                        <!--coords="left,down,right,up"-->
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1460,44,1280" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1667,44,1477" shape="rect"> 
                                    <area target="" alt="" title="" href="" coords="340,1870,44,1680" shape="rect">
                        </map>
        </div>
        

      <!--ビール　。ウイスキー　-->  
        <div id="menu03" class="tabcontent" style="display: none;">
           <img style="width: 384px; height:auto" src="images/cutout/Menu03.png" alt="" usemap="#m03">
           <map name="m03" style="cursor: pointer; ">
                                    <area target="" alt="" title="" href="" coords="340,537,44,370" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,734,44,559" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,926,44,757" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1210,44,1014" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1458,44,1236" shape="rect">
                        </map>

        </div>


      <!-- サワー　。　果実酒　-->
        <div id="menu04" class="tabcontent" style="display: none;">
           <img style="width: 384px; height:auto" src="images/cutout/Menu04.png" alt="" usemap="#m04">
           <map name="m04" style="cursor: pointer; ">
                                    <area target="" alt="" title="" href="" coords="340,480,44,313" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,660,44,500" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,930,44,750" shape="rect">
                        </map>

        </div>


      <!--ワイン-->
        <div id="menu05" class="tabcontent" style="display: none;">
           <img style="width: 384px; height:auto" src="images/cutout/Menu05.png" alt="" usemap="#m05">
           <map name="m05" style="cursor: pointer; ">
                                    <area target="" alt="" title="" href="" coords="340,586,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,796,44,605" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1050,44,830" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1300,44,1091" shape="rect">        
                        </map>      
        </div>


      <!--ソフトドリンク-->
        <div id="menu06" class="tabcontent" style="display: none;">
           <img style="width: 384px; height:auto" src="images/cutout/Menu06.png" alt="" usemap="#m06">
           <map name="m06" style="cursor: pointer; ">
                                    <area target="" alt="" title="" href="" coords="340,513,44,340" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,710,44,535" shape="rect">
                        </map>
        </div>

  </div>
         <script src="js/main.js"></script>
</body>   
</html>
    