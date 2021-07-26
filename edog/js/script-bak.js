//External Javascript
var path = $(location).attr('pathname');
var base_url = $(location).attr('protocol')+'//'+$(location).attr('hostname')+'/';

jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

$(function(){
		
	$( "#postcode, #login-user" ).ForceNumericOnly();
	$( "#phone, #masked_phone" ).ForceNumericOnly();
	
	$( "#register_type_id" ).change(function(){
		if( $("#register_type_id").val() == "IC" )
		{
				$( "#register-ic" ).ForceNumericOnly();
				$( "#register-ic" ).attr("maxlength", "12");
		}
	});
	
	$( "#btnLogin" ).click(function(){
		if( $("#login-user").val() == "" || $( "#login-password" ).val() == "" ){
			alert( "Sila penuhkan ID Pengguna atau Katalaluan !" );
		}else{
			
			$( "#form-login" ).ajaxSubmit({
				 success : function(data){
				 		if(data == 1)
				 		{
				 			if( path.split("/")[1] == "admin" )
				 				alert( "ID Pengguna atau Katalaluan anda tidak sah !" );
				 			else
				 				window.location.href = "dashboard_user";
				 		}
				 		else if(data == 2 || data == 3)
				 		{
				 			if( path.split("/")[1] == "admin" )
				 				window.location.href = "index.php/dashboard_admin";
				 			else
				 				alert( "ID Pengguna atau Katalaluan anda tidak sah !" );
				 		}
				 		else
				 		{
				 			alert( "ID Pengguna atau Katalaluan anda tidak sah !" );
				 		}
				 }
			});
			
		}
	});
	
	$( "#new-license" ).click(function(){
		window.location.href = "new_license";
	});
	
	$( "#user-dashboard" ).click(function(){
		window.location.href = "dashboard_user";
	});

	$( "#app_name, #register-name, #add-contact-name, #contact-name" ).keyup( function() {
		 this.value = this.value.toUpperCase();
	});
	
	$( "#btn-form-register" ).click(function() {
			if( $( "#register-name" ).val() == "" || $( "#register_type_id" ).val() == 0 || $( "#register-ic" ).val() == "" || $( "#register-email" ).val() == "" || $( "#register-password" ).val() == "" || $( "#register-password-verify" ).val() == "" )
			{
				alert( "Sila penuhkan semua ruangan !." );
			}
			else if( $( "#register-password" ).val() != $( "#register-password-verify" ).val() )
			{
					alert( "Katalaluan anda tidak sepadan. Sila cuba lagi." );
			}else
				{
						$( "#form-register" ).attr( 'action', 'login/register_user' );
						$(window).spin(); 
						$( "#form-register" ).ajaxSubmit({
								success : function(data)
								{
									if( data == 2 )
										{
											$(window).spin();
											alert("Data telah didaftarkan di dalam sistem ini");
											return false;
										}
										else
											{
												$(window).spin();
												alert("Pendaftaran anda telah berjaya");
												window.location = "login";
											}
								}
						})
				}
	});
	
	$( "#forgot-password-button" ).click(function() {
	
		$.get(base_url+path.split("/")[1]+"/login/check_valid/"+$("#register-ic-forgot").val(), function(data) {
				if(data == 1)
				{
						$( "#form-reminder" ).attr( 'action', 'login/forgot_password' );
						$(window).spin();
						$( "#form-reminder" ).ajaxSubmit({
								success : function(data)
								{
									$(window).spin();
									alert('Data log masuk anda telah ditetapkan semula dan telah dihantar ke emel anda.');
									window.location = 'login';
								}
						});
				}
				else
				{
						alert("Emel atau No. Pengenalan anda tidak wujud. Sila cuba lagi.");
						return false;
				}
		});

	});
	
	$( "#option-address" ).change(function(){
			
			var user_option = $("#option-address").val();
	
			if( user_option == 0 )
			{
				$( ".view-address" ).html("<font color='red'>Sila pilih alamat di atas untuk paparan senarai lesen</font>");
			}
			else
				{
					$.get('already_license/view_address/'+user_option, function(data){
							$( ".view-address" ).html(data);
					});
				}
	});
	
	$( "#add-address-new" ).click(function(){
		$(window).spin();
		if( $("#val_no_unit").val() == "" || $("#val_name_house").val() == "" || $("#val_street").val() == "" || $("#val_town").val() == "" || $("#val_postcode").val() == "" || $("#val_parlimen").val() == 0 || $("#val_house_type").val() == 0 || $("#house_space").val() == 0 )
		{
			$(window).spin();
				alert("Sila penuhkan ruangan mandatori !");
				return false;
		}
		else
			{
					$( "#form-validation" ).ajaxSubmit({
						success : function(){
							$(window).spin();
							alert("Pendaftaran alamat anda berjaya.");
							location.reload();
						}
					});
			}
	});
	
	$( "#update-dog" ).click(function(){
	
		if( $("#val_parlimen-upd").val() == 0 || $("#val_house_type-upd").val() == 0 || $("#house_space-upd").val() == 0 )
		{
			alert("Sila penuhkan maklumat untuk daftar alamat rumah.");
			return false;
		}
		else
			{
					$( "#form-validation-update" ).ajaxSubmit({
						success : function(){
							alert("Alamat anda berjaya dikemaskini.");
							location.reload();
						}
					});
			}
			
	});
	
	$( "#val_dogcolor_etc_opt" ).click(function(){
		 if( $("#val_dogcolor_etc_opt" ).is( ':checked' ) )
		 {
				$( "#val_dogcolor_etc" ).prop("disabled", false);
		 }
		 else
		 	{
		 			$( "#val_dogcolor_etc" ).prop("disabled", true);
		 	}
	});
	
	$( "#add-first-dog" ).click(function(){
			$( "#dogID" ).val(1);
	});
	$( "#add-second-dog" ).click(function(){
			$( "#dogID" ).val(2);
	});
	
	$( "#update-temp-dog, #update-temp-dog2" ).click(function(){
		
		var ids = $(this).data('id');
		var idsplit = ids.split("|");
		
		$.get(base_url+path.split("/")[1]+'/new_license_app/get_data_temporary_dog/'+idsplit[0]+'/'+idsplit[1], function(data){
				var dataSplit = data.split("|");
			
				$( "#update-renew-2 #no-dog" ).html(idsplit[1]);
				$( "#update-renew-2 .modal-body #dog_type" ).val(dataSplit[0]);
				$( "#update-renew-2 .modal-body #val_dogcolor" ).val(dataSplit[1]);
				$( "#update-renew-2 .modal-body #val_weight" ).val(dataSplit[3]);
				$( "#update-renew-2 .modal-body #val_microchip" ).val(dataSplit[5]);
				$( "#update-renew-2 .modal-body #loc_pic" ).val(dataSplit[8]);
				$( "#update-renew-2 .modal-body #imgDog" ).attr("src", base_url+dataSplit[8]);
				$( "#update-renew-2 .modal-body #dogID" ).val(idsplit[1]);
				$( "#update-renew-2 .modal-body #addrID" ).val(idsplit[0]);
				
				var colorSplit = dataSplit[1].split(",");
				var standardColor = [];
				standardColor.push('Hitam');
				standardColor.push('Putih');
				standardColor.push('Coklat');
				
				if($.inArray('Hitam', colorSplit) != -1)
				{
					$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_blk]" ).attr("checked", true);
				}
				
				if($.inArray('Putih', colorSplit) != -1)
				{
					$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_wht]" ).attr("checked", true);
				}
				
				if($.inArray('Coklat', colorSplit) != -1)
				{
					$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_brown]" ).attr("checked", true);
				}
				
				for(i=0; i < colorSplit.length; i++)
				{
						if($.inArray(colorSplit[i], standardColor) == -1 && colorSplit[i] != '')
						{
								$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_etc_opt]" ).attr("checked", true);
								$( "#update-renew-2 .modal-body #val_dogcolor_etc" ).attr("disabled", false);
								$( "#update-renew-2 .modal-body #val_dogcolor_etc" ).val(colorSplit[i]);
						}
				}
						
				
				//--------------Jantina-----------------//
				if(dataSplit[2] == 1)
				{
					$( "#update-renew-2 .modal-body input:radio[id=val_gender1]" ).attr("checked", true);
				}
				else
					{
						$( "#update-renew-2 .modal-body input:radio[id=val_gender2]" ).attr("checked", true);
					}
					
				//------------Mandul------------------//
				if(dataSplit[4] == 1)
				{
					$( "#update-renew-2 .modal-body input:radio[id=val_mandul1]" ).attr("checked", true);
				}
				else
					{
						$( "#update-renew-2 .modal-body input:radio[id=val_mandul2]" ).attr("checked", true);
					}
				
				//-------------Latihan Pemilik-------------//
				if(dataSplit[6] == 1)
				{
					$( "#update-renew-2 .modal-body input:radio[id=owner_training1]" ).attr("checked", true);
				}
				else
					{
						$( "#update-renew-2 .modal-body input:radio[id=owner_training2]" ).attr("checked", true);
					}
				
				//---------------Latihan Anjing----------------//
				if(dataSplit[7] == 1)
				{
					$( "#update-renew-2 .modal-body input:radio[id=dog_training1]" ).attr("checked", true);
				}
				else
					{
						$( "#update-renew-2 .modal-body input:radio[id=dog_training2]" ).attr("checked", true);
					}
		});
	});
	
	$( "#cancel-dog" ).click(function(data){
			var dogid = $( "#dogid" ).val();
			var addrid = $( "#addrid" ).val();
			
			if( confirm("Anda pasti untuk batalkan maklumat anjing ini ?") )
			{
				$(window).spin();
				$.get(base_url+path.split("/")[1]+"/new_license_app/cancel_temporary_dog/"+dogid+"/"+addrid, function(data){
					if( data == 1 )
					{
						$(window).spin();
						alert("Maklumat anjing telah berjaya dibatalkan");
						location.reload();
					}
				});
			}
			else
				{
					return false;
				}
	});
	
	$( "#add-temp-dog" ).click(function(){

		$(window).spin();
			$( "#form-reg-dog" ).ajaxSubmit({
				success : function(data)
				{
					
					if(data == 0)
					{
						$(window).spin();
						alert("Jenis gambar anjing tidak dibenarkan.");
						return false;
					}
					else if(data == 2)
						{
							$(window).spin();
								alert("Sila penuhkan ruangan mandatori .");
								return false;
						}
					else
						{
							$(window).spin();
							 window.location.href = base_url+'index.php/new_license_app/index/'+$("#addrID").val();
						}
				}
			});
	});
	
	$( "#submit-dog" ).click(function(data){

			if( $( "#agreed_term" ).is(":checked") )
			{
				if( $( "#doc_type" ).val() == 1 )
				{
					$( "input[type='file'][name='doc_support']" ).each(function(){
						if($(this).val().length == 0)
						{
							alert("Sila muat naik dokumen sokongan anda !");
							return false;
						}
						else
							{
								$(window).spin();
								$( "#new-application" ).ajaxSubmit({
									success : function(data){
										$(window).spin();
										if(data == 0)
										{
											alert("Jenis dokumen sokongan tidak dibenarkan.");
											return false;
										}
										else
										{
											$(window).spin();
											alert("Permohonan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
											window.location.href = base_url+'index.php/dashboard_user';
										}
										
									}
								});
							}
					});
				}
				else
					{
						$(window).spin();
						$( "#new-application" ).ajaxSubmit({
									success : function(data){
										$(window).spin();
										alert("Permohonan anda telah berjaya dihantar. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
										window.location.href = base_url+'index.php/dashboard_user';
									}
								});
					}
			}
			else
				{
					alert("Sila tandakan persetujuan anda !");
					return false;
				}
	});
		
	$( "#print_receipt" ).click(function(){
		window.open( base_url+"index.php/receipt/index/"+$("#appid").val() );
	});
	
	$( "#appeal-app" ).click(function(){
		if( $( "#val_verify" ).is(":checked") )
		{

			if( $( "#text-appeal" ).val() == "" )
			{
				alert( "Sila isikan ruangan rayuan untuk permohonan ini" );
			}
			else
				{
					$(window).spin();
					$( "#submit-appeal" ).ajaxSubmit({
							success : function(data){
								$(window).spin();
								 alert("Permohonan rayuan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
								 window.location.href = base_url+'index.php/dashboard_user';
							}
					});
				}
		}
		else
			{
				alert("Sila tandakan persetujuan anda !");
				return false;
			}
	});
	
	/*$( "#not-renew-app" ).click(function(data){
		var appID = $(this).attr("data-id");
		alert(appID);
		$.get("renew/get_address/"+appID, function(data){
			var dataSplit = data.split("|");
				$( "#address" ).html(dataSplit[0]);
				$( "#no-dog" ).html(dataSplit[1]);
				$( "#appID" ).val(appID);
		});
	});*/
	
	$( "#submit-not-renew" ).click(function(data){
		if( $("#reasons").val() == 0 )
		{
			alert("Sila pilih sebab tidak memperbaharui lesen !");
			return false;
		}
		else
			{
				if(confirm('Anda pasti untuk tidak memperbaharui lesen ini ?'))
				{
					$(window).spin();
						$( "#form-not-renew" ).ajaxSubmit({
								success : function(data){
									$(window).spin();
									alert('Lesen anda telah berjaya dihantar untuk tidak diperbaharui. Terima kasih.');
									location.reload();
								}	
						});
				}
				else
					{
							return false;
					}
			}
	});
	
	$( "#tick-not-renew1" ).click(function(){
		if( $(this).is(":checked") )
		{
			 $( "#list-reason1" ).css("display", "block");
			 $( "#update-renew1" ).attr("disabled", true);
			 $( "#dog_pic" ).attr("disabled", true);
		}
		else
			{
				$( "#list-reason1" ).css("display", "none");
				$( "#update-renew1" ).attr("disabled", false);
				$( "#dog_pic" ).attr("disabled", false);
			}
	});
	
	$( "#tick-not-renew2" ).click(function(){
		if( $(this).is(":checked") )
		{
			 $( "#list-reason2" ).css("display", "block");
			 $( "#update-renew2" ).attr("disabled", true);
			 $( "#dog_pic-2" ).attr("disabled", true);
		}
		else
			{
				$( "#list-reason2" ).css("display", "none");
				$( "#update-renew2" ).attr("disabled", false);
				$( "#dog_pic-2" ).attr("disabled", false);
			}
	});
	
	$( "#update-renew1" ).click(function(){
			var dogID = $(this).data("id");
			
			$.get( base_url+path.split("/")[1]+"/renewal/get_dog_detail/"+dogID, function(data){

					var dataSplit = data.split("|");
					
					$( "#update-renew-1 .modal-body #dog_list" ).val(dataSplit[0]);
					$( "#update-renew-1 .modal-body #val_weight" ).val(dataSplit[3]);
					$( "#update-renew-1 .modal-body #val_microchip" ).val(dataSplit[5]);
					$( "#update-renew-1 .modal-body #loc_pic" ).val(dataSplit[8]);
					if( dataSplit[8] == "" )
						$( "#update-renew-1 .modal-body #imgDog" ).attr("src", base_url+dataSplit[8]);
					else
						$( "#update-renew-1 .modal-body #imgDog" ).attr("src", base_url+'images/no_picture.gif');
					$( "#update-renew-1 .modal-body #dog-type" ).val(dataSplit[0]);
					$( "#update-renew-1 .modal-body #dog-color" ).val(dataSplit[1]);
					$( "#update-renew-1 .modal-body #dog-gender" ).val(dataSplit[2]);
					$( "#update-renew-1 .modal-body #dog-id" ).val(dogID);
					
					var colorSplit = dataSplit[1].split(",");
	
					var standardColor = [];
					standardColor.push('Hitam');
					standardColor.push('Putih');
					standardColor.push('Coklat');
					
					if($.inArray('Hitam', colorSplit) != -1)
					{
						$( "#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_blk]" ).attr("checked", true);
					}
					
					if($.inArray('Putih', colorSplit) != -1)
					{
						$( "#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_wht]" ).attr("checked", true);
					}
					
					if($.inArray('Coklat', colorSplit) != -1)
					{
						$( "#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_brown]" ).attr("checked", true);
					}
					
					for(i=0; i < colorSplit.length; i++)
					{
							if($.inArray(colorSplit[i], standardColor) == 0)
							{
									$( "#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_etc_opt]" ).attr("checked", true);
									$( "#update-renew-1 .modal-body #val_dogcolor_etc" ).val(colorSplit[i]);
							}
					}
							
					
					//--------------Jantina-----------------//
					if(dataSplit[2] == 1)
					{
						$( "#update-renew-1 .modal-body input:radio[id=gender1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-1 .modal-body input:radio[id=gender2]" ).attr("checked", true);
						}
						
					//------------Mandul------------------//
					if(dataSplit[4] == 1)
					{
						$( "#update-renew-1 .modal-body input:radio[id=val_mandul1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-1 .modal-body input:radio[id=val_mandul2]" ).attr("checked", true);
						}
					
					//-------------Latihan Pemilik-------------//
					if(dataSplit[6] == 1)
					{
						$( "#update-renew-1 .modal-body input:radio[id=owner_training1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-1 .modal-body input:radio[id=owner_training2]" ).attr("checked", true);
						}
					
					//---------------Latihan Anjing----------------//
					if(dataSplit[7] == 1)
					{
						$( "#update-renew-1 .modal-body input:radio[id=dog_training1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-1 .modal-body input:radio[id=dog_training2]" ).attr("checked", true);
						}
			});
	});
	
	$( "#update-renew2" ).click(function(){
		
			var dogID = $(this).data("id");
			
			$.get( base_url+path.split("/")[1]+"/renewal/get_dog_detail/"+dogID, function(data){

					var dataSplit = data.split("|");
					
					$( "#update-renew-2 .modal-body #dog_list" ).val(dataSplit[0]);
					$( "#update-renew-2 .modal-body #val_weight" ).val(dataSplit[3]);
					$( "#update-renew-2 .modal-body #val_microchip" ).val(dataSplit[5]);
					$( "#update-renew-2 .modal-body #loc_pic" ).val(dataSplit[8]);
					if( dataSplit[8] == "" )
						$( "#update-renew-2 .modal-body #imgDog" ).attr("src", base_url+dataSplit[8]);
					else
						$( "#update-renew-2 .modal-body #imgDog" ).attr("src", base_url+'images/no_picture.gif');
//					$( "#update-renew-2 .modal-body #dog_type" ).val(dataSplit[0]);
//					$( "#update-renew-2 .modal-body #dog-color" ).val(dataSplit[1]);
//					$( "#update-renew-2 .modal-body #dog-gender" ).val(dataSplit[2]);
					
					
					var colorSplit = dataSplit[1].split(",");
	
					var standardColor = [];
					standardColor.push('Hitam');
					standardColor.push('Putih');
					standardColor.push('Coklat');
					
					if($.inArray('Hitam', colorSplit) != -1)
					{
						$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_blk]" ).attr("checked", true);
					}
					
					if($.inArray('Putih', colorSplit) != -1)
					{
						$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_wht]" ).attr("checked", true);
					}
					
					if($.inArray('Coklat', colorSplit) != -1)
					{
						$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_brown]" ).attr("checked", true);
					}

					for(i=0; i < colorSplit.length; i++)
					{
						
							if($.inArray(colorSplit[i], standardColor) == -1 && colorSplit[i] != '')
							{
									$( "#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_etc_opt]" ).attr("checked", true);
									$( "#update-renew-2 .modal-body #val_dogcolor_etc" ).val(colorSplit[i]);
							}
					}
							
					
					//--------------Jantina-----------------//
					if(dataSplit[2] == 1)
					{
						$( "#update-renew-2 .modal-body input:radio[id=gender1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-2 .modal-body input:radio[id=gender2]" ).attr("checked", true);
						}
						
					//------------Mandul------------------//
					if(dataSplit[4] == 1)
					{
						$( "#update-renew-2 .modal-body input:radio[id=val_mandul1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-2 .modal-body input:radio[id=val_mandul2]" ).attr("checked", true);
						}
					
					//-------------Latihan Pemilik-------------//
					if(dataSplit[6] == 1)
					{
						$( "#update-renew-2 .modal-body input:radio[id=owner_training1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-2 .modal-body input:radio[id=owner_training2]" ).attr("checked", true);
						}
					
					//---------------Latihan Anjing----------------//
					if(dataSplit[7] == 1)
					{
						$( "#update-renew-2 .modal-body input:radio[id=dog_training1]" ).attr("checked", true);
					}
					else
						{
							$( "#update-renew-2 .modal-body input:radio[id=dog_training2]" ).attr("checked", true);
						}
			});
	});
		
	$( "#update-renew-dog" ).click(function(){
			var weight = $( "#val_weight" ).val();
			
			$.get( base_url+path.split("/")[1]+"/renewal/get_weight_name/"+weight, function(data){
					$( "#weight-dog" ).html(data);
			});

			$( "#weight-val" ).val(weight);
			
			var mandul = $( "input[name=val_mandul]:checked" ).val();
			if(mandul == 0)
				$( "#mandul-dog" ).html('Tidak');
			else
				$( "#mandul-dog" ).html('Ya');
				
			$( "#mandul-val" ).val(mandul);
			
			var microchip = $( "#val_microchip" ).val();
			$( "#microchip-dog" ).html(microchip);	
			$( "#microchip-val" ).val(microchip);
			
			var owner = $( "input[name=owner_training]:checked" ).val();
			if(owner == 0)
				$( "#owner-training-dog" ).html('Tidak');
			else
				$( "#owner-training-dog" ).html('Ya');
				
			$( "#owner-training-val" ).val(owner);
			
			var dog = $( "input[name=dog_training]:checked" ).val();
			if(dog == 0)
				$( "#dog-training-dog" ).html('Tidak');
			else
				$( "#dog-training-dog" ).html('Ya');
				
			$( "#dog-training-val" ).val(dog);
	});
	
	$( "#renew-app-dog" ).click(function(){
		if( $( "#val_agree" ).is( ":checked" ) )
		{
				if( $( "#doc_type" ).val() == 1 )
				{
					$( "input[type='file'][name='doc_support']" ).each(function(){
						if($(this).val().length == 0)
						{
							alert("Sila muat naik dokumen sokongan anda !");
							return false;
						}
						else
							{
								if( $("#tick-not-renew1").is(":checked") )
								{
										if( $("#reasons option:selected").length == 0 )
										{
												alert("Sila pilih sebab untuk tidak memperbaharui lesen atas anjing #1 !");
												return false;
										}
								}
								else if( $("#tick-not-renew2").is(":checked") )
									{
											if( $("#reasons2 option:selected").length == 0 )
											{
													alert("Sila pilih sebab untuk tidak memperbaharui lesen atas anjing #2 !");
													return false;
											}
									}
									else
										{
											$(window).spin();
												$( "#renew-application" ).ajaxSubmit({
													success : function(data){
														$(window).spin();
														alert("Permohonan pembaharuan lesen anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
														window.location.href = base_url+'index.php/dashboard_user';
													}
												});
										}
							}
					});
				}
				else
					{
						$(window).spin();
						$( "#renew-application" ).ajaxSubmit({
									success : function(data){
										$(window).spin();
										alert("Permohonan pembaharuan lesen anda telah berjaya dihantar. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
										window.location.href = base_url+'index.php/dashboard_user';
									}
								});
					}
		}
		else
			{
					alert( "Sila tandakan persetujuan anda !"  );
					return false;
			}
	});
	
	/*var settings = {
          barWidth: 1,
					barHeight: 30,
					moduleSize: 5,
					showHRI: true,
					addQuietZone: true,
					marginHRI: 5,
					bgColor: "#FFFFFF",
					color: "#000000",
					fontSize: 10,
					output: "css",
					posX: 0,
					posY: 0
        };

	$("#barcode1, #barcode2").barcode(
		$( "#app-no" ).val(), // Value barcode (dependent on the type of barcode)
		"code39" // type (string)
		);	*/
		
		$( "#new-app-submit" ).click(function(){
				if($( "input[name=decision]" ).is(":checked"))
				{
					$(window).spin();
						$( "#save-new-app" ).ajaxSubmit({
								success : function(data){
									
									$(window).spin();
										alert("Permohonan berjaya dihantar dan dikemaskini");
										if( $( "#appealID" ).val() == 1 )
										{
												window.location.href = base_url+'admin/index.php/appeal_list';
										}
										else
											{
												window.location.href = base_url+'admin/index.php/new_app_list';
											}
										
								}
						});
				}
				else
					{
							alert("Sila pilih status permohonan !");
					}
		});
		
		$( "#update-license-no" ).click(function(){
			
				$("input[name='val_lencana[]']").each(function(){
						if( $(this).val() == "" )
						{
								alert("Sila isikan no lencana anjing");
								return false;
						}
					else if( $("#date-payment").val() == "" )
				{
						alert("Sila isikan tarikh bayaran dibuat");
						return false;
				}
				else if( $("#counter-payment").val() == "" )
					{
							alert("Sila pilih kaunter bayaran");
							return false;
					}
					else if( $("#mode-payment").val() == "" )
						{
								alert("Sila pilih mod bayaran");
								return false;
						}
						else if( $("#total-payment").val() == "" )
							{
									alert("Sila isikan jumlah bayaran");
									return false;
							}
							else if( $("#receipt-payment").val() == "" )
								{
										alert("Sila isikan no. resit pembayaran");
										return false;
								}
								else
									{
										$(window).spin();
											$("#update-approved").ajaxSubmit({
												 success : function(){
												 	$(window).spin();
												 		alert("Kemaskini no. lencana telah berjaya didaftarkan");
												 		window.location.href = base_url+'admin/index.php/approved_list';
												 }	
											});
									}
				});
				
				
							

		});
		
		$("input[name=decision]").click(function(){
			if ( $("#decision2").is(":checked") )
			{
					$("#reject-cause").removeAttr("disabled");
			}
			else if( $("#decision1").is(":checked") )
				{
						$("#reject-cause").attr("disabled", true);
				}
		});
		
		$( "#save_new_users" ).click(function(){
				if( $( "#user-settings-password" ).val() == $( "#user-settings-repassword" ).val() )
				{
					$(window).spin();
						$( "#add-new-users" ).ajaxSubmit({
							success : function(){
								$(window).spin();
									alert( "Pendaftaran pengguna baru telah berjaya" );
									location.reload();
							}	
						});
				}
				else
					{
							alert( "Kata laluan anda tidak sepadan" );
					}
		});
    
		$( "#kemaskini-pengguna" ).click(function(){
			$(window).spin();
				if( $( "#user-settings-password-upd" ).val() == $( "#user-settings-repassword-upd" ).val() )
				{
						$( "#update-user-manage" ).ajaxSubmit({
								success : function(data){
									
									$(window).spin();
									alert("Kemaskini pengguna telah berjaya.");
									location.reload();
								}	
						});
				}
				else
					{
						 $(window).spin();
						 alert("Kata laluan anda tidak sepadan. !");
						 return false;
					}
		});
		
		$( "#update-profile" ).click(function(){
			$(window).spin();
			
			if( $("#masked_phone").val() == "" )
			{
				$(window).spin()
				alert( "Sila isikan no telefon bimbit anda" );
				return false;
			}
			else
				{
					$( "#user-details" ).ajaxSubmit({
						success : function(data){
							$(window).spin();
							alert("Data anda berjaya dikemaskini");
							location.reload();	
						}	
					});
				}
		});
    
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
    
		$("#comment-update-dog1").click(function(){
			$(window).spin();
			$("#dog-one").ajaxSubmit({
				success : function(){
					$(window).spin();
					alert('Ulasan bagi anjing pertama berjaya dikemaskini.');
					location.reload();
				}	
			});
		});
		
		$("#comment-update-dog2").click(function(){
			$(window).spin();
			$("#dog-two").ajaxSubmit({
				success : function(){
					$(window).spin();
					alert('Ulasan bagi anjing kedua berjaya dikemaskini.');
					location.reload();
				}	
			});
		});
});	

(function($){
	var settings = {
          barWidth: 1,
					barHeight: 30,
					moduleSize: 5,
					showHRI: true,
					addQuietZone: true,
					marginHRI: 5,
					bgColor: "#FFFFFF",
					color: "#000000",
					fontSize: 10,
					output: "css",
					posX: 0,
					posY: 0
        };

	$("#barcode1, #barcode2").barcode(
		$( "#app-no" ).val(), // Value barcode (dependent on the type of barcode)
		"code39" // type (string)
		);	
	
});

function change_roles(uid, stat)
{
	
	$(window).spin();
		$.get("user_management/update_status/index/"+uid+"/"+stat, function(data){

					$(window).spin();
						alert("Pengguna berjaya dikemaskini");
						location.reload();
				
		});
}
	
function del_address( addrID )
{
		$.get("manage_profile/application_exists/"+addrID, function(data){
			$(window).spin();
			 if(data > 0)
			 {
			 	$(window).spin();
			 		alert("Maaf, alamat ini tidak dapat dipadamkan kerana telah mengandungi maklumat pendaftaran lesen anjing.");
			 		return false;
			 }
			 else
			 	{
			 		 if( confirm("Anda pasti untuk padamkan alamat ini ?") )
			 		 {
			 		 		$.get("manage_profile/delete_address/"+addrID, function(data){
			 		 			$(window).spin();
			 		 			alert('Alamat telah berjaya dipadamkan');				 		 			
			 		 			location.reload();
			 		 		});
			 		 		
			 		 }
			 		 else
			 		 	{
								$(window).spin();
			 		 			return false;
			 		 	}
			 	}
		});
}

function not_renew_app(appID){
		
		$("#not-renew").modal("toggle");
		
		$.get("renew/get_address/"+appID, function(data){
			var dataSplit = data.split("|");
				$( "#not-renew .modal-body #address" ).html(dataSplit[0]);
				$( "#not-renew .modal-body #no-dog" ).html(dataSplit[1]);
				$( "#not-renew .modal-body #appID" ).val(appID);
		});
}

function user_setting(uid)
{
		$("#modal-user-settings").modal("toggle");

		$.get("user_management/get_profile/index/"+uid, function(data){
			
			var dataSplit = data.split("|");
			
			$("#name-view").html(dataSplit[0]);
			$("#warga-view").html(dataSplit[1]);
			
			if(dataSplit[2] == "IC")
				$("#ic-type").html("Kad Pengenalan");
			else if(dataSplit[2] == "ARMY")
				$("#ic-type").html("No. Polis / Tentera");
			else if(dataSplit[2] == "PASSPORT")
				$("#ic-type").html("No. Pasport");
				
			$("#ic-view").html(dataSplit[3]);
			$("#user-settings-phone-upd").val(dataSplit[4]);
			$("#email-view").html(dataSplit[5]);
			$("#user-name").html(dataSplit[8]);
			$("#user-id").val(uid);
			

			$.get("user_management/get_address/index/"+dataSplit[6], function(data)
			{
					var addrSplit = data.split("|");
					var no;
					
						if(dataSplit[7] == 1)
						{
							var address = '';
					
							for(i=0; i < addrSplit.length; i++)
							{
									var dataAddr = addrSplit[i].split(";");
									
									 no = i+1;
									 address += "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"user-settings-notifications\">Alamat #"+no+"</label><div class=\"col-md-8\"><p class=\"form-control-static\">"+dataAddr[0]+"</p></div><label class=\"col-md-4 control-label\" for=\"user-settings-notifications\">Jumlah Lesen</label><div class=\"col-md-8\"><p class=\"form-control-static\">"+dataAddr[1]+"</p></div><label class=\"col-md-4 control-label\" for=\"user-settings-notifications\">Baki Lesen</label><div class=\"col-md-8\"><p class=\"form-control-static\">"+dataAddr[2]+"</p></div></div>";
									 
							}
			
							$(".address-view").html(address);
						}
						else
							{
									$(".address-view").html("<div class=\"form-group\"><div class=\"col-md-8\">Alamat tidak diperlukan</div></div>");
							}
			});
			
		});
}

function edit_address(addrID)
{
	$.get("manage_profile/application_exists/"+addrID, function(data){
		if( data > 0 )
		{
				alert("Maaf, alamat ini tidak dapat diubahsuai kerana telah mengandungi maklumat pendaftaran lesen anjing.");
			 	return false;
		}
		else
			{
				$("#edit-address").modal("toggle");
				
				$("#edit-address .modal-body #val_no_unit").prop("disabled", false);
				$("#edit-address .modal-body #val_name_house").prop("disabled", false);
			 	$("#edit-address .modal-body #val_street").prop("disabled", false);
			 	$("#edit-address .modal-body #val_town").prop("disabled", false);
			 	$("#edit-address .modal-body #val_postcode").prop("disabled", false);
			 	$("#edit-address .modal-body #val_parlimen-upd").prop("disabled", false);
			 	$("#edit-address .modal-body #val_house_type-upd").prop("disabled", false);
			 	$("#edit-address .modal-body #house_space-upd").prop("disabled", false);
			 	$("#edit-address .modal-body input:radio[name=house_dog]").prop("disabled", false);
			 	$("#edit-address .modal-body #update-dog").show();
					 
				$.get("manage_profile/get_address_edit/"+addrID, function(data){
					 var dataSplit = data.split("|");
		
					 $("#edit-address .modal-body #val_no_unit").val(dataSplit[0]);
					 $("#edit-address .modal-body #val_name_house").val(dataSplit[1]);
					 $("#edit-address .modal-body #val_street").val(dataSplit[2]);
					 $("#edit-address .modal-body #val_town").val(dataSplit[3]);
					 $("#edit-address .modal-body #val_postcode").val(dataSplit[4]);
					 $("#edit-address .modal-body #val_parlimen-upd").val(dataSplit[5]);
					 $("#edit-address .modal-body #val_house_type-upd").val(dataSplit[6]);
					 $("#edit-address .modal-body #house_space-upd").val(dataSplit[7]);
					 $("#edit-address .modal-body #addressID").val(addrID);
					 
					 if( dataSplit[8] == 0 )
					 {
					 		$("#edit-address .modal-body input:radio[id=house_dog2]").attr("checked", true);
					 }
					 else if( dataSplit[8] == 1 )
					 	{
					 		$("#edit-address .modal-body input:radio[id=house_dog1]").attr("checked", true);
					 	}
					 
				});
			}
	});	
}

function view_address(addrID)
{
	$("#edit-address").modal("toggle");
	
	$.get("manage_profile/get_address_edit/"+addrID, function(data){
		 var dataSplit = data.split("|");
		 
		 $("#edit-address .modal-body #val_no_unit").val(dataSplit[0]);
		 $("#edit-address .modal-body #val_name_house").val(dataSplit[1]);
		 $("#edit-address .modal-body #val_street").val(dataSplit[2]);
		 $("#edit-address .modal-body #val_town").val(dataSplit[3]);
		 $("#edit-address .modal-body #val_postcode").val(dataSplit[4]);
		 $("#edit-address .modal-body #val_parlimen-upd").val(dataSplit[5]);
		 $("#edit-address .modal-body #val_house_type-upd").val(dataSplit[6]);
		 $("#edit-address .modal-body #house_space-upd").val(dataSplit[7]);
		 $("#edit-address .modal-body #addressID").val(addrID);
		 
		 if( dataSplit[8] == 0 )
		 {
		 		$("#edit-address .modal-body input:radio[id=house_dog2]").attr("checked", true);
		 }
		 else if( dataSplit[8] == 1 )
		 	{
		 		$("#edit-address .modal-body input:radio[id=house_dog1]").attr("checked", true);
		 	}
		 
	});
	
		 $("#edit-address .modal-body #val_no_unit").prop("disabled", true);
		 $("#edit-address .modal-body #val_name_house").prop("disabled", true);
		 $("#edit-address .modal-body #val_street").prop("disabled", true);
		 $("#edit-address .modal-body #val_town").prop("disabled", true);
		 $("#edit-address .modal-body #val_postcode").prop("disabled", true);
		 $("#edit-address .modal-body #val_parlimen-upd").prop("disabled", true);
		 $("#edit-address .modal-body #val_house_type-upd").prop("disabled", true);
		 $("#edit-address .modal-body #house_space-upd").prop("disabled", true);
		 $("#edit-address .modal-body input:radio[name=house_dog]").prop("disabled", true);
		 $("#edit-address .modal-body #update-dog").hide();
		 
		 
}