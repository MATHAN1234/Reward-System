

<?php include "include/top.php"?>

    <!-- Main Container  -->
    <div class="main-container container">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Register</a></li>
            </ul>

            <div class="row">
                <div id="content" class="col-sm-12">
                    <h2 class="title">Register Account</h2>
                    <p>If you already have an account with us, please login at the <a href="checkout.php">login page</a>.</p>
                    <form action="register.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal account-register clearfix">
                        <fieldset>
                            
                            
                           

                            <legend>Please fill the all fields</legend>

                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                                <div class="col-sm-10">
                                    <input type="email" name="c_email" value="" placeholder="E-Mail" id="input-email"
                                        class="form-control">
                                </div>
                            </div>

                            
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="c_pass" value="" placeholder="Password"
                                        id="input-password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" name="c_confirm_pass" value="" placeholder="Password Confirm" 
                                        id="input-confirm" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            
                            <div class="pull-right">
                                <button type="submit" name="register" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- //Main Container -->

<?php include "include/bottom.php"?>


<?php 

if(isset($_POST['register'])){


$ca_confirm_pass = $_POST['c_confirm_pass'];
$c_email = $_POST['c_email'];
$ca_pass = $_POST['c_pass'];
    if($ca_pass === $ca_confirm_pass){

        //: ENCRYPT PASSWORD
        $c_pass = password_hash("$ca_pass", PASSWORD_DEFAULT);
        $sql_email = "SELECT * FROM users WHERE email = '$c_email'";

        $res_u = mysqli_query($con, $sql_email) or die(mysqli_error($conn));

        if(mysqli_num_rows($res_u) > 0){

            echo "<script>alert('This account is already exist.. Try with different email address!')</script>";
            echo "<script>window.open('register.php','_self')</script>";

        }else {
            $sql = "insert into users (email,password,user_type) values ('$c_email','$c_pass','1')";

                if(mysqli_query($con, $sql)) {

                    // echo "<script>alert('DONE')</script>";
                    $_SESSION['customer_email']=$c_email;
                    echo "<script>window.open('index.php','_self')</script>";
            
                } else {
                    echo "Error insertin data: " . mysqli_error($con);
                }

                mysqli_close($con);
                echo "<script>window.open('index.php','_self')</script>";
                exit();
        }
        
    }else{
        echo "<script>alert('YOUR PASSWORD AND CONFIRM PASSWORD IS NOT MATCH!')</script>";
        echo "<script>window.open('register.php','_self')</script>";
    }

}

?>