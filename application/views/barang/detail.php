		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s12 m12">
					<div class="white card-panel " >
						<div class="row valign-wrapper">
							<div class="col s3">
								<img src="<?= base_url('assets/images/svg/barang.svg')?>" alt="" class="circle responsive-img valign">
							</div>
							<div class="col s9">
								<h5 class="teal-text text-lighten-1 light">
									<?= $barang['barang_nama']?>
								</h5>
                                <span class="grey-text text-lighten-1">
                                        <i class="mdi-action-shopping-cart yellow-text text-darken-3"></i>
                                       Rp,  <?=  number_format($barang['barang_harga'],2,",",".")?> per <?= $barang['barang_satuan']?>

                                </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="section">
			<div class="row">
				<div class="col s12">
					<ul class="tabs">
						<li class="tab col s3"><a href="#detail" class="active">detail</a></li>
						<li class="tab col s3"><a  href="#riwayat-pesan">Daftar Pemesan</a></li>
					</ul>
				</div>
				<div id="detail" class="col s12">
					<div class="white card-panel z-depth-0 no-margin scrolled-tab-content" >
						<div class="row">
                            <div class="input-field col s12 m6">
                                <i class="mdi-hardware-sim-card prefix grey-text text-lighten-1"></i>
                                <input id="kode" type="text" class="validate teal-text text-darken-3" value="<?= $barang['barang_kode']?>" disabled>
                                <label for="kode">Kode</label>
                            </div>
							<div class="input-field col s12 m6">
								<i class="mdi-maps-store-mall-directory prefix grey-text text-lighten-1"></i>
								<input id="nama" type="text" class="validate teal-text text-darken-3" value="<?= $barang['barang_nama']?>" disabled>
								<label for="nama">Nama</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-action-dns prefix grey-text text-lighten-1"></i>
								<textarea id="alamat" class="materialize-textarea teal-text text-darken-3" disabled>
									<?= $barang['barang_stok'].' '.$barang['barang_satuan']?>
								</textarea>
								<label for="alamat">Stok Tersedia</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-communication-business prefix grey-text text-lighten-1"></i>
								<input id="kota" type="text" class="validate teal-text text-darken-3" value="<?= $barang['barang_satuan']?>" disabled>
								<label for="kota">Satuan</label>
							</div>
                            <div class="input-field col s12 m6">
                                <h5 class="light">Kategori</h5>
                                <a href="<?= base_url('barang?kategori='.$barang['kategori_nama'])?>" class="btn-link" style="text-decoration: underline !important;">
                                    <span>
                                        <i class="mdi-action-label"></i> <?= $barang['kategori_nama']?>
                                    </span>
                                </a>
                            </div>
						</div>
					</div>
				</div>
				<div id="riwayat-pesan" class="col s12 ">
					<div class="white card-panel z-depth-0 no-margin scrolled-tab-content" >
						<ul class="collection">
							<li class="collection-item">Alvin</li>
							<li class="collection-item">Alvin</li>
							<li class="collection-item">Alvin</li>
							<li class="collection-item">Alvin</li>
						</ul>
					</div>
				</div>
			</div>
		</div>