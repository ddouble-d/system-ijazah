const flashData = $('.flash-data').data('flashdata');
const flashError = $('.flash-error').data('flasherror');
const flashGejala = $('.flash-gejala').data('flashgejala');
const flashGejala2 = $('.flash-gejala2').data('flashgejala2');
const flashLogin = $('.flash-login').data('flashlogin');
const flashUsername = $('.flash-username').data('flashusername');


if (flashData) {
  Swal.fire(
    'Sukses',
    'Data Berhasil ' + flashData,
    'success'
  )
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

// if (flashLogin){
//   Swal.fire({
//   type: 'error',
//   title: 'Error',
//   text: 'Username/Password salah!'
// })
// }
//
if (flashUsername){
  Swal.fire({
  type: 'error',
  title: 'Error',
  text: 'Username sudah terdaftar!'
})
}

if (flashGejala){
  Swal.fire({
  type: 'error',
  title: 'Error',
  text: 'Gejala tidak boleh kosong!'
})
}

if (flashGejala2){
  Swal.fire({
  type: 'error',
  title: 'Error',
  text: 'Pilih minimal 3 gejala!'
})
}

if (flashError){
  Swal.fire({
  type: 'error',
  title: 'Gagal Ditambahkan',
  text: 'Data sudah ada'
})
}
