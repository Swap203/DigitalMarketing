
$(document).ready(function(){

	$("#addForm").validate({
		rules:{
			working_hours:{
				required:true,
				digits:true
			},
			happy_clients:{
				required:true,
				digits:true
			},
			awards:{
				required:true,
				digits:true
			},
			projects:{
				required:true,
				digits:true
			}
		},
		messages: {
	 			working_hours: "Please Enter Valid Working Hours",
				happy_clients: "Please Enter Valid Happy Clients",
				awards: "Please Enter Valid Awards",
				projects: "Please Enter Valid Projects",
	 	
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
		            url: "actions/team_efforts/create.php",
		            data: $("#addForm").serialize(),
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

	/**/ 
	
	$("#btnCreate").click(function(){

		$("#addContainer").slideDown();
		$("#editContainer").slideUp();
		$(this).hide();
		$("#btnCancel").show();
	});

	$("#btnCancel").click(function(){
		$("#addContainer").slideUp();
		$("#editContainer").slideUp();
		$(this).hide();
		$("#btnCreate").show();
	});

	$("#tableContainer").on("click",".edit-element",function(){
		var id = $(this).attr('id');
		$("#addContainer").slideUp();
		$("#btnCancel").show();
		$("#btnCreate").hide();
		$.ajax({
            type: "POST",
            url: "actions/team_efforts/get.php",
            data: {'id':id},
            timeout: 3000,
            success: function(obj) {
            	result = $.parseJSON(obj);
            	 if(result.response == 'y'){
            	 	$("#editContainer").slideDown();
            	 	$("#editForm input[name='id']").val(result.id);
            	 	$("#editForm input[name='working_hours']").val(result.working_hours);
             	 	$("#editForm input[name='happy_clients']").val(result.happy_clients);
					$("#editForm input[name='awards']").val(result.awards);
             	 	$("#editForm input[name='projects']").val(result.projects);
					//$("#editForm textarea[name='description']").val(result.description);

            	 	//$("#editForm #statusDropDown").html(result.status);
            	 }
            	 else{
            	 	$("#addContainer").slideDown();
					$("#btnCancel").hide();
					$("#btnCreate").show();
            	 	alert(result.message);
            	 }
            },
            error: function() {alert('failed');}
        });

	});

	/***/

	$("#editForm").validate({
		rules:{
			working_hours:{
				required:true,
				digits:true
			},
			happy_clients:{
				required:true,
				digits:true
			},
			awards:{
				required:true,
				digits:true
			},
			projects:{
				required:true,
				digits:true
			}
		},
		messages: {
	 			working_hours: "Please Enter Valid Working Hours",
				happy_clients: "Please Enter Valid Happy Clients",
				awards: "Please Enter Valid Awards",
				projects: "Please Enter Valid Projects",
	 	
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
		            url: "actions/team_efforts/edit.php",
		            data: $("#editForm").serialize(),
		            timeout: 3000,
		            success: function(obj) {
		            	//console.log(obj);
		            	 result = $.parseJSON(obj);
		            	 if(result.response == 'y'){
		            	 	alert(result.message);
		            	 	location.reload();
		            	 	$("#editForm input[type='text']").val("");
		            	 	//$("#editForm #statusId").select2('val',"");
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
	            url: "actions/team_efforts/delete.php",
	            data: {'ID':ID},
	            timeout: 3000,
	           success: function(obj) {
	            	//console.log(obj);
	            	$(ele).parent().parent().parent().hide();
					//location.reload();
	            },
	            error: function() {alert('failed');}
	        });
		}
	})
	
	
		
});
