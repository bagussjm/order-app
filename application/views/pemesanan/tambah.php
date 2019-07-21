		<div class="container">
			<!-- //////////////////////////////////////////////////////////////////////////// -->
			
			<div id="sales-top-home-page">
				<div class="row">
					<div class="col s12 m12 ">
						<input type="text" placeholder="pilih pelanggan pemesan" class="white z-depth-3 grey-text text-darken-1 custom-box-search" id="pemesanan-pelanggan-search">
					</div>
					<div class="col s12 m12">
						<div class="white card-panel ">
							<div class="row valign-wrapper">
								<div class="col s3">
									<img src="<?= base_url('assets/images/svg/pelanggan.svg')?>" alt="" class="circle responsive-img valign">
								</div>
								<div class="col s9">
									<h5 class="teal-text text-lighten-1 light" id="pemesanan-pelanggan-name">
										pilih pelanggan
									</h5>
									<span class="grey-text text-lighten-1">
										<i class="mdi-maps-place"></i> <span id="pemesanan-pelanggan-place"></span>
									</span>
								</div>
							</div>
							<div class="row section center">
                                <button type="button" data-target="#!" class="btn disabled modal-trigger col s12" id="pesanan-send-btn">
                                    kirim pesanan <i class="mdi-content-send"></i>
                                </button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div id="sales-main-home-page">
				<div class="row">
					<div class="col s12 ">
						<!-- oreder list panel -->
						<ul class="collection with-header">
							<li class="collection-header"><h5 class="light grey-text text-darken-1">Daftar Pesanan </h5></li>
                            <li class="collection-item" id="empty-list-msg">
                                <p class="grey-text text-darken-2">
                                    <i class="mdi-alert-error"></i>  belum ada pesanan
                                </p>
                            </li>
                            <div class="content-list-scroller" id="pesanan-list-container">
								
							
							</div>
						</ul>
					
					</div>
				</div>
			</div>
			
			<!-- Floating Action Button -->
			<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
				<button class="btn-floating btn-large teal modal-trigger" data-target="modal-cari-barang"  type="button" name="button-add-pesanan" >
					<i class="mdi-av-playlist-add"></i>
				</button>
			</div>
			<!-- Floating Action Button -->
			
			<!-- modal konfirmasi kirim -->
			<div id="modal-konfirmasi-kirim" class="modal">
                <form action="<?= base_url('pemesanan/permohonan/tambah')?>" method="post">
                    <div class="modal-content">
                        <h6 class="light grey-text text-darken-1 center">Kirim pesanan ? anda tetap dapat menambahkan pesanan setelah ini</h6>
                        <div class="row margin">
                            <div class="input-field col s12 m6">
                                <i class="mdi-communication-chat prefix grey-text text-lighten-1"></i>
                                <textarea id="pesan" class="materialize-textarea " name="pesan"></textarea>
                                <label for="pesan">Pesan Permohonan</label>
                            </div>
                            <input type="text" name="pelanggan" hidden id="permohonan-pelanggan-id">
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <button type="submit" name="kirim" class="btn waves-effect waves-light col s12 blue">kirim</button>
                            </div>
                            <div class="input-field col s12 m6">
                                <a href="#!" class="btn waves-effect waves-light col s12 grey modal-close" id="permohonan-cancel-button">batalkan</a>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
			
			<!-- modal cari barang -->
			<div id="modal-cari-barang" class="modal">
				<div class="modal-content">
					<h6 class="light grey-text text-darken-1 center" style="margin-bottom: 12px">cari dan pilih barang yang akan dipesan</h6>
					<div class="row">
						<input type="text" placeholder="cari barang" class="white z-depth-3 grey-text text-darken-1 custom-box-search" id="pemesanan-barang-search" style="width: 100% !important;">
						
						
						<div class="section">
							<ul class="collection">
								<li class="collection-item avatar">
									<img src="<?= base_url('assets/images/svg/barang.svg')?>" alt="" class="circle">
									<span class="title" id="pemesanan-barang-name">Nama Barang</span>
									<p><i class="mdi-action-shopping-cart"></i> <span id="pemesanan-barang-price">Rp, 000.00</span></p>
								</li>
							</ul>
							
							<div class="input-field col s12">
								<i class="mdi-maps-store-mall-directory prefix grey-text text-lighten-1"></i>
								<input type="number" class="validate teal-text text-darken-3" id="pemesanan-jumlah-pesan">
								<input type="number" hidden id="pemesanan-total-value">
								<label for="pemesanan-jumlah-pesan" id="label-pesan-total">Jumlah Pesan</label>
							</div>
							<div class="col s12">
								Total : <span class="orange-text" id="pemesanan-total-price"> Rp, 000,00</span>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<a href="#!" class="modal-close waves-effect waves-green btn-flat" id="pemesanan-submit-data"style="display: none">tambahkan</a>
					<a href="#!" class="modal-close waves-effect waves-red btn-flat" id="pemesanan-cancel-submit">batalkan</a>
				</div>
			</div>

            <form action="<?= base_url('Service/postPesanan')?>" id="data-pesanan" method="post">
                <input type="text" hidden name="pesanan-barang-id">
                <input type="text" hidden name="pesanan-sales-id" value="<?= $this->session->userdata('user_id')?>">
                <input type="text" hidden name="pesanan-pelanggan-id" >
                <input type="number" hidden name="pesanan-total-pesan" >
                <input type="number" hidden name="pesanan-harga-barang" >
                <input type="number" hidden name="pesanan-total-harga" >
            </form>
		
		</div>