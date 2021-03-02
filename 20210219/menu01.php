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
          <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
    <!-- jQuery library -->
          <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Popper JS -->
          <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <!-- Latest compiled JavaScript -->
          <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
    <title>Menu</title>

    <script>
    
    $(".yellow").on("click", function(e){
  e.preventDefault();
  alert('test');
});

</script>

</head>  

<body>
  <div class="containerPlus2">
      
<!--style="width:384px; height:2253px; "--->
       <img style="width:384px;height:auto "  src="images/cutout/top-mid-menu.png" usemap="#image-map">

            <map name="image-map" style="cursor: pointer; outline:none">


<!-------Top Menu--------->
                           <!--guest name and room number-->
                           <area target="" alt="" title="" href="" coords="64,32,191,60" shape="rect" >
                           <div class="top-left-room"><p>381</p></div>
                           <div class="top-left-guest"><p>MADIH EL MEHDI</p></div>
                           
                           <!--Change User-->
                           <area target="" alt="" title="" href="login.php" coords="220,10,281,62" shape="rect">

                           <!--Home-->
                           <area target="" alt="" title="" href="menu01.php" coords="285,10,329,62" shape="rect">

                           <!--History-->
                           <area target="" alt="" title="" href="order01.php" coords="334,10,378,62" shape="rect">



<!---- Mid-Top Menu ----->

                            <!-- オリジナルボトル -->
                            <area target="" alt="" title=""  class="tablinks" onclick="openCity(event, 'menu01')" coords="128,156,3,74" shape="rect" >

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


        <div id="menu01" class="tabcontent" >
            <img style="width: 380px; height:1509px" src="images/cutout/Menu01.png" alt="" usemap="#m01">
                        <map name="m01" style="cursor: pointer; outline:none">
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>

        </div>

        <div id="menu02" class="tabcontent" style="display: none;">
           <img style="width: 380px; height:1990px" src="images/cutout/Menu02.png" alt="" usemap="#m02">
           <map name="m02" style="cursor: pointer; outline:none">
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>
        </div>
        
        <div id="menu03" class="tabcontent" style="display: none;">
           <img style="width: 380px; height:1509px" src="images/cutout/Menu03.png" alt="" usemap="#m03">
           <map name="m03" style="cursor: pointer; outline:none">
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>

        </div>

        <div id="menu04" class="tabcontent" style="display: none;">
           <img style="width: 380px; height:1010px" src="images/cutout/Menu04.png" alt="" usemap="#m04">
           <map name="m04" style="cursor: pointer; outline:none">
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>

        </div>

        <div id="menu05" class="tabcontent" style="display: none;">
           <img style="width: 380px; height:1509px" src="images/cutout/Menu05.png" alt="" usemap="#m05">
           <map name="m05" style="cursor: pointer; outline:none">
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>

        </div>

        <div id="menu06" class="tabcontent" style="display: none;">
           <img style="width: 380px; height:800px" src="images/cutout/Menu06.png" alt="" usemap="#m06">
           <map name="m06" style="cursor: pointer; outline:none">
                                    <area target="" alt="" title="" href="" coords="340,570,44,380" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,778,44,589" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,986,44,800" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1190,44,1001" shape="rect">
                                    <area target="" alt="" title="" href="" coords="340,1410,44,1210" shape="rect">
                        </map>

        </div>
        



 <!---------Drinks-------->               

                            <!-- 日本酒 -->
                            <area target="" alt="" title="" href="" coords="340,814,44,589" shape="rect">
                            <area target="" alt="" title="" href="" coords="340,1022,44,823" shape="rect">
                            <area target="" alt="" title="" href="" coords="340,1232,44,1033" shape="rect">
                            <area target="" alt="" title="" href="" coords="340,1440,44,1241" shape="rect">

                            <!-- 焼酎 -->
                            <area target="" alt="" title="" href="" coords="340,1707,44,1523" shape="rect">
                            <area target="" alt="" title="" href="" coords="340,1914,44,1717" shape="rect">
                            <area target="" alt="" title="" href="" coords="340,2123,44,1926" shape="rect">


           

  </div>
  <script src="js/main.js"></script>
</body>   
</html>
    