<?php

header('Content-Type: text/html; charset=utf-8');
session_start();
include 'common/inc.common.php';
$sql="select * from discount where active=1";
 $disarr = $Cobj->union($sql);

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
 // var dots = document.getElementById("dots");
//dots.style.display = "none";
  
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
               // alert('submit intercepted');
			   //loader($.param(args));

			   var ver="";
                e.preventDefault(e);
							$('#loading').show();
							//var datastring = $("#cartform").serialize();
                            //alert(datastring);
                           var objectHTMLCollection=document.getElementsByClassName("total-cart"),string = [].map.call( objectHTMLCollection, function(node){
        return node.textContent || node.innerText || "";
    }).join("");;
                var a=parseInt(string);            // alert(string);
				if(a==0){
				alert("飲み物を選んでもう一度お試しください。");
				//break;
				}
				else{
$.ajax({
				url: "addorderInfo.php", // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,  
				success: handleResult
			

			});
}
				
            });
        });
		
		function handleResult(data){
			//alert(data);
			$( "#clearcart" ).click();
           alert("ご注文を承りました。\n サービスをご利用いただきありがとうございます。");
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
	
function callcart(id) {
 event.preventDefault();
  var name = $("#"+id).data('name');
 var price = Number($("#"+id).data('price'));
  shoppingCart.addItemToCart(name, price, 1);
  displayCart();
}
//alert();
</script>

<script>


function goBackto() {
  window.history.back();
}
</script>



    <title>Menu</title>
</head>

<body>
    <div class="mainmenu" >
        <div class="shade" id="panel">
                    <div class="name1">
                        <span style="color: #c9ad86;"> <?php echo $response ?> </span> 
                        <?php 
                        

                        $tableno=$_SESSION['tableno'];
                        $roomno=$_SESSION['roomno'];
                        $guestname=$_SESSION['guestname'];
                        
                        //to spererate rooms number and guests names
                        $pieces = explode("," , $roomno);
                        $namepieces = explode("," , $guestname);
                    
						
                        ?>

                    </div>
                    

        </div>

        <!--------------------cart------------------------>
         <div class="container" id="tow">   

            <button class="classic2" style="margin-bottom: 30px; " onClick="goBackto()"> <img src="images/back.png" alt="" >  Menu</button>

        
        

                <div class=" list cart-drinks">    
                                <button class="order-buttons" >カート (<span class="total-count"></span>) <img src="images/shopping-cart.png" alt=""> </button>
                                <button class="clear-cart btn btn-danger order-buttons" id="clearcart">すべて削除 <img src="images/trash-black.png" alt=""> </button>
                                

            <form action="" method="GET" name="cartform" id="cartform">

                                    <div>
                                                <?php
                                                //guest need to select room number if multiple //nothing displayed if single 
                                                if ($pieces[1]==true) {
                                                echo "<select  required style='float: right;' class='order-buttons' name='selectroom' id='selectroom'>"; 
                                                echo "<option value='' disabled selected hidden></option>";
                                                foreach ($pieces as $roomnumselected) {
                                                echo "<option value='". $roomnumselected ."' required>" . $roomnumselected . "</option>";
                                                }
                                                echo "</select><span style='float: right;'> <h3></h3> お部屋番号</span>";
                                                } else {
                                                echo "<input type='text' name='selectroom' value='".$pieces[0]."' hidden>";
                                                }

                                                ?>
                                    </div> 

                                    <div>
                                                <?php
                                                //guest need to select name if multiple //nothing displayed if single 
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

       
                <input type="text" name="guestname" value="<?php echo $guestname;?>" hidden>
                <input type="text" name="roomno" value="<?php echo $roomno;?>" hidden>
                <input type="text" name="tableno" value="<?php echo $tableno;?>" hidden>
                    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>選ばれたドリンク</h3> 
                                            
                                        </div>
                                        <div class="modal-body">
                                                    <table class="show-cart table"> </table>
                                                    <div style="font-size: 15px;margin-top:50px; "> 消費税込み ￥ <span class="total-cart"></span></div>
                                                    
                                                    <div style="font-size: 15px;">  割引後の値段 ￥<input style="background-color:transparent; color:white;" type="text" name="finaltot" id="finaltot" readonly  value="">
                                                    <input type="text" name="discper" id="discper" readonly hidden value="<?php echo $disarr[0]['disc_per'];?>"> </div>


                                                <div style="border-top:1px dotted white;margin-top:20px"></div>

                                                <div style="font-size: 25px; margin-top: 30px;">  合計 ￥<input style="background-color:transparent; color:white;width:80px" type="text" name="finaltot" id="finaltot" readonly  value="">
                                                <input type="text" name="discper" id="discper" readonly hidden value="<?php echo $disarr[0]['disc_per'];?>"> </div>

                                               
                                        </div>
                                        
                                        <div class="send-order">
                                            <button type="submit" onclick="myFunctionPro();" value="注文する" class="order-buttons checkout-btn">注文する </button>
                                            <div id="demo">
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div> 
					


            </form>


                </div>
        </div>
		
        <!------------------------------------------------------->

    </div>

   <div class="bottomfooter">
        <span style="color: #c9ad86;"> ® <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Yunokawa Prince Hotel Nagisatei • All Rights Reserved</span>
    </div> 
<!------------------------------------------------------------------------------------------------------------------------------

<script  rel="preconnect"
            src="https://code.jquery.com/jquery-2.2.4.min.js"
            integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
            crossorigin="anonymous"></script>--------------------------------->


            <script src="js/main.js"></script>
			
</body>
</html> 