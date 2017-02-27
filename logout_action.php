<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>
<title>Logout</title>
</head>

<body role="document">
	<?php include("includes/menu_home.php"); ?>
	
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Se deconnecter</div>
				<div class="intro-lead-in">Au revoir</div>

			</div>

		</div>
	</header>
	<p />
	<div class="container">
		<div class="bs-component">
			<div class="row">
				<div class="col-lg-12 text-center">
					

					
                    <?php
																				// require_once ('WebService/models/Connect.php');
																				require_once ('WebService/modelWS/ToolsWS.php');
																				$isConnect = false;
																				$_SESSION ["x3login"] = "";
																				$_SESSION ["x3passwd"] = "";
																				
																				ToolsWS::printSucces ( "Successful log off" );
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


