
function response_ajax(form,dataType,data,success,beforeSend)
{
	$.ajax({
		url:  $('form[name='+form+']').attr('action'),
        type: $('form[name='+form+']').attr('method'),
        dataType: dataType,
        async:false,
        data:data,
        cache: false,                      
        success: success,
        beforeSend: beforeSend,
        error: function(textStatus, errorThrown) { 
            alert(textStatus+' '+errorThrown);
        },
        complete:function(textStatus){
        	//alert(textStatus);
        }                 
	})	
}

$(document).ready(function(){
	$('input[name=enviar]').on('click',function(){

		success=function(data)
		{
			alert(data.valor);
		}
		response_ajax('form1','json',$('form[name=form1]').serialize(),success,'');
	});
})

