<?php
// session_start();
$connect = mysqli_connect("localhost", "root", "", "assignment");

echo "Start";
if(isset($_GET['id'])) {
    echo "inside the if";
    $delete_id = mysqli_real_escape_string($connect, $_GET['id']);
    $sql = "DELETE FROM products WHERE product_id = '".$delete_id."'";
    if(mysqli_query($connect, $sql)) {
        echo "<br/><br/><span>deleted successfully...!!</span>";
    } else {
        echo "ERROR";
    }
}
?>