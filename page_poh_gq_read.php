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
				<div class="intro-heading">Read a X3 order</div>
				<div class="intro-lead-in">Read a X3 order via GraphQL api</div>

			</div>

		</div>
	</header>
	
	<div class="container">
		<div class="bs-component">
			<div class="row">
			<div class="col-lg-12 col-md-7 col-sm-5">
					<form class="form-horizontal" method="post" action=page_poh_gq_read.php>
						<fieldset>
							<legend>Selection</legend>
							<div class="form-group">
								<label for="formordnum" class="col-lg-4 control-label">Order number</label>
								<div class="col-lg-5">
									<input type="text" class="form-control" id="formordnum"
										name="formordnum" placeholder="">
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-10 col-lg-offset-2">
									<button type="reset" class="btn btn-default">Cancel</button>
									<button type="submit" name="read" class="btn btn-primary">Read</button>
									<button type="submit" name="create_recept" class="btn btn-primary">Create recept</button>
								</div>
							</div>

						</fieldset>
						
						<h2 class="section-heading text-center">Purchase order details</h2>
						<fieldset>
							
							<?php
									try {
									require_once ('GraphQL/PurchaseOrder.php');
									require_once ('GraphQL/PurchaseReceipt.php');
									
									if (isset ( $_POST ["formordnum"] )) {
										$ordnum = $_POST ['formordnum'];
										$order = new PurchaseOrder ();
										if (isset($_POST ["read"])) {
											echo ($order->showOneDetailOrder ( $ordnum ));
										} elseif (isset($_POST ["create_recept"])) {
											//var_dump($_POST);
											$receipt = new purchaseReceipt();
										
											$receiptSite=$_POST ["formpurshasesite"];
											$receiptDate=date("Y-m-d");
											$supplier=$_POST ["formsupplier"];
											
											$tabLineNumber = $_POST ["formtablinenumber"];
											$tabProduct = $_POST ["formtabproduct"];
											$tabBorderUnit = $_POST ["formtaborderunit"];
											$tabQtyToReceive = $_POST ["formtabqtytoreceive"];
											//echo(count ( $tabLineNumber ));
											$arrayLine= array(count ( $tabLineNumber ));
											for($i = 0; $i < count ( $tabLineNumber ); $i ++) {
												if ($tabQtyToReceive[$i]>0) {
													$arrayLine[$i] = array (
															"receiptSite"=>$receiptSite,
															"purchaseOrder"=>$ordnum,
															"purchaseOrderLineNumber"=>$tabLineNumber[$i],
															"product"=>$tabProduct[$i],
															"receiptUnit"=>$tabBorderUnit[$i],
															"quantityInReceiptUnitReceived"=>$tabQtyToReceive[$i],
															"stockDetails"=> array (
																"status"=>"A",
																"packingUnit"=>$tabBorderUnit[$i],
																"quantityInPackingUnit"=>$tabQtyToReceive[$i]
																			)
															);
											}
										}
											//var_dump($arrayLine);
										$arrayInput = array (
											"data"=> array (
												"receiptSite"=>$receiptSite,
												"receiptDate"=>$receiptDate,
												"supplier"=> $supplier,
												"lines"=> $arrayLine
											)
										);
										//var_dump($arrayInput);

										$receiptNum=$receipt->create ($arrayInput);
										echo ($order->showOneDetailOrder ( $ordnum ));

										}
										
										
									} elseif (isset ( $_GET ["_id"] )) {
										$ordnum = $_GET ['_id'];
										$order = new PurchaseOrder ();
										//if (isset($_POST ["read"])) {
											echo ($order->showOneDetailOrder ( $ordnum ));
										//}
										
									}
									} catch (Exception $e) {
										ToolsWS::printError ( $e );
									}
									?>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-5 col-md-3 col-sm-2">
					
				
							
									<?php
									
									//echo('<h2 class="section-heading">Receipt created</h2>');
									
											if (isset($receiptNum)) {
												$receipt = new purchaseReceipt();
												echo $receipt->display($receiptNum);
											}
											
									?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-7 col-sm-5 text-center">
					
					
							
									<?php
									
									echo('<h2 class="section-heading">List of Purchase receipts</h2>');
									if (isset ( $_POST ["formordnum"] )) {
										//echo ('ol1');
										$ordnum = $_POST ['formordnum'];
										$order = new PurchaseOrder ();
										//if (isset($_POST ["read"]) || isset($_POST ["create_recept"])) {
											
											if ($ordnum!='')
												echo ($order->showOneListRecept ( $ordnum ));
										//}
										
										
									} elseif (isset ( $_GET ["_id"] )) {
										//echo ('ol2');
										$ordnum = $_GET ['_id'];
										$order = new PurchaseOrder ();
										//if (isset($_POST ["read"])) {
											echo ($order->showOneListRecept ( $ordnum ));
										//}
										
									}
									//echo ($order->showOneDetailOrder ( $ordnum ));
									//echo ('ol3');
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
          $val = $('#ordnum').attr('placeholder');
		  //console.log("ol1",$val);

		  if ($val===undefined) {
			$val = '<?PHP if (isset($ordnum)) {echo $ordnum;}?>';
			//console.log("ol2",$val);
			
					  
		}
		//$('#formordnum').val($val);
		$('#formordnum').attr('value',$val);
});

    </script>
	</div>
</body>
</html>
