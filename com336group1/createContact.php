<?php
    $connect = mysqli_connect("localhost", "root", "", "assignment");

    if(!$connect){
        die("Connection failed: " .mysqli_connect_error());
    } else{

        $sql = ("INSERT INTO contact(contact_name, contact_number, contact_email, contact_subject, message_contents)
                VALUES('".$_POST['contactName']."',
                       '".$_POST['contactNumber']."',
                       '".$_POST['contactEmail']."',
                       '".$_POST['contactSubject']."',
                       '".$_POST['messageContents']."'
                    )");

        $result = mysqli_query($connect, $sql);

        if($result == true){
            echo "A record has been inserted";
        } else{
            echo "A record has not been inserted";
        };
        mysqli_close($connect);
        header("Location: contact.php");
    }

?>