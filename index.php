<?php include "include/top.php"?>

    <!-- Main Container  -->
    <div class="main-container container">
        <ul class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li><a href="#">Products</a></li>
        </ul>

        <div class="row">
            
            <!--Middle Part Start-->
            <div id="content" class="col-md-12 col-sm-12">
                <div class="products-category">
                    <h3 class="title-category ">Products</h3>

                    

                    <div class="products-list row nopadding-xs so-filter-gird">

                        <?php 
                            $get_products = mysqli_query($con, "SELECT * FROM product");
                            while($fetch_products = mysqli_fetch_array($get_products)){

                                
                                ?>
                                    <div class="product-layout col-lg-15 col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-item-container">
                                            <div class="left-block">
                                                <div class="product-image-container second_img">
                                                    <a href="product.html" target="_self" title="Jalapeno dolore">
                                                        <img src="<?php echo $fetch_products['image_url']; ?>"
                                                            class="img-1 img-responsive" alt="image">
                                                        <img src="<?php echo $fetch_products['image_url']; ?>"
                                                            class="img-2 img-responsive" alt="image">
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="right-block">
                                                <div class="caption">

                                            
                                                    
                                                    <h4><a href="product.html" title="Jalapeno dolore" target="_self"><?php echo $fetch_products['Name']?></a></h4>
                                                    <div class="price">RM <?php echo $fetch_products['Price']?></div>
                                                    <?php 
                                                    if(isset($_SESSION['customer_email'])){
                                                        ?>
                                                        
                                                        <button class="btn btn-success addProductInCart" data-productid = '<?php echo $fetch_products['id']?>' data-cusid = '<?PHP echo get_CusId(); ?>' id="cart_btn">
                                                        Add To Cart</button>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <button class="btn btn-success" id="login"> Add To Cart</button>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                
                                    </div>
                                <?php
                            }

                        ?>
                    </div>
                    <!--// End Changed listings-->
                </div>
            </div>
            <!--Middle Part End-->
        </div>
        <!--Middle Part End-->
    </div>
    <!-- //Main Container -->

<?php include "include/bottom.php"?>