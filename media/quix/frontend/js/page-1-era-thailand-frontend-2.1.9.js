(function(){
             

         
jQuery(function($){

	
	jQuery("[required='false']").removeAttr("required")
	
	$("#qx-form-46 form").on('submit',function(event){
		event.preventDefault();
		var $self=$(this);
		var value=$(this).serializeArray();
		$.ajax({
			url:'index.php',
			type:'post',
			data:value,
			beforeSend:function(){
				$self.find('input, textarea, select, .form-submit button').attr('disabled','disabled');
				$self.find('#form-element-msg').html('');
			},
			success:function(response){

				// Render the message
				if($.parseJSON(response).success)
				{
					$self.find("#captcha-expire").removeClass('qx-d-none');
					$self.find("input[type=text], input[type=email], textarea, select").val("");
					$self.find('input, textarea, select, .form-submit button').removeAttr('disabled');
					$self.find('#form-element-msg').html($.parseJSON(response).data).fadeIn();
				} 
				else 
				{
					$self.find('#form-element-msg').html($.parseJSON(response).message).fadeIn();
					$self.find('input, textarea, select, .form-submit button').removeAttr('disabled');
				}
				grecaptcha.reset();
			},
			error:function(jqXHR, response) 
			{
				$self.find('#qx-element-contact-form-msg').html($.parseJSON(response).message).fadeIn();
				$self.find('input, textarea, select, .form-submit button').removeAttr('disabled');

				grecaptcha.reset();
			}
		});
	});
});  
  
  
  
            }());