<?php 
session_start();
include '../common/inc.common.php';
$stausArray=array();

$id=$_POST['id'];
$mode=$_POST['mode'];

			if($mode=='delete'){
			
			
	
					$InputArray['si_stat'] =  'R';
					$conditions=" refid ='$id' ";
					$resval=$Cobj->delet('discount', $conditions);
			
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
			
	
			}

//print_r($res);

echo json_encode($stausArray);
?>

