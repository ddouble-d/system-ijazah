const flashData = $('.flash-data').data('flashdata');
const flashGagal = $('.flash-gagal').data('flashgagal');
const flashLogin = $('.flash-login').data('flashlogin');

 
if (flashData) {
  Swal.fire(
    'Sukses',
    'Data Berhasil ' + flashData,
    'success'
  )
} 

if (flashGagal){
  Swal.fire({
  type: 'error',
  title: 'Gagal Ditambahkan',
  text: 'Terjadi Kesalahan'
})
}

// konfirmasi tombol hapus
$('.tombol-hapus').on('click', function(e)
{
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data akan dihapus",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  })

});


