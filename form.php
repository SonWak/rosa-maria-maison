<?php
$submitted = FALSE;
if ($_POST['contact_form']) {
$submitted = TRUE;  // The form has been submitted and everything is ok so far…
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$country = htmlspecialchars($_POST['country'], ENT_QUOTES);
$message = htmlspecialchars($_POST['message'], ENT_QUOTES);
if ($name == "") {
// if the name is blank… give error notice.
echo "<p>Please enter your name.</p>";
$submitted = FALSE;  // Set this to FALSE so that it the message is not sent.
}
if ($email == "") {
// if the email is blank… give error notice.
echo "<p>Please enter your e-mail address so that we can reply to you.</p>";
$submitted = FALSE;  // Set this to FALSE so that it the message is not sent.
}
if ($country == "") {
// if the country is blank… give error notice.
echo "<p>Please enter your country.</p>";
$submitted = FALSE;  // Set this to FALSE so that it the message is not sent.
}
if ($message == "") {
// if the message is blank… give error notice.
echo "<p>Please enter a question.</p>";
$submitted = FALSE;  // Set this to FALSE so that it the message is not sent.
}
if ($_POST['email'] != "" && (!strstr($_POST['email'],"@") || !strstr($_POST['email'],".")))
{
// if the string does not contain "@" OR the string does not contain "." then…
// supply a different error notice.
echo "<p>Please enter a valid e-mail address.</p>";
$submitted = FALSE;  // Set this to FALSE so that it the message is not sent.
}

$problemIn = '';

        $ip = $_SERVER['REMOTE_ADDR'];
        $url = (!empty($_SERVER['HTTPS']))
              ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']
               : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

$to = "falcao.vini@gmail.com";  // Set the target email address.
$header = "From: $email";
$attention = "Someone has sent you question from your webpage!";
$message = "Nome: $name \n Country: $country \n Mensagem: $message \n IP Address: $ip \n Link: $url \n";
if ($submitted == TRUE)
{
mail($to, $attention, $message, $header);
echo '<script type="text/javascript">alert("Thank you. Your question has been sent.");</script>';
}
}
?>
