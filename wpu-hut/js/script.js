function tampilkanSemua(){
    $.getJSON('data/pizza.json', function (data) {
        let menu2 = data.menu;
        $.each(menu2, function(i, data) {
            $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/'+data.gambar+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p><h5>Rp. '+data.harga+'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>');
        });
    });
}

tampilkanSemua();

$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');
    let kategori = $(this).html();
    $('h1').html(kategori);

    $.getJSON('data/pizza.json', function (data) {
        let menu1 = data.menu;
        let content = '';
        if(kategori!='AllMenu'){
            $.each(menu1, function (i,data) {
                if(data.kategori == kategori.toLowerCase()) {
                    content += '<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/'+data.gambar+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p><h5>Rp. '+data.harga+'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
                }
            }); 
        }else{
            $.each(menu1, function(i, data) {
                content += '<div class="col-md-4"><div class="card mb-3"><img src="img/pizza/'+data.gambar+'" class="card-img-top" alt="..."><div class="card-body"><h5 class="card-title">'+data.nama+'</h5><p class="card-text">'+data.deskripsi+'</p><h5>Rp. '+data.harga+'</h5><a href="#" class="btn btn-primary">Pesan Sekarang</a></div></div></div>';
            });
        }
        $('#daftar-menu').html(content);
    });
});