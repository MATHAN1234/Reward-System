<html>
<?php 
include "include/head.php";
include("include/db.php");
include("function.php");


?>

<body>

<div id="content" class="col-sm-9">
                    <h1>ADMIN PANEL</h1>
                    <h2 class="title">ALL Orders</h2>
                    <div class="table-responsive">
                    
                    <?php 

                    $query = "SELECT * FROM orders ORDER BY status DESC";
                    $query_run = mysqli_query($con, $query);

                    ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-center">Order ID</td>
                                    <td class="text-center">User / Customer</td>
                                    <td class="text-center">Reference No</td>
                                    <td class="text-center">Total Amount </td>
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

                                    <td class="text-center"> <?php  

                                        $user_id = $row['user_id'];

                                        $get_customer = mysqli_query($con, "SELECT * FROM users where id = '$user_id'");
                                        $fetch_customer = mysqli_fetch_array($get_customer);
                                        $user_email = $fetch_customer['email'];
                                     
                                        echo "ID:  ". $row['user_id'];
                                        echo "<br> Email:". $user_email ?>
                                    </td>


                                    <td class="text-center"> <?php  echo $row['referenceno']; ?></td>
                                    <td class="text-center"> <?php  echo "USD ". $row['total_amount']; ?></td>
                                         
                                     <?php 
                                     $status = $row['status'];

                                     if($status == "PENDING"){
                                        ?>
                                        <td class="text-center"> 
                                            <button class="btn btn-success order_complete" data-orderid = '<?php echo $row['order_id'];?>'>Pending</button>
                                        </td>
                                        <?php
                                     }else{
                                        ?>
                                        <td class="text-center"> <?php  echo $row['status']; ?></td>
                                        <?php
                                     }
                                     ?>

                                     
                                     </tr>
                                     <?php
                                    }

                                }
                            ?>
                                
                                    
                            
                            </tbody>
                        </table>
                    </div>

                </div>

    <!-- SCRIPT -->

    <!-- Include Libs & Plugins
	============================================ -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="js/themejs/libs.js"></script>
    <script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
    <script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
    <script type="text/javascript" src="js/datetimepicker/moment.js"></script>
    <script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>

    <!-- ADD PRODUCT IN  CART -->
<script>
    document.querySelectorAll('.order_complete').forEach (function(order_complete){
        // console.log(addProductInCart);

        order_complete.addEventListener('click',function(){

            var orderid = this.getAttribute('data-orderid'); //: ORDER-ID

            if($.trim(orderid).length > 0){
                $.ajax({
                    url:"php_script/orderComplete.php",
                    method:"POST",
                    data:{orderid:orderid},
                    cache:false,
                    beforeSend:function(){
                        
                    },
                    success:function(data)
                    {
                        alert(data);
                        location.reload();
                    }
                });
            }else{
                alert("Something Wrong, Please Check")
            }

        });
    });
</script>
<!-- ADD PRODUCT IN CART -->

    <!-- Theme files
	============================================ -->

    <script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
    <script type="text/javascript" src="js/themejs/addtocart.js"></script>
    <script type="text/javascript" src="js/themejs/application.js"></script>
    <script type="text/javascript">
    </script>
                           

    <!-- SCRIPT -->
</body>
</html>
