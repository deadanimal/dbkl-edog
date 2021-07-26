//External Javascript
var path = $(location).attr('pathname');
var base_url = $(location).attr('protocol') + '//' + $(location).attr('hostname') + '/edog/';

jQuery.fn.ForceNumericOnly =
	function () {
		return this.each(function () {
			$(this).keydown(function (e) {
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


$(function () {

	// $(".test").click(function(){
	// 	$.jAlert({
	// 	        'title': 'Successful / Berjaya',
	// 	        'content': 'Total payment and receipt number has been successfully updated<br><br>Jumlah bayaran dan no resit berjaya dikemaskini.',
	// 	        'theme': 'blue',
	// 	        'size' : 'md',
	// 	        'btns': { 'text': 'close' }
	// 	      });	
	// });

	$("#postcode").ForceNumericOnly();
	$("#phone, #masked_phone").ForceNumericOnly();

	$("#register_type_id").change(function () {
		$(".no-pengenalan").css("display", "block");
	});

	$(".generate-report").click(function () {
		$(window).spin();

		$("#report-form").submit();
		// $("#report-form").ajaxSubmit({
		// 	success : function(data){
		// 		$(window).spin();
		// 		$("#_review").html(data);
		// 	}
		// });
	});

	$("#year-already").change(function () {
		$(window).spin();
		var year = $(this).val();

		window.location.href = base_url + 'admin/index.php/already_list/index/' + year;
		// window.location.href = base_url + 'edog/admin/index.php/already_list/index/'+year;
	});

	$("#year-address").change(function () {
		$(window).spin();
		var year = $(this).val();

		window.location.href = base_url + 'admin/index.php/address_list/index/' + year;
		// window.location.href = base_url + 'edog/admin/index.php/already_list/index/'+year;
	});

	$("#year-new").change(function () {
		$(window).spin();
		var year = $(this).val();

		window.location.href = base_url + 'admin/index.php/new_app_list/index/' + year;

	});

	$("#year-appeal").change(function () {
		$(window).spin();
		var year = $(this).val();

		window.location.href = base_url + 'admin/index.php/appeal_list/index/' + year;

	});

	$("#year-approved").change(function () {
		$(window).spin();
		var year = $(this).val();

		window.location.href = base_url + 'admin/index.php/approved_list/index/' + year;

	});

	$("#update-receipt-no").click(function () {
		var receiptNo = $("#no-receipt").val();
		var payVal = $("#payment-val").val();
		var appID = $("#app-id").val();

		$(window).spin();
		$.get('/admin/index.php/view_app/update_receipt_no/' + receiptNo + '/' + payVal + '/' + appID, function () {
			$(window).spin();
			$.jAlert({
				'title': 'Successful / Berjaya',
				'content': 'Total payment and receipt number has been successfully updated<br><br><i>Jumlah bayaran dan no resit berjaya dikemaskini.</i>',
				'theme': 'green',
				'size': 'md',
				'btns': { 'text': 'close' }
			});
		});
	});

	$("#payment-val, #total-payment").blur(function () {
		$(this).val(parseFloat($(this).val()).toFixed(2));
	});

	$("#pdf").on("click", function (e) {
		//alert();
		e.preventDefault();
		$("#pdf").css("display", "none");
		html2canvas($("#graph").get(0), {
			onrendered: function (canvas) {
				// document.body.appendChild(canvas);

				var imgData = canvas.toDataURL('image/png');

				alert(imgData);
				console.log('Report Image URL: ' + imgData);
				var doc = new jsPDF('landscape');

				doc.addImage(imgData, 'PNG', 10, 10, 260, 100);
				doc.save('report.pdf');
			}
		});

		location.reload();
	});



	$("#register_type_id").change(function () {
		if ($("#register_type_id").val() == "IC") {
			$("#register-ic").ForceNumericOnly();
			$("#register-ic").attr("maxlength", "12");
		}
	});

	$("#btnLogin").click(function () {
		if ($("#login-user").val() == "" || $("#login-password").val() == "") {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': 'Please fill your ID or password.<br><br><i>Sila penuhkan ID Pengguna atau Katalaluan.</i>',
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'close', 'theme': 'black' }
			});
		} else {

			$("#form-login").ajaxSubmit({
				success: function (data) {
					// alert(data)
					if (data == 1) {
						if (path.split("/")[2] == "admin")
							$.jAlert({
								'title': 'Error / Ralat',
								'content': 'Your ID or Password is incorrect.<br><br><i>ID Pengguna atau Katalaluan anda tidak sah.</i>',
								'theme': 'red',
								'size': 'md',
								'btns': { 'text': 'close', 'theme': 'black' }
							});
						//alert( "ID Pengguna atau Katalaluan anda tidak sah !" );
						else
							window.location.href = "index.php/dashboard_user";
					}
					else if (data == 2 || data == 3) {
						// alert(`asdasdasdaad`)
						if (path.split("/")[2] == "admin")
							window.location.href = "index.php/dashboard_admin";
						else
							$.jAlert({
								'title': 'Error / Ralat',
								'content': 'Your ID or Password is incorrect.<br><br><i>ID Pengguna atau Katalaluan anda tidak sah.</i>',
								'theme': 'red',
								'size': 'md',
								'btns': { 'text': 'close', 'theme': 'black' }
							});
					}
					else {
						// $.jAlert({
						//         'title': 'Error / Ralat',
						//         'content': 'Your ID or Password is incorrect.<br><br><i>ID Pengguna atau Katalaluan anda tidak sah.</i>',
						//         'theme': 'red',
						//         'size' : 'md',
						//         'btns': { 'text': 'close', 'theme' : 'black' }
						// 	  });
						// alert("data = ".data)
						// console.log(path)
						// if( path.split("/")[2] == "admin" )
						// 	window.location.href = "index.php/dashboard_admin";
						// else
						$.jAlert({
							'title': 'Error / Ralat',
							'content': 'Your ID or Password is incorrect.<br><br><i>ID Pengguna atau Katalaluan anda tidak sah.</i>',
							'theme': 'red',
							'size': 'md',
							'btns': { 'text': 'close', 'theme': 'black' }
						});


					}
				}
			});

		}
	});

	$("#new-license").click(function () {
		window.location.href = "new_license";
	});

	$("#user-dashboard").click(function () {
		window.location.href = "dashboard_user";
	});

	$("#app_name, #register-name, #add-contact-name, #contact-name").keyup(function () {
		this.value = this.value.toUpperCase();
	});

	$("#btn-form-register").click(function () {
		if ($("#register-name").val() == "" || $("#register_type_id").val() == 0 || $("#register-ic").val() == "" || $("#register-email").val() == "" || $("#register-password").val() == "" || $("#register-password-verify").val() == "") {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': 'Please fill in all required fields.<br><br><i>Sila penuhkan semua ruangan.</i>',
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'close', 'theme': 'black' }
			});
		}
		else if ($("#register-password").val() != $("#register-password-verify").val()) {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': 'Your password not match. Please try again.<br><br><i>Katalaluan anda tidak sepadan. Sila cuba lagi.</i>',
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'close', 'theme': 'black' }
			});
		} else {
			$("#form-register").attr('action', 'index.php/login/register_user');
			$(window).spin();
			$("#form-register").ajaxSubmit({
				success: function (data) {
					if (data == 2) {
						$(window).spin();
						$.jAlert({
							'title': 'Error / Ralat',
							'content': 'Data already existed.<br><br><i>Data telah didaftarkan di dalam sistem ini.</i>',
							'theme': 'red',
							'size': 'md',
							'btns': { 'text': 'close', 'theme': 'black' }
						});
						return false;
					}
					else {
						$(window).spin();
						$.jAlert({
							'title': 'Berjaya / Successful',
							'content': 'Your registration has been successful.<br><br><i>Pendaftaran anda telah berjaya.</i>',
							'theme': 'green',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' },
							'onClose': function () {
								window.location = 'index.php';
							}
						});

					}
				}
			})
		}
	});

	$("#forgot-password-button").click(function () {

		$("#form-reminder").attr('action', 'index.php/login/forgot_password');
		$(window).spin();

		$("#form-reminder").ajaxSubmit({
			success: function (data) {
				console.log(data);
				if (data == 0) {
					$(window).spin();
					$.jAlert({
						'title': 'Error / Ralat',
						'content': 'Email or Identity Number is not match. Please try again.<br><br><i>Emel atau No. Pengenalan tidak sepadan. Sila cuba lagi.</i>',
						'theme': 'red',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' }
					});

					return false;
				}
				else {

					$(window).spin();
					$.jAlert({
						'title': 'Berjaya / Successful',
						'content': 'Your password has been reset and temporary password will be sent to your email.<br><br><i>Kata laluan anda telah ditetapkan semula dan kata laluan sementara telah dihantar ke emel anda.</i>',
						'theme': 'green',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' },
						'onClose': function () {
							window.location = 'index.php';
						}
					});
				}

			}
		});
	});

	$("#option-address").change(function () {

		var user_option = $("#option-address").val();

		if (user_option == 0) {
			$(".view-address").html("<font color='red'>Sila pilih alamat di atas untuk paparan senarai lesen</font>");
		}
		else {
			$.get('already_license/view_address/' + user_option, function (data) {
				$(".view-address").html(data);
			});
		}
	});

	$("#add-address-new").click(function () {
		$(window).spin();
		if ($("#val_no_unit").val() == "" || $("#val_postcode").val() == "" || $("#val_parlimen").val() == 0 || $("#val_house_type").val() == 0 || $("#house_space").val() == 0) {
			$(window).spin();
			$.jAlert({
				'title': 'Error / Ralat',
				'content': 'Please fill in all required fields.<br><i>Sila penuhkan ruangan mandatori.</i>',
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});
			return false;
		}
		else {
			$("#form-validation").ajaxSubmit({
				success: function () {
					$(window).spin();
					$.jAlert({
						'title': 'Berjaya / Successful',
						'content': 'Your address has been successful registered.<br><br><i>Pendaftaran alamat anda berjaya.</i>',
						'theme': 'green',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' },
						'onClose': function () {
							window.location = '?action=addr';
						}
					});
				}
			});
		}
	});

	$("#update-dog").click(function () {

		if ($("#val_parlimen-upd").val() == 0 || $("#val_house_type-upd").val() == 0 || $("#house_space-upd").val() == 0) {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': 'Please fill in all required fields for register your address.<br><i>Sila penuhkan maklumat untuk daftar alamat rumah.</i>',
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});
			return false;
		}
		else {
			$("#form-validation-update").ajaxSubmit({
				success: function () {
					$.jAlert({
						'title': 'Berjaya / Successful',
						'content': 'Your address has been successful updated.<br><br><i>Alamat anda berjaya dikemaskini.</i>',
						'theme': 'green',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' },
						'onClose': function () {
							window.location = '?action=addr';
						}
					});
				}
			});
		}

	});

	$("#val_dogcolor_etc_opt").click(function () {
		if ($("#val_dogcolor_etc_opt").is(':checked')) {
			$("#val_dogcolor_etc").prop("disabled", false);
		}
		else {
			$("#val_dogcolor_etc").prop("disabled", true);
		}
	});

	$("#add-first-dog").click(function () {
		$("#dogID").val(1);
	});
	$("#add-second-dog").click(function () {
		$("#dogID").val(2);
	});

	$("#add-first-dog, #add-second-dog").click(function () {

		var ids = $(this).data('id');

		$("#update-renew-1 .dogs").html(ids);
	});

	$("#update-temp-dog, #update-temp-dog2").click(function () {

		//$.clear();

		var ids = $(this).data('id');
		var idsplit = ids.split("|");
		console.log(base_url + path.split("/")[2] + '/new_license_app/get_data_temporary_dog/' + idsplit[0] + '/' + idsplit[1]);
		$.get(base_url + path.split("/")[2] + '/new_license_app/get_data_temporary_dog/' + idsplit[0] + '/' + idsplit[1], function (data) {
			var dataSplit = data.split("|");

			$("#update-renew-2 #no-dog").html(idsplit[1]);
			$("#update-renew-2 .modal-body #dog_type").val(dataSplit[0]);
			$("#update-renew-2 .modal-body #val_dogcolor").val(dataSplit[1]);
			$("#update-renew-2 .modal-body #val_weight").val(dataSplit[3]);
			$("#update-renew-2 .modal-body #val_microchip").val(dataSplit[5]);
			$("#update-renew-2 .modal-body #loc_pic").val(dataSplit[8]);
			$("#update-renew-2 .modal-body #imgDog").attr("src", base_url + dataSplit[8]);
			$("#update-renew-2 .modal-body #dogID").val(idsplit[1]);
			$("#update-renew-2 .modal-body #addrID").val(idsplit[0]);

			var colorSplit = dataSplit[1].split(", ");

			var standardColor = [];
			standardColor.push('Hitam');
			standardColor.push('Putih');
			standardColor.push('Coklat');

			if ($.inArray('Hitam', colorSplit) != -1) {
				$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_blk]").attr("checked", true);
			}

			if ($.inArray('Putih', colorSplit) != -1) {
				$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_wht]").attr("checked", true);
			}

			if ($.inArray('Coklat', colorSplit) != -1) {
				$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_brown]").attr("checked", true);
			}

			for (i = 0; i < colorSplit.length; i++) {
				if ($.inArray(colorSplit[i], standardColor) == -1 && colorSplit[i] != '') {
					$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_etc_opt]").attr("checked", true);
					$("#update-renew-2 .modal-body #val_dogcolor_etc").attr("disabled", false);
					$("#update-renew-2 .modal-body #val_dogcolor_etc").val(colorSplit[i]);
				}
			}


			//--------------Jantina-----------------//
			if (dataSplit[2] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=val_gender1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=val_gender2]").attr("checked", true);
			}

			//------------Mandul------------------//
			if (dataSplit[4] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=val_mandul1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=val_mandul2]").attr("checked", true);
			}

			//-------------Latihan Pemilik-------------//
			if (dataSplit[6] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=owner_training1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=owner_training2]").attr("checked", true);
			}

			//---------------Latihan Anjing----------------//
			if (dataSplit[7] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=dog_training1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=dog_training2]").attr("checked", true);
			}
		});
	});

	$("#cancel-dog").click(function (data) {
		var dogid = $("#dogid").val();
		var addrid = $("#addrid").val();

		$.jAlert({
			'title': 'Confirmation / Sahkan',
			'confirmQuestion': "Are you sure to cancel the dog's information ?.<br><br><i>Anda pasti untuk batalkan maklumat anjing ini ?.</i>",
			'theme': 'blue',
			'size': 'md',
			'type': 'confirm',
			'onConfirm': function () {
				//e.preventDefault();
				$.get(base_url + path.split("/")[2] + "/new_license_app/cancel_temporary_dog/" + dogid + "/" + addrid, function (data) {
					if (data == 1) {
						$(window).spin();
						$.jAlert({
							'title': 'Berjaya / Successful',
							'content': "Dog's information has been successful cancelled.<br><br><i>Maklumat anjing telah berjaya dibatalkan.</i>",
							'theme': 'green',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' },
							'onClose': function () {
								location.reload();
							}
						});
					}
				});

			}, 'onDeny': function () {
				return false;
			}

		});

		// if( confirm("Anda pasti untuk batalkan maklumat anjing ini ?") )
		// {
		// 	$(window).spin();
		// 	$.get(base_url+path.split("/")[2]+"/new_license_app/cancel_temporary_dog/"+dogid+"/"+addrid, function(data){
		// 		if( data == 1 )
		// 		{
		// 			$(window).spin();
		// 			alert("Maklumat anjing telah berjaya dibatalkan");
		// 			location.reload();
		// 		}
		// 	});
		// }
		// else
		// 	{
		// 		return false;
		// 	}
	});

	$("#cancel2-dog").click(function (data) {
		var dogid = $("#dogid2").val();
		var addrid = $("#addrid2").val();

		$.jAlert({
			'title': 'Confirmation / Sahkan',
			'confirmQuestion': "Are you sure to cancel the dog's information ?.<br><br><i>Anda pasti untuk batalkan maklumat anjing ini ?.</i>",
			'theme': 'blue',
			'size': 'md',
			'type': 'confirm',
			'onConfirm': function () {
				//e.preventDefault();
				$.get(base_url + path.split("/")[2] + "/new_license_app/cancel_temporary_dog/" + dogid + "/" + addrid, function (data) {
					if (data == 1) {
						$(window).spin();
						$.jAlert({
							'title': 'Berjaya / Successful',
							'content': "Dog's information has been successful cancelled.<br><br><i>Maklumat anjing telah berjaya dibatalkan.</i>",
							'theme': 'green',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' },
							'onClose': function () {
								location.reload();
							}
						});
					}
				});

			}, 'onDeny': function () {
				return false;
			}

		});

		// if( confirm("Anda pasti untuk batalkan maklumat anjing ini ?") )
		// {
		// 	$(window).spin();
		// 	$.get(base_url+path.split("/")[2]+"/new_license_app/cancel_temporary_dog/"+dogid+"/"+addrid, function(data){
		// 		if( data == 1 )
		// 		{
		// 			$(window).spin();
		// 			alert("Maklumat anjing telah berjaya dibatalkan");
		// 			location.reload();
		// 		}
		// 	});
		// }
		// else
		// 	{
		// 		return false;
		// 	}
	});

	$("#add-temp-dog").click(function () {

		$(window).spin();
		$("#form-reg-dog").ajaxSubmit({
			success: function (data) {

				if (data == 0) {
					$(window).spin();
					$.jAlert({
						'title': 'Error / Ralat',
						'content': "Dog's image is not allowed.<br><i>Jenis gambar anjing tidak dibenarkan.</i>",
						'theme': 'red',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' }
					});

					return false;
				}
				else if (data == 2) {
					$(window).spin();
					$.jAlert({
						'title': 'Error / Ralat',
						'content': "Please fill all required fields.<br><i>Sila penuhkan ruangan mandatori.</i>",
						'theme': 'red',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' }
					});

					return false;
				}
				else {
					$(window).spin();
					window.location.href = base_url + 'index.php/new_license_app/index/' + $("#addrID").val();
				}
			}
		});
	});

	$("#submit-dog").click(function (data) {
		//alert($( "#doc_type" ).val());
		if ($("#agreed_term").is(":checked")) {
			if ($("#doc_type").val() == 1) {
				$("input[type='file'][name='doc_support[]']").each(function () {
					if ($(this).val().length == 0) {
						$.jAlert({
							'title': 'Error / Ralat',
							'content': "Please upload your support document.<br><i>Sila muat naik dokumen sokongan anda.</i>",
							'theme': 'red',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' }
						});

						return false;
					}
					else {
						$(window).spin();
						$("#new-application").ajaxSubmit({
							success: function (data) {
								//alert(data);

								if (data == 0) {
									$(window).spin();
									$.jAlert({
										'title': 'Error / Ralat',
										'content': "Document's type is not allowed.<br><i>Jenis dokumen sokongan tidak dibenarkan.</i>",
										'theme': 'red',
										'size': 'md',
										'btns': { 'text': 'OK', 'theme': 'black' }
									});

									return false;
								}
								else {
									$(window).spin();
									$.jAlert({
										'title': 'Berjaya / Successful',
										'content': "Your application has been submitted and currently pending for our revision (maximum 14 working days). If your application is approved, please print the application upon paying the license.Please make payment at the nearest dbkl payment counter. Within 7 working days<br><br><i>Permohonan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima.Sila buat pembayaran di kaunter pembayaran dbkl terdekat.Dalam masa 7 hari bekerja.Terima kasih.</i>",
										'theme': 'green',
										'size': 'md',
										'btns': { 'text': 'OK', 'theme': 'black' },
										'onClose': function () {
											window.location.href = base_url + 'index.php/dashboard_user';
										}
									});
									//alert("Permohonan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");

								}
							}
						});
					}
				});
			}
			else 
			{
				$(window).spin();
				$("#new-application").ajaxSubmit({
					success: function (data) {

						$(window).spin();
						$.jAlert({
							'title': 'Berjaya / Successful',
							'content': "Your application has been submitted and currently pending for our revision (maximum 14 working days). If your application is approved, please print the application upon paying the license.Please make payment at the nearest dbkl payment counter. Within 7 working days<br><br><i>Permohonan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima.Sila buat pembayaran di kaunter pembayaran dbkl terdekat.Dalam masa 7 hari bekerja.Terima kasih.</i>",
							// 'content': "Your application has been accepted. Please print your payment bill.<br><br><i>Permohonan anda telah diterima. Sila Cetak Bil Pembayaran.</i>",
							'theme': 'green',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' },
							'onClose': function () {
								window.location.href = base_url + 'index.php/dashboard_user';
							}
						});
						//alert("Permohonan anda telah diterima. Sila Cetak Bil Pembayaran");

					}
				});
			}
		}
		else {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': "Please indicate that you agree with the Dog Licensing Law.<br><i>Sila tandakan jika bersetuju dengan Undang-undang Kecil Perlesenan Anjing.</i>",
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});

			return false;
		}

	});

	$("#print_receipt").click(function () {
		window.open(base_url + "index.php/receipt/index/" + $("#appid").val());
	});

	$("#appeal-app").click(function () {
		if ($("#val_verify").is(":checked")) {

			if ($("#text-appeal").val() == "") {
				$.jAlert({
					'title': 'Error / Ralat',
					'content': "Please fill in appeal box for this application.<br><i>Sila isikan ruangan rayuan untuk permohonan ini.</i>",
					'theme': 'red',
					'size': 'md',
					'btns': { 'text': 'OK', 'theme': 'black' }
				});

				//alert( "Sila isikan ruangan rayuan untuk permohonan ini" );
			}
			else {

				$("input[type='file'][name='doc_support[]']").each(function () {
					if ($(this).val().length == 0) {
						$.jAlert({
							'title': 'Error / Ralat',
							'content': "Please upload your support document(s).<br><i>Sila muat naik dokumen sokongan anda.</i>",
							'theme': 'red',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' }
						});

						//alert("Sila muat naik dokumen sokongan anda !");
						return false;
					}
					else {

						$(window).spin();
						$("#submit-appeal").ajaxSubmit({
							success: function (data) {
								$(window).spin();
								$.jAlert({
									'title': 'Berjaya / Successful',
									'content': "Your application has been submitted and currently pending for our revision (maximum 14 working days). If your application is approved, please print the application upon paying the license.Please make payment at the nearest dbkl payment counter. Within 7 working days<br><br><i>Permohonan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima.Sila buat pembayaran di kaunter pembayaran dbkl terdekat.Dalam masa 7 hari bekerja.Terima kasih.</i>",
									'theme': 'green',
									'size': 'md',
									'btns': { 'text': 'OK', 'theme': 'black' },
									'onClose': function () {
										window.location.href = base_url + 'index.php/dashboard_user';
									}
								});
								//alert("Permohonan rayuan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
								// window.location.href = base_url+'index.php/dashboard_user';
							}
						});
					}

				});
			}
		}
		else {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': "Please indicate that you agree with the Dog Licensing Law.<br><i>Sila tandakan jika bersetuju dengan Undang-undang Kecil Perlesenan Anjing.</i>",
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});
			//alert("Sila tandakan persetujuan anda !");
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

	$("#submit-not-renew").click(function (data) {
		if ($("#reasons").val() == 0) {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': "Please choose your reason if not renew the license.<br><i>Sila pilih sebab tidak memperbaharui lesen.</i>",
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});

			//alert("Sila pilih sebab tidak memperbaharui lesen !");
			return false;
		}
		else {
			$.jAlert({
				'title': 'Confirmation / Sahkan',
				'confirmQuestion': "Are you sure to cancel the dog's information ?.<br><br><i>Anda pasti untuk batalkan maklumat anjing ini ?.</i>",
				'theme': 'blue',
				'size': 'md',
				'type': 'confirm',
				'onConfirm': function () {
					//e.preventDefault();
					$("#form-not-renew").ajaxSubmit({
						success: function (data) {
							$(window).spin();
							$.jAlert({
								'title': 'Berjaya / Successful',
								'content': "Your license has been successfully submitted for unrenewed. Thanks you.<br><br><i>Lesen anda telah berjaya dihantar untuk tidak diperbaharui. Terima kasih.</i>",
								'theme': 'green',
								'size': 'md',
								'btns': { 'text': 'OK', 'theme': 'black' },
								'onClose': function () {
									location.reload();
								}
							});
						}
					});


				}, 'onDeny': function () {
					return false;
				}

			});
		}
	});

	$("#tick-not-renew1").click(function () {
		if ($(this).is(":checked")) {
			$("#list-reason1").css("display", "block");
			$("#update-renew1").attr("disabled", true);
			$("#dog_pic").attr("disabled", true);
		}
		else {
			$("#list-reason1").css("display", "none");
			$("#update-renew1").attr("disabled", false);
			$("#dog_pic").attr("disabled", false);
		}
	});

	$("#tick-not-renew2").click(function () {
		if ($(this).is(":checked")) {
			$("#list-reason2").css("display", "block");
			$("#update-renew2").attr("disabled", true);
			$("#dog_pic-2").attr("disabled", true);
		}
		else {
			$("#list-reason2").css("display", "none");
			$("#update-renew2").attr("disabled", false);
			$("#dog_pic-2").attr("disabled", false);
		}
	});

	$("#update-renew1").click(function () {
		var dogID = $(this).data("id");

		$.get(base_url + path.split("/")[2] + "/renewal/get_dog_detail/" + dogID, function (data) {

			var dataSplit = data.split("|");

			$("#update-renew-1 .modal-body #dog_list").val(dataSplit[0]);
			$("#update-renew-1 .modal-body #val_weight").val(dataSplit[3]);
			$("#update-renew-1 .modal-body #val_microchip").val(dataSplit[5]);
			$("#update-renew-1 .modal-body #loc_pic").val(dataSplit[8]);
			if (dataSplit[8] == "")
				$("#update-renew-1 .modal-body #imgDog").attr("src", base_url + dataSplit[8]);
			else
				$("#update-renew-1 .modal-body #imgDog").attr("src", base_url + 'images/no_picture.gif');
			$("#update-renew-1 .modal-body #dog-type").val(dataSplit[0]);
			$("#update-renew-1 .modal-body #dog-color").val(dataSplit[1]);
			$("#update-renew-1 .modal-body #dog-gender").val(dataSplit[2]);
			$("#update-renew-1 .modal-body #dog-id").val(dogID);

			var colorSplit = dataSplit[1].split(",");

			var standardColor = [];
			standardColor.push('Hitam');
			standardColor.push('Putih');
			standardColor.push('Coklat');

			if ($.inArray('Hitam', colorSplit) != -1) {
				$("#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_blk]").attr("checked", true);
			}

			if ($.inArray('Putih', colorSplit) != -1) {
				$("#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_wht]").attr("checked", true);
			}

			if ($.inArray('Coklat', colorSplit) != -1) {
				$("#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_brown]").attr("checked", true);
			}

			for (i = 0; i < colorSplit.length; i++) {
				if ($.inArray(colorSplit[i], standardColor) == 0) {
					$("#update-renew-1 .modal-body input:checkbox[id=val_dogcolor_etc_opt]").attr("checked", true);
					$("#update-renew-1 .modal-body #val_dogcolor_etc").val(colorSplit[i]);
				}
			}


			//--------------Jantina-----------------//
			if (dataSplit[2] == 1) {
				$("#update-renew-1 .modal-body input:radio[id=gender1]").attr("checked", true);
			}
			else {
				$("#update-renew-1 .modal-body input:radio[id=gender2]").attr("checked", true);
			}

			//------------Mandul------------------//
			if (dataSplit[4] == 1) {
				$("#update-renew-1 .modal-body input:radio[id=val_mandul1]").attr("checked", true);
			}
			else {
				$("#update-renew-1 .modal-body input:radio[id=val_mandul2]").attr("checked", true);
			}

			//-------------Latihan Pemilik-------------//
			if (dataSplit[6] == 1) {
				$("#update-renew-1 .modal-body input:radio[id=owner_training1]").attr("checked", true);
			}
			else {
				$("#update-renew-1 .modal-body input:radio[id=owner_training2]").attr("checked", true);
			}

			//---------------Latihan Anjing----------------//
			if (dataSplit[7] == 1) {
				$("#update-renew-1 .modal-body input:radio[id=dog_training1]").attr("checked", true);
			}
			else {
				$("#update-renew-1 .modal-body input:radio[id=dog_training2]").attr("checked", true);
			}
		});
	});

	$("#update-renew2").click(function () {

		var dogID = $(this).data("id");
		console.log(base_url + path.split("/")[2] + "/renewal/get_dog_detail/" + dogID);
		$.get(base_url + path.split("/")[2] + "/renewal/get_dog_detail/" + dogID, function (data) {

			var dataSplit = data.split("|");

			$("#update-renew-2 .modal-body #dog_list").val(dataSplit[0]);
			$("#update-renew-2 .modal-body #val_weight").val(dataSplit[3]);
			$("#update-renew-2 .modal-body #val_microchip").val(dataSplit[5]);
			$("#update-renew-2 .modal-body #loc_pic").val(dataSplit[8]);
			if (dataSplit[8] == "")
				$("#update-renew-2 .modal-body #imgDog").attr("src", base_url + dataSplit[8]);
			else
				$("#update-renew-2 .modal-body #imgDog").attr("src", base_url + 'images/no_picture.gif');
			//					$( "#update-renew-2 .modal-body #dog_type" ).val(dataSplit[0]);
			//					$( "#update-renew-2 .modal-body #dog-color" ).val(dataSplit[1]);
			//					$( "#update-renew-2 .modal-body #dog-gender" ).val(dataSplit[2]);


			var colorSplit = dataSplit[1].split(", ");

			// alert(dataSplit[1]);

			var standardColor = [];
			standardColor.push('Hitam');
			standardColor.push('Putih');
			standardColor.push('Coklat');

			if ($.inArray('Hitam', colorSplit) != -1) {
				$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_blk]").attr("checked", true);
			}

			if ($.inArray('Putih', colorSplit) != -1) {
				$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_wht]").attr("checked", true);
			}

			if ($.inArray('Coklat', colorSplit) != -1) {
				$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_brown]").attr("checked", true);
			}

			for (i = 0; i < colorSplit.length; i++) {

				if ($.inArray(colorSplit[i], standardColor) == -1 && colorSplit[i] != '') {
					$("#update-renew-2 .modal-body input:checkbox[id=val_dogcolor_etc_opt]").attr("checked", true);
					$("#update-renew-2 .modal-body #val_dogcolor_etc").val(colorSplit[i]);
				}
			}


			//--------------Jantina-----------------//
			if (dataSplit[2] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=gender1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=gender2]").attr("checked", true);
			}

			//------------Mandul------------------//
			if (dataSplit[4] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=val_mandul1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=val_mandul2]").attr("checked", true);
			}

			//-------------Latihan Pemilik-------------//
			if (dataSplit[6] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=owner_training1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=owner_training2]").attr("checked", true);
			}

			//---------------Latihan Anjing----------------//
			if (dataSplit[7] == 1) {
				$("#update-renew-2 .modal-body input:radio[id=dog_training1]").attr("checked", true);
			}
			else {
				$("#update-renew-2 .modal-body input:radio[id=dog_training2]").attr("checked", true);
			}
		});
	});

	$("#update-renew-dog").click(function () {
		var weight = $("#val_weight").val();

		$.get(base_url + path.split("/")[2] + "/renewal/get_weight_name/" + weight, function (data) {
			$("#weight-dog").html(data);
		});

		$("#weight-val").val(weight);

		var mandul = $("input[name=val_mandul]:checked").val();
		if (mandul == 0)
			$("#mandul-dog").html('Tidak');
		else
			$("#mandul-dog").html('Ya');

		$("#mandul-val").val(mandul);

		var microchip = $("#val_microchip").val();
		$("#microchip-dog").html(microchip);
		$("#microchip-val").val(microchip);

		var owner = $("input[name=owner_training]:checked").val();
		if (owner == 0)
			$("#owner-training-dog").html('Tidak');
		else
			$("#owner-training-dog").html('Ya');

		$("#owner-training-val").val(owner);

		var dog = $("input[name=dog_training]:checked").val();
		if (dog == 0)
			$("#dog-training-dog").html('Tidak');
		else
			$("#dog-training-dog").html('Ya');

		$("#dog-training-val").val(dog);
	});

	$("#renew-app-dog").click(function () {
		if ($("#val_agree").is(":checked")) {
			if ($("#doc_type").val() == 1) {
				$("input[type='file'][name='doc_support[]']").each(function () {
					if ($(this).val().length == 0) {
						$.jAlert({
							'title': 'Error / Ralat',
							'content': "Please upload your support document(s).<br><i>Sila muat naik dokumen sokongan anda.</i>",
							'theme': 'red',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' }
						});
						//alert("Sila muat naik dokumen sokongan anda !");
						return false;
					}
					else {
						if ($("#tick-not-renew1").is(":checked")) {
							if ($("#reasons option:selected").length == 0) {
								$.jAlert({
									'title': 'Error / Ralat',
									'content': "Please choose reason to not renew for dog #1.<br><i>Sila pilih sebab untuk tidak memperbaharui lesen atas anjing #1.</i>",
									'theme': 'red',
									'size': 'md',
									'btns': { 'text': 'OK', 'theme': 'black' }
								});
								//alert("Sila pilih sebab untuk tidak memperbaharui lesen atas anjing #1 !");
								return false;
							}
						}
						else if ($("#tick-not-renew2").is(":checked")) {
							if ($("#reasons2 option:selected").length == 0) {
								$.jAlert({
									'title': 'Error / Ralat',
									'content': "Please choose reason to not renew for dog #2.<br><i>Sila pilih sebab untuk tidak memperbaharui lesen atas anjing #2.</i>",
									'theme': 'red',
									'size': 'md',
									'btns': { 'text': 'OK', 'theme': 'black' }
								});
								//alert("Sila pilih sebab untuk tidak memperbaharui lesen atas anjing #2 !");
								return false;
							}
						}
						else {
							$(window).spin();
							$("#renew-application").ajaxSubmit({
								success: function (data) {
									$(window).spin();
									$.jAlert({
										'title': 'Berjaya / Successful',
										'content': "Your application has been submitted and currently pending for our revision (maximum 14 working days). If your application is approved, please print the application upon paying the license.Please make payment at the nearest dbkl payment counter. Within 7 working days<br><br><i>Permohonan anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima.Sila buat pembayaran di kaunter pembayaran dbkl terdekat.Dalam masa 7 hari bekerja.Terima kasih.</i>",
										'theme': 'green',
										'size': 'md',
										'btns': { 'text': 'OK', 'theme': 'black' },
										'onClose': function () {
											window.location.href = base_url + 'index.php/dashboard_user';
										}
									});
									//alert("Permohonan pembaharuan lesen anda berjaya dihantar. Proses saringan permohonan akan dilakukan dalam masa 14 hari waktu bekerja. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
									//window.location.href = base_url+'index.php/dashboard_user';
								}
							});
						}
					}
				});
			}
			else {
				$(window).spin();
				$("#renew-application").ajaxSubmit({
					success: function (data) {
						$(window).spin();
						$.jAlert({
							'title': 'Berjaya / Successful',
							'content': "Your renew application has been submitted. Please print your application statement for payment if your application was accepted.<br><i>Permohonan pembaharuan lesen anda telah berjaya dihantar. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih.</i>",
							'theme': 'green',
							'size': 'md',
							'btns': { 'text': 'OK', 'theme': 'black' },
							'onClose': function () {
								window.location.href = base_url + 'index.php/dashboard_user';
							}
						});
						//alert("Permohonan pembaharuan lesen anda telah berjaya dihantar. Sila cetak penyata permohonan untuk tujuan pembayaran jika permohonan anda telah diterima. Terima kasih");
						//window.location.href = base_url+'index.php/dashboard_user';
					}
				});
			}
		}
		else {
			$.jAlert({
				'title': 'Error / Ralat',
				'content': "Please indicate that you agree with the Dog Licensing Law.<br><i>Sila tandakan jika bersetuju dengan Undang-undang Kecil Perlesenan Anjing.</i>",
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});
			//alert( "Sila tandakan persetujuan anda !"  );
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

	$("#new-app-submit").click(function () {
		if ($("input[name=decision]").is(":checked")) {
			$(window).spin();
			$("#save-new-app").ajaxSubmit({
				success: function (data) {

					$(window).spin();
					alert("Permohonan berjaya dihantar dan dikemaskini");
					if ($("#appealID").val() == 1) {
						window.location.href = base_url + 'admin/index.php/appeal_list';
					}
					else {
						window.location.href = base_url + 'admin/index.php/new_app_list';
					}

				}
			});
		}
		else {
			alert("Sila pilih status permohonan !");
		}
	});

	$("#update-license-no").click(function () {

		$("input[name='val_lencana[]']").each(function () {
			if ($(this).val() == "") {
				alert("Sila isikan no lencana anjing");
				return false;
			}
			else if ($("#date-accepted").val() == "") {
				alert("Sila isikan tarikh permohonan diterima");
				return false;
			}
			else if ($("#date-start-license").val() == "") {
				alert("Sila isikan tarikh mula lesen");
				return false;
			}
			else if ($("#date-payment").val() == "") {
				alert("Sila isikan tarikh bayaran dibuat");
				return false;
			}
			else if ($("#counter-payment").val() == "") {
				alert("Sila pilih kaunter bayaran");
				return false;
			}
			else if ($("#mode-payment").val() == "") {
				alert("Sila pilih mod bayaran");
				return false;
			}
			else if ($("#total-payment").val() == "") {
				alert("Sila isikan jumlah bayaran");
				return false;
			}
			else if ($("#receipt-payment").val() == "") {
				alert("Sila isikan no. resit pembayaran");
				return false;
			}
			else {
				$(window).spin();
				$("#update-approved").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Kemaskini no. lencana telah berjaya didaftarkan");
						window.location.href = base_url + 'admin/index.php/approved_list';
					}
				});
			}
		});




	});

	$("input[name=decision]").click(function () {
		if ($("#decision2").is(":checked")) {
			$("#reject-cause").removeAttr("disabled");
		}
		else if ($("#decision1").is(":checked")) {
			$("#reject-cause").attr("disabled", true);
		}
	});

	$("#save_new_users").click(function () {
		if ($("#user-settings-password").val() == $("#user-settings-repassword").val()) {
			$(window).spin();
			$("#add-new-users").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Pendaftaran pengguna baru telah berjaya");
					location.reload();
				}
			});
		}
		else {
			alert("Kata laluan anda tidak sepadan");
		}
	});

	$("#kemaskini-pengguna").click(function () {
		$(window).spin();
		if ($("#user-settings-password-upd").val() == $("#user-settings-repassword-upd").val()) {
			$("#update-user-manage").ajaxSubmit({
				success: function (data) {

					$(window).spin();
					alert("Kemaskini pengguna telah berjaya.");
					location.reload();
				}
			});
		}
		else {
			$(window).spin();
			alert("Kata laluan anda tidak sepadan. !");
			return false;
		}
	});

	$("#update-profile").click(function () {
		$(window).spin();

		if ($("#masked_phone").val() == "" || $("#val_email").val() == "") {
			$(window).spin();
			$.jAlert({
				'title': 'Error / Ralat',
				'content': "Please fill all required fields.<br><i>Sila penuhkan ruangan mandatori.</i>",
				'theme': 'red',
				'size': 'md',
				'btns': { 'text': 'OK', 'theme': 'black' }
			});
			//alert( "Sila penuhkan ruangan mandatori !" );
			return false;
		}
		else {
			$("#user-details").ajaxSubmit({
				success: function (data) {
					$(window).spin();
					$.jAlert({
						'title': 'Berjaya / Successful',
						'content': "Your data has been successfully updated.<br><i>Data anda berjaya dikemaskini.</i>",
						'theme': 'green',
						'size': 'md',
						'btns': { 'text': 'OK', 'theme': 'black' },
						'onClose': function () {
							window.location.href = "";
						}
					});
				}
			});
		}
	});

	$("#complaint-submit").click(function () {
		$(window).spin();

		if ($("#contact-name").val() == "" || $("#contact-email").val() == "" || $("#contact-message").val() == "") {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong !");
			return false;
		}
		else {
			$("#form-contact").ajaxSubmit({
				success: function (data) {
					$(window).spin();
					alert("Aduan / Cadangan anda telah dihantar kepada pihak DBKL. Terima kasih.");
					location.reload();
				}
			});
		}
	});

	$("#comment-update-dog1").click(function () {
		$(window).spin();
		$("#dog-one").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert('Ulasan dan no lesen bagi anjing pertama berjaya dikemaskini.');
				location.reload();
			}
		});
	});

	$("#comment-update-dog2").click(function () {
		$(window).spin();
		$("#dog-two").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert('Ulasan dan no lesen bagi anjing kedua berjaya dikemaskini.');
				location.reload();
			}
		});
	});


	//PARLIMEN SETTING
	$("#parlimen-setting").click(function () {
		$(window).spin();
		if ($("#name-parlimen").val() == "" || $("#deskripsi-parlimen").val() == "" || $("input[name='status']").is(":checked") == false) {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#parlimen-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Parlimen berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-parlimen").click(function () {
		$(window).spin();
		if ($("input[name='_par[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan parlimen ini ?")) {
				$("#parlimen-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Parlimen telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih parlimen untuk dihapus.");
			return false;
		}
	});

	$('#modal-parlimen-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-parlimen-edit .modal-body #par_id").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_parlimen/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-parlimen-edit .modal-body #name-parlimen").val(split[0]);
			$("#modal-parlimen-edit .modal-body #deskripsi-parlimen").val(split[1]);

			if (split[2] == 1)
				$("#modal-parlimen-edit .modal-body #status1").attr("checked", true);
			else
				$("#modal-parlimen-edit .modal-body #status2").attr("checked", true);
		});
	});

	$("#parlimen-edit-setting").click(function () {
		$(window).spin();
		$("#parlimen-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Parlimen berjaya dikemaskini");
				location.reload();
			}
		});
	});

	//END PARLIMEN SETTING

	//HOUSE TYPE SETTING
	$("#house-type-setting").click(function () {
		$(window).spin();

		if ($("#name-house-type").val() == "" || $("#code-house-type").val() == "" || $("#deskripsi-house-type").val() == "" || $("input[name='doc-support']").is(":checked") == false || $("input[name='status-house-type']").is(":checked") == false) {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#house-type-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Jenis rumah berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-house-type").click(function () {
		$(window).spin();
		if ($("input[name='_ht[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan jenis rumah ini ?")) {
				$("#house-type-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Jenis rumah telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih jenis rumah untuk dihapus.");
			return false;
		}
	});

	$('#modal-house-type-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-house-type-edit .modal-body #hid").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_house_type/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-house-type-edit .modal-body #name-house-type").val(split[0]);
			$("#modal-house-type-edit .modal-body #code-house-type").val(split[1]);
			$("#modal-house-type-edit .modal-body #deskripsi-house-type").val(split[2]);

			if (split[3] == 1)
				$("#modal-house-type-edit .modal-body #doc1").attr("checked", true);
			else
				$("#modal-house-type-edit .modal-body #doc2").attr("checked", true);

			if (split[4] == 1)
				$("#modal-house-type-edit .modal-body #status1").attr("checked", true);
			else
				$("#modal-house-type-edit .modal-body #status2").attr("checked", true);
		});
	});

	$("#house-type-edit-setting").click(function () {
		$(window).spin();
		$("#house-type-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Jenis rumah berjaya dikemaskini");
				location.reload();
			}
		});
	});

	//END HOUSE TYPE SETTING

	//HOUSE SPACE SETTING
	$("#house-space-setting").click(function () {
		$(window).spin();

		if ($("#name-house-space").val() == "" || $("#code-house-space").val() == "" || $("#deskripsi-house-space").val() == "" || $("input[name='dog']").is(":checked") == false || $("input[name='status-house-space']").is(":checked") == false) {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#house-space-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Keluasan rumah berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-house-space").click(function () {
		$(window).spin();
		if ($("input[name='_hs[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan keluasan rumah ini ?")) {
				$("#house-space-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Keluasan rumah telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih keluasan rumah untuk dihapus.");
			return false;
		}
	});

	$('#modal-house-space-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-house-space-edit .modal-body #hsid").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_house_space/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-house-space-edit .modal-body #name-house-space").val(split[0]);
			$("#modal-house-space-edit .modal-body #code-house-space").val(split[1]);
			$("#modal-house-space-edit .modal-body #deskripsi-house-space").val(split[2]);

			if (split[3] == 1)
				$("#modal-house-space-edit .modal-body #dog1").attr("checked", true);
			else
				$("#modal-house-space-edit .modal-body #dog2").attr("checked", true);

			if (split[4] == 1)
				$("#modal-house-space-edit .modal-body #status1").attr("checked", true);
			else
				$("#modal-house-space-edit .modal-body #status2").attr("checked", true);
		});
	});

	$("#house-space-edit-setting").click(function () {
		$(window).spin();
		$("#house-space-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Keluasan rumah berjaya dikemaskini");
				location.reload();
			}
		});
	});
	//END HOUSE SPACE SETTING

	//DOG LIST SETTING
	$("#dog-list-setting").click(function () {
		$(window).spin();

		if ($("#name-dog").val() == "" || $("input[name='dog-types']").is(":checked") == false || $("input[name='status-dog']").is(":checked") == false) {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#dog-list-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Jenis anjing berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-dog-list").click(function () {
		$(window).spin();
		if ($("input[name='_dl[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan jenis anjing ini ?")) {
				$("#dog-list-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Jenis anjing telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih jenis anjing untuk dihapus.");
			return false;
		}
	});

	$('#modal-dog-list-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-dog-list-edit .modal-body #ddid").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_dog_list/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-dog-list-edit .modal-body #name-dog").val(split[0]);

			if (split[2] == 2)
				$("#modal-dog-list-edit .modal-body #dog-types2").attr("checked", true);
			else if (split[2] == 3)
				$("#modal-dog-list-edit .modal-body #dog-types3").attr("checked", true);
			else if (split[2] == 4)
				$("#modal-dog-list-edit .modal-body #dog-types4").attr("checked", true);
			else if (split[2] == 5)
				$("#modal-dog-list-edit .modal-body #dog-types5").attr("checked", true);

			if (split[1] == 1)
				$("#modal-dog-list-edit .modal-body #status1").attr("checked", true);
			else
				$("#modal-dog-list-edit .modal-body #status2").attr("checked", true);
		});
	});

	$("#dog-list-edit-setting").click(function () {
		$(window).spin();
		$("#dog-list-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Jenis anjing berjaya dikemaskini");
				location.reload();
			}
		});
	});
	//END DOG LIST SETTING

	//DOG WEIGHT SETTING
	$("#dog-weight-setting").click(function () {
		$(window).spin();

		if ($("#name-dog-weight").val() == "" || $("#deskripsi-dog-weight").val() == "" || $("input[name='status-dog-weight']").is(":checked") == false) {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#dog-weight-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Berat anjing berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-dog-weight").click(function () {
		$(window).spin();
		if ($("input[name='_dw[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan berat anjing ini ?")) {
				$("#dog-weight-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Berat anjing telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih berat anjing untuk dihapus.");
			return false;
		}
	});

	$('#modal-dog-weight-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-dog-weight-edit .modal-body #ddid").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_dog_weight/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-dog-weight-edit .modal-body #name-dog-weight").val(split[0]);
			$("#modal-dog-weight-edit .modal-body #deskripsi-dog-weight").val(split[2]);

			if (split[1] == 1)
				$("#modal-dog-weight-edit .modal-body #status1").attr("checked", true);
			else
				$("#modal-dog-weight-edit .modal-body #status2").attr("checked", true);
		});
	});

	$("#dog-weight-edit-setting").click(function () {
		$(window).spin();
		$("#dog-weight-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Berat anjing berjaya dikemaskini");
				location.reload();
			}
		});
	});
	//END DOG WEIGHT SETTING

	//DOG REASON
	$("#dog-reason-setting").click(function () {
		$(window).spin();

		if ($("#name-dog-reason").val() == "" || $("#deskripsi-dog-reason").val() == "") {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#dog-reason-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Sebab berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-dog-reason").click(function () {
		$(window).spin();
		if ($("input[name='_rn[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan sebab ini ?")) {
				$("#dog-reason-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Sebab telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih sebab untuk dihapus.");
			return false;
		}
	});

	$('#modal-dog-reason-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-dog-reason-edit .modal-body #reason_id").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_dog_reason/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-dog-reason-edit .modal-body #name-dog-reason").val(split[0]);
			$("#modal-dog-reason-edit .modal-body #deskripsi-dog-reason").val(split[1]);
		});
	});

	$("#dog-reason-edit-setting").click(function () {
		$(window).spin();
		$("#dog-reason-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Sebab berjaya dikemaskini");
				location.reload();
			}
		});
	});


	$(".btn-status-update1").click(function () {
		$(window).spin();

		$("#update-status1").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Status anjing anda berjaya dikemaskini.");
				location.reload();
			}
		});
	});

	$(".btn-status-update2").click(function () {
		$(window).spin();

		$("#update-status2").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Status anjing anda berjaya dikemaskini.");
				location.reload();
			}
		});
	});
	//END DOG REASON

	//PAY COUNTER
	$("#pay-counter-setting").click(function () {
		$(window).spin();

		if ($("#name-pay-counter").val() == "" || $("#deskripsi-pay-counter").val() == "") {
			$(window).spin();
			alert("Sila penuhkan ruangan kosong");
			return false;
		}
		else {
			$("#pay-counter-form").ajaxSubmit({
				success: function () {
					$(window).spin();
					alert("Kaunter bayaran berjaya ditambah.");
					location.reload();
				}
			});
		}
	});

	$("#delete-pay-counter").click(function () {
		$(window).spin();
		if ($("input[name='_pc[]']:checked").length > 0) {
			$(window).spin();
			if (confirm("Anda pasti untuk menghapuskan kaunter ini ?")) {
				$("#pay-counter-table").ajaxSubmit({
					success: function () {
						$(window).spin();
						alert("Kaunter bayaran telah berjaya dihapuskan.");
						location.reload();
					}
				});
			}
			else {
				//$(window).spin();
				return false;
			}

		}
		else {
			$(window).spin();
			alert("Sila pilih kaunter bayaran untuk dihapus.");
			return false;
		}
	});

	$('#modal-pay-counter-edit').on('show.bs.modal', function (e) {

		//get data-id attribute of the clicked element
		var Id = $(e.relatedTarget).data('id');

		$("#modal-pay-counter-edit .modal-body #place_id").val(Id);

		$.get(base_url + "admin/index.php/data_reference/detail_pay_counter/" + Id, function (data) {
			var split = data.split("|");
			$("#modal-pay-counter-edit .modal-body #name-pay-counter").val(split[0]);
			$("#modal-pay-counter-edit .modal-body #deskripsi-pay-counter").val(split[1]);
		});
	});

	$("#pay-counter-edit-setting").click(function () {
		$(window).spin();
		$("#pay-counter-edit-form").ajaxSubmit({
			success: function () {
				$(window).spin();
				alert("Kaunter bayaran berjaya dikemaskini");
				location.reload();
			}
		});
	});
	//END PAY COUNTER


	$(".btn-upload").click(function () {
		//$(window).spin();
		//break;

		$("input[type='file'][name='files']").each(function () {
			if ($(this).val().length == 0) {
				//$(window).spin();
				alert("Sila muat naik fail excel anda !");
				return false;
			}
			else {
				$(window).spin();
				$("#upload-form").ajaxSubmit({
					success: function (data) {
						//alert(data);
						if (data == 0) {
							$(window).spin();
							alert("Sila kemaskini data excel yang di muat naik.");
						}
						else {
							$(window).spin();
							alert("Data permohonan berjaya dikemaskini.");
							location.reload();
						}

					}
				});
			}
		});

	});


	$(".search-user-btn").click(function () {
		$(window).spin();
		$("#search-form").submit();
	});

	$('input[name="parlimen"]').on('change', function () {
		var radioValue = $('input[name="parlimen"]:checked').val();

		if (radioValue == 'pilih-parlimen') {
			$("input[name='list-parlimen[]']").attr("disabled", false);
		}
		else {
			$("input[name='list-parlimen[]']").attr("disabled", true);
		}
	});

});

(function ($) {
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
		$("#app-no").val(), // Value barcode (dependent on the type of barcode)
		"code39" // type (string)
	);

	var textAreas = document.getElementsByTagName('input');

	Array.prototype.forEach.call(textAreas, function (elem) {
		elem.placeholder = elem.placeholder.replace(/\\n/g, '\n');
	});

});

function change_roles(uid, stat) {

	$(window).spin();
	//alert(uid+'|'+stat);
	//alert(base_url+"admin/user_management/update_status/"+uid+"/"+stat);
	$.get(base_url + "admin/index.php/user_management/update_status/" + uid + "/" + stat, function (data) {

		$(window).spin();
		alert("Pengguna berjaya dikemaskini");
		window.location.reload();

	});
}

function del_address( addrID )
{
	console.log(addrID);
		$.get("manage_profile/application_exists/"+addrID, function(data){
			$(window).spin();
			 if(data > 0)
			 {
				console.log("data = ");
				console.log(data);

			 	$(window).spin();
			 		alert("Maaf, alamat ini tidak dapat dipadamkan kerana telah mengandungi maklumat pendaftaran lesen anjing.");
			 		return false;
			 }
			 else
			 	{
			 		//  if( confirm("Anda pasti untuk padamkan alamat ini ?") )
			 		//  {
					// 	console.log("sisni = ");
			 		//  		$.get("manage_profile/delete_address/"+addrID, function(data){
			 		//  			$(window).spin();
			 		//  			alert('Alamat telah berjaya dipadamkan');				 		 			
			 		//  			location.reload();
			 		//  		});
			 		 		
			 		//  }
			 		//  else
					// {
					// 	console.log("sana = ");
					// 	$(window).spin();
					// 	return false;
					// }
					
						console.log("data = ");
						console.log(data);
						  
						$.jAlert({
							'title': 'Confirmation / Sahkan',
							'confirmQuestion': "Are you sure you want to delete this address ? <br><i> Anda pasti untuk padamkan alamat ini ? </i>",
							'theme': 'red',
							'size': 'md',
							'type': 'confirm',
							'onConfirm': function () {
								//e.preventDefault();
								console.log("sini = ");
								$.get("manage_profile/delete_address/" + addrID, function (data) {
									$(window).spin();
									alert('Alamat telah berjaya dipadamkan');
									location.reload();
								});

							}, 'onDeny': function () {
								
						console.log("sana = ");
								return false;
							}

						});
			 	}
		});
}

function not_renew_app(appID) {

	$("#not-renew").modal("toggle");

	$.get("renew/get_address/" + appID, function (data) {
		var dataSplit = data.split("|");
		$("#not-renew .modal-body #address").html(dataSplit[0]);
		$("#not-renew .modal-body #no-dog").html(dataSplit[1]);
		$("#not-renew .modal-body #appID").val(appID);
	});
}

function user_setting(uid) {
	$("#modal-user-settings").modal("toggle");

	$.get("/edog/admin/index.php/user_management/get_profile/" + uid, function (data) {

		var dataSplit = data.split("|");

		$("#name-view").html(dataSplit[0]);
		$("#warga-view").html(dataSplit[1]);

		if (dataSplit[2] == "IC")
			$("#ic-type").html("Kad Pengenalan");
		else if (dataSplit[2] == "ARMY")
			$("#ic-type").html("No. Polis / Tentera");
		else if (dataSplit[2] == "PASSPORT")
			$("#ic-type").html("No. Pasport");

		$("#ic-view").html(dataSplit[3]);
		$("#user-settings-phone-upd").val(dataSplit[4]);
		$("#email-view").html(dataSplit[5]);
		$("#user-name").html(dataSplit[8]);
		$("#user-id").val(uid);


		$.get("/edog/admin/index.php/user_management/get_address/index/" + dataSplit[6], function (data) {
			if (data == '') {
				$(".address-view").html('<div class=\"form-group\"><div class=\"col-md-8\">Alamat tidak didaftarkan</div></div>');
			}
			else {
				var addrSplit = data.split("|");
				var no;

				if (dataSplit[7] == 1) {
					var address = '';

					for (i = 0; i < addrSplit.length; i++) {
						var dataAddr = addrSplit[i].split(";");

						no = i + 1;
						address += "<div class=\"form-group\"><label class=\"col-md-4 control-label\" for=\"user-settings-notifications\">Alamat #" + no + "</label><div class=\"col-md-8\"><p class=\"form-control-static\">" + dataAddr[0] + "</p></div><label class=\"col-md-4 control-label\" for=\"user-settings-notifications\">Jumlah Lesen</label><div class=\"col-md-8\"><p class=\"form-control-static\">" + dataAddr[1] + "</p></div><label class=\"col-md-4 control-label\" for=\"user-settings-notifications\">Baki Lesen</label><div class=\"col-md-8\"><p class=\"form-control-static\">" + dataAddr[2] + "</p></div></div>";

					}

					$(".address-view").html(address);
				}
				else {
					$(".address-view").html("<div class=\"form-group\"><div class=\"col-md-8\">Alamat tidak diperlukan</div></div>");
				}
			}
		});

	});
}

function edit_address(addrID) {
	$.get("manage_profile/application_exists/" + addrID, function (data) {
		if (data > 0) {
			alert("Maaf, alamat ini tidak dapat diubahsuai kerana telah mengandungi maklumat pendaftaran lesen anjing.");
			return false;
		}
		else {
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

			$.get("manage_profile/get_address_edit/" + addrID, function (data) {
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

				if (dataSplit[8] == 0) {
					$("#edit-address .modal-body input:radio[id=house_dog2]").attr("checked", true);
				}
				else if (dataSplit[8] == 1) {
					$("#edit-address .modal-body input:radio[id=house_dog1]").attr("checked", true);
				}

				var file_extension = dataSplit[9].slice((dataSplit[9].lastIndexOf(".") - 1 >>> 0) + 2);
				
				const documentTypes = ["doc", "docx", "pdf", "DOC", "DOCX", "PDF"];
				if(documentTypes.includes(file_extension)) {
					document.getElementById("gambar_anjing").innerHTML = "<a href=" + base_url + dataSplit[9] + ">" + dataSplit[9] + "</a>";
				} else {
					document.getElementById("gambar_anjing").innerHTML = "<img src=" + base_url + dataSplit[9] + " width=\"100%\">";
				}
			});
		}
	});
}

function view_address(addrID) {
	$("#edit-address").modal("toggle");

	$.get("manage_profile/get_address_edit/" + addrID, function (data) {
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

		if (dataSplit[8] == 0) {
			$("#edit-address .modal-body input:radio[id=house_dog2]").attr("checked", true);
		}
		else if (dataSplit[8] == 1) {
			$("#edit-address .modal-body input:radio[id=house_dog1]").attr("checked", true);
		}
		
		var file_extension = dataSplit[9].slice((dataSplit[9].lastIndexOf(".") - 1 >>> 0) + 2);
		
		const documentTypes = ["doc", "docx", "pdf", "DOC", "DOCX", "PDF"];
		if(documentTypes.includes(file_extension)) {
			document.getElementById("gambar_anjing").innerHTML = "<a target=\"_blank\" href=" + base_url + dataSplit[9] + ">" + dataSplit[9] + "</a>";
		} else {
			document.getElementById("gambar_anjing").innerHTML = "<img src=" + base_url + dataSplit[9] + " width=\"100%\">";
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