<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "rkrehman022@gmail.com";  // 👈 Your email address
  $name = strip_tags($_POST["name"]);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $subject = strip_tags($_POST["subject"]);
  $message = strip_tags($_POST["message"]);

  if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill out all fields.";
    exit;
  }

  $email_subject = "New Message: $subject";
  $email_body = "You received a message from your website:\n\n";
  $email_body .= "Name: $name\n";
  $email_body .= "Email: $email\n\n";
  $email_body .= "Message:\n$message\n";

  $headers = "From: $name <$email>";

  if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
  } else {
    echo "Failed to send message.";
  }
} else {
  echo "Invalid request.";
}
?>
