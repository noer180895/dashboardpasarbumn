/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Kishor Mali
 */
$(document).ready(function(){
	
	var editUserForm = $("#addUser");
	
	var validator = editUserForm.validate({
		
		rules:{
			firstname :{ required : true },
			lastname :{required : true },
			mobile : { required : true, digits : true },
			roleId : { required : true, selected : true}
		},
		messages:{
			firstname :{ required : "This field is required" },
			lastname :{ required : "This field is required" },
			cpassword : {equalTo: "Please enter same password" },
			mobile : { required : "This field is required", digits : "Please enter numbers only" },
			roleId : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});