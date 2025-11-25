<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/jquery.easing.min.js"></script>
<script src="assets/js/jquery.matchHeight.min.js"></script>
<script src="assets/js/jquery.inview.min.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.flexslider.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="assets/plugins/morphext/morphext.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js?hl=tr'></script>

<script>
function isNumber(evt) {evt = (evt) ? evt : window.event;var charCode = (evt.which) ? evt.which : evt.keyCode;if (charCode > 31 && (charCode < 48 || charCode > 57)) {return false;}return true;}
$('.h_firstcap').keyup(function(evt){var txt = $(this).val();$(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));});
</script>