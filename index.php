<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Information</title>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h2>Customer Information</h2>
    <form action="save.php" method="post" onsubmit="return validateForm()">
        <input type="text" name="name" placeholder="Customer's Name" required>
        <input type="text" name="product_name" placeholder="Product Name" required>
        <input type="number" name="product_price" id="product_price" placeholder="Product Price" required>
        <input type="number" name="advance" id="advance" placeholder="Advance" required>
        <input type="number" name="installments" id="installments" placeholder="Number of Installments" required>
        <input type="number" name="percentage" id="percentage" placeholder="Percentage" required>
        <button type="submit" name="submit" value="submit" aria-label="Submit Form">Submit</button>
    </form>
</div>
<div class="container">
    
    <h2>Customer Details</h2>
    <?php require_once 'display.php'; ?>

</div>

<script>
// Function to validate the form before submission


function validateForm() {
    // Validate name input
    var name = document.getElementsByName('name')[0].value;
    if (!/^[a-zA-Z\u0600-\u06FF\s]*$/.test(name)) {
        alert("Customer's Name must contain only letters.");
        return false; // Prevent form submission
}


    // Validate product_name input
    var product_name = document.getElementsByName('product_name')[0].value;
    if (!/^[a-zA-Z\u0600-\u06FF\s]*$/.test(product_name)) {
        alert("Product Name must contain only letters.");
        return false; // Prevent form submission
}


    // Validate product_price input
    var product_price = document.getElementById('product_price').value;
    if (!Number.isInteger(Number(product_price))) {
        alert('Product Price must be an integer.');
        return false; // Prevent form submission
    }

    // Validate advance input
    var advance = document.getElementById('advance').value;
    if (!Number.isInteger(Number(advance))) {
    alert('Advance must be an integer.');
    return false; // Prevent form submission
    }

    if (parseInt(advance) > parseInt(product_price)) {
        alert('Advance cannot be more than Product Price.');
        return false; // Prevent form submission
    }

    // Validate installments input
    var installments = document.getElementById('installments').value;
    if (!Number.isInteger(Number(installments))) {
        alert('Number of Installments must be an integer.');
        return false; // Prevent form submission
    }

    // Validate percentage input
    var percentage = document.getElementById('percentage').value;
    if (!Number.isInteger(Number(percentage))) {
        alert('Percentage must be an integer.');
        return false; // Prevent form submission
    }

    // Form validation successful, allow submission
    return true;
}
</script>

<script>
function decrement(id) {
    // Prompt for password
    var password = prompt("Please enter your password:");

    // Check if password is correct
    if (password === "122004") { // Replace "your_password_here" with the actual password
        // If password is correct, ask for confirmation
        if (confirm('Are you sure you want to decrement installments?')) {
            // If user confirms, proceed with the action
            window.location.href = 'decrement.php?id=' + id;
        }
    } else {
        // If password is incorrect, display an error message
        alert("Incorrect password. Please try again.");
    }
}

</script>
</body>
</html>
