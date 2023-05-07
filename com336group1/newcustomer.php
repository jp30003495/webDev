<?php
    session_start();
    $connect = mysqli_connect("localhost", "root", "", "assignment");

    //check connection
    if (!$connect){
        die("Connection Failed:" .mysqli_connect_error());
    } else{
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $email_address = $_POST['email_address'];
        $customer_password = $_POST['customer_password'];
        $mobile_number = $_POST['mobile_number'];
        $date_of_birth = $_POST['date_of_birth'];
        $house_number = $_POST['house_number'];
        $address_line_1 = $_POST['address_line_1'];
        $town = $_POST['town'];
        $city = $_POST['city'];
        $postcode = $_POST['postcode'];
        $country = $_POST['country'];

        $sql = "INSERT INTO customers (first_name, second_name, email_address, customer_password, mobile_number, date_of_birth, house_number, address_line_1, town,
        city, postcode, country)
        VALUES ('$first_name', '$second_name', '$email_address', '$customer_password', '$mobile_number', '$date_of_birth', '$house_number', '$address_line_1', '$town', '$city', '$postcode', '$country')";

        $result = mysqli_query($connect, $sql);

        if($result == true)
        {
            header ("Location: login.php");
        } else{
            echo "Incorrect details!"; 
        }

        mysqli_close($connect);
    }
?>
