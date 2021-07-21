<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo base_url();?>">
    <title>Login | Invoice </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="assets/loginv3src/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/css/util.css?v=3.0">
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/css/main.css?v=3.0">
    <link rel="stylesheet" type="text/css" href="assets/loginv3src/css/custom.css?v=3.0">
<!--===============================================================================================-->
	<!-- Sweet Alert Css -->
    <link href="assets/loginv3src/plugins/sweetalert/sweetalert.css?v=2.0" rel="stylesheet" />
	<!-- Slider Captcha Css -->
	<link href="assets/loginv3src/css/slidercaptcha.min.css?v=2.0" rel="stylesheet" />
	
	<style>

        .slidercaptcha {
            margin: 0 auto;
            width: 314px;
            height: 286px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.125);
            margin-top: 40px;
        }

            .slidercaptcha .card-body {
                padding: 1rem;
            }

            .slidercaptcha canvas:first-child {
                border-radius: 4px;
                border: 1px solid #e6e8eb;
            }

            .slidercaptcha.card .card-header {
                background-image: none;
                background-color: rgba(0, 0, 0, 0.03);
            }

        .refreshIcon {
            top: -54px;
        }
    </style>
</head>
<body>
    
   <?=$content_for_layout?>
    
<!-- Jquery Core Js -->
  <script src="assets/loginv3src/plugins/jquery/jquery.min.js?v=2.0"></script>
  <script src="assets/loginv3src/js/longbow.slidercaptcha.js?v=5.0"></script>
    
<script>
$(document).on("keydown", "form", function(event) { 
	if(event.key == "Enter")
	{
		swal("You need to complete the security check!")
	}	
    return event.key != "Enter";
});
$(function() {
	
	$("#loginbtn").hide();
	//$("#slidercaptcha").hide();
	$("#loginloader").hide();
	/*$(this).bind("contextmenu", function(e) {
		e.preventDefault();
		alert('Opppps! You are not allowed to see my code!');
	});*/
	$( "#loginbtn" ).click(function() {
	  $("#loginloader").show();
	});
	
	$( "#privacy" ).click(function() {
	  alert("ICTO of Cebu Provincial Government (CPG) operates infosys.cebu.gov.ph.ICTO is committed in protecting your privacy and security of your personal information. While using our own system and site, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you, process the requested service and for improving the site. We may collect information that your browser sends whenever you visit our site. This may include information such as your computer's Internet Protocol (IP) address, browser type and version, the pages of our site that you visit, your location, the time and date of your visit, the time spent on those pages and other statistics. This information is used for security and analytics purposes only.ICTO uses a variety of security technologies and procedures to help and protect your personal information from unauthorized access, use, or disclosure. Your personal information is never shared outside the Cebu Provincial Government without your permission except where necessary to complete the services or transactions you have requested or as required by the law.By using the site, you hereby AGREE to the collection and use of information in accordance with this policy. This privacy policy was last modified on October 19, 2018.");
	});
});
</script>

<script>
        var captcha = sliderCaptcha({
            id: 'captcha',
            repeatIcon: 'fa fa-redo',
			setSrc: function () {
                return '<?php echo base_url();?>assets/loginv3src/images/Pic61.jpg';
            },
            onSuccess: function () {
                var handler = setTimeout(function () {
                    window.clearTimeout(handler);
                    //captcha.reset();
					$("#loginbtn").show();
                }, 500);
            }
        });
	</script>

<!-- Sweet Alert Plugin Js -->
    <script src="assets/loginv3src/plugins/sweetalert/sweetalert.min.js"></script>
</body>
</html>