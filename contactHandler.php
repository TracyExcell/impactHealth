<?php
$errors = '';
$myEmail = 'excelltracy@gmail.com';  //SETME

function died($error) {
    // Basic error handling and feedback
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "Plese fix the following errors:<br /><br />";
    echo $error."<br /><br />";
    die();
}

// Just check that mandatory info is present
if(empty($_POST['name'])  || empty($_POST['user_email-address']) || empty($_POST['user_topics'])) {
    $errors .= "\n Error: all fields are required";
    // No point going any further if mandatory fields are missing
    died($errors);
}

$name = stripslashes(trim($_POST['name'])); // required
$message = stripslashes(trim($_POST['user_topics'])); // required
$email = stripslashes(trim($_POST['user_email-address'])); // required
$number = stripslashes(trim($_POST['user_homeNumber']));
$mobile = stripslashes(trim($_POST['user_mobileNumber']));

// Do some basic pattern matching to make sure we are not getting nefarious data
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors .= "\n Error: Invalid email address";
}

if (!preg_match("/^[A-Za-z .'-]+$/", $name)) {
    $errors .= "\n Error: Looks like you entered special characters in your name";
}

if(strlen($message) < 2) {
    $errors .= 'The Comments you entered do not appear to be long enough to make sense.<br />';
}

// If there were any errors, report them to the user and stop the script before sending mail.
if(strlen($errors) > 0) {
    died($errors);
}

// Everything is passing basic checks, set up and send the email.
// TODO:  Make an email template and require to script to tidy up this part.
$headers = "From: $myEmail" . "\r\n" .
"Reply-To: $email" . "\r\n" .
'X-Mailer: PHP/' . phpversion();
$subject = "Contact form submission from: $name";
$contactMessage = "Name: $name" . "\r\n" .
"E-mail: $email" . "\r\n" .
"Phone: $number" . "\r\n" .
"Cell: $mobile" . "\r\n" .
"Message: $message";

// Send the email
//mail($to, $subject, $message, $headers);
if(mail($myEmail, $subject, $contactMessage, $headers)) {
    header("Location: success.html");
} else {
    header("Location: fail.html");
}

?>
