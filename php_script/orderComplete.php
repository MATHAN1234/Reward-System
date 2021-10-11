<?php
    include "./../include/db.php";

    if(isset($_POST['orderid'])){
        $orderid = $_POST['orderid']; //: ORDER-ID

        //: GETTING ALL FIELDS FROM ORDERS TABLE 
        $get_fields = mysqli_query($con, "SELECT * FROM orders WHERE order_id = '$orderid'");
        $fetch_fields = mysqli_fetch_array($get_fields);
        $userId = $fetch_fields['user_id']; //: USER-ID
        $total_amount = $fetch_fields['total_amount']; //: TOTAL AMOUNT
        //: GETTING ALL FIELDS FROM ORDER TABLE
        $reward_point = $total_amount; //: REWARD POINTS - (ALREADY CHANGE PRICE FROM RM TO USD, PLEASE REFER FUNCTION total_Amount_In_USD in function.php Page). 

        // DATE AFTER ONE YEAR
        $today_date = date("Y-m-d");
        $date = strtotime($today_date);
        $new_date = strtotime('+ 1 year', $date);
        $day_after_oneyear = date('Y-m-d', $new_date);
        // DATE AFTER ONE YEAR

        //: UPDATE RECORD
        $update = mysqli_query($con, "UPDATE orders set status = 'COMPLETED' WHERE order_id = '$orderid'");
        if($update){
            $insert_reward = mysqli_query($con, "INSERT INTO user_reward(order_id,user_id,reward_points,reward_get_date,reward_expiry_date)
            values('$orderid','$userId','$reward_point','$today_date','$day_after_oneyear')");
            if($insert_reward){
                echo "DONE";
            }else{
                echo "SOMEHTHING WRONG";
            }
        }
        //: UPDATE RECORD
    }


?>