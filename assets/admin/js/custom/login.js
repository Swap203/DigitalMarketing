
$(document).ready(function(){
	//alert(111);
	$("#loginform").validate({
		rules:{
			
			user_name:{
				required:true,
				//email:true
			},
			password:{
				required:true
			}
		},
		messages: {
	 			password: "Please enter password",
	 			user_name:"Please enter User Name"
		
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function() {
		        $.ajax({
		            type: "POST",
		            url: "actions/login/login.php",
		            data: $("#loginform").serialize(),
		            timeout: 3000,
		            success: function(obj) {
		            	//console.log(obj);
		            	result = $.parseJSON(obj);
		            	if(result.response == 'y'){
		            		window.location = "dashboard.php";
		            	}
		            	else{
		            		alert(result.message);
		            	}
		            },
		            error: function() {alert('failed');}
		        });

		        return false;
		    }
	});


	/******************* recover form **********************/
/*
	$("#recoverform").validate({
		rules:{
			
			user_name:{
				required:true,
				//email:true
			}
		},
		messages: {
	 			
	 			user_name: { required:"Please enter User Name" }
		
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		},
		submitHandler: function() {
		        $.ajax({
		            type: "POST",
		            url: "actions/passwordrecovery/passwordrecovery.php",
		            data: $("#recoverform").serialize(),
		            timeout: 3000,
		            success: function(obj) {

		            	result = $.parseJSON(obj);

		            	if(result.response == 'y'){
		            		$("#recoverform input[type='email']").val("");
		            		alert(result.message);

		            	}
		            	else{
		            		alert(result.message);
		            	}
		            },
		            error: function() {alert('failed');}
		        });

		        return false;
		    }
	});
	
*/
	

		
});
