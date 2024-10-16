<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Define your email where the form submissions will be sent
$recipient_email = "mohan.gaha.magar@gmail.com"; // Replace with your actual email address

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate form inputs
    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST["subject"]), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST["message"]), FILTER_SANITIZE_STRING);

    // Check if required fields are empty
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "All fields are required. Please fill out the form completely.";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please enter a valid email.";
        exit;
    }

    // Prepare the email content
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message\n";

    // Set email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($recipient_email, $email_subject, $email_body, $headers)) {
        echo "Thank you, $name! Your message has been sent successfully.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }

} else {
    // If form is not submitted, show an error message
    echo "There was a problem with your submission. Please try again.";
}
?>

