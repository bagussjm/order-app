    $(document).ready(function () {
        // var baseURL = window.location.origin; // production
        var baseURL = window.location.origin+'/order-app/'; // development
        var pemesananURL = baseURL+'pemesanan/tambah';

        if (window.location.href === pemesananURL || window.location.href === pemesananURL+'#!' || window.location.href === pemesananURL+'#' ){
            injectPelangganInputSearch();
            validatePelangganSelected();
            $("#pemesanan-pelanggan-search").click(function () {
                $(this).select();
            });
        }


        function injectPelangganInputSearch() {
            let url = baseURL+'Service/getPelanggan';
            let pelanggans = [];
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    for (let i = 0; i < response.length ; i++) {
                        pelanggans.push({
                            'id' : response[i].pelanggan_id,
                            'nama': response[i].pelanggan_nama,
                            'alamat' : response[i].pelanggan_alamat
                        });
                    }
                },
                error : function (response) {
                    console.log(response.text);
                }
            });

            var options = {
                data: pelanggans,

                getValue: "nama",

                template: {
                    type: "description",
                    fields: {
                        description: "alamat"
                    }
                },
                list: {
                    maxNumberOfElements: 8,
                    match: {
                        enabled: true
                    },
                    onClickEvent: function () {
                        let id = $("#pemesanan-pelanggan-search").getSelectedItemData().id;
                        $('input[name="pesanan-pelanggan-id"]').val(id);
                        validatePelangganSelected();
                        showPelangganCardBox(id);
                        showPesananList(id);
                    }
                }
            };

            $("#pemesanan-pelanggan-search").easyAutocomplete(options);
        }


        // showing detail pelanggan card box on top of page
        function showPelangganCardBox(id) {
            // set form data

            let url = baseURL+'Service/getPelangganByID/'+id;
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    if (response.pelanggan !== null){
                        let pelanggan = response.pelanggan;
                        $('#pemesanan-pelanggan-name').html(pelanggan.pelanggan_nama);
                        $('#pemesanan-pelanggan-place').html(pelanggan.pelanggan_alamat);
                    }
                },
                error : function (response) {
                    console.log(response.pelanggan.text);
                }
            });
        }
        
        // validate if pelanggan data exists or selected
        function validatePelangganSelected() {
            let pelangganID = $('input[name="pesanan-pelanggan-id"]').val();
            if (pelangganID !== ''){
                $('button[name="button-add-pesanan"]').attr('disabled',false);
            } else {
                $('button[name="button-add-pesanan"]').attr('disabled',true);
            }
        }

        function showPesananList(id) {
            let url = baseURL+'Service/getPesananByPelanggan/'+id;
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    if (response.data !== null){
                        injectPesananListView(response.data);
                        showEmptyListView(false);
                    } else {
                        showEmptyListView(true);
                    }
                },
                error : function (response) {
                    console.log(response);
                }
            });
        }

        function injectPesananListView(data) {
            let lists = '';
            for (let i = 0; i < data.length; i++) {
                lists += '<li class="collection-item avatar">'+
                    '<img src="'+(baseURL+'assets/images/svg/barang.svg')+'" alt="" class="circle">'+
                    '<span class="title teal-text text-darken-1">'+data[i].barang_nama+'</span>'+
                    '<p class="grey-text text-lighten-2-1"><i class="mdi-action-shopping-cart"></i> Rp, '+data[i].barang_harga+',00  </p>'+
                    '<br>'+
                    '<p class="grey-text text-lighten-2-1">Total Tagihan : Rp, '+data[i].pemesanan_total+',00  </p>'+
                    '<a href="#!" class="secondary-content red-text text-darken-1"><i class="mdi-action-delete"></i></a>'+
                '</li>';
            }
            $('#pesanan-list-container').append(lists);
            showEmptyListView(false)
        }

        function showEmptyListView(view) {
            if (view !== true) {
                $('#empty-list-msg').fadeOut('slow');
            } else {
                $('#pesanan-list-container').remove();
                $('#empty-list-msg').fadeIn('slow');
            }
        }
    });