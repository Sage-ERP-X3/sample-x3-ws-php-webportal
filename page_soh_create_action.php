<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php include("includes/head.php"); ?>

<title>X3 order created</title>
</head>

<body role="document">
	<?php include("includes/menu_home.php"); ?>
	
	<header>
		<div class="container">
			<div class="intro-text">
				<div class="intro-heading">Creation of X3 order</div>
				<div class="intro-lead-in">Gives details of the X3 order following the creation via web service</div>

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
																				require_once ('WebServiceSOAP/models/Order.php');
																				// echo "</BR>";
																				$formsalfcy = $_POST ['formsalfcy'];
																				$formsohtyp = $_POST ['formsohtyp'];
																				$formorddat = $_POST ['formorddat'];
																				$formcur = $_POST ['formcur'];
																				$formbpcord = $_POST ['formbpcord'];
																				
																				$formtabitmref = $_POST ['formtabitmref'];
																				$formtabqty = $_POST ['formtabqty'];
																				
																				$WS = "<PARAM><GRP ID=\"SOH0_1\" >";
																				$WS .= "<FLD NAME=\"SALFCY\">$formsalfcy</FLD>";
																				$WS .= "<FLD NAME=\"SOHTYP\">$formsohtyp</FLD>";
																				$newDate = date ( "Ymd", strtotime ( $formorddat ) );
																				// echo ("olivier".$newDate);
																				$WS .= "<FLD NAME=\"ORDDAT\">$newDate</FLD>";
																				$WS .= "<FLD NAME=\"CUR\">$formcur</FLD>";
																				$WS .= "<FLD NAME=\"BPCORD\">$formbpcord</FLD>";
																				$WS .= "</GRP>";
																				$WS.="<GRP ID=\"SOH2_1\" >";
																				$WS .= "<FLD NAME=\"STOFCY\">$formsalfcy</FLD>";
																				$WS .= "</GRP>";
																				$WS.="<TAB ID=\"SOH4_1\">";
																				for($i = 0; $i < count ( $formtabitmref ); $i ++) {
																					$WS .= "<LIN>";
																					$WS .= "<FLD NAME=\"ITMREF\">$formtabitmref[$i]</FLD>";
																					$WS .= "<FLD NAME=\"QTY\">$formtabqty[$i]</FLD>";
																					$WS .= "</LIN>";
																				}
																				
																				$WS .= "</TAB></PARAM>";
																				
																				try {
																					$order = new Order ();
																					echo ($order->create ( $WS ));
																				} catch ( SoapFault $e ) {
																					ToolsWS::printError ( "X3 web service not available" );
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


