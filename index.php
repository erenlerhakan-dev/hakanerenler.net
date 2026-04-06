<?php
ini_set('session.auto_start', 1);
session_start();
?>
<!DOCTYPE html>
<html lang="tr">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>Hakan ERENLER - Turizm Web Developer, Turizm Web Tasarımcı, Turizm Web Yazılımcısı, Turizm SEO Uzmanı, Turizm Sosyal Medya Uzmanı.</title>
<meta name="description" content="Hakan ERENLER - Turizm Web Developer, Turizm Web Tasarımcı, Turizm Web Yazılımcısı, Turizm Seo Uzmanı, Turizm Sosyal Medya Uzmanı.">
<meta name="keywords" content="turizm web developer, turizm web tasarımcı, turizm web yazılımcısı, turizm seo uzmanı, turizm sosyal medya uzmanı">

<?php include_once('head_meta.php'); ?>

</head>

<body id="page-top">

<!-- HERO -->
<?php include_once('hero.php'); ?>
<!-- HERO -->


<!-- NAVIGATION -->
<?php include_once('navbar.php'); ?>
<!-- NAVIGATION -->



<!-- PROFILE -->
<?php include_once('profile.php'); ?>
<!-- PROFILE -->


<!-- PORTFOLIO -->
<?php include_once('portfolio.php'); ?>
<!-- PORTFOLIO -->


<!-- SERVICES -->
<?php include_once('services.php'); ?>
<!-- SERVICES -->


<!-- STRENGTHS -->
<?php include_once('strengths.php'); ?>
<!-- STRENGTHS -->


<!-- RESUME -->
<?php include_once('resume.php'); ?>
<!-- RESUME -->


<!-- REFERENCES -->
<?php include_once('references.php'); ?>
<!-- REFERENCES -->


<!-- SKILLS -->
<?php include_once('skills.php'); ?>
<!-- SKILLS -->


<!-- KNOWLEDGE -->
<?php include_once('knowledge.php'); ?>
<!-- KNOWLEDGE -->


<!-- ACCOLADES -->
<?php include_once('accolades.php'); ?>
<!-- ACCOLADES -->


<!-- MILESTONES -->
<?php include_once('milestones.php'); ?>
<!-- MILESTONES -->


<!-- WORK PROCESS -->
<?php include_once('work_process.php'); ?>
<!-- WORK PROCESS -->


<!-- CONTACT -->
<?php include_once('contact.php'); ?>
<!-- CONTACT -->


<!-- FOOTER -->
<?php include_once('footer.php'); ?>
<!-- FOOTER -->


<a href="#page-top" class="page-scroll scroll-to-top bg-base-color"><i class="fa fa-angle-up"></i></a>


<!-- FOOTER SCRIPTS -->
<?php include_once('footer_scripts.php'); ?>
<!-- FOOTER SCRIPTS -->


<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-90174001-1', 'auto');
ga('send', 'pageview');

$("#contact_form").submit(function( event ) {
event.preventDefault();
$.ajax({
url: "send_contact_.php",
type: 'POST',
data: $('#contact_form').serialize(),
success: function(response){
if (response === "notvalid") {
alert("Lütfen güvenlik doğrulama işlemini tamamlayın.");
}
if (response === "nok") {
alert("Eksi ve ya hatalı bilgi. Lütfen kontrol edin.");
}
if (response === "ok") {
alert("Mesajınız başarıyla iletilmiştir. Teşekkür ederim.");
$("#contact_form")[0].reset();
$("#submit").attr("disabled", true);
grecaptcha.reset();
}
}
});
});

$( document ).ready(function() {
$("#xyz").click().delay(100);
});
</script>

</body>

</html>