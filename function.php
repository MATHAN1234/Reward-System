<?php 
include("include/db.php");

//: GETTING CUS-ID
function get_CusId(){

    global $con; 
    $cus_email =  $_SESSION['customer_email'];
    $get_cusid = mysqli_query($con, "SELECT * FROM users WHERE email = '$cus_email'");
    $fetch_cusid = mysqli_fetch_array($get_cusid);
    return $fetch_cusid['id'];
}

//: COUNT ALL PRODUCTS IN USER-CART
function count_product_in_cart(){
    global $con;
    $cusid = get_CusId(); //: USER-ID
    $count_product_in_cart = mysqli_query($con, "SELECT COUNT(*) as 'count_Total_Products_In_Cart' 
    FROM customer_cart WHERE user_id = '$cusid'");
    $data = mysqli_fetch_array($count_product_in_cart);
    return  $data['count_Total_Products_In_Cart'];
}

//: CALCUATE AMOUNT FROM CART TABLE IN RM
function total_Amount_In_RM(){
    global $con;
    $cusid = get_CusId(); //: USER-ID
    $sum_product_in_cart = mysqli_query($con, "Select SUM(p.price) as 'total_cart'  from customer_cart c 
    INNER JOIN product p on c.product_id = p.id where c.user_id = '$cusid'");
    $data = mysqli_fetch_array($sum_product_in_cart);
    return $data['total_cart'];
}

//: CONVERT AMOUNT FROM RM TO USD
function total_Amount_In_USD(){
    $total_RM = total_Amount_In_RM();
    $total_USD = $total_RM / 4.18;  //: IN TODAYS CONVERSION RATE 1 dollar is equals to 4.18 RM
    return  number_format($total_USD,2);
}

//: CALCULATE THE SUM OF TOTAL REWARD POINTS
function total_Reward_Point(){
    global $con;
    $cusid = get_CusId(); //: USER-ID
    $sql = mysqli_query($con,"SELECT SUM(reward_points) as 'total_Reward_Points' FROM user_reward 
    WHERE user_id = '$cusid' AND DATE(reward_expiry_date) >  DATE(NOW()) AND is_used = '0'");
    $data = mysqli_fetch_array($sql);
    return $data['total_Reward_Points'];
}




?>