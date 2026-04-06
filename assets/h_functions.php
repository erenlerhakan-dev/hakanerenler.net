<?php

### Real IP
function getIP()
{
if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
$ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else
{
$ip=$_SERVER['REMOTE_ADDR'];
}
return $ip;
}
### Real IP


### Email Spam Kontrol
function contains($spam_list, $message) {

if (count(array_intersect($spam_list, explode(" ", preg_replace("/[^A-Za-z0-9' -]/", "", $message)))) > 0) {
$res_ = 1;
} else {
$res_ = 0;
}
return $res_;
}

$spam_list = array('aZqfQJopRWYeTll','traffic','Traffic','TRAFFIC','SEO','Profile','my friend','Casino','CRYPTO','Crypto','crypto','Sex','Seks','SEX','SEKS','sex','seks','html','HTML','http','HTTP','href','HREF','</a>','</A>','/">','hacked','bitcoin','Bitcoin','BITCOIN','Viagra','viagra','VIAGRA','$$$','casino','CASINO','dvd','DVD','Egitim Seti','Egitim Bilgisi','TANITIM','tanıtım','SEKTOREL','sektörel','EGITIM SETI','EĞİTİM SETİ','/ CD','/ cd','- cd','- CD','https:','HTTPS:','sexy','SEXY','cost of sending','Skype','Kennethdup','FeedbackForm2019','RobertErula','Gabonosy','TRANSFER','BTC','WALLET','transfer','btc','wallet','Gobanosy','Roboter','Finanzroboter','Unabhängigkeit','Ronaldjog','Roboter','Bot','ereseeVek','Squeemo','RobertDourn','JamesFub','Project','Financing','Trading','HOT Girls','JamesNus','Etsy','Pinerest','Litecoin','Epiltsise','Passive','Naked Teens','Stevenron','JustinLiz','RonnieDup','Waynecaw','SMService','Robertlurne','Hi, i am writing about your   price','Hi    wrote about your the price for reseller','Hallo    writing about   the prices','Aloha,   wrote about your the price','Hallo, i wrote about your   price','Hello  i writing about     price','Hi    wrote about your the price','Hallo,   wrote about     prices','Aloha  i writing about your the price for reseller','Hallo, i am writing about     prices','Hello  i write about your   price for reseller','Hallo,   wrote about   the price for reseller','Hello  i am write about     prices','Hallo,   writing about your   price for reseller','Aloha    writing about your the price for reseller','Hi    wrote about your the priceHello,   writing about     price for reseller','     ','reseller','Account','Advertise','Unrecognized','Email lists','Serverjosep','Capital One','reseller','ForestloG','AlbertMut','DELETION','DON’T DELAY','WON’T WAIT','unlocked','CLAIM—COMPLETE','Prize','CLAIM','Preview','wedlolve','escort','перейдите на этот сайт','URGENT','COLLECT YOUR','PRIZE BEFORE','Final Reminder','User ID','INSTANT CASH','SECURE YOUR','COLLECT YOUR','TIME SENSITIVE','Jackpot','Act Now','Claim Your', 'Congratulations', 'https://t.me/s/');
### Email Spam Kontrol

?>