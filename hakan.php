<?php
$xml = simplexml_load_file('https://www.tcmb.gov.tr/kurlar/today.xml');

foreach ($xml->Currency as $Currency) {

if ($Currency['Kod']=="USD") { $usd_ES = $Currency->ForexSelling; }
if ($Currency['Kod']=="EUR") { $eur_ES = $Currency->ForexSelling; }
if ($Currency['Kod']=="GBP") { $gbp_ES = $Currency->ForexSelling; }

}
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

<meta name="google-site-verification" content="0ptwz7SnzKjWOtw5f7tQAbL8ti2sT8K_Dy0zgRRnjfQ" />
<link rel="shortcut icon" href="images/favicon.webp">

<meta name="p:domain_verify" content="788da2312da14e5cb7b50a32e8f04ca4"/>
<meta name="msvalidate.01" content="39C3167672F703D668887F9B96E5D632" />
<meta name="yandex-verification" content="4364d34afa95e0df" />

<head>
<script src="/assets/js/jquery-2.2.3.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

<style type="text/css">
.form-style-8{
font-family: 'Open Sans Condensed', arial, sans;
width: 60%;
padding: 30px;
background: #FFFFFF;
margin: 50px auto;
box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);
}
.form-style-8 h2{
background: #4D4D4D;
text-transform: uppercase;
font-family: 'Open Sans Condensed', sans-serif;
color: #797979;
font-size: 18px;
font-weight: 100;
padding: 20px;
margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="datetime"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="search"],
.form-style-8 input[type="time"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select 
{
box-sizing: border-box;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
outline: none;
display: block;
width: 100%;
padding: 7px;
border: none;
border-bottom: 1px solid #ddd;
background: transparent;
margin-bottom: 10px;
font: 16px Arial, Helvetica, sans-serif;
height: 45px;
}
.form-style-8 textarea{
resize:none;
overflow: hidden;
}
.form-style-8 input[type="button"], 
.form-style-8 input[type="submit"]{
-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
box-shadow: inset 0px 1px 0px 0px #45D6D6;
background-color: #2CBBBB;
border: 1px solid #27A0A0;
display: inline-block;
cursor: pointer;
color: #FFFFFF;
font-family: 'Open Sans Condensed', sans-serif;
font-size: 14px;
padding: 8px 18px;
text-decoration: none;
text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover, 
.form-style-8 input[type="submit"]:hover {
background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
background-color:#34CACA;
}
</style>

</head>

<body style="background-color: #444;">

<div class="form-style-8">

<form>
<input type="number" id="en" placeholder="En *" />
<input type="number" id="boy" placeholder="Boy *" />
<input type="number" id="gramaj" placeholder="Gramaj *" />
<input type="number" id="adet" placeholder="Adet *" />
<input type="button" id="hesap1" value="Kilo Hesapla" onClick="hesapla()" />
</form>

<hr>

<form>
<select name="merkez" id="kurr">
<option value="">Kur Seç</option>
<option value="<?php echo $usd_ES; ?>">USD</option>
<option value="<?php echo $eur_ES; ?>">EUR</option>
<option value="<?php echo $gbp_ES; ?>">GBP</option>
</select>
<input type="number" id="kur" placeholder="Kur *" />
<input type="number" id="ton" placeholder="Ton Fiyatı *" />
<input type="number" id="kilo" placeholder="Kilo *" />
<input type="button" id="hesap2" value="Hesapla Toplam" onClick="hesapla2()" />
</form>

<hr>

<table width=400px>
<tr>
<td width=200px><span style="font-size: 20px">SONUÇ : </span></td>
<td width=200px><span id="sonuc" style="font-size: 20px"></span></td>
</tr>
</table>

</div>

<script  type="text/javascript">
$('#kurr').on('change', function() {
var selval = this.value;
$('#kur').val(selval);
$('#kur').html(selval);
});


function hesapla() {
var en = $('#en').val();
var boy = $('#boy').val();
var gramaj = $('#gramaj').val();
var adet = $('#adet').val();
$('#kilo').val(en*boy*gramaj*adet);
}

function hesapla2() {
var kur = $('#kur').val();
var ton = $('#ton').val();
var kilo = $('#kilo').val();
if (kilo != "" ) {
$('#sonuc').html(ton*kur*kilo);
} else {
   
$('#sonuc').html("Önce Kilo Hesaplayın");
}
}

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-90174001-1', 'auto');
ga('send', 'pageview');
</script>

</body>
</html>