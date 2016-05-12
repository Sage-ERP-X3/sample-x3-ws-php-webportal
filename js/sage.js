/**
 * Sage
 */

function addLigne(idtable) {
	$('#'+idtable+' tbody>tr:last').clone(true).insertAfter('#'+idtable+' tbody>tr:last');
	$
	
}

//function removeLigne(idtable) {
	//$('#'+idtable+' tbody>tr:last').clone(true).insertAfter('#'+idtable+' tbody>tr:last');
//	$('#'+idtable).remove();
	
//}

function removeLigne(idtable,row)
{
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById(idtable).deleteRow(i);
}

function set_icon_connect(isConnect) {
	
	  if (isConnect==0) {
		  $('#icon-connect').attr("class","hide");
		  $('#icon-deconnect').attr("class","hide");
		  
	  } else {
		  $('#icon-connect').attr("class","");
		  $('#icon-deconnect').attr("class","");
	  }
}

