
$(document).ready(function(){

	$("#addForm").validate({
		rules:{
			work_type:{
				required:true
			}
		},
		messages: {
	 			work_type: "Please Enter type of Work"	 	
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
		            url: "actions/work_type/create.php",
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
            url: "actions/work_type/get.php",
            data: {'id':id},
            timeout: 3000,
            success: function(obj) {
            	result = $.parseJSON(obj);
            	 if(result.response == 'y'){
            	 	$("#editContainer").slideDown();
            	 	$("#editForm input[name='id']").val(result.id);
            	 	$("#editForm input[name='work_type']").val(result.work_type);
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
			work_type:{
				required:true
			}
		},
		messages: {
	 			work_type: "Please Enter type of Work"
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
		            url: "actions/work_type/edit.php",
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
	            url: "actions/work_type/delete.php",
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
