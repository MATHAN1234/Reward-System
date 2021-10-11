<?php include "include/top.php"?>

    <?php 
    
    if(isset($_SESSION['customer_email'])){

        include("ordersummary.php");
        
       
    }else{
        include("login.php");
       
    }
    
    ?>

    

<?php include "include/bottom.php"?>

<?php


    if(isset($_POST['c_login'])){
		
		$customer_email = $_POST['c_email'];
        $customer_passa = $_POST['c_pass'];
        $user_type = '1';
        

        $query = "SELECT * from users where email = '$customer_email' AND user_type = '$user_type'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0){

            while($row=mysqli_fetch_array($result)){

                if(password_verify($customer_passa, $row['password'])){

                    $_SESSION['customer_email']=$customer_email;

                    //     // echo"<script>window.open('customer/myaccount.php','_self') </script>";
                        echo"<script>window.open('index.php','_self') </script>";
            

                }else{

                    echo"<script> alert('Password or email address is not correctb, try Again');</script>";
                    exit();

                }
            }


        }else{
            echo"<script> alert('Password or email address is not correcta, try Again');</script>";
                exit();
        }

		
		
    }
    ?>




