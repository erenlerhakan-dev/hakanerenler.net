<?php
session_start();

include_once('assets/class.phpmailer.php');
include_once('assets/class.smtp.php');
include_once('assets/php-spam-filter/spamfilter.php');
include_once('assets/black_ip.php');

$filter = new SpamFilter();

if ($_SESSION['revalid'] != "revalid") {

$captcha = "";

if (isset($_POST["g-recaptcha-response"])) { $captcha = $_POST["g-recaptcha-response"]; }

if (!$captcha) { echo "notvalid"; exit; }

$secret = "6Lf-ajUUAAAAANEKYypcvIIzgpVp01MDpd2c3td-";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, [
'secret' => $secret,
'response' => $_POST['g-recaptcha-response'],
'remoteip' => $_SERVER['REMOTE_ADDR']
]);

$resp = json_decode(curl_exec($ch));
curl_close($ch);

if ($resp->success) { $_SESSION['revalid'] = "revalid"; }

else { echo "notvalid"; exit; }

}

if ($_SESSION['revalid'] == "revalid") {

if (!empty($_POST)) {

$name        = $_POST['name'];
$email       = $_POST['email'];
$subject     = $_POST['subject'];
$message     = $_POST['message'];
$phone       = $_POST['phone'];

$result1 = $filter->check_text($name); if ($result1) { echo "nok"; exit; }
$result2 = $filter->check_text($email); if ($result2) { echo "nok"; exit; }
$result3 = $filter->check_text($_phone); if ($result3) { echo "nok"; exit; }
$result4 = $filter->check_text($subject); if ($result4) { echo "nok"; exit; }
$result5 = $filter->check_text($message); if ($result5) { echo "nok"; exit; }

if (contains($spam_list, $name) == TRUE) { echo "bad"; exit; }
if (contains($spam_list, $email) == TRUE) { echo "bad"; exit; }
if (contains($spam_list, $_phone) == TRUE) { echo "bad"; exit; }
if (contains($spam_list, $subject) == TRUE) { echo "bad"; exit; }
if (contains($spam_list, $message) == TRUE) { echo "bad"; exit; }

if (empty($name)) { echo "name"; exit; }
if (empty($_phone) OR strlen($_phone) < 10) { echo "phone"; exit; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "emailbad"; exit; }
if (empty($email) OR strlen($email) < 9) { echo "email"; exit; }
if (empty($subject)) { echo "message"; exit; }
if (empty($message)) { echo "message"; exit; }
if (strlen($message) < 15) { echo "message_short"; exit; }

$email_title = date("d-m-Y h:i")." - Hakan ERENLER";

include_once('email_template.php');

$subject  = '=?UTF-8?B?'.base64_encode($email_title).'?=';

$mail              = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet     = "UTF-8";
$mail->SMTPDebug   = 0;
$mail->SMTPAuth    = true;
$mail->SMTPOptions = array(
                    'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                    )
                    );
$mail->SMTPSecure  = "TSL";
$mail->Host        = "smtppro.zoho.eu";
$mail->Port        = 587;
$mail->Username    = "info@hakanerenler.net";
$mail->Password    = "wbFA QeTL CR2i";
$mail->IsHTML(true);
$mail->SetFrom("info@hakanerenler.net", "Hakan Erenler Web Development");
$mail->Subject     = $subject;
$mail->MsgHTML($e_body);

$to1 = $email;
$to2 = "info@hakanerenler.net";

$mail->AddAddress($to1);
$mail->AddAddress($to2);

$mail->send();
$mail->ClearAllRecipients();

unset($_SESSION['revalid']);

echo "ok"; exit();

}

}


?>