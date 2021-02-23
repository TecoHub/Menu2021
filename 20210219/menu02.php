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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    

    <title>Menu</title>
</head>  

<body>
  <div class="containerPlus2">
      

       <img style="width:384px; height:2253px; " src="images/cutout/fullmenu02.png" usemap="#image-map">

            <map name="image-map" style="cursor: pointer; outline:none">

                <!--Top Menu-->
                           <!--Change User-->
                           <area target="" alt="" title="" href="login.php" coords="220,10,281,62" shape="rect">

                           <!--Home-->
                           <area target="" alt="" title="" href="menu01.php" coords="285,10,329,62" shape="rect">

                           <!--History-->
                           <area target="" alt="" title="" href="order01.php" coords="334,10,378,62" shape="rect">



                <!-- Mid-Top Menu -->
                            <!-- オリジナルボトル -->
                            <area target="" alt="" title="" href="menu01.php"  coords="128,156,3,74" shape="rect">
　　　　　　　　　　　　　　　　<!-- 日本酒　。焼酎 -->
                            <area target="" alt="" title="" href="menu02.php" coords="255,156,130,74" shape="rect">

                            <!--ビール　。ウイスキー　-->
                            <area target="" alt="" title="" href="" coords="383,156,258,74" shape="rect">

                          

　　　　　　　　　　　　　　　<!-- サワー　。　果実酒　-->
                            <area target="" alt="" title="" href="" coords="128,240,3,158" shape="rect">

                            <!--ワイン-->
                            <area target="" alt="" title="" href="" coords="255,240,130,158" shape="rect">

                            <!--ソフトドリンク-->
                            <area target="" alt="" title="" href="" coords="383,240,258,158" shape="rect">




                <!-- 日本酒 -->
                <area target="" alt="" title="" href="" coords="340,814,44,589" shape="rect">
                <area target="" alt="" title="" href="" coords="340,1022,44,823" shape="rect">
                <area target="" alt="" title="" href="" coords="340,1232,44,1033" shape="rect">
                <area target="" alt="" title="" href="" coords="340,1440,44,1241" shape="rect">

                <!-- 焼酎 -->
                <area target="" alt="" title="" href="" coords="340,1707,44,1523" shape="rect">
                <area target="" alt="" title="" href="" coords="340,1914,44,1717" shape="rect">
                <area target="" alt="" title="" href="" coords="340,2123,44,1926" shape="rect">
            </map> 


  </div>
</body>       