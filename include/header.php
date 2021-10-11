<!-- Header Container  -->
        <header id="header" class=" typeheader-1">
            <!-- Header Top -->
            <div class="header-top hidden-compact">
                <div class="container">
                    <div class="row">
                        <div class="header-top-left col-lg-7 col-md-8 col-sm-6 col-xs-4">
                            <ul class="top-link list-inline hidden-lg hidden-md">
                                <li class="account" id="my_account">

                                <?php
                                    if(!isset($_SESSION['customer_email'])){
                                       ?>
                                        <ul class="dropdown-menu ">
                                                <li><a href="register.php"><i class="fa fa-user"></i> Register</a></li>
                                                <li><a href="checkout.php"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                                            </ul>
                                       <?php
                                    }else{
                                       ?>
                                            <?php
                                            
                                            $customer_email = $_SESSION['customer_email'];
                                    
                                            ?>
                                             <?php echo" $customer_email"?>
                                             <a href="checkout.php" title="My Account " class="btn-xs dropdown-toggle"
                                            data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span
                                            class="fa fa-caret-down"></span>
                                            </a>
                                            <ul class="dropdown-menu ">
                                                <li><a href="food.php"><i class="fa fa-user"></i> <?php echo" 
                                                $_SESSION[customer_email]"?></a></li>
                                                <li><a href="logout.php"><i class="fa fa-pencil-square-o"></i> Logout</a></li>
                                                
                                            </ul>

                                       <?php
                                    }

                                    ?>
<!-- 
                                    <a href="#" title="My Account " class="btn-xs dropdown-toggle"
                                        data-toggle="dropdown"> <span class="hidden-xs">My Account </span> <span
                                            class="fa fa-caret-down"></span>
                                    </a>
                                    <ul class="dropdown-menu ">
                                        <li><a href="register.php"><i class="fa fa-user"></i> Register</a></li>
                                        <li><a href="checkout.php"><i class="fa fa-pencil-square-o"></i> Login</a></li>
                                    </ul> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Header Top -->

            <!-- Header center -->
            <div class="header-middle">
                <div class="container">
                    <div class="row">

                        <!-- Main menu -->
                        <div class="main-menu col-lg-6 col-md-7 ">
                            <div class="responsive so-megamenu megamenu-style-dev">
                                <nav class="navbar-default">
                                    <div class=" container-megamenu  horizontal open ">
                                        <div class="navbar-header">
                                            <button type="button" id="show-megamenu" data-toggle="collapse"
                                                class="navbar-toggle">
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                        </div>

                                        <div class="megamenu-wrapper">
                                            <span id="remove-megamenu" class="fa fa-times"></span>
                                            <div class="megamenu-pattern">
                                                <div class="container-mega">
                                                    <ul class="megamenu" data-transition="slide"
                                                        data-animationtime="250">
                                                    
                                                        <li class="">
                                                            <p class="close-menu"></p>
                                                            <a href="index.php" class="clearfix">
                                                                <strong>Products</strong>
                                                                <span class="label"></span>
                                                            </a>
                                                        </li>

                                                        <li class="">
                                                            <p class="close-menu"></p>
                                                            <a href="index.php" class="clearfix">
                                                                <strong></strong>
                                                                <span class="label"></span>
                                                            </a>
                                                        </li>


                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <!-- //end Main menu -->

                        <div class="middle-right col-lg-4 col-md-3 col-sm-6 col-xs-8">
                            <div class="signin-w  hidden-sm hidden-xs">
                                <ul class="signin-link blank">

                                    <?php 
                                    if(!isset($_SESSION['customer_email'])){
                                       ?>
                                         <li class="log login"><i class="fa fa-lock"></i> <a class="link-lg"
                                            href="checkout.php">Login </a> or <a href="register.php">Register</a></li>
                                       <?php
                                    }else{
                                        echo" <li class='log login'> 
                                        <a href='checkout.php'class='link-lg'>$_SESSION[customer_email]</a>
                                        |  <a href='logout.php'>Logout</a>
                                        </li>";
                                    }
                                    ?>
                                   
                                </ul>
                            </div>
                         


                        </div>

                    </div>

                </div>
            </div>
            <!-- //Header center -->

            <!-- Header Bottom -->
            <div class="header-bottom hidden-compact">
                <div class="container">
                    <div class="row">

                        <div class="bottom1 menu-vertical col-lg-2 col-md-3 col-sm-3">
                            <div class="responsive so-megamenu megamenu-style-dev ">
                                <div class="so-vertical-menu ">
                                    <nav class="navbar-default">

                                      
                                    </nav>
                                </div>
                            </div>

                        </div>

                        <!-- Search -->
                        <div class="bottom2 col-lg-7 col-md-6 col-sm-6">
                            <div class="search-header-w">
                                
                            </div>
                        </div>
                        <!-- //end Search -->

                        <!-- Secondary menu -->
                        <div class="bottom3 col-lg-3 col-md-3 col-sm-3">


                            <!--cart-->
                            <div class="shopping_cart">
                                <div id="cart" class="btn-shopping-cart">

                                    <?php 
                                    
                                    if(isset($_SESSION['customer_email'])){
                                        ?>
                                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="true">
                                                    <div class="shopcart">
                                                        <span class="icon-c">
                                                            <i class="fa fa-shopping-bag"></i>
                                                        </span>
                                                        <div class="shopcart-inner">
                                                            <p class="text-shopping-cart">
                                                                My cart
                                                                
                                                            </p>
                                                            <span class="total-shopping-cart cart-total-full">
                                                                <span class="items_cart"><?Php echo count_product_in_cart();?></span><span class="items_cart2">
                                                                    item(s)</span><span class="items_carts">  + $<?php echo total_Amount_In_USD(); ?> </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                            </a>
                                            <ul class="dropdown-menu pull-right shoppingcart-box">
                                                <li>
                                                    <p class="text-center empty">YOU TOTAL AMOUNT IN: <br> MYR <strong><?php echo total_Amount_In_RM();?></strong> <br> USD <strong><?php echo total_Amount_In_USD();?><strong></p>
                                                </li>
                                                <li>
                                                    <input type="hidden" id="total_amount" value="<?php echo total_Amount_In_USD(); ?>">
                                                    <input type="hidden" id="user_id" value="<?php echo get_CusId(); ?>">
                                                    <input type="hidden" id="reward_points" value="<?php echo total_Reward_Point(); ?>">
                                                    
                                                <div class="pull-right">
                                                    <button class="btn btn-success" id="confirm_order"> CONFIRM ORDER</button>
                                                </div>
                                                </li>

                                            </ul>
                                        <?Php
                                    }
                                    
                                    ?>

                                    
                                </div>

                            </div>
                            <!--//cart-->

                           
                        </div>

                    </div>
                </div>

            </div>
        </header>
        <!-- //Header Container  -->