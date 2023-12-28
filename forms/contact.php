<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Email recipient (change this to your email)
    $to = "backupkhushank@gmail.com"; // Replace with your email
    
    // Compose the email message
    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" . "Name: $name\nEmail: $email\nMessage:\n$message";
    
    // Set up headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
    
    // Attempt to send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        http_response_code(200);
        echo "Success";
    } else {
        http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
} else {
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>

