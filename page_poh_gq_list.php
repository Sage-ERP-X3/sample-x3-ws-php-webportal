<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>

<title>List of X3 orders</title>
</head>
<body role="document">
    <?php include("includes/menu_home.php"); ?>
	
<header style="border-bottom: 10px solid #00e14b;">
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">List of X3 orders</div>
				<div class="intro-lead-in">Use the GraphQL api</div>

			</div>

		</div>
	</header>

	<div class="container">




		<div class="bs-component">
			<div class="row">
				<div class="col-lg-12 col-md-7 col-sm-5 text-center">
					<h2 class="section-heading">My purchase orders list</h2>

																				
									<?php
									require_once ('GraphQL/PurchaseOrder.php');
									
										$order = new PurchaseOrder ();
										echo ($order->showListe ());
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
  		set_icon_connect();var isConnect = '<?PHP echo $isConnect;?>';
  	    set_icon_connect(isConnect);
  
    	  
    	 
});

    </script>

</body>
</html>
