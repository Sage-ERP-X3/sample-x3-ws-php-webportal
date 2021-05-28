<?php
session_start ();

require_once ('WebService/models/Connect.php');
$isConnect = false;
if (isset ( $_SESSION ["x3login"] )) {
	$x3login = $_SESSION ["x3login"];
	$x3passwd = $_SESSION ["x3passwd"];
	
	$x3Connect = new Connect ( $x3login, $x3passwd );
	$isConnect = $x3Connect->isConnect ();
}

?>


<!-- Bootstrap Core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/agency.css" rel="stylesheet">
<!-- Custom CSS Benjamin-->
<link href="css/benjamin.css" rel="stylesheet">
<!-- Custom CSS Sage Benjamin-->
<link href="css/sagebenj.css" rel="stylesheet">
<!-- Custom CSS Sage-->
<!--<link href="css/sage.css" rel="stylesheet">-->

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet"
	type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
	rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script'
	rel='stylesheet' type='text/css'>
<link
	href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic'
	rel='stylesheet' type='text/css'>
<link
	href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'
	rel='stylesheet' type='text/css'>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
