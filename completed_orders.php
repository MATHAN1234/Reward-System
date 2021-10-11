<?php
include ("include/db.php");


$cus_id = get_CusId();

?>

 <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h2 class="title">Your Completed Orders</h2>
                    <div class="table-responsive">
                    
                    <?php 

                    $query = "SELECT * FROM orders where user_id = '$cus_id' AND status = 'COMPLETED'";
                    $query_run = mysqli_query($con, $query);

                    ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">Order ID</td>
                                    <td class="text-center">Reference No</td>
                                    <td class="text-center">Total Amount </td>
                                    <td class="text-center">Status</td>
                                    <td class="text-center">Total Reward Points, You got from this Order</td>
                                </tr>
                            </thead>
                            <tbody>

                           <?php 


                                if(mysqli_num_rows($query_run) > 0)        
                                {
                                    while($row = mysqli_fetch_assoc($query_run))
                                    {
                                        
                                    ?>
                                        <tr>
                                            <td class="text-center"> <?php  echo $row['order_id']; ?></td>
                                            <td class="text-center"> <?php  echo $row['referenceno']; ?></td>
                                            <td class="text-center"> 
                                                <?php  
                                                echo "USD ". $row['total_amount'];
                                                $reward_point_used = $row['points_used'];

                                                if($reward_point_used > 0){
                                                    echo"<span style='color:green'><br>". $row['points_used']. " reward Points is used at this order</span>";
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center"> <?php  echo $row['status']; ?></td>
                                            <td class="text-center"> 
                                                <?php  
                                                    
                                                    //: GET ORDER REWARD POINTS: 
                                                    $orderid = $row['order_id'];

                                                    $get_reward_points = mysqli_query($con, "SELECT * FROM user_reward WHERE order_id = '$orderid'");
                                                    $fetch_reward_points = mysqli_fetch_array($get_reward_points);

                                                    $is_used = $fetch_reward_points['is_used'];
                                                    if($is_used == 0){
                                                    echo $fetch_reward_points['reward_points']." POINTS."."<br><br><span style='color:red;'>EXPIRY DATE:<span>  <br>   ".$fetch_reward_points['reward_expiry_date'];
                                                    }else{
                                                        echo $fetch_reward_points['reward_points']." POINTS."."<br><br><span style='color:green'>Already Used<span>";
                                                        
                                                    }
                                                    //: GET ORDER REWARD POINTS: 
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }

                                }
                            ?>
                                
                                    
                            
                            </tbody>
                        </table>
                    </div>

                </div>

    
