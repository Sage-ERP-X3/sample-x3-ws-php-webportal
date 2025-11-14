<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>
<title>X3 Web services - Home</title>
</head>

<body id="page-top" class="index" style="border-bottom: 10px solid #00e14b;">
	<?php include("includes/menu_home.php"); ?>
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">X3 Web service</div>
				<div class="intro-lead-in">
					This will show you how a web site, <br /> can call a X3 web
					service.
				</div>

			</div>

		</div>
	</header>
	
	<?php include("includes/end_body.php"); ?>
	<script type="text/javascript">
      // c'est ici que l'on va tester jQuery
      $(function(){
    	  var isConnect = '<?PHP echo $isConnect;?>';
    	  set_icon_connect(isConnect);
  // On peut acceder aux elements.
  // $('#balise') marche.
   
  
          //$val = $('#sohnum').attr('placeholder');
    	  //$('#formsohnum').attr('placeholder',$val);
    	 
});

    </script>

</body>
</html>