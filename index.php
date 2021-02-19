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
  <?php 
        $r=$_GET['r'];

                $api = "http://rest.yunokawapn.co.jp/res_t/get_dec.pl?r=$r";
                $request = curl_init($api); // initiate curl object
                curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
                curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
                //curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment if you get no gateway response using HTTPS
                curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($request, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
                $response = (string)curl_exec($request); // execute curl fetch and store results in $response

                curl_close($request); // close curl object

                $result = json_decode($response, true); // true turns it into an array
                //print $result; //to check variables
                list($tableno, $roomno, $guestname) = explode(":" , $response);      
  ?>           
      
<?php
	$sql="select distinct category from drinks";
	$colarr = $Cobj->union($sql);
	//print_r($colarr);
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
    <script src="script.js"></script>


     <script>
            function myFunction(id) {
            //alert(id);
            var dots = document.getElementById("dots"+id);
            var moreText = document.getElementById("more"+id);
            var btnText = document.getElementById("myBtn"+id);

            if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "もっと見る"; 
            moreText.style.display = "none";
            } else {
            dots.style.display = "none";
            btnText.innerHTML = "もっと少なく見る"; 
            moreText.style.display = "inline";
            }
            }
</script>
<script type='text/javascript'>
         $(document).ready(function() {
		
			 
            //option A
            $("#cartform").submit(function(e){

			   var ver="";
                e.preventDefault(e);
							$('#loading').show();

$.ajax({
				url: "addorderInfo.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,  
				success: handleResult
			});

				
            });
        });
		
		function handleResult(data){
			
			$( "#clearcart" ).click();
           alert("ご注文を承りました\n サービスをご利用いただきありがとうございます。");
	 //header('Location: orderhistory.php');
	 
			window.location.href = 'orderhistory.php?ord='+data;
        }
        
		function setAlbum(album) {  
        $('.right_nav').each(function() {
             if ( $(this).id != album )
                   $(this).hide();
      });
      $('#' + album).show();
		}
		
	 function callmenu(ev=''){
   	//var van_no=$("#van").val();
	//alert(ev);
                    $.ajax({
                    type: "POST",
                    url: "fetch_pro.php",
                    data: "mnu="+ev,
                    cache: false,
                    //beforeSend: function () {
                    //$('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
                    //},
                    success: function(html) {   
                    //alert(html); 
                    $("#Menu1").html( html );
					 
					//myFunc();
                    // $("#Menu1").append(html);
                    //  $('button').live('click',buttonClickEvent);
                    }
});
}
	
function callcart(id,cd1,cd2) {
 event.preventDefault();
  var name = $("#"+id).data('name');
 var price = Number($("#"+id).data('price'));
  shoppingCart.addItemToCart(name, price,1,cd1,cd2);
  displayCart();
}
//alert();
</script>

    <title>Menu</title>
</head>

<body>
    <div class="mainmenu" >
        <div class="shade" id="panel">
                    <div class="name1">
                    <span style="color: #c9ad86;"> <?php echo $response ?> </span>    
                    						<input type="text" name="discper" id="discper" hidden readonly value="<?php echo $disarr[0]['disc_per'];?>">
											<input type="text" name="finaltot" id="finaltot" readonly="" value="" hidden> 
                                                <?php
                                                
                                                    $_SESSION['guestname']=$guestname;
                                                    $_SESSION['tableno']=$tableno;
                                                    $_SESSION['roomno']= $roomno;
                                                
                                                ?>

                    </div>
                    
            <div class="blackboard">
                        <a class="button1 button1-color" href="orderhistory.php">注文済一覧 <img style="height: 24px; width:21px" src="images/drinks-bottles.png" alt=""></a>
                        <button class="button2 button1-color" onclick="location.href='checkout_cart.php';"> <img style="height: 24px; width:21px" src="images/shopping-cartm.png" alt=""> カート (<span class="total-count"></span>)  </button> <br>
                    <div class="container">

                                <div class="drink-type">
                                    <img class="logo" src="images/4564.png" alt="">
                                    <h3> <img class="drinkmenupic" src="images/drink-menu3.png" alt=""> </h3>
                                    
                                    <?php
                                        $s=0;
                                    for($t=0;$t<sizeof($colarr);$t++){
                                        $s=$s+1;
                                    ?>
                                    
                                        <button id="english<?php echo $s;?>" class="classic" value="<?php echo $colarr[$t]['category'];?>" href="#Menu<?php echo $s;?>" onclick="callmenu('<?php echo $colarr[$t]['category'];?>');showcart(); gotonextview();"> <span><?php echo $colarr[$t]['category'];?></span></button>
                                        
                                        <?php
                                    }
                                        ?>
                                        
                                </div>
                                
                    </div>    
            </div>

                                <div class="bottomfooter footerespo">
                                    <span style="color: #c9ad86;"> ® <script type="text/javascript">
                                        document.write(new Date().getFullYear());
                                    </script> Yunokawa Prince Hotel Nagisatei • All Rights Reserved</span>
                                </div>

        </div>

<!-----------------------------------------drink list ---------------------------------------->
       <div class="container " id="tow" style="display: none;">   

                <button class="btn classic2" onClick="window.location.reload();"> <img src="images/back.png" alt="" > Menu</button>
                <button class="btn classic2" style="float: right;" onclick="location.href='checkout_cart.php';"> <img style="height: 24px; width:21px" src="images/shopping-cartm.png" alt=""> カート (<span class="total-count"></span>) </button>
         
        </div> 

        <!--add 'smooth-scroll' for smooth scroll -->
        
        <div class="list" style="padding: 0px 20px 0px;">
                        <div id="Menu1">
                                <!--Drinks will be displayed here-->
                        </div>    
        </div>
    

    </div>
<!------------------------------------------------------------------------------------------------------------------------------

<script  rel="preconnect"
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>--------------------------------->


            <script src="js/main.js"></script>
			
</body>
</html>