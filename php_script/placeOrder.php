<?php
include "./../include/db.php";

if(isset($_POST['total_amount']) && isset($_POST['user_id']) && isset($_POST['reward_points'])){

    $user_id = $_POST['user_id'];
    $total_amount = $_POST['total_amount'];
    $reward_point = $_POST['reward_points'];
    $reference_no = mt_rand();
    $status = "PENDING";

    if( $reward_point == NULL){

        $reward_point = 0;
        $final_amount = $total_amount;

    }else{
        
        $reward_point = $reward_point;

        // formula to deduct points from total_amount
        $rate = 0.01; //: One points is equals to 0.01 USD. 
        $get_amount_after_deduct_points = $total_amount/$rate-$reward_point;
        $final_amount = $get_amount_after_deduct_points* $rate;
        // formula to deduct points from total_amount
    }

   

    

    $insert = mysqli_query($con, "INSERT INTO orders(user_id,referenceno,total_amount,points_used,status)values
    ('$user_id','$reference_no','$final_amount','$reward_point','$status')");

    if($insert){

            //: UPDATE REWARD TABLE FOR POINT IS USED 
            $update = mysqli_query($con, "UPDATE user_reward SET is_used = '1' WHERE user_id = '$user_id'");
            //: UPDATE REWARD TABLE FOR POINT IS USED

            //: DELETE FROM CART TABLE
            $delete = mysqli_query($con, "DELETE FROM customer_cart WHERE user_id = '$user_id'");
            if($delete){
                echo "1";
            }else{
                echo "SOMETHING WRONGA";
                // echo mysqli_error($con);
            }
             //: DELETE FROM CART TABLE

    }else{
            echo mysqli_error($con);
            // echo "SOMETHING WRONGB"; 
    }
  
}


?>