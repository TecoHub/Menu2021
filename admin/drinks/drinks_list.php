<?php
session_start();
include '../common/inc.common.php';
//print_r($_SESSION);
if(isset($_REQUEST['si_id'])){
$si_id = $_REQUEST['si_id'];
$tableName = "drinks";
$cond = "WHERE d_refid='$si_id'";
$dataarr = $Cobj->getDataRawObj($tableName, $cond);
}
?>


<script type="text/javascript">
    
	$(document).ready(function(){
	var frm = $('#contactForm1');

    frm.submit(function (e) {

        e.preventDefault();// to prevent the origibnal form submit

        $.ajax({
          	url: "../drinks/drinks_listinfo.php", // Url to which the request is sent
				type: "POST",             // Type of request to send, called as method
				data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,
           // data: frm.serialize(),
            success: function (data) {
			edit(data);
                console.log('登録しました。');
                console.log(data);
            },
            error: function (data) {
                console.log('エラーが発生しました。');
                console.log(data);
            },
        });
    });
	});
	
	
	function edit(data){
	alert(data);
	//location.reload('../app/index.php');
	//window.location.href = '../clients/size.php';
	loadContainer('../drinks/drinks_list.php');
	}
	
function delet(id){


		var r = confirm("選択した飲み物を削除しますか"); 
	 
		if (r == true) {
			$.ajax({
			url: "../drinks/can_size_drinks.php", // Url to which the request is sent
			type: "POST",        
			data:"id="+id+"&mode=delete",
				 dataType: "json",
			
				  success: function(data){
					 // alert(data);
					  if(data=="deleted"){
						  alert("正常に削除されました");
						  }
					  else{
						  alert("正常に削除されました");
						  //location.reload();
						  	loadContainer('../drinks/drinks_list.php');
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

<style> 

.cubestyle { 

width: 70px;
height: 70px;

}

input {
	margin: 2px 0 2px 0;
}

select {
	margin: 2px 0 2px 0;
}


</style>


<!DOCTYPE html>
<html lang="ja" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Drinks</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link rel="stylesheet" href="../admin/app/style.css" type="text/css">
		
		<!-- end: META -->		
		<link rel="shortcut icon" href="favicon.ico" />
		<style>
		   .has-error{ border: 1px solid rgb(213, 61, 61) !important; background: #FFF4F4 !important;}
		   .has-success{ border: 1px solid #239E08 !important; background: #E1FFE1 !important; }
		</style>
	</head>

	<body>

		<form action="drink_listinfo.php" name="contactForm1"  id="contactForm1" method="POST"enctype="multipart/form-data" style="margin-left: 2%;">
			<div id="main">
			<h1>飲み物</h1>

		<h3 style="text-align: center;">管理</h3>

		<table>

		<tr>
		<td>科目CD1</td> 
		<td><input type="text" name="CD1" id="CD1" size="30" value="<?php echo$dataarr[0]['CD1'] ?>" required></td>
		</tr>

		<tr>
		<td>科目CD2</td>
		<td><input type="text" name="CD2" id="CD2" size="30" value="<?php echo$dataarr[0]['CD2'] ?>" required></td>
		</tr> 

		<tr>
			<td>科目名称</td> 
			<td><input type="text" name="product" id="product" size="30" value="<?php echo$dataarr[0]['product'] ?>" required></td>
		</tr>
		<tr>
			<td>カテゴリー</td> 
			<td><input type="text" name="category" id="category" size="30" value="<?php echo$dataarr[0]['category'] ?>" required> </td>
		</tr>
	

		<tr>
			<td>単価</td> 
			<td><input type="number" name="price" id="price" size="30" value="<?php echo$dataarr[0]['price'] ?>" required> </td>
		</tr>
		<tr>

			<td>順番</td> 
			<td>
					<select name="position">
								<option value="1" <?php if($dataarr[0]['position']=="1"){echo"selected";} ?>> 1</option>
								<option value="2" <?php if($dataarr[0]['position']=="2"){echo"selected";} ?>> 2</option>
								<option value="3" <?php if($dataarr[0]['position']=="3"){echo"selected";} ?>> 3</option>
								<option value="4" <?php if($dataarr[0]['position']=="4"){echo"selected";} ?>> 4</option>
								<option value="5" <?php if($dataarr[0]['position']=="5"){echo"selected";} ?>> 5</option>
								<option value="6" <?php if($dataarr[0]['position']=="6"){echo"selected";} ?>> 6</option>
								<option value="7" <?php if($dataarr[0]['position']=="7"){echo"selected";} ?>> 7</option>
								<option value="8" <?php if($dataarr[0]['position']=="8"){echo"selected";} ?>> 8</option>
								<option value="9" <?php if($dataarr[0]['position']=="9"){echo"selected";} ?>> 9</option>
								<option value="10" <?php if($dataarr[0]['position']=="10"){echo"selected";} ?>> 10</option>
					</select>
			</td>
		</tr>

		<tr>
			<td>在庫</td> 
			<td><select id="stock" name="stock" required>
				<?php 
				if ($dataarr[0]['stock']=='可用') { echo "<option selected='selected' value=" . $dataarr[0]['stock'] .">可用</option> <option value='品切れ'>品切れ</option>"; }
				elseif ($dataarr[0]['stock']=='品切れ') {  echo "<option selected='selected' value='品切れ'>品切れ</option><option value='可用'>可用</option> "; }
				else { echo "<option selected='selected' value=''></option><option value=" . $dataarr[0]['stock'] .">可用</option> <option value='品切れ'>品切れ</option>";}
				?>
			</select></td>
		</tr>

		<tr>
			<td>説明</td> 
			<td><input type="text" name="drinkinfo" id="drinkinfo" size="50" value="<?php echo$dataarr[0]['drinkinfo'] ?>" required> </td>
		</tr>

		<tr>
			<td>画像</td> 
			<td>
			
			<img style="border-radius: 8px; background-color:#ecdfa8; margin:20px 0 10px 0" alt="" id="previewing" src="../drinks/upload/<?php echo  $dataarr[0]['productimage']; ?>"  width="200px" height="150px">
			<input type="file" name="file" id="productimage" value="<?php echo $dataarr[0]['productimage'] ?>" > 
				<br/> <br />
				
			</td>
		</tr>



		<tr>
			<td></td>

			<td>
			<input type="text" readonly hidden value="<?php echo $dataarr[0]['d_refid']?>" name="si_id">
			</td>
		</tr>

		</table>
				<div style="margin-top: 20px;">
				<input class="cubestyle" type="submit" value="登録" name="but_upload"/>
				<input class="cubestyle" type="button" onclick="loadContainer('../drinks/drinks_list.php')" value='Refresh' />
				</div>
		</form>
	 
		

		<div style="margin-top: 20px;">
		
		<table  width="99%" height="10px" style="background: whitesmoke; margin-bottom:30px; ">
		
		<tr style="background:#ecdfa8; font-size:16px;"><th  style='padding-left:20px; width:8%;'>Ref.No </th><th style="width: 8%;">CD1</th><th style="width: 8%;">CD2</th><th>科目名称</th><th>単価</th><th>カテゴリー</th><th>在庫</th><th style="width: 20%;">説明</th><th >画像</th><th>順番</th><th> <th>変更</th><th>削除</th> </th></tr>
		<?php
		
//$tableName = "size";
//$cond = "WHERE si_stat='A'";
//$class_array = $Cobj->getDataRawObj($tableName, $cond);

$sql="select * from drinks";
 $class_array = $Cobj->union($sql);

		//print_r(count($class_array));exit();
		for($i=0;$i<count($class_array);$i++){
			$id=$class_array[$i]['d_refid'];
			
			$sno=$i+1;
			echo "<tr>";
			echo "<td  style='padding-left:20px;'>".$sno ."  </td>";
			echo "<td>".$class_array[$i]['CD1']."  </td>";
		    echo "<td>".$class_array[$i]['CD2']."  </td>";
            echo "<td>".$class_array[$i]['product']."  </td>";
            echo "<td>".$class_array[$i]['price']."  </td>";
			echo "<td>".$class_array[$i]['category']."  </td>";
			
            echo "<td>".$class_array[$i]['stock']."  </td>";
			echo "<td>".$class_array[$i]['drinkinfo']."  </td>";
			echo "<td><a href='#myModal".$class_array[$i]['CD2']."' class='btn btn-default btn-small' id='custId' data-toggle='modal' data-id='" .$class_array[$i]['productimage']."'>View</a></td><td>".$class_array[$i]['position']."</td> ";
?>
<!-- Modal -->
						<div class="modal fade" id="myModal<?php echo $class_array[$i]['CD2'];?>" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">View image</h4>
									</div>
									<div class="modal-body">
										<div class="fetched-data">
										<img src="../drinks/upload/<?php echo $class_array[$i]['productimage'];?>"  width="550px" height="400px">
										</div> <!--//Here Will show the Data -->
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
				<!-- end of modal -->
		
<?php
			echo "<td style='float:right;'>
			<td><a href=javascript:loadContainer('../drinks/drinks_list.php?si_id=".$class_array[$i]['d_refid']."')>
			<img src='../assets/nithin/images/pencil.png' height='15' width='15' ></a> &nbsp;&nbsp;&nbsp;&nbsp;</td>";
			echo "<td><input type='image' src='../assets/nithin/images/close.png' height='' width='' name='delete' id='delete' value='' onclick='delet($id)'></td></td>";
			echo "</tr>";
		}
		
		?>
		
		</table>
		</div>

	 
	  
	  
	  
    </div>
	</body>
	<!-- end: BODY -->
</html>
	