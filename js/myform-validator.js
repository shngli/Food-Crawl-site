
// validate email format
// Email (must have a @ and . as part of input)
// setCustomValidity() customize txt
function validateEmail(myemail){
	var missing = '';
	var txt = '';
	if (! myemail.value.match(/\S+@\S+\.\S+/)) {
		if(!/\S+\.\S/.test(myemail.value)){
			missing = ".";

		}	
		if (!/\S+@\S/.test(myemail.value)){
			missing = "@";
		}

		if (missing != ''){
		txt = "Please include an " + missing + " in the email address. '" + myemail.value + "' is not a valide email address.";
		}
		else{
			txt = myemail.value + "' is not a valide email address.";
		}
		if (myemail.value == ""){
			txt = "Please fill out this field.";
		}
		myemail.setCustomValidity(txt);	
	}
	else{
		myemail.setCustomValidity("");	
	}
}



$(document).ready(function(){
	$('#contact_form').validate({
		ignore:[],
		rules:{
			select_subject:{
				required: true,
			}
		}
	});
});
	


// $(document).ready(function(){
// 	$('#contact_form')
// 		.find('[name="select_subject"]')
// 			.selectpicker()
// 			.change(function(e){
// 				// revalidate the subject when it is changed
// 				$('#contact_form').formValidation('revalidateField', 'select_subject');
// 			})
// 			.end()
// 		.formValidation({
// 			framework:'bootstrap',
// 			excluded: 'disabled',
// 			icon:{
// 				valide:'glyphicon glyphicon-ok',
// 				invalide:'glyphicon glyphicon-remove',
// 				validating:'glyphicon glyphicon-refresh',
// 			},
// 			fields:{
// 				select_subject:{
// 					validators:{
// 						callback:{
// 							message: 'Please Choose a subject.',
// 							callback: function(value, validator, $field){
// 								// get the selected options
// 								var option = validator.getFieldElements('select_subject').val();
// 								return (option != "0");
// 							}
// 						}
// 					}
// 				}
// 			}
// 		});
// });
