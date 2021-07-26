$(function(){
	$( "#complaint-submit" ).click(function(){
    	$(window).spin();
    	
    	if( $("#contact-name").val() == "" || $("#contact-email").val() == "" || $("#contact-message").val() == "" )
    	{
    			$(window).spin();
    			alert("Sila penuhkan ruangan kosong !");
    			return false;
    	}
    	else
    		{
    		$( "#form-contact" ).ajaxSubmit({
    			success : function(data){
    				$(window).spin();
    				alert("Aduan / Cadangan anda telah dihantar kepada pihak DBKL. Terima kasih.");
    				location.reload();	
    			}	
    		});
    	}
    });
});