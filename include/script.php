
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


    
<!-- IF USER IS NOT LOGIN -->
<script>
    $(document).ready(function(){
        $('#login').click(function(){
            alert("You are not login yet..");
            location.href="checkout.php";
        });
    });
</script>
<!-- IF USER IS NOT LOGIN -->


<!-- ADD PRODUCT IN  CART -->
<script>
    document.querySelectorAll('.addProductInCart').forEach (function(addProductInCart){
        // console.log(addProductInCart);

        addProductInCart.addEventListener('click',function(){
            var cusid = this.getAttribute('data-cusid'); //: CUS-ID
            var productid = this.getAttribute('data-productid');  //: PRODDUCT-ID
            if($.trim(cusid).length > 0 && $.trim(productid).length >0){
                $.ajax({
                    url:"php_script/addProductInCart.php",
                    method:"POST",
                    data:{productid:productid, cusid:cusid},
                    cache:false,
                    beforeSend:function(){
                        // $("#addProductInCart").html('Loading..');
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

<!-- PLACE ORDER -->
<script>
    $(document).ready(function(){
        $('#confirm_order').click(function(){
            var total_amount = $('#total_amount').val();
            var user_id = $('#user_id').val();
            var reward_points = $('#reward_points').val();

            if($.trim(total_amount).length > 0 && $.trim(user_id).length > 0)
            {
                if(total_amount > 0){
                    $.ajax({
                        url:"php_script/placeOrder.php",
                        method:"POST",
                        data:{total_amount:total_amount, user_id:user_id, reward_points:reward_points},
                        cache:false,
                        beforeSend:function(){
                            // $("#passerror").html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Loading..<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                        },
                        success:function(data)
                        {
                            // alert(data);

                            if(data == 1){
                                alert("Your Order is Successfully Submitted");
                                location.href="checkout.php?my_orders";

                            }else{
                                alert(data);
                                
                            }
                        }
                    });
                }else{
                    alert("Your Cart is Empty, Please add some item");
                }
            }
            else
            {
                alert("SOMETHING WRONG");
            }
        });
    });
</script>
<!-- PLACE ORDER -->






   


    <!-- Theme files
	============================================ -->

    <script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
    <script type="text/javascript" src="js/themejs/addtocart.js"></script>
    <script type="text/javascript" src="js/themejs/application.js"></script>
    <script type="text/javascript">
        <!--
        // Check if Cookie exists
        if ($.cookie('display')) {
            view = $.cookie('display');
        } else {
            view = 'grid';
        }
        if (view) display(view);
        //-->
    </script>


  