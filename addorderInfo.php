<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");  

include 'common/inc.common.php';

$sql="select * from url where active=1";
$urlarr = $Cobj->union($sql);



//if(isset($_SESSION['us_id_add'])){
	$discper=$_POST['discper'];
	$sql="select max(or_order_id) oderid  from confirmedorders";
	$colarr = $Cobj->union($sql);
	$oderid=$colarr[0]['oderid'];
  $oderid=$oderid+1;
   
  $prd_room=$_POST['selectroom'];
  $prd_guest=$_POST['selectguest'];
 $prd_name=$_POST['prd_name'];
 $pro_prc=$_POST['pro_prc'];
 $qty=$_POST['qty'];
  $cdval1=$_POST['cd1'];
  $cdval2=$_POST['cd2'];

  $prdnew="";
  $cd1new="";
  $cd2new="";  
  $qtynew="";
  $prnew="";
  $drinkflgnew="";

 for($t=0;$t<sizeof($qty);$t++){
 $InputArr['productname']=$prd_name[$t];
 $InputArr['cd2']=$cdval1[$t];
 $InputArr['cd1']=$cdval2[$t];
 $proprice=$pro_prc[$t];
 $discval=($discper/100)*$proprice;
 $finalvalprc=$proprice-$discval;
 $InputArr['productquantity']=$qty[$t];
 $InputArr['productprice']=$finalvalprc;

  
  //json_encode($data, JSON_UNESCAPED_UNICODE);

    $InputArr['or_order_id']=$oderid;
    //$InputArr['or_userid']=$_SESSION['useridmap'];
   //$InputArr['order_notes']=$_POST['order_notes'];
   $InputArr['guestname']=$_POST['selectguest'];
   $InputArr['roomno']=$_POST['selectroom'];
   $InputArr['tableno']=$_POST['tableno'];
    $res = $Cobj->addNewData("confirmedorders", $InputArr, "");
	$prdnew .=$prd_name[$t]."@@";
	$cd1new .=$cdval1[$t]."@@";
	$cd2new .=$cdval2[$t]."@@";
  $qtynew .=$qty[$t]."@@";
  $prnew .=$finalvalprc."@@";
  $drinkflgnew.="1@@";
 }
 
$prdnew=rtrim($prdnew, '@@');
$cd1new=rtrim($cd1new, '@@');
$cd2new=rtrim($cd2new, '@@');
$qtynew=rtrim($qtynew, '@@');
$prnew=rtrim($prnew, '@@');
$drinkflgnew=rtrim($drinkflgnew, '@@');
//$cd1new .=$cdval1[$t]."@@";

  //server code starts here***********************************
  



 //orderid to be fixed later
//$sendArr['numOrd']=$oderid;
//$sendArr['or_userid']=$_SESSION['useridmap'];
//$sendArr['order_notes']=$_POST['order_notes'];


/*1*/  $sendArr['kamokuCD1']=$cd1new;
/*2*/  $sendArr['kamokuCD2']=$cd2new;
/*3*/  $sendArr['kamokuName']=$prdnew;
/*4*/  $sendArr['sisetuName']="渚";
/*5*/  $sendArr['userName']=$_POST['selectguest'];
/*6*/  $sendArr['roomno']=$_POST['selectroom'];
/*7*/  $sendArr['num']=$qtynew;
/*8*/  $sendArr['price']=$prnew;
/*9*/  $sendArr['drinkFlg']=$drinkflgnew;
/*10*/ $sendArr['tableNo']=$_POST['tableno'];
/*11*/ $sendArr['placeNo']=200000;
/*12*/ $sendArr['userCD']=9000;


utf8_decode("kamokuName");
utf8_decode("sisetuName");



$sub_req_url = "http://".$urlarr[0]['url_name'];
$ch = curl_init($sub_req_url);
$encoded = '';

foreach($sendArr as $name => $value) {
  $encoded .= urlencode($name).'='.urlencode($value).'&';
}

$encoded = substr($encoded, 0, strlen($encoded)-1);



curl_setopt($ch, CURLOPT_POSTFIELDS,  $encoded);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_exec($ch);
curl_close($ch);

//server code ends here***********************************
 echo json_encode($oderid);
//}
?>

