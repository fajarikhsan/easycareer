$('#tipe-user').on('change', function() {
    var pilihan = $('#tipe-user').val();
    if ( pilihan == 'seller' ) {
        seller.style.display = 'block';
    } else {
        seller.style.display = 'none';
    }
});

const flashData = $('.flash-data').data('flashdata');

if ( flashData ) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Berhasil ' + flashData + ' Silahkan login'
    });
}

const signinBerhasil = $('.flash-signin-berhasil').data('flashdata');

if ( signinBerhasil ) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Berhasil ' + signinBerhasil
    });
}

const signinGagal = $('.flash-signin-gagal').data('flashdata');

if ( signinGagal ) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Gagal ' + signinGagal + ' Silahkan coba lagi'
    });
}

const signinError = $('.flash-signin-error').data('flashdata');

if ( signinError ) {
    $('#signinModal').modal({"backdrop": "static"});
}

const signupError = $('.flash-signup-error').data('flashdata');

if ( signupError ) {
    $('#signupModal').modal({"backdrop": "static"});
}

const profileInvalid = $('.flash-profile-invalid').data('flashdata');

if ( profileInvalid ) {
    $('#ubah-hilang').css('display', 'block');
}


$('#become-seller').on('click', function() {
    console.log('ok');
    $('#tipe-user option[value=seller]').attr('selected', 'selected');
    seller.style.display = 'block';
});

$('#ubah-profile').on('click', function() {
    $('#ubah-hilang').css('display', 'block');
});

const forbidden = $('.flash-forbidden').data('flashdata');

if ( forbidden ) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Akses Dilarang!'
    });
}

const jasa_success = $('.flash-jasa-success').data('flashdata');

if ( jasa_success ) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: jasa_success + ' baru berhasil!'
    });
}

$('.tombol-ubah').on('click', function() {
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/easycareer/seller/getubah',
        data: {id_jasa: id},
        method: 'post',
        dataType: 'json',
        success: function (data) {
            $('#judul-jasa').val(data.judul_jasa);
            $('#harga-jasa').val(data.harga);
            $('#pengerjaan-jasa').val(data.pengerjaan);
            $('#jenis-jasa').val(data.id_jenis);
            $('#deskripsi-jasa').val(data.deskripsi_jasa);
            $('#id-jasa').val(data.id_jasa);
        }
    });
});

const ubahError = $('.flash-ubah-error').data('flashdata');

if ( ubahError ) {
    $('#modalUbah').modal({"backdrop": "static"});
}

const ubahSuccess = $('.flash-ubah-success').data('flashdata');

if ( ubahSuccess ) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: ubahSuccess + ' berhasil!'
    });
}

$('.tombol-hapus').on('click', function() {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Yakin menghapus jasa ini?',
        text: "Kamu tidak dapat mengembalikannya",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          Swal.fire({
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          }).then(window.location.href = "http://localhost/easycareer/seller/hapusJasa/" + id)
        }
      })
});

$('#ubah-profile').on('click', function() {
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/easycareer/seller/getUbahProfile',
        data: {id_penyedia: id},
        method: 'post',
        dataType: 'json',
        success: function (data) {
            $('#username').val(data.username);
            $('#password').val(data.PASSWORD);
            $('#emailsignup').val(data.email);
            $('#nohp').val(data.nohp);
            $('#portfolio').val(data.portfolio);
            $('#id-penyedia').val(data.id_penyedia);
            $('#id-user').val(data.id_user);

        }
    });

    // $.ajax({
    //     url: 'http://localhost/easycareer/seller/getProfesi',
    //     data: {id_penyedia: id},
    //     method: 'post',
    //     dataType: 'json',
    //     success: function (data) {
    //         console.log(data);
    //     }
    // })
});

const profileSuccess = $('.flash-profile-success').data('flashdata');

if ( profileSuccess ) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: profileSuccess + ' berhasil!'
    });
}

const fotoSalah = $('.flash-foto-salah').data('flashdata');

if ( fotoSalah ) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Format file ' + fotoSalah + ' salah.'
    });
}

$('#ubah-profile-cust').on('click', function() {
    $('#ubah-hilang').css('display', 'block');
});

$('#ubah-profile-cust').on('click', function() {
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/easycareer/profile/getubah_customer',
        data: {id_customer: id},
        method: 'post',
        dataType: 'json',
        success: function (data) {
            $('#username').val(data.username);
            $('#password').val(data.password);
            $('#emailsignup').val(data.email);
            $('#nohp').val(data.nohp);
            $('#id-customer').val(data.id_customer);
            $('#id-user').val(data.id_user);
        }
    });
});

$('.judul-jasa').truncate({
	width: 'auto',
	side: 'right',
	multiline: true
});

$('.filter-check').click(function() {
    var filter_jasa = get_filter('filter-jasa');

    $.ajax({
        url: 'http://localhost/easycareer/timeline/filter',
        data: {filter_jasa: filter_jasa},
        method: 'post',
        success: function(data) {
            $('#hasil-filter').html(data);
            $('.judul-jasa').truncate({
                width: 'auto',
                side: 'right',
                multiline: true
            });
        }
    });
});

function get_filter(id) {
    var filterData = [];
    $('#' + id + ':checked').each(function(){
        filterData.push($(this).val());
    });
    return filterData;
}

$('#cari').keyup(function() {
    var find = $(this).val();

    $.ajax({
        url: 'http://localhost/easycareer/timeline/cari',
        data: {cari: find},
        method: 'post',
        success: function(data) {
            $('#hasil-filter').html(data);
            $('.judul-jasa').truncate({
                width: 'auto',
                side: 'right',
                multiline: true
            });
        }
    });
});

const pesanLogin = $('.flash-pesan-login').data('flashdata');

if ( pesanLogin ) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: pesanLogin + ' terlebih dahulu.'
    });
}

const pesanBerhasil = $('.flash-pesan-berhasil').data('flashdata');

if ( pesanBerhasil ) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: pesanBerhasil + ' berhasil ditambahkan. Silahkan membayar agar diproses oleh seller.'
    });
}

const detailKosong = $('.flash-detail-kosong').data('flashdata');

if ( detailKosong ) {
    $('#pesanModal').modal({"backdrop": "static"});
}

$('.btn-bayar').click(function() {
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/easycareer/profile/getTransaksi',
        data: {id_transaksi: id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            $('#id-transaksi').val(data.id_transaksi);
            $('#total-harga').val(data.harga);
        }
    });
});

const bayarBerhasil = $('.flash-bayar-berhasil').data('flashdata');

if ( bayarBerhasil ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-konfirmasi-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade');
    $('#pills-konfirmasi').attr('class', 'tab-pane fade show active');

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: bayarBerhasil + ' berhasil dilakukan.'
    });
}

$('.btn-detail').click(function() {
    const id = $(this).data('id');
    var id_jasa = $(this).data('jasa');

    $.ajax({
        url: 'http://localhost/easycareer/seller/getTransaksi',
        data: {id_transaksi: id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            console.log(id_jasa);
            $('#detail-pekerjaan').val(data.detail_pekerjaan);
            $('.username').text(data.username);
            $('.foto-detail').attr('src', 'http://localhost/easycareer/assets/foto/profil/' + data.foto_profil);
            $('#id-transaksi').val(data.id_transaksi);
            $('#id-jasa').val(id_jasa);
            $('#id-transaksi2').val(data.id_transaksi);
            $('#id-jasa2').val(id_jasa);
        }
    });

    $.ajax({
        url: 'http://localhost/easycareer/seller/getJasa',
        data: {id_transaksi: id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            $('#id-jasa').val(data.id_jasa);
        }
    });
});

const pesananDiterima = $('.flash-pesanan-diterima').data('flashdata');

if ( pesananDiterima ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-proses-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade');
    $('#pills-proses').attr('class', 'tab-pane fade show active');

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: pesananDiterima + ' berhasil diterima.'
    });
}

const pesananDitolak = $('.flash-pesanan-ditolak').data('flashdata');

if ( pesananDitolak ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-tolak-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade');
    $('#pills-tolak').attr('class', 'tab-pane fade show active');

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: pesananDitolak + ' berhasil ditolak.'
    });
}

const hasilKosong = $('.flash-upload-kosong').data('flashdata');

if ( hasilKosong ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-proses-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade');
    $('#pills-proses').attr('class', 'tab-pane fade show active');
    
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: hasilKosong + ' tidak boleh kosong atau perhatikan format file.'
    });
}

$('.btn-hasil').click(function() {
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/easycareer/seller/getJasa',
        data: {id_transaksi: id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            $('#id_jasa').val(data.id_jasa);
            $('#id_transaksi').val(id);
        }
    });
});

const hasilSuccess = $('.flash-upload-success').data('flashdata');

if ( hasilSuccess ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-selesai-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade');
    $('#pills-selesai').attr('class', 'tab-pane fade show active');

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: hasilSuccess + ' berhasil dilakukan. Pesanan Selesai!'
    });
}

$('.btn-ulasan').click(function() {
    const id = $(this).data('id');

    $.ajax({
        url: 'http://localhost/easycareer/profile/getTransaksi',
        data: {id_transaksi: id},
        method: 'post',
        dataType: 'json',
        success: function(data) {
            $('.img-jasa-ulasan').attr('src', 'http://localhost/easycareer/assets/foto/jasa/' + data.foto_jasa);
            $('.judul-jasa').text(data.judul_jasa);
            $('.foto-seller').attr('src', 'http://localhost/easycareer/assets/foto/profil/' + data.foto_profil);
            $('.username').text(data.username);
            $('.pengerjaan').text('Waktu pengerjaan maksimal ' + data.pengerjaan + ' hari');
            $('#id_transaksi').val(data.id_transaksi);
        }
    });
});

// RATEYO
$(function () {
 
    $("#rateYo").rateYo({
      rating: 0,
      fullStar: true,
    }).on("rateyo.change", function(e, data) {
        var rating = data.rating;
        $('#rating').val(rating);
    });
  });

const ratingSuccess = $('.flash-rating-success').data('flashdata');

if ( ratingSuccess ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-selesai-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade');
    $('#pills-selesai').attr('class', 'tab-pane fade show active');

    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: ratingSuccess + ' berhasil dilakukan. Pesanan Selesai!'
    });
}

const ratingError = $('.flash-rating-error').data('flashdata');

if ( ratingError ) {
    $('#pills-baru-tab').attr('class', 'nav-link');
    $('#pills-selesai-tab').attr('class', 'nav-link active');
    $('#pills-baru').attr('class', 'tab-pane fade show');
    $('#pills-selesai').attr('class', 'tab-pane fade show active');
    $('.rating-kosong').text('Harap beri rating!');

    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Harap beri rating!'
    });
}

$(function () {
 
    $("#rating-total").rateYo({
      rating: $('#avg-rating').val(),
      readOnly: true,
      starWidth: "25px"
    });
  });

  $('#filter-rating').change(function() {
    var find = $(this).val();
    var id = $('#url').val();

    $.ajax({
        url: 'http://localhost/easycareer/timeline/filter_rating',
        data: {find: find, id_jasa: id},
        method: 'post',
        success: function(data) {
            $('.rating-filter').html(data);
        }
    });
});