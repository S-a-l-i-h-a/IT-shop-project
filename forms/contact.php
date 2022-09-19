<?
$Email=$_POST['email'];
$subject=$_POST['need'];
$message=$_POST['message'];
$body .= "Email: " . $Email . "\n";
$body .= "subject: " . $subject . "\n";
$body .= "Message: " . $message . "\n";
//replace with your email
mail("salihamustafic@gmail.com","From IT-shop",$body);
?>
<!DOCTYPE html PUBLIC >

<head>
<script>alert("Your email has been sent. Thank You!");</script>
<meta HTTP-EQUIV="REFRESH" content="0; url=http://localhost/IT-shop-project/">
</head>
