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
	
	<header style="border-bottom: 10px solid #00e14b;">
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Read a X3 receipt</div>
				<div class="intro-lead-in">Read a X3 receipt via GraphQL api</div>

			</div>

		</div>
	</header>
	
	<div class="container">
		<div class="bs-component">
			<div class="row">
			<div class="col-lg-12 col-md-7 col-sm-5">
					<form class="form-horizontal" method="post" action=page_pth_gq_read.php>
						<fieldset>
							<legend>Selection</legend>
							<div class="form-group">
								<label for="formordnum" class="col-lg-4 control-label">Receipt number</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formreceiptnum"
										name="formreceiptnum" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="reset" class="btn btn-default">Cancel</button>
									<button type="submit" name="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>

						</fieldset>
						
						<h2 class="section-heading text-center">Purchase receipt details</h2>
						
					</form>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-12 col-md-7 col-sm-5 text-center">
					
					
							
									<?php
									require_once ('GraphQL/PurchaseReceipt.php');
									
									if (isset ( $_POST ["formreceiptnum"] )) {
										//echo ('ol1');
										$receiptnum = $_POST ['formreceiptnum'];
										$receipt = new PurchaseReceipt ();
										
										if ($receiptnum!='')
												echo ($receipt->showOne( $receiptnum ));
										
									} elseif (isset ( $_GET ["_id"] )) {
							
										$receiptnum = $_GET ['_id'];
										$receipt = new PurchaseReceipt ();
										echo ($receipt->showOne( $receiptnum ));
						
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
          //$val = $('#ordnum').attr('placeholder');
		  //console.log("ol1",$val);

		  //if ($val===undefined) {
			$val = '<?PHP if (isset($receiptnum)) {echo $receiptnum;}?>';
			//console.log("ol2",$val);
			
					  
		//}
		//$('#formordnum').val($val);
		$('#formreceiptnum').attr('value',$val);
});

    </script>
	</div>
</body>
</html>
