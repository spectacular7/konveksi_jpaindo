$(function () {

    $('.hapusdpsnn').on('click', function(){
        
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
                    url:'Pesanan/hapuspesanan',
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

    $('.TampilBukti1').on('click', function () {

        const idp = $(this).data('idp');
        const gbr = $(this).data('gbr');
        const idpeg = $(this).data('idpeg');
        $('#bukti1').html('Cancel confirm Proof of payment' + ' ' + idp);
        $('#bukti').attr('src', 'assets/img/buktipembayaran/' + gbr);
        $('#tblmdlbkt').attr('href', 'pesanan/naktifpembayaran/' + idp + '/' + idpeg);
    })

    $('.TampilBukti2').on('click', function () {

        const idp = $(this).data('idp');
        const gbr = $(this).data('gbr');
        const idpeg = $(this).data('idpeg');
        $('#bukti1').html('Confirm Proof of payment' + ' ' + idp);
        $('#bukti').attr('src', 'assets/img/buktipembayaran/' + gbr);
        $('#tblmdlbkt').attr('href', 'pesanan/aktifpembayaran/' + idp + '/' + idpeg);
    })

    $('.hapuspsnn').on('click', function () {
        const idp = $(this).data('idp');

        $('#bukti1').html('<strong>Delete</strong>');
        $('#body').html('<center>Delete order data on id ' + '<strong> ' + idp + '?</strong></center>');
        $('#tblmdlbkt').attr('href', 'pesanan/hapuspesanan/' + idp);
    })

    $('.hapusdpsnn').on('click', function () {
        const idp = $(this).data('idp');

        $('#bukti1').html('<strong>Delete</strong>');
        $('#body').html('<center>Delete order data on id ' + '<strong> ' + idp + '?</strong></center>');
        $('#tblmdlbkt').attr('href', 'detailpesanan/hapuspesanan/' + idp);
        $('#btn').attr('type', 'button');
    })

    $('.editdp').on('click', function () {
        const idp = $(this).data('idp');
        const jml = $(this).data('jml');

        $('#bukti1').html('<strong>Edit Data</strong>');
        $('#jumlah').val(jml);
        $('#editdpesan').attr('action', 'detailpesanan/updatedp/' + idp);
    })

});