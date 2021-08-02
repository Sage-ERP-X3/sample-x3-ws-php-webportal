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
				<div class="col-lg-9 col-md-5 col-sm-3">
					<form class="form-horizontal" action="page_poh_gq_list.php"
						method="post">
						<fieldset>
							<legend>Selection</legend>
							<div class="form-group">
								<label for="formbusinesspartnerid" class="col-lg-4 control-label">Business partner id</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formbusinesspartnerid"
										name="formbusinesspartnerid" placeholder="">
								</div>
							</div>
							<div class="form-group" class="col-lg-4 control-label">
								<label for="formreceiptstatus" class="col-lg-4 control-label">Receipt status</label>
								<div class="col-lg-5">
									<select class="form-control" id="formreceiptstatus" name="formreceiptstatus">
										<option value="">No filter</option>
										<option value="no">No</option>
										<option value="partly">Partly</option>
										<option value="completely">Completely</option>
										<option value="notManaged">Not managed</option>
										<option value="yesAutomatic">Yes automatic</option>
									</select>
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
					<h2 class="section-heading">My purchase orders list</h2>

									
									<?php
									require_once ('GraphQL/PurchaseOrder.php');
									if (isset ( $_POST ["formbusinesspartnerid"] )) {
										$businesspartnerid = $_POST ['formbusinesspartnerid'];
										$receiptstatus = $_POST ['formreceiptstatus'];
										$order = new PurchaseOrder ();
										
										echo ($order->showList ( $businesspartnerid, $receiptstatus ));
										
									} else {
										$order = new PurchaseOrder ();
										// No filter
										echo ($order->showList ());
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
		//$val = $('#businesspartnerid').attr('placeholder');
    	//$('#formbusinesspartnerid').attr('value',$val);

    	  
    	 
});

    </script>

</body>
</html>
