<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
include 'common/inc.common.php';
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

    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="images/top-icon.png">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Menu</title>
</head>

<body class="history-p"> 

    <a class="button1 button1-color" style="float: left; border-radius:8px"  href="javascript:javascript:history.go(-1)"> <img src="images/back.png" alt=""> Menu</a> <br><br>
                <div class="h2title">
                    <h2>注文済一覧</h2>
                </div>

            <div class="container">    
                        <div id="Menu1">
         <?php
                $tableno=$_SESSION['tableno'];
                $roomno=$_SESSION['roomno'];
                $guestname=$_SESSION['guestname'];
                    //to spererate rooms number
                $pieces = explode("," , $roomno);
                $namepieces = explode("," , $guestname);

                
                    //guest need to select room number if multiple //nothing displayed if single 
                    if ($pieces[1]==true) {
                    echo "<select  required style='float: right;' class='order-buttons' name='selectroom' id='selectroom' >"; 
                    echo "<option value='' disabled selected hidden></option>";
                    foreach ($pieces as $roomnumselected) {
                    echo "<option value='". $roomnumselected ."' required>" . $roomnumselected . "</option>";
                    }
                    echo "</select><span style='float: right;'> <h3></h3> お部屋番号：</span>";
                    } else {
                    echo "<input type='text' id='selectroom' name='selectroom' value='".$pieces[0]."' hidden>";
                    }

        ?>

                                                <div>
                                                    <?php
                                                            //guest need to select room name if multiple //nothing displayed if single 
                                                            if ($namepieces[1]==true) {
                                                            echo "<select  required style='float: right;' class='order-buttons' name='selectguest' id='selectguest'>"; 
                                                            echo "<option value='' disabled selected hidden></option>";
                                                            foreach ($namepieces as $guestselected) {
                                                            echo "<option value='". $guestselected ."' required>" . $guestselected . "</option>";
                                                            }
                                                            echo "</select><span style='float: right;'> <h3></h3> お客様のお名前</span>";
                                                            } else {
                                                            echo "<input type='text' name='selectguest' value='".$namepieces[0]."' hidden>";
                                                            }

                                                    ?>
                                                </div>

                                                
        
                                                <?php


                            if(isset($_REQUEST['ord'])){
                                $ord=$_REQUEST['ord'];
                                $sql = "SELECT * FROM MenuNagisa.confirmedorders where or_order_id='$ord' order by or_order_id DESC";
                                                
                            }else{
                                $namex=$_SESSION['guestname'];
                                $sql = "SELECT * FROM MenuNagisa.confirmedorders where guestname='$namex' order by or_order_id DESC";
                            }
                                                            $result = $conn->query($sql);
                                        $tot=0;
                                                            if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            
                                                            while($row = $result->fetch_assoc()) {
                                                                $rate=$row["productprice"]*$row["productquantity"];
                                                                $tot=$tot+$rate;
                                                            echo "<div class='list4 hide".$row["roomno"]."' > " . $row["productname"] . "  <span class='price1'> ". $row["productprice"] . "円 </span><br> <div class='qty'> 量: ". $row["productquantity"] . "<br>  小計: ". $rate . "円 </div> </div> ";
                                                                                                                            
                                                            //check if there is product image and display it
                                                                    if( $row["productimage"] == !null) { 
                                                                        echo "<img src='images/" . $row["productimage"] . "' alt='image'>";} else {}
                                                                        }
                                                            } else {
                                                            echo "<div class='defaultmessage'>該当結果が見つかりませんでした</div>";
                                                            } ?>
                                                    </div>
                       <p id="tot" style="font-size: 25px; margin-top: 30px; color:black; background-color:#c9ad86"> 合計  ¥<span class="total-carts"> <?php  echo number_format($tot) ;?></span> <span style="float: right;">(税別)</span></p>

            </div>  

    <div class="bottomfooter">
        <span style="color: #bfbfbf;"> ® <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Yunokawa Prince Hotel Nagisatei • All Rights Reserved</span>
    </div> 
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------->


            <script src="js/main.js"></script> 
			<script>
	$('#selectroom').change(function() {
	//alert();
	    $('.list4').hide();
			    $('#tot').hide();


      $('.list4.hide' + $(this).val()).show();
});
	</script>
</body>
</html>