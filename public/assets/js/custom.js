// =======================
// SWEET ALERT DELETE
// =======================
$(document).on('click', '.btn-hapus', function(e) {
    e.preventDefault();

    let id = $(this).data('id');

    Swal.fire({
        title: 'Yakin hapus?',
        text: "Data tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74a3b',
        cancelButtonColor: '#858796',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = BASE_URL + "/penjualan/delete?id=" + id;
        }
    });
});



// =======================
// DATATABLE
// =======================
$(document).ready(function () {

    $('#tableTrain').DataTable({
        pageLength: 10
    });

    $('#tableTest').DataTable({
        pageLength: 10
    });

    $('#tableSmote').DataTable({
        pageLength: 10
    });

    $('#tableRos').DataTable({
        pageLength: 10
    });

    $('#tableSales').DataTable({
        pageLength: 10
    });

    $('.tableDataPrediksi').DataTable({
        pageLength: 10
    });


});