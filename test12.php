<center>
<?php
if(isset($_REQUEST['order'])){
    //$val=readfile("file.txt");
    //echo json_encode($val);
    
    $json = file_get_contents('file.txt');

//Decode JSON
$json_data = json_decode($json,true);
if (empty($json_data)) {
    echo "DATA EMPTY";
}
//Print data
//print_r($json_data);
else{ 
echo " 
    kamokuCD1=".$json_data['kamokuCD1']."
<br>kamokuCD2=".$json_data['kamokuCD2']." 
<br>kamokuName=".$json_data['kamokuName']."
<br>sisetuName=".$json_data['sisetuName']." 
<br>userName=".$json_data['userName']." 
<br>roomno=".$json_data['roomno']." 
<br>num=".$json_data['num']." 
<br>price=".$json_data['price']." 
<br>drinkFlg=".$json_data['drinkFlg']." 
<br>tableNo=".$json_data['tableNo']." 
<br>placeNo=".$json_data['placeNo']."
<br>userCD=".$json_data['userCD']; 

 }

}

elseif($_POST['kamokuName']){
//file_put_contents("file.txt", $var);
$json = json_encode($_POST);
$res=explode(":" , $json);
file_put_contents("file.txt", $json);

//file_put_contents("file.txt", serialize($_POST));
}
else{
    echo "Miss use of file";
}

?>
</center>





<!--
<html>
<body>
<?php
//echo "Test" . $_GET['kamokuCD1'] . " & " . $_GET['kamokuCD2'];
?>
</body>
</html>   -->

