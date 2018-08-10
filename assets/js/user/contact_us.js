
$(document).ready(function(){

	$("#contactForm").validate({
		rules:{
			name:{
				required:true
			},
			email:{
				required:true,
				email:true
			},
			subject:{
				required:true
			},
			message:{
				required:true
			}
		},
		messages: {
	 			name: "Your Name is Required",
				email: "Please Enter Valid Email",
				subject: "Please Enter Subject",
				message: "Please, Leave us a message",
	 	
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
		            url: "actions/contact_us/create.php",
		            data: $("#contactForm").serialize(),
		            timeout: 3000,
		            success: function(obj) {
		            	//console.log(obj);
		            	result = $.parseJSON(obj);
		            	if(result.response == 'y'){
		            		alert(result.message);
		            		location.reload();
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


	$(".remove-element").click(function(){
		if(confirm("Are You Sure??")){
			var ID = $(this).attr('id');
			ele = $(this);
			$.ajax({
	            type: "POST",
	            url: "../actions/contact_us/delete.php",
	            data: {'ID':ID},
	            timeout: 3000,
	           success: function(obj) {
	            	//console.log(obj);
	            	//$(ele).parent().parent().parent().hide();
					location.reload();
	            },
	            error: function() {alert('failed');}
	        });
		}
	})
	
	
		
});
