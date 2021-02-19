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
	
		$InputArray['url_name'] =  $_POST['url_name'];

			$fields='si_id';
			$conditions=" where refid =".$si_id;
		$resval=$Cobj->updBulkData("url", $InputArray, $conditions);
			
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
		$InputArray['url_name'] =  $_POST['url_name'];

		$res = $Cobj->addNewData("url", $InputArray, "");
	
			}
}


//}
//else{
	
	// $res=7;
//}
//echo json_encode($InputArray);

echo "追加されました";
?>

