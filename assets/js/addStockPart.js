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
	
	var addStockPartForm = $("#addStockPart");
	
	var validator = addStockPartForm.validate({
		
		rules:{
			nama_part :{ required : true },
			code_part :{ required : true },
			quantity_part : { required : true, digits : true}
		},
		messages:{
			nama_part :{ required : "This field is required" },
			code_part :{ required : "This field is required" },
			quantity_part : { required : "This field is required", digits : "Please enter numbers only" }		
		}
	});
});

