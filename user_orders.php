<?php
include ("include/db.php");


$cus_id = get_CusId();

?>

 <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h2 class="title">Your Orders</h2>
                    <div class="table-responsive">
                    
                    <?php 

                    $query = "SELECT * FROM orders where user_id = '$cus_id' AND status = 'PENDING'";
                    $query_run = mysqli_query($con, $query);

                    ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">Order ID</td>
                                    <td class="text-center">Reference No</td>
                                    <td class="text-center">Total Amount </td>
                                    <td class="text-center">Reward Points, You used for this order </td>
                                    <td class="text-center">Status</td>
                                   
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
                                     <td class="text-center"> <?php  echo "USD ". $row['total_amount']; ?></td>
                                     <td class="text-center"> <?php  echo $row['points_used']; ?></td>
                                     <td class="text-center"> <?php  echo $row['status']; ?></td>
                                     </tr>
                                     <?php
                                    }

                                }
                            ?>
                                
                                    
                            
                            </tbody>
                        </table>
                    </div>

                </div>

    
