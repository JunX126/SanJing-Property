<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize the form inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $paymentMethod = htmlspecialchars(trim($_POST['payment-method']));

    // Initialize an error array
    $errors = [];

    // Validate the inputs
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    if (empty($phone) || strlen($phone) < 10) {
        $errors[] = "A valid phone number is required.";
    }

    if (empty($paymentMethod)) {
        $errors[] = "Please select a payment method.";
    }

    // If there are errors, display them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        echo "<p><a href='purchase-form.html'>Go back to the form</a></p>";
    } else {
        // If the form is valid, process the purchase (for example, saving to a database)
        // Simulating a successful purchase process with a message
        echo "<h1>Thank you, $name!</h1>";
        echo "<p>Your purchase of the Luxury Condo 1 has been successful.</p>";
        echo "<p>We will contact you shortly at $email or $phone for further instructions.</p>";
        echo "<p>Payment Method: $paymentMethod</p>";

        // Redirect to a thank-you page if needed
        // header("Location: thank-you.php"); // Uncomment this line to redirect after successful submission
    }
} else {
    // Redirect back to form if the page is accessed directly
    header("Location: purchase-form.html");
    exit();
}
?>