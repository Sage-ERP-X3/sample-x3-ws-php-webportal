
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>

<title>Creation of a X3 order</title>
</head>

<body role="document">
	<?php include("includes/menu_home.php"); ?>
	
	<header style="border-bottom: 10px solid #00e14b;">
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Creation of a X3 order</div>
				<div class="intro-lead-in">Lets create a X3 order via web service</div>

			</div>

		</div>
	</header>
	<p />
	<div class="container">
		<div class="bs-component">
			<div class="row">
				<div class="col-lg-9 col-md-5 col-sm-3 text-center">
				<?php
				require_once ('WebService/modelWS/ModelWS.php');
				
				if ($isConnect) {
					// ToolsWS::printSucces ( "connexion reussie" );
				} else {
					ToolsWS::printError ( "connection refused" );
				}
				
				?>
	</div>
			</div>
		</div>
	</div>
	<div id="detail" class="container">
		<div class="bs-component">
			<div class="row">
				<div class="col-lg-9 col-md-5 col-sm-3">

					<form class="form-horizontal" action="page_soh_create_action.php"
						method="post">
						<fieldset>
							<legend>Form</legend>
							<div class="form-group" class="col-lg-4 control-label">
								<label for="formsalfcy" class="col-lg-4 control-label">Site</label>
								<!--div class="col-lg-5">
									<input type="text" class="form-control" id="formsalfcy2"
										name="formsalfcy2" placeholder="FR011">
								</div-->
								<div class="col-lg-5">
									<select class="form-control" id="formsalfcy" name="formsalfcy">
										<option value="FR011">FR011 - Comptech SA</option>
										<option value="FR012">FR012 - Fabtech SA</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<!--label for="formsohtyp" class="col-lg-4 control-label">Type</label-->
								<div class="col-lg-5">
									<input type="hidden" class="form-control" id="formsohtyp"
										name="formsohtyp" placeholder="WEB" value="WEB">
								</div>
							</div>
							<div class="form-group">
								<label for="formorddat" class="col-lg-4 control-label">Date</label>
								<div class="col-lg-5">
									<input type="date" class="form-control" id="formorddat"
										name="formorddat" value="<?php echo date("Y-m-d"); ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="formcur" class="col-lg-4 control-label">Currency</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formcur"
										name="formcur" placeholder="EUR" value="EUR">
								</div>
							</div>
							<div class="form-group">
								<label for="formbpcord" class="col-lg-4 control-label">Client</label>
								<div class="col-lg-5">
									<select class="form-control" id="formbpcord" name="formbpcord">
										<option value="FR001">FR001 - Urban Cycle</option>
										<option value="FR002">FR002 - Velo Attitudes</option>
										<option value="FR003">FR003 - Cybertek</option>
										<option value="FR004">FR004 - Micro Systems</option>
									</select>

								</div>
							</div>
						</fieldset>

						<fieldset>

							<div class="form-group">
								<table
									class='table table-striped table-bordered table-condensed'
									id='tableorderlines'>
									<thead>
										<tr>
											<th>Product</th>
											<th>Quantity</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><select class="form-control" name="formtabitmref[]">
													<option value="DIS009">DIS009 - Standard 22" screen 16:10</option>
													<option value="DIS010">DIS010 - Laser Printer B&amp;W 10ppm</option>
											</select></td>
											<td><input type="text" class="form-control"
												name="formtabqty[]" placeholder="1" value="1"></td>
											<td><button onclick="addLigne('tableorderlines');"
													class="btn btn-primary" type="button">
													<span class="glyphicon glyphicon-plus"></span>
												</button>
												<button onclick="removeLigne('tableorderlines',this);"
													class="btn btn-default" type="button">
													<span class="glyphicon glyphicon-remove"></span>

												</button></td>
										</tr>


									</tbody>
								</table>
							</div>

						</fieldset>
						<fieldset>
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
  if (isConnect==0) {
	  //$('#detail').attr("style","display:none");
	  $('#detail').attr("class","hide");
	  
  } 
  
          
		  	
    	  
    	 
});

    </script>
</body>
</html>


