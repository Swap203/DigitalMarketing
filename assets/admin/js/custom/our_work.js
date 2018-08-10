
$(document).ready(function(){

	$("#addForm").validate({
		rules:{
			title:{
				required:true
			},
			url:{
				required:true
			},
			publish_date:{
				required:true
			},
			for_whom:{
				required:true
			},
			work_type:{
				required:true
			}
		},
		messages: {
	 			title: "Please Enter Title",
				url: "Please Enter URL",
				publish_date: "Please Enter Publish Date",
				for_whom: "Please Enter For Whom It Was",
				work_type: "Please Select Work Type"	 						
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	
	
    $("#addForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
        url: "actions/our_work/create.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
    success: function(obj)   // A function to be called if request succeeds
    {
        result = $.parseJSON(obj);
             if(result.response == 'y'){
                alert(result.message);
                location.reload();
                //$("#editForm input[type='text']").val("");
                //$("#editForm #statusId").select2('val',"");
             }
             else{
                alert(result.message);
             }
    }
    });
    }));
	
	
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
            url: "actions/our_work/get.php",
            data: {'id':id},
            timeout: 3000,
            success: function(obj) {
            	result = $.parseJSON(obj);
            	 if(result.response == 'y'){
            	 	$("#editContainer").slideDown();
            	 	$("#editForm input[name='id']").val(result.id);
            	 	$("#editForm input[name='title']").val(result.title);
					$("#editForm input[name='url']").val(result.url);
             	 	$("#editForm input[name='publish_date']").val(result.publish_date);
					$("#editForm input[name='for_whom']").val(result.for_whom);
					$("#editForm #typeDropDown").html(result.type);
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
			title:{
				required:true
			},
			url:{
				required:true
			},
			publish_date:{
				required:true
			},
			for_whom:{
				required:true
			}
		},
		messages: {
	 			title: "Please Enter Title",
				url: "Please Enter URL",
				publish_date: "Please Enter Publish Date",
				for_whom: "Please Enter For Whom It Was"	
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
		/* ,
		submitHandler: function() {
				 $.ajax({
		            type: "POST",
		            url: "actions/our_work/edit.php",
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
		} */
	});

	$("#editForm").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
        url: "actions/our_work/edit.php", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,        // To send DOMDocument or non processed data file it is set to false
    success: function(obj)   // A function to be called if request succeeds
    {
        result = $.parseJSON(obj);
             if(result.response == 'y'){
                alert(result.message);
                location.reload();
             }
             else{
                alert(result.message);
             }
    }
    });
    }));
    
	
	
	
	
	
	
	
	
	
	$(".remove-element").click(function(){
		if(confirm("Are You Sure??")){
			var ID = $(this).attr('id');
			ele = $(this);
			$.ajax({
	            type: "POST",
	            url: "actions/our_work/delete.php",
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
