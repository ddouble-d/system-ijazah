$(document).ready(function () {
	$(".data").DataTable({
		order: [[0, "desc"]],
		// language: {
		//   sProcessing: 'Sedang Proses...',
		//   sLengthMenu: "Tampilan _MENU_ entri",
		//   sZeroRecords: "Tidak ditemukan data yang sesuai",
		//   sInfo: "Tampilan _START_ sampai _END_ dari _TOTAL_ entri",
		//   sInfoEmpty: "Tampilan 0 sampai 0 dari 0 entri",
		//   sInfoFiltered: "(disarin dari _MAX_ entri keseluruhan)",
		//   sInfoPosstFix: "",
		//   sSearch: "Cari:",
		//   sUrl: "",
		//   paginate: {
		//     next: '→', //or '<i class="fas fa-chevron-right"></i>'
		//     previous: '←' //'<i class="fas fa-chevron-left"></i>'
		//   }
		// }
	});

	$("#nisn").change(function () {
		var nisn = $("#nisn").val();
		if (nisn != "") {
			$.ajax({
				url: "register/cekNisn",
				method: "POST",
				data: { nisn: nisn },
				success: function (data) {
					$("#cekNisn").html(data);
				},
			});
		}
	});

	$("#email").change(function () {
		var email = $("#email").val();
		if (email != "") {
			$.ajax({
				url: "register/cekEmail",
				method: "POST",
				data: { email: email },
				success: function (data) {
					$("#cekEmail").html(data);
				},
			});
		}
	});

	$("#no_hp").change(function () {
		var no_hp = $("#no_hp").val();
		if (no_hp != "") {
			$.ajax({
				url: "register/cekHp",
				method: "POST",
				data: { no_hp: no_hp },
				success: function (data) {
					$("#cekHp").html(data);
				},
			});
		}
	});

	$("#password2").change(function () {
		var password = $("#password").val();
		var password2 = $("#password2").val();
		if (password2 != "") {
			$.ajax({
				url: "register/cekPassword",
				method: "POST",
				data: { password: password, password2: password2 },
				success: function (data) {
					$("#cekPassword").html(data);
				},
			});
		}
	});
});

const flashData = $(".flash-data").data("flashdata");
const flashGagal = $(".flash-gagal").data("flashgagal");

if (flashData) {
	Swal.fire("Sukses", "Data Berhasil " + flashData, "success");
}

if (flashGagal) {
	Swal.fire({
		type: "error",
		title: "Gagal Ditambahkan",
		text: "Terjadi Kesalahan",
	});
}

// konfirmasi tombol hapus
$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data akan dihapus",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.value) {
			Swal.fire("Terhapus!", "Data berhasil dihapus!", "success");
			document.location.href = href;
		}
	});
});
