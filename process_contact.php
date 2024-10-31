<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate the inputs
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<div style='color: red;'>Please fill in all the fields.</div>";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<div style='color: red;'>Please enter a valid email address.</div>";
        exit;
    }

    // Email settings
    $to = "faithschoolstz@gmail.com"; // Replace with your email
    $email_subject = "Contact Form: $subject";
    $email_body = "You have received a new message from $name.\n\n".
                  "Email: $email\n\n".
                  "Message:\n$message";

    // Send email
    if (mail($to, $email_subject, $email_body)) {
        echo "<div style='color: green;'>Message sent successfully!</div>";
    } else {
        echo "<div style='color: red;'>Failed to send the message. Please try again.</div>";
    }
}
?>
