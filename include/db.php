<?php

$con = mysqli_connect("localhost", "root", "", "infotech");

if($con)
{
    echo "";
}
else 
{
    die("Connection failed because ".mysqli_connect_error());
}


?>