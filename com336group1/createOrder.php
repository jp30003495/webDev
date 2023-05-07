<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "assignment");

echo "Connected   ";


if(isset($_POST["checkout"]))
{
    echo "Inside If  ";

	// Insert the order into the database
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
		$product_id = $values["product_id"];
		$product_name = $values["product_name"];
		$product_price = $values["product_price"];
		$product_stock = $values["product_stock"];

		$query = "INSERT INTO orders (product_id, product_name, product_price) VALUES ('$product_id', '$product_name', '$product_price')";
		mysqli_query($connect, $query);
	}

    echo "Code injected   ";

	// Clear the shopping cart after checkout
	unset($_SESSION["shopping_cart"]);

    echo "ASession unset   ";


	// Redirect to the success page
	header("location: index.php");
	exit;
}

?>