<?php 
include '../common/inc.common.php';

$stausArray=array();

$si_id=$_POST['si_id'];
$date_field =  array('');
$InputArray = array();


if(isset($_POST['mode']))
{
	$mode=$_POST['mode'];
	
	$tableName="size";
	$si_id=$_POST['si_id'];
	$InputArray['si_name'] =  $_POST['si_name'];
	
	$conditions="si_id=$si_id";
    $resval=$Cobj->delet($tableName, $conditions);

	if( $resval!= false){
        //updated success
							$res = 'deleted';
							}
								else{
						$res = 'E';
										}	
	}


else{
			if($si_id!=0 && $si_id !=""){
	
		$InputArray['discount_name'] =  $_POST['discount_name'];
		$InputArray['disc_per'] =  $_POST['disc_per'];

			$fields='si_id';
			$conditions=" where refid =".$si_id;
		$resval=$Cobj->updBulkData("discount", $InputArray, $conditions);
			
					if( $resval!== false){
        //updated success
							$res = 'U';
							}
								else{
						$res = 'E';
										}	

												}
else
		{	
		$InputArray['discount_name'] =  $_POST['discount_name'];
		$InputArray['disc_per'] =  $_POST['disc_per'];
		$res = $Cobj->addNewData("discount", $InputArray, "");
	
			}
}


//}
//else{
	
	// $res=7;
//}
//echo json_encode($InputArray);

echo "追加されました";
?>

