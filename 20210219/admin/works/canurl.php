<?php 
session_start();
include '../common/inc.common.php';
$stausArray=array();

$id=$_POST['id'];
$mode=$_POST['mode'];

			if($mode=='delete'){
			
			
	
			$InputArray['refid'] =  'R';
			$conditions=" refid ='$id' ";
		$resval=$Cobj->delet('url', $conditions);
			
					if( $resval!== false){
        //updated success
							$res = 'U';
							}
								else{
						$res = 'E';
										}	

												}
												else if($mode=='active'){
												$sql="update url set active='1' where refid='$id' ; update url set active='0' where refid != '$id'";
											$class_array = $Cobj->union($sql);

												
												}
else
		{	
			
	
			}





//print_r($res);

echo json_encode($stausArray);
?>

