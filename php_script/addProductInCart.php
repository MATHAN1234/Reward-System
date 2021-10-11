<?php
include "./../include/db.php";

if(isset($_POST['productid']) && isset($_POST['cusid'])){

   $Product_ID = $_POST['productid'];
   $Cus_ID = $_POST['cusid'];

   $check = mysqli_query($con, "SELECT * FROM customer_cart WHERE product_id = '$Product_ID' AND user_id = '$Cus_ID'");
   if(mysqli_num_rows($check)>0){
       echo "You Already Add this item in Cart, Please Proceed to checkout first";
   }else{
        $insert = mysqli_query($con, "INSERT customer_cart (product_id,user_id)values('$Product_ID','$Cus_ID')");

        if($insert){
            echo "Your Product is successfully added in you cart";
        }else{
            echo "SOMETHING WRONG";
        }
   }
}


?>