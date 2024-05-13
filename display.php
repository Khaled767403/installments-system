<?php
require_once 'includes/database.php';


$db = new Database();
$customers = $db->fetchAll('cust');

if (!empty($customers)) {
    echo '<table>';
    echo '<tr><th>Name</th><th>Product Name</th><th>Price</th><th>Advance</th><th>Installments Number</th><th>Percentage</th><th>Installment Price</th><th>Buy Date</th><th>Action</th></tr>';
    foreach ($customers as $customer) {
        echo '<tr>';
        echo '<td>' . $customer['name'] . '</td>';
        echo '<td>' . $customer['p_name'] . '</td>';
        echo '<td>' . $customer['price'] . '</td>';
        echo '<td>'. $customer['advance'] . '</td>';
        echo '<td>' . $customer['number_of_installments'] . '</td>';
        echo '<td>' . $customer['percent'] . '</td>';
        echo '<td>' . $customer['installment price'] . '</td>';
        echo '<td>' . $customer['buy_date'] . '</td>';
        echo '<td><button onclick="decrement(' . $customer['id'] . ')">Decrement Installment</button></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No customer data available.';
}

?>
