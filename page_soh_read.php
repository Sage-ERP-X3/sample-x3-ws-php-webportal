<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>

<title>Read a X3 order</title>
</head>

<body role="document">
	<?php include("includes/menu_home.php"); ?>
	
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Read a X3 order</div>
				<div class="intro-lead-in">Read a X3 order via the Object web service</div>

			</div>

		</div>
	</header>
	<p />
	<div class="container">
		<div class="bs-component">
			<div class="row">
				<div class="col-lg-9 col-md-5 col-sm-3">
					<form class="form-horizontal" action="page_soh_read.php"
						method="post">
						<fieldset>
							<legend>Selection</legend>
							<div class="form-group">
								<label for="formsohnum" class="col-lg-4 control-label">Order number</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formsohnum"
										name="formsohnum" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="reset" class="btn btn-default">Cancel</button>
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 col-md-7 col-sm-5 text-center">
					<h2 class="section-heading">Result</h2>

							
									<?php
									
									require_once ('WebService/models/Order.php');
									if (isset ( $_POST ["formsohnum"] )) {
										$sohnum = $_POST ['formsohnum'];
										try {
											$order = new Order ();
											echo ($order->showOne ( $sohnum ));
										} catch ( SoapFault $e ) {
											ToolsWS::printError ( "X3 Web service not available" );
										}
									} elseif (isset ( $_GET ["sohnum"] )) {
										$sohnum = $_GET ['sohnum'];
										try {
											$order = new Order ();
											echo ($order->showOne ( $sohnum ));
										} catch ( SoapFault $e ) {
											ToolsWS::printError ( "X3 Web service not available" );
										}
									}
									
									?>
								

			

				</div>
			</div>
		</div>
	
<?php include("includes/end_body.php"); ?>
	<script type="text/javascript">
      // c'est ici que l'on va tester jQuery
      $(function(){
  // On peut accéder aux éléments.
  // $('#balise') marche.
  		  var isConnect = '<?PHP echo $isConnect;?>';
    	  set_icon_connect(isConnect);
          $val = $('#sohnum').attr('placeholder');
    	  $('#formsohnum').attr('value',$val);
		  	
    	  
    	 
});

    </script>
	</div>
</body>
</html>
