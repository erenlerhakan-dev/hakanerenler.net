<?php
include_once('assets/class.phpmailer.php');
include_once('assets/class.smtp.php');
require_once 'assets/php-spam-filter/spamfilter.php';
$filter = new SpamFilter();
session_start();

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


$result1 = $filter->check_text($name);
if ($result1) { echo "nok"; exit; }
$result2 = $filter->check_text($email);
if ($result2) { echo "nok"; exit; }
$result3 = $filter->check_text($subject);
if ($result3) { echo "nok"; exit; }
$result4 = $filter->check_text($message);
if ($result4) { echo "nok"; exit; }
$result5 = $filter->check_text($phone);
if ($result5) { echo "nok"; exit; }

if (empty($name) OR strlen($name) < 9) { echo "nok"; exit; }
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "nok"; exit; }
if (empty($phone) OR strlen($phone) < 10) { echo "nok"; exit; }
if (empty($subject)) { echo "nok"; exit; }
if (strlen($message) < 15) { echo "nok"; exit; }

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
$mail->SMTPSecure  = "SSL";
$mail->Host        = "smtppro.zoho.eu";
$mail->Port        = 587;
$mail->Username    = "info@hakanerenler.net";
$mail->Password    = "454MDanaDM565!";
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