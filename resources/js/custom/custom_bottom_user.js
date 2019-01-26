$(function () {
	$('#user_datetimepicker_start').datetimepicker({
		format: 'YYYY-MM-DD'
	});
	$('#user_datetimepicker_end').datetimepicker({
		format: 'YYYY-MM-DD'
	});
});

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));            
    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});

$('.set-user-notactiv').click(function() {
	 var userId = $(this).attr("id");
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 
	 var PostData = {'_token': CSRF_TOKEN, 'userId' : userId};
	 openModal_user();
	 
	 $.ajax({
	        type        : 'POST',
	        url         : 'id/ajax_set_activate_user', 
	        data        : PostData, 
	        dataType    : 'json',
	        success: function(data){
				console.log(data);
				 //$("#b2caccountData").html(data);
			},
			complete: function () {
				location.reload();
			}
	    })	 
});

$('.set-user-activ').click(function() {
	 var userId = $(this).attr("id");
	 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 
	 var PostData = {'_token': CSRF_TOKEN, 'userId' : userId};
	 openModal_user();
	 
	 $.ajax({
	        type        : 'POST',
	        url         : 'id/ajax_set_deactivate_user', 
	        data        : PostData, 
	        dataType    : 'json', 
	        success: function(data){
				console.log(data);
				 //$("#b2caccountData").html(data);
			},
			complete: function () {
				location.reload();
			}
	    })	 
});