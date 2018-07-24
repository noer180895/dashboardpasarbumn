/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function(){
	
	var addStockMaterialForm = $("#addStockMaterial");
	
	var validator = addStockMaterialForm.validate({
		
		rules:{
			nama_material :{ required : true },
			quantity_material : { required : true, digits : true}
		},
		messages:{
			nama_material :{ required : "This field is required" },
			quantity_material : { required : "This field is required", digits : "Please enter numbers only" }		
		}
	});
});

