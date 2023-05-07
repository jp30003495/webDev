<?php
    $connect = mysqli_connect("localhost", "root", "", "assignment");

    if(!$connect){
        die("Connection failed: " .mysqli_connect_error());
    } else{

        $sql = ("INSERT INTO products(product_name, product_description, product_brand, product_type, product_price, product_stock, product_image)
                VALUES('".$_POST['productName']."',
                       '".$_POST['productDescription']."',
                       '".$_POST['productBrand']."',
                       '".$_POST['productType']."',
                       '".$_POST['productPrice']."',
                       '".$_POST['productStock']."',
                       '".$_POST['productImage']."'
                    )");

        $result = mysqli_query($connect, $sql);

        if($result == true){
            echo "A record has been inserted";
        } else{
            echo "A record has not been inserted";
        };
        mysqli_close($connect);
        header("Location: staff.php");
    }

?>