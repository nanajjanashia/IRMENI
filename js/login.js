$(function(){
$("#btn-login").on({click:function() {
	$login = $(this);
    $login.button('loading');
	$.ajax({
		type: "POST",
		url: base_url+'ge/admin/login',
		data: {
			"email" : $("#login-username").val(), 
			"password" : $("#login-password").val(),
		},
		dataType: "json",
		success: function(data) {
			if (data.code == 0 || data.code == 2 || data.code == 3){
				if($('.alert').length == 1){
					$('.alert span').text(data.text);
				}else {
					$(".input-group").first().before('<div class="alert alert-danger slide up"><a class="close" data-dismiss="alert">&times;</a><span>'+data.text+'</span></div>');
				}	
			}	
			
			if (data.code == 1){
				location.reload();
			}
			
			$('.alert').slideDown();
			$login.button('reset');
			
		}
	});
}});

$('#login-password').keydown(function (e){
    if(e.keyCode == 13){
      $('#btn-login').trigger('click');
    }
})

});