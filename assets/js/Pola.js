

$(function(){

	$('.btnhapus').on('click', function(){
		
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan data ini!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				const id = $(this).data('id');
				$.ajax({
					url:'Pola/delete',
					data:{id : id},
					method: 'post',
					dataType:'json',
					success: function(data){
						Swal.fire({
							title: 'Terhapus!',
							text: 'Data sudah terhapus.',
							type: 'success',
							timer: 1500,
							confirmButtonColor: '#3085d6',
							confirmButtonText: 'OK!'
						}).then((result) => {
							window.location.href =  data.redirect;
						});
					}
				});
			}
		})
	});

	$('.tampilmodaltambah').on('click', function(){
		$('.modal-content form').attr('action', 'http://localhost/konveksi_jpaindo/Pola/add');
		$('#newMenuModalLabel').html('Tambah data Pola');
		$('.modal-footer button[type=submit] ').html('Tambah data')
		$('#KdPola').prop('type', 'hidden');
		$('.img-img').remove();
		$('#lblKdDesain').hide();

		$('#KodeJenis').val('');
		$('#KdPola').val('');
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		
		$('#img-form-id').prepend('<label for="GbrPola" id="lblgambar" class="col-sm-2 col-form-label" >Gambar Pola</label>');
		
	});

	$('.tampilmodalubah').on('click', function(){
		$('#newMenuModalLabel').html('Ubah data desain');
		$('.modal-footer button[type=submit]').html('Ubah data');
		$('.modal-content form').attr('action', 'Pola/edit');

		const id = $(this).data('id');
		
		$.ajax({
			url:'Pola/getubah',
			data:{id : id},
			method: 'post',
			dataType:'json',
			success: function(data){
				$('#lblKdDesain').show();
				$('#KdPola').prop('type', 'text');
				$('#KdPola').val(data.KdPola);
				$('#gambarcu').attr('src', '././assets/img/pola/'+data.GbrPola+'');
				$('#KodeJenis').val(data.KodeJenis);
			}
		});
	});

	$('#newMenuModal').on('hidden.bs.modal', function (e) {
    	$('#KdPola').prop('type', 'hidden');
		$('#lblKdDesain').hide();
		
		$('#KdPola').val('');
		$('#KdPola').val('');
		$('.row').find('#lblgambar').remove();
		$('.row').find('.text-danger').remove();
		$('.form-control').removeClass('is-invalid').find('.text-danger').remove();
		$('.form-control').removeClass('is-valid').find('.text-danger').remove();
	});

	$('#frmid').on('submit', function(event){
		event.preventDefault();
		var me = $(this);

		$.ajax({
			url: me.attr('action'),
			type: 'post',
			data:new FormData(this),
			processData:false,
			contentType:false,
			cache:false,
			async:false,
                     
			dataType:'json',
			success: function(response){
				if (response.success == true) {
					window.location.href =  response.redirect;
				}else{
					$.each(response.messages, function(key, value){
						var element = $('#' + key);
						$(element).closest('.form-control')
						.removeClass('is-invalid')
						.addClass(value.length > 0 ? 'is-invalid' : 'is-valid')
						.find('.text-danger')
						.remove();

						$(element).closest('.row').find('.text-danger').remove();
						$(element).after(value);
					});
				}
			},
			error : function(response){
				
			}
		});
	});

});