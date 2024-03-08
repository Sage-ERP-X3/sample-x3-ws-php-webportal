<?php session_start();?>
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
	
<header  style="border-bottom: 10px solid #00e14b;">
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Stock</div>

			</div>

		</div>
	</header>

	<div class="container">
		<div class="bs-component">

			<div class="row">
				<div class="col-lg-9 col-md-5 col-sm-3">
					<form class="form-horizontal" action="page_stock_list.php"
						method="post">
						<fieldset>
							<legend>Selection</legend>
							<div class="form-group">
								<label for="formsite" class="col-lg-4 control-label">Site</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formsite"
										name="formsite" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="formitm" class="col-lg-4 control-label">Article</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formitm"
										name="formitm" placeholder="">
								</div>
							</div>
							<div class="form-group">
								<label for="formlot" class="col-lg-4 control-label">Lot</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formlot"
										name="formlot" placeholder="">
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
					require_once ('WebServiceSOAP/models/stock.php');
					if (isset ( $_POST ["formsite"] )) {
						//$formfcypat="AO021";
						$formfcypat=$_POST ['formsite'];
						//$formitmpat="RAW*";
						$formitmpat=$_POST ['formitm'];
						$formlotpat=$_POST ['formlot'];
						$WS = "<PARAM><GRP ID=\"GRP1\" >";
						$WS .= "<FLD NAME=\"I_PAT_STOFCY\">$formfcypat</FLD>";
						$WS .= "<FLD NAME=\"I_PAT_ITM\">$formitmpat</FLD>";
						$WS .= "<FLD NAME=\"I_PAT_LOT\">$formlotpat</FLD>";
						$WS .= "</GRP>";					
						$WS .= "</PARAM>";
						try {
							$stock = new Stock ();
							echo ($stock->Liste ($WS));
						} catch ( SoapFault $e ) {
						ToolsWS::printError ( "X3 Web service not available" );
						}
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
  // On peut accéder aux éléments.
  // $('#balise') marche.
  		set_icon_connect();var isConnect = '<?PHP echo $isConnect;?>';
  	    set_icon_connect(isConnect);  
    	 
});

    </script>

</body>
</html>
