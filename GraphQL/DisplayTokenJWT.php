<?php
//require_once ('config/Config.php');
//require_once ('ModelGraphQLX3.php');
//require_once ('tools-api/ToolsWS.php');
//require_once ('tools-api/consolePHP.php');
require_once ('authentication/JWT/TokenJWT.php');

class DisplayTokenJWT{
	function getToken() {

		$jwt   = new TokenJWT ();
		$token = $jwt->getToken(); 
		
		$str='';
		
		$str .= "<div class='col-lg-12 col-md-2 col-sm-1'>";
		/*$str .= "<label class='control-label' >Token</label>";
		$str .= "<input class='form-control' type='text'value='";
		$str .= $token;
		$str .= "' readonly >";
		$str .= "</div>";
		*/

		//$str.='<label >Token:</label>';
		$str.='<textarea id="jwttoken" rows="5" cols="100">';
		$str .= $token;
		$str .= '</textarea>';
		$str .= "</div>";
		return $str;
		$queryGraphQL=$this->readFileGraphQl('PurchaseOrder_read.graphql');
		
		$vars  ='';
		$vars .='{';
		$vars .='  "id": "'.$_id.'"';
		$vars .='  }';
		$response=$this->query($queryGraphQL,$vars);
		
		$json=json_decode($response);

		
		$read = $json->{'data'}->{'xtremX3Purchasing'}->{'purchaseOrder'}->{'read'};
        

		if (is_null($read)) {
			return ToolsWS::getSucces ( "No result" );
		}
		$str = "";
		// header
		$str .= "<div class='row'>";

		$str .= "<div class=' hidden col-lg-3 col-md-2 col-sm-1'>";			
		$str .= "<label class='control-label' for='ordnum'>Order number</label>";
		$str .= "<input class='form-control' type='text' id='ordnum' placeholder='";
		$str .= $_id;
		$str .= "' disabled >";
		//$str .="<div class='hidden' id='sohnum'>";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='formpurshasesite'>Purchase site</label>";
		$str .= "<input class='form-control' name='formpurshasesite' type='text' placeholder='' value='";
		$str .= $read->{'purchaseSite'}->{'_id'};// - ".$read->{'purchaseSite'}->{'name'};
		$str .= "' readonly >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='formsupplier'>Supplier</label>";
		$str .= "<input class='form-control' name='formsupplier' type='text' placeholder='' value='";
		$str .= $read->{'orderFromSupplier'}->{'code'};
		$str .= "' readonly >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Internal Order Reference</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'internalOrderReference'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "<div class='col-lg-3 col-md-2 col-sm-1'>";
		$str .= "<label class='control-label' for='disabledInput'>Receipt status</label>";
		$str .= "<input class='form-control' type='text' placeholder='";
		$str .= $read->{'receiptStatus'};
		$str .= "' disabled >";
		$str .= "</div>";

		$str .= "</div>";
		$str .= "<br/>";

		// Lines
		$str .= "<table class='table table-striped table-bordered table-condensed'>";
		$str .= "<thead><tr><th>Line number</th><th>Product</th><th>Description</th><th>Quantity order</th><th>Quantity received</th><th>Order unit</th><th>Quantity to receive</th></tr></thead><tbody>";
		$edges = $read->{'purchaseOrderQuantityLines'}->{'query'}->{'edges'};
		foreach ( $edges as $edge ) {
			$str .= "<tr>";

			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtablinenumber[]" value="';
			$str .= $edge->{'node'}->{'lineNumber'};
			$str .= '" readonly>';
			$str .= "</td>";
			
			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtabproduct[]" value="';
			$str .= $edge->{'node'}->{'product'}->{'code'};
			$str .= '" readonly>';
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'product'}->{'description1'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'quantityInOrderUnitOrdered'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= $edge->{'node'}->{'quantityInStockUnitReceived'};
			$str .= "</td>";

			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtaborderunit[]" value="';
			$str .= $edge->{'node'}->{'orderUnit'}->{'code'};
			$str .= '" readonly>';
			$str .= "</td>";
			
			// enter quantity
			$str .= "<td>";
			$str .= '<input type="text" class="form-control" name="formtabqtytoreceive[]" placeholder="0" value="0">';
			$str .= "</td>";

			$str .= "</tr>";
		}
		$str .= "</tbody></table>";
		$str .= "</div>";

		return $str;
	}
	
	
	
	
	}

 ?>
