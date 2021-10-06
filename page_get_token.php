<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>

<title>Get JWT Token</title>
</head>
<body role="document">
    <?php include("includes/menu_home.php"); ?>
	
<header style="border-bottom: 10px solid #00e14b;">
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Token</div>
				<div class="intro-lead-in">Get JWT Token</div>

			</div>

		</div>
	</header>

	<div class="container">
		<div class="bs-component">
		<div class="row">
				<div class="col-lg-12 col-md-7 col-sm-5">
					<form class="form-horizontal" action="page_get_token.php"
						method="post">
						
					</form>
				</div>
		</div>
		<div class="row">
				<div class="col-lg-12 col-md-7 col-sm-5 text-center">
					<h2 class="section-heading">My JWT Token</h2>

									
									<?php
									require_once ('GraphQL/DisplayTokenJWT.php');
									
									$jwtToken = new DisplayTokenJWT ();
										
									echo ($jwtToken->getToken());
									//ToolsWS::printSucces ( $jwtToken->getToken() );
										
									
									?>
								
				</div>
			</div>
		</div>
	</div>
	
	<?php include("includes/end_body.php"); ?>
	<script type="text/javascript">
      // c'est ici que l'on va tester jQuery
      $(function(){
  // On peut accéder aux éléments.
  // $('#balise') marche.
  		set_icon_connect();
		var isConnect = '<?PHP echo $isConnect;?>';
  	    set_icon_connect(isConnect);
		  
		var $val = '<?PHP if (isset($businesspartnerid)) {echo $businesspartnerid;}?>';
    	$('#formbusinesspartnerid').attr('value',$val);

		$val = '<?PHP if (isset($receiptstatus)) {echo $receiptstatus;}?>';
		$('#formreceiptstatus').val($val);
		
		$val = '<?PHP if (isset($purchasesite)) {echo $purchasesite;}?>';
		$('#formpurchasesite').val($val);
    	  
    	 
});

    </script>

</body>
</html>
