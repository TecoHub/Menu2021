
<?php

session_start();
include '../common/inc.common.php';
//print_r($_SESSION);
if(isset($_REQUEST['si_id'])){
$si_id = $_REQUEST['si_id'];
$tableName = "discount";
$cond = "WHERE refid='$si_id'";
$dataarr = $Cobj->getDataRawObj($tableName, $cond);
}
?>


<script type="text/javascript">
    
	$(document).ready(function(){
	var frm = $('#contactForm1');

    frm.submit(function (e) {

        e.preventDefault();// to prevent the origibnal form submit

        $.ajax({
          	url: "../works/discount_info.php", // Url to which the request is sent
				type: "POST",             // Type of request to be send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,
           // data: frm.serialize(),
            success: function (data) {
			edit(data);
                console.log('Submission was successful.');
                console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
	});
	
	
	function edit(data){
	alert(data);
	//location.reload('../app/index.php');
	//window.location.href = '../clients/size.php';
	loadContainer('../works/discount.php');
	}
	
function activeupdate(id){
	$.ajax({
			url: "../works/can_dis.php", // Url to which the request is send
			type: "POST",        
			data:"id="+id+"&mode=active",
				 dataType: "json",
			
			
		});
		loadContainer('../works/discount.php');
	}
function delet(id){


		var r = confirm("選択した割引を削除しますか");
	 
		if (r == true) {
			$.ajax({
			url: "../works/discount_size.php", // Url to which the request is send
			type: "POST",        
			data:"id="+id+"&mode=delete",
				 dataType: "json",
			
				  success: function(data){
					 // alert(data);
					  if(data=="deleted"){
						  alert("エラー：削除されていません");
						  }
					  else{
						  alert("正常に削除されました");
						  //location.reload();
						  	loadContainer('../works/discount.php');
					  }
				  }
			
		});
		

}
}
	
function sub_cat(){
var ss_mc_id=$("#si_mc_id").val();

   $.ajax({
type: "POST",
url: "../fetch/fetch_sub_cat.php",
data: "ss_mc_id="+ss_mc_id,
cache: false,

success: function(html) {    
$("#sub_cat").html( html );
}
});
		
	}		
	
	
</script>




<!DOCTYPE html>
<html lang="ja" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>STAFF</title>
		<!-- start: META -->
		<meta charset="UTF-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link rel="stylesheet" href="admin/app/style.css" type="text/css">
		
		<!-- end: META -->		
		<link rel="shortcut icon" href="favicon.ico" />
			<style>
			.has-error{ border: 1px solid rgb(213, 61, 61) !important; background: #FFF4F4 !important;}
			.has-success{ border: 1px solid #239E08 !important; background: #E1FFE1 !important; }

			.cubestyle {

						width: 70px;
						height:70px;
						margin: inherit;
						}

					.inpustyle {
						margin: 6px 0px 0px 30px;
						width: 250px;
					}
		
			</style>
	</head>

	<body>

			<form action="clients/addStudentInfo.php" name="contactForm1"  id="contactForm1" method="POST" style="margin-left:2%">

				<div id="main">
				<h1>割引</h1>

					<h3 style="text-align: center;">管理</h3>

					<table>

					
					<tr>
						<td>割引名 </td>
						<td><input class="inpustyle" type="text" name="discount_name" id="discount_name" size="30" value="<?php echo$dataarr[0]['discount_name'] ?>" required></td>
					</tr> 


					<tr>
						<td>パーセンテージ </td> 
						<td><input class="inpustyle" type="number" name="disc_per" id="disc_per" size="30" value="<?php echo$dataarr[0]['disc_per'] ?>" required> %</td>
					</tr>
					<!--<tr>
						<td> State </td> 
						<td>Active<input type="radio" name="active" id="active"  value="1" > Inactive<input type="radio" name="active" id="inactive"  value="0" ></td>
					</tr>
-->


					<tr>
						<td></td>
					<td>
					<input type="text" readonly hidden value="<?php echo $dataarr[0]['refid']?>" name="si_id">
					</td>
					</tr>
					</table>

							<div style="margin-top:20px;">
								<input type="submit" class="cubestyle" value="登録" />
								<input type="button" class="cubestyle" onclick="loadContainer('../works/discount.php')" value='refresh' class="refresh-btn"/> 
							</div>
			</form>

		
		
		<div style="margin-top: 20px;">
		
				<table cellpadding="2px" cellspacing="2px"  width="90%" height="5px" style="background: whitesmoke;">
				
				<tr style="background:#76BAC5; font-size:16px;"><th style="padding-left:20px;">Ref.No </th><th>割引名</th><th>パーセンテージ</th><th>状態</th> <th>変更</th><th>削除</th><th>アクティベート</th> </tr>
				
											<?php
											
											
											$sql="select * from discount";
											$class_array = $Cobj->union($sql);

											//print_r(count($class_array));exit();
											for($i=0;$i<count($class_array);$i++){
												$id=$class_array[$i]['refid'];
												
												$sno=$i+1;
												echo "<tr>";
												echo "<td  style='padding-left:20px;'>".$sno ."  </td>";
												echo "<td>".$class_array[$i]['discount_name']."  </td>";
												echo "<td>".$class_array[$i]['disc_per']."  </td>";
												echo "<td>".$class_array[$i]['active']."  </td>";


												if ($class_array[$i]['active']==1) { 

												echo "											
												<td><a href=javascript:loadContainer('../works/discount.php?si_id=".$class_array[$i]['refid']."')>
												<img src='../assets/nithin/images/pencil.png' height='15' width='15' ></a> &nbsp;&nbsp;&nbsp;&nbsp;
												<td><input type='image' src='../assets/nithin/images/close.png' height='' width='' name='delete' id='delete' value='' onclick='delet($id)'></td>
												<td><input type='button' style='background-color:#77FF33; width:115px; border-radius:8px'  name='active' id='activebut' value='使用中' onclick='activeupdate($id)'> </td>";
												echo "</tr>";

											} else {
												echo "											
												<td><a href=javascript:loadContainer('../works/discount.php?si_id=".$class_array[$i]['refid']."')>
												<img src='../assets/nithin/images/pencil.png' height='15' width='15' ></a> &nbsp;&nbsp;&nbsp;&nbsp;
												<td><input type='image' src='../assets/nithin/images/close.png' height='' width='' name='delete' id='delete' value='' onclick='delet($id)'></td>
												<td><input type='button' style='background-color:#76bac5; border-radius:8px'  name='active' id='activebut' value='アクティベート' onclick='activeupdate($id)'> </td>";
												echo "</tr>";
											}
											}
											
											?>
				
				</table>
		</div>

	 
	  
	  
	  
    </div>
	</body>
	<!-- end: BODY -->
</html>
	