<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = "rkrehman022@gmail.com";  // Your email address
  $name = strip_tags(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = strip_tags(trim($_POST["message"]));

  if (empty($name) || empty($email) || empty($message)) {
    echo "Please fill out all fields.";
    exit;
  }

  $email_subject = "New Contact Form Message: $subject";
  $email_body = "You received a message from your website:

";
  $email_body .= "Name: $name
";
  $email_body .= "Email: $email

";
  $email_body .= "Message:
$message
";

  $headers = "From: $name <$email>";

  if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Message sent successfully!";
  } else {
    echo "Message sending failed.";
  }
} else {
  echo "Invalid request.";
}
?>
