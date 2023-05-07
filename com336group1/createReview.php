<?php
    $connect = mysqli_connect("localhost", "root", "", "assignment");

    if(!$connect){
        die("Connection failed: " .mysqli_connect_error());
    } else{

        $sql = ("INSERT INTO reviews(product_id, review_description, review_rating)
                VALUES('".$_POST['productID']."',
                       '".$_POST['reviewDescription']."',
                       '".$_POST['reviewRating']."'
                    )");

        $reviewresult = mysqli_query($connect, $sql);
        echo("this should have worked");
        if($reviewresult == true){
            echo "A record has been inserted";
        } else{
            echo "A record has not been inserted";
        };
        echo("this should have worked");
        mysqli_close($connect);
        header("Location: reviews.php");
       
    }

?>