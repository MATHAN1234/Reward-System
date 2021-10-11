<!-- Main Container  -->
<div class="main-container container">

<ul class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-home"></i></a></li>
    <li><a href="">Your Account</a></li>
</ul>

<div class="row">
      <!--Right Part Start -->
      <aside class="col-sm-3" id="column-right">
        <h2 class="subtitle">Account</h2>
        <div class="list-group">
            <ul class="list-item">
            <?php
                if(isset($_SESSION['customer_email'])){

                    $customer_email = $_SESSION['customer_email'];
                   
                }
                ?>
                <li><a href="checkout.php">Account Control Panel</a>
                </li>
                <li><a href="checkout.php?my_orders">Your Pending Order</a>
                </li>
                <li><a href="checkout.php?completed_orders">Your Completed Orders</a>
                </li>
               
            </ul>
        </div>
    </aside>
    <!--Right Part End -->
   
    
    <!--Middle Part Start-->
    <div id="content" class="col-sm-9">
    <?php 

        if(isset($_GET['my_orders'])){
            include("user_orders.php");

        }else if(isset($_GET['completed_orders'])){
            include("completed_orders.php");

        }else{
        ?>

                <h2>Account Control Panel</h2>
                <strong>Hello <?php echo "$customer_email"?></strong><br />
                <p>From your account control panel, you can access all of your reward points, pending orders and Completed Orders.</p>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="well">
                            <h3>Contact Information</h3>
                            
                            <p>Email : <?php echo "$customer_email"?></p>
                            <p>Your Total Reward Points : <?Php 

                                $reward_point = total_Reward_Point();

                                if($reward_point == ''){
                                    echo "0";
                                }else{
                                    echo total_Reward_Point();
                                }
                            
                            ?> POINTS</p>
                           
                            
                        </div>
                    </div>




                </div>

        <?php
                } //:: End of isset myorder
            ?>

      

    </div>
    <!--Middle Part End-->
  
</div>
</div>
<!-- //Main Container -->