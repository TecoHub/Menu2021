<?php

session_start();

//print_r($_SESSION);
include_once '../common/inc.common.php';
//set_time_limit(30);


?>

<!DOCTYPE html>
<html lang="ja">
<head>   
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 <script>
 
 $(document).ready(function(){
	 onchangee();
/*	 $('#search').keyup(function()
	{
		searchTable($(this).val());
	});
	 
	 $("#ckm").click(function () {
         // alert("khyk");
		 
		   $('.case').attr('checked', this.checked);
    });
*/
 });
 
 //
 /*
 function searchTable(inputVal){
	 //alert("jfgjh"+inputVal);
	 var table = $('#std_table_ajax');
	table.find('tr').each(function(index, row)
	{
		var allCells = $(row).find('td');
		if(allCells.length > 0)
		{
			var found = false;
			allCells.each(function(index, td)
			{
				var regExp = new RegExp(inputVal, 'i');
				if(regExp.test($(td).text()))
				{
					found = true;
					return false;
				}
			});
			if(found == true)$(row).show();else $(row).hide();
		}
	});
 }
 
 */
 
 function delet(id){

	//alert(id);
//Main.init();
	//-FormElements.init();
	
//var bill_no=document.getElementById("bill_no").value;;
		var r = confirm("Please Confirm");
	 
		if (r == true) {
			$.ajax({
			url: "../delete/can_stock.php", // Url to which the request is send
			type: "POST",        
			data:"id="+id+"&mode=delete",
				 dataType: "json",
			
				  success: function(data){
					  
					  if(data=="deleted"){
						  alert("deleted sucessfully");
						  }
					  else{
						  alert("DELETED SUCESSFULLY");
						  loadContainer('../clients/stock_filters.php');    
					  }
				  }
			
		});
		
//alert("ajaxcall"+class_id);
}
}
 
 
 
 function onchangee(){
	// save_session();
	 
	document.getElementById('page_number').value = 0;
	        var search=$("#search").val();
	        var limit=$("#tb_size").val();
			var ordate=$("#ordate").val();
			var sub_cat="";
			var page_number=$("#page_number").val();
		//alert(ordate);
			$.ajax({
					
				url: "../orders/order_filtersinfo.php", 
				type: "POST",            
			data:"tb_size="+limit+"&page_number="+page_number+"&search="+search+"&ordate="+ordate,
				dataType: "json",
			cache: false,
				  success: function(data){
					   console.log('Success!', data);// to inspect elements
			$('#std_table_ajax').empty();// to make the valuem or drop down empty
			$('#next_table').empty();	

					
		$('#std_table_ajax').append('<tr class="header" width="100%"><th width="3%">Ref.No</th><th >科目名称</th><th >単価</th><th>量</th><TH>日付</TH><TH>注文番号</TH><TH>テーブル番号</TH><TH>部屋番号</TH><TH>お客様の名前</TH></tr>');	
					
					for (var i = 0; i < data.length; i++) {
						
						if(data[i] !== null) {
							var foundSomething = true;
							}
						var s_no=(limit*page_number)+(i+1);
						
					
	    $('#std_table_ajax').append('<tr width="100%"><td width="3%">'+s_no+'</td><td >' + data[i].productname + '</td><td >' + data[i].productprice + '</td><td >' + data[i].productquantity + '</td><td >' + data[i].updated + '</td><td >' + data[i].or_order_id + '</td><td >' + data[i].tableno+ '</td><td >' + data[i].roomno+ '</td><td >' + data[i].guestname+ '</td></tr>');
		
 }
 if(foundSomething){$('#next_table').append('<div style="float: left;margin:4px;"><input type="button" name="back" id="back" onclick="back()" class="btn btn-block btn-lg btn-success" value="前へ"></div><div style="float: right;margin:4px;"><input type="button" name="next" id="next" onclick="next()" class="btn btn-block btn-lg btn-success" value="次へ" ></div>');}
 
 else{$('#next_table').append('<div style="float: left;margin:4px;"><input type="button" name="back" id="back" onclick="back()" class="btn btn-block btn-lg btn-success" value="前へ"></div><div style="float: right;margin:4px;display:none;"><input type="button" name="next" id="next" onclick="next()" class="btn btn-block btn-lg btn-success" value="次へ" ></div>');}
 
 
$('#loadingmessage').hide();// hide loading image
}
		
		
	});

	
 }
 
	function save_session(){
		var class_id=$("#class").val();
		var section_id=$("#section").val();
		$.ajax({
					
				url: "../main_session.php", 
				type: "POST",            
				data:"class_id="+class_id+"&section_id="+section_id,
		});
		
	}
// this for search by name
	function popitup(url) {
	newwindow=window.open(url,'name','height=600,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}
	
function next(){
	 save_session();
	//alert("fgxgsd");
	var value = parseInt(document.getElementById('page_number').value, 10);
    value = isNaN(value) ? 0 : value;
	//if(s_no==""){ 	value=value;	}	else{ 
	value++;
	//}
   
   var check="Check All";
    document.getElementById('page_number').value = value;
	//document.getElementById('sel_all').value = check;
	
	move_next();
	exit;
	
}
function back(){
	var value = parseInt(document.getElementById('page_number').value, 10);
    value = isNaN(value) ? 0 : value;
		if(value>0)
		{
		value--;
		}
	else{
		value= value;
		}
    
   var check="Check All";
    document.getElementById('page_number').value = value;
	//document.getElementById('sel_all').value = check;
	move_next();
	exit;
	
}

function move_next(){

$('#loadingmessage').show();// hide loading image

			//var page_number=$("#page_number").val();
		var search=$("#search").val();
	        var limit=$("#tb_size").val();
			var ordate=$("#ordate").val();
			var sub_cat="";
			var page_number=$("#page_number").val();
		//alert(ordate);
			$.ajax({
					
				url: "../orders/order_filtersinfo.php", 
				type: "POST",            
			data:"tb_size="+limit+"&page_number="+page_number+"&search="+search+"&ordate="+ordate,
				dataType: "json",
			cache: false,
				  success: function(data){
					   console.log('Success!', data);// to inspect elements
			$('#std_table_ajax').empty();// to make the valuem or drop down empty
$('#next_table').empty();	

					
		$('#std_table_ajax').append('<tr class="header" width="100%"><th width="3%">SNO</th><th >P Name</th><th >PRICE</th><th>QTY</th><TH>UPDATED</TH><TH>Order No</TH><TH>SEAT NO</TH><TH>ROOMNO</TH><TH>NAME</TH></tr>');	
					
					for (var i = 0; i < data.length; i++) {
						
						if(data[i] !== null) {
							var foundSomething = true;
							}
						var s_no=(limit*page_number)+(i+1);
						
					
	    $('#std_table_ajax').append('<tr width="100%"><td width="3%">'+s_no+'</td><td >' + data[i].productname + '</td><td >' + data[i].productprice + '</td><td >' + data[i].productquantity + '</td><td >' + data[i].updated + '</td><td >' + data[i].or_order_id + '</td><td >' + data[i].tableno+ '</td><td >' + data[i].roomno+ '</td><td >' + data[i].guestname+ '</td></tr>');
		
 }
 if(foundSomething){$('#next_table').append('<div style="float: left;margin:4px;"><input type="button" name="back" id="back" onclick="back()" class="btn btn-block btn-lg btn-success" value="前へ"></div><div style="float: right;margin:4px;"><input type="button" name="next" id="next" onclick="next()" class="btn btn-block btn-lg btn-success" value="次へ" ></div>');}
 
 else{$('#next_table').append('<div style="float: left;margin:4px;"><input type="button" name="back" id="back" onclick="back()" class="btn btn-block btn-lg btn-success" value="前へ"></div><div style="float: right;margin:4px;display:none;"><input type="button" name="next" id="next" onclick="next()" class="btn btn-block btn-lg btn-success" value="次へ" ></div>');}
 
 
$('#loadingmessage').hide();// hide loading image
}
		
		
	});

	
}


function searchRows(tblId) {
		
var tbl = document.getElementById(tblId);
var headRow = tbl.rows[0];
var arrayOfHTxt = new Array();
var arrayOfHtxtCellIndex = new Array();

for (var v = 0; v < headRow.cells.length; v++) {
 if (headRow.cells[v].getElementsByTagName('input')[0]) {
 var Htxtbox = headRow.cells[v].getElementsByTagName('input')[0];
  if (Htxtbox.value.replace(/^\s+|\s+$/g, '') != '') {
    arrayOfHTxt.push(Htxtbox.value.replace(/^\s+|\s+$/g, ''));
    arrayOfHtxtCellIndex.push(v);
  }
 }
}

for (var i = 1; i < tbl.rows.length; i++) {
 
    tbl.rows[i].style.display = 'table-row';
 
    for (var v = 0; v < arrayOfHTxt.length; v++) {
 
        var CurCell = tbl.rows[i].cells[arrayOfHtxtCellIndex[v]];
 
        var CurCont = CurCell.innerHTML.replace(/<[^>]+>/g, "");
 
        var reg = new RegExp(arrayOfHTxt[v] + ".*", "i");
 
        if (CurCont.match(reg) == null) {
 
            tbl.rows[i].style.display = 'none';
 
       }
 
    }
 
  }
}
</script>
<script>
var formblock;
var forminputs;
var checkflag = "false";
 
function select_callll(name,value){
	formblock= document.getElementById('form_id');
  forminputs = formblock.getElementsByTagName('input');
  if (value == "Check All"){

	for (i = 0; i < forminputs.length; i++) {
		var regex = new RegExp(name, "i");
    if (regex.test(forminputs[i].getAttribute('name')))
		{
       {       
	   forminputs[i].checked = true;
		checkflag = "true";
    	   }
    }
	
	
	}return "Uncheck All";
}
else{
	
	for (i = 0; i < forminputs.length; i++) {
		var regex = new RegExp(name, "i");
   if (regex.test(forminputs[i].getAttribute('name')))
		{
	   {       
	   forminputs[i].checked = false;
		checkflag = "false";
      	   }
    }
    }
   return "Check All";
  }



}
	
</script>

</head>
<body >
<style>

.header{
		background-color:lightgreen;
	   border-radius: 25px;
	   font-size: 12px;
	   color: #D819A4;
	   font-family: initial;
	   
   }
   #next_table{
   
	   position: absolute;
	   all: initial;
	   margin: auto;
	   left:100px;
   }
   
   .search_r{
	   position: absolute;
	   all: initial;
	   margin: auto;
	   left:100px;
	   
   }
   tr:nth-child(even) {
	   background-color: lightyellow;
   }
   
   tr:hover {
	 background-color: lightgreen;
   }
   
   #topcategorieslink h1 {
	   margin-bottom: 60px;
   }
   #topcategorieslink  {
	   margin-bottom: 25px;
   }

   input {

	   
	   height:50px;
	   margin: 15px 0 2px 30px;
   }

   select {
	   
	   width: 100px;
	   margin: 15px 0 2px 30px;
   }

   .cubestyle {
	 width:  70px;
	 height: 70px;
	 margin: inherit;
}


</style>

<div class="container" style="margin-left: 1%;">


	<div id="topcategorieslink" >
	  <h1>注文</h1>
	  
	  <h3 style="text-align: center;">表示</h3>
	
			<div>
						<label for="size">
									<strong> 示す </strong>
						</label>
						
						<select style="background-color: blanchedalmond;" name="tb_size" id="tb_size" onchange="onchangee()">
							<option value="2">2</option>
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50" selected>50</option>
							<option value="100">100</option>
							<option value="200">200</option>
						</select>
			</div>


				<div>
					
					<strong>日付</strong>
					<input type="date" id="ordate" name="ordate" onchange="onchangee()">
					
				</div>


				<div>
				
					<strong> 探索 </strong>
					<input style="width:250px;"  type="text" id="search" placeholder="お客様の名前またわ注文番号" onkeyup="onchangee()">
					
				</div>

				<div style="margin-top: 20px;">
				<input type="button" class="cubestyle" onclick="loadContainer('../orders/order_filters.php')" value='refresh' class="refresh-btn"/> 
				<button class="cubestyle" onclick="window.print()">印刷</button>
				</div>
	  </div>

	
      <div>
					<form  id="form_id" action="#" method="post" enctype="multipart/form-data">

							<div>
										<!--<input type="button"  value="Check All" onClick=" this.value=select_callll('areaa',this.value);" id="sel_all">-->
										<table cellpadding="2px" cellspacing="2px"   class="table" name="std_table_ajax" id="std_table_ajax"></table>
							</div>
				</form>

				<table cellpadding="2px" cellspacing="2px"   class="table" name="next_table" id="next_table"></table>


				<input type="text" id="page_number" name="page_number" value="0" readonly hidden >
		
						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit Data</h4>
									</div>
									<div class="modal-body">
										<div class="fetched-data"></div> <!--//Here Will show the Data -->
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
				<!-- end of modal -->
	</div>
    </body>

<script>

function handleResult(data) {
   if(data!="" && data != "E"){
	  alert("The New Student details Has been added");
	  loadContainer('../masters/StudentList.php');           
   }
   else if(data == E)
   {
      alert("The Student details Has been Updated");
	  loadContainer('../masters/StudentList.php');    
   }
   else
   {
	  alert("Already Exist ");
   } 
}
   

  $('#myModal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : '../clients/fetch_record.php', //Here you will fetch records 
            data :  'mode=get&rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
 
 
 
 function updateqty(){
	// alert(id);
	//var stkqtyup=document.getElementsByName("stkqtyup");
	var values = $("input[name='stkqtyup[]']").map(function(){return $(this).val();}).get();
	var sqid = $("input[name='sqid[]']");
	var oldqty = $("input[name='oldqty[]']").map(function(){return $(this).val();}).get();
	 //var sq_quantity = document.getElementById("val"+id).value;
	var lang = [];
	 var names=document.getElementsByName('sqid[]');
	 for(key=0; key < names.length; key++)  {
    lang[key] =names[key].value;
    //your code goes here
}
	 //alert(sqid.length);
	// exit;
	  $.ajax({
            type : 'post',
            url : '../clients/fetch_record.php', //Here you will fetch records 
            data :  "mode=update&values="+values+"&sqid="+lang+"&oldqty="+oldqty, //Pass $id
            success : function(data){
				alert("updated");
				//$('#myModal').modal('hide');
				$('#myModal').modal('toggle');
            //$('.fetched-data').html(data);//Show fetched data from database
            }
        });
		alert("updated");
				//$('#myModal').modal('hide');
				$('#myModal').modal('toggle');
 }
</script>

</html>