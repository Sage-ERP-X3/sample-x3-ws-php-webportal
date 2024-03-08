<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>
<title>To log in</title>
</head>

<body role="document">
	<?php include("includes/menu_home.php"); ?>
	
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Connection</div>
				<div class="intro-lead-in">Succcesful connection ?</div>

			</div>

		</div>
	</header>
	<p />
	<div class="container">
		<div class="bs-component">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2 class="section-heading">Result</h2>

					
                    <?php
																				require_once ('WebServiceSOAP/models/Connect.php');
																				require_once ('tools-api/ToolsWS.php');
																				
																				$formlogin = $_POST ['formlogin'];
																				$formpasswd = $_POST ['formpasswd'];
																				
																				$x3Connect = new Connect ( $formlogin, $formpasswd );
																				$isConnect = $x3Connect->isConnect ();
																				if ($isConnect) {
																					//$_SESSION ["x3Connect"] = $x3Connect;
																					$_SESSION ["x3login"] = $formlogin;
																					$_SESSION ["x3passwd"] = $formpasswd;
																					ToolsWS::printSucces ( "Successful connection" );
																				} else {
																					$_SESSION ["x3login"] = "";
																					$_SESSION ["x3passwd"] = "";
																					ToolsWS::printError ( "connection refused" );
																				}
																				
																				?>
								
                   
				</div>
			</div>

		</div>
	</div>
	
<?php include("includes/end_body.php"); ?>
	<script type="text/javascript">
      // c'est ici que l'on va tester jQuery
      $(function(){
    	  var isConnect = '<?PHP echo $isConnect;?>';
    	  set_icon_connect(isConnect);
  // On peut accéder aux éléments.
  // $('#balise') marche.
   
  
          //$val = $('#sohnum').attr('placeholder');
    	  //$('#formsohnum').attr('placeholder',$val);
    	 
});

    </script>
</body>
</html>


