<?php
session_start();

if(isset($_POST["submit"])) {
    $connect = mysqli_connect("localhost", "root", "", "assignment");

    if (!$connect){
        die("Connection Failed:" .mysqli_connect_error());
    } else{
        $email = $_POST["email"];
        $password = $_POST["password"];

        //check if it is customer
        $customer_query = "SELECT * FROM customers WHERE email_address = '" . $email . "' AND customer_password = '" . $password . "'";
        $customer_result = mysqli_query($connect, $customer_query);
        $customer_count = mysqli_num_rows($customer_result);

        //Check if staff member
        $staff_query = "SELECT * FROM staff WHERE staff_email_address = '" . $email . "' AND staff_password = '" . $password . "'";
        $staff_result = mysqli_query($connect, $staff_query);
        $staff_count = mysqli_num_rows($staff_result);


        //Check to see if user is in the table
        if($customer_count > 0){
            //if user is customer
            $customer = mysqli_fetch_assoc($customer_result);
            $_SESSION["customerID"] = $customer["customer_id"];
            header("Location: index.php");
        } elseif($staff_count > 0) {
            //if user is staff
            $staff = mysqli_fetch_assoc($staff_result);
            $_SESSION["staffID"] = $staff["staff_id"];
            header("Location: index.php");
        }else {
            //invalid email or password
            header("Location: login.php");
        }
    }
}
?>