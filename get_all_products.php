<?php

/*
 * Following code will list all the products
 */

// array for JSON response
$response = array();

// connecting to db
include("db_connect.php");

// get all products from products table
$result = mysqli_query($mydb, "SELECT *FROM products") or die(mysql_error());

if(mysqli_connect_errno($mydb)){
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
else{
   $response["products"] = array();
   while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$product = array();
        $product["pid"] = $row["pid"];
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        $product["description"] = $row["description"];
        $product["created_at"] = $row["created_at"];
        $product["updated_at"] = $row["updated_at"];
        array_push($response["products"], $product);
   }
   $response["success"] = 1;
    echo json_encode($response);
   }
   mysqli_close($mydb);


// check for empty result
/*if (mysql_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["products"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["pid"] = $row["pid"];
        $product["name"] = $row["name"];
        $product["price"] = $row["price"];
        $product["description"] = $row["description"];
        $product["created_at"] = $row["created_at"];
        $product["updated_at"] = $row["updated_at"];



        // push single product into final response array
        array_push($response["products"], $product);
    }
    // success
    $response["success"] = 1;

    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";

    // echo no users JSON
    echo json_encode($response);
}
mysqli_close($mydb);
*/
?>
