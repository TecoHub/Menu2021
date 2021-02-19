<?php
session_start();
include 'common/inc.common.php';
$mnu=$_REQUEST['mnu'];

											$sql = "SELECT * FROM drinks WHERE category='$mnu' AND stock='可用'  order by position";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                        $cd12=$row['CD1']."-".$row['CD2'];
                                                            if( $row["productimage"] == !null) { 
															$firstdesc=substr($row["drinkinfo"], 0, 60);
															$secdesc=substr($row["drinkinfo"], 60);
															

                                                                echo "<div class='drinkcardspec'><div class='drinkcard'><label><span class='prodmarg'> " . $row["product"] . "</span><br><span style='float: right;'> ". $row["price"] . "円 </span></label> ";
                                                                echo "<img class='drinkimage' src='admin/drinks/upload/" . $row["productimage"] . "'>";
																if(strlen($secdesc)>0){
																echo"<p>".$firstdesc .".<span id='dots".$cd12."' style='display: inline;'>...</span><span id='more".$cd12."' style='display: none;'> ".$secdesc ."</span></p><button class='readmorebtn' onclick='myFunction(".$cd12.")' id='myBtn".$cd12."'>もっと見る</button>";}
																else{
																	echo"<p>".$firstdesc .".<span id='dots".$cd12."' style='display: inline;'></span></p>";
																}
																
                                                                echo "<br><input type='submit' value='カートに入れる' data-name='".$row["product"]."' data-price='". $row["price"]  . "' data-prdid='". $cd12. "' data-cd2='". $row['CD2']. "' class='add-to-cart btn btn-primary' id='".$cd12."' onclick='callcart(this.id,".$row['CD1'].",".$row['CD2'].");addedtocartmessage()'> </div> </div>";
                                                            } else {
                                                                echo "<div class='drinkcard'><label><span class='prodmarg'> " . $row["product"] . "</span><span> ". $row["price"] . "円 </span></label><br><label class='drink-caption'> " . $row["drinkinfo"] . "</label><br><input type='submit' value='カートに入れる' data-name='".$row["product"]."' data-price='". $row["price"]  . "' data-prdid='". $cd12 . "'  data-cd2='". $row['CD2']. "' class='add-to-cart btn btn-primary' id='".$cd12."' onclick='callcart(this.id,".$row['CD1'].",".$row['CD2'].");addedtocartmessage()'></div> ";
                                                            };      
                                                                    }
                                                } 
                                                else {
                                                echo "<div class='defaultmessage'>該当結果が見つかりませんでした</div>";
                                                } 

?>


                    <script> 
                                function fullcap() {
                                        <?php echo $lastdesc=substr($row["drinkinfo"], 0, 600); ?>

                                }

                    </script>

                    <script>
                                function addedtocartmessage() {
                                    alert('この飲み物はカートに追加されました');
                                }
                    
                    </script>



<?php

?>
                                            
