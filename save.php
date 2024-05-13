<?php
require_once 'includes/database.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump($_POST);
    // Check if the submit button was clicked
    if (isset($_POST['submit'])) {
        // Get form data
        $name = $_POST['name'];
        $product_name = $_POST['product_name'];
        $product_advance = $_POST['advance'];
        $product_price = $_POST['product_price'];
        $installments = $_POST['installments'];
        $percentage = $_POST['percentage'];
        $buy_date = date("Y-m-d h:i:s a");


        // Calculate installment price
        $installment_price = (($product_price-$product_advance) * $percentage / 100 + ($product_price-$product_advance)) / $installments;

        // Save data to database
        $db = new Database();
        $str = "'$name', '$product_name','$product_price',$product_advance,'$installments','$percentage','$installment_price','$buy_date'";
        $db->insert($str);

        // Redirect back to index after successful submission
        header('Location: index.php');
        exit();
    } else {
        echo 'Submit button not clicked';
    }
}
?>
