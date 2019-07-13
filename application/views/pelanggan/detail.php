		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s12 m12">
					<div class="white card-panel " >
						<div class="row valign-wrapper">
							<div class="col s3">
								<img src="<?= base_url('assets/images/admin.png')?>" alt="" class="circle responsive-img valign">
							</div>
							<div class="col s9">
								<h5 class="teal-text text-lighten-1 light">
									<?= $pelanggan['pelanggan_nama']?>
								</h5>
								<span class="grey-text text-lighten-1"><i class="mdi-maps-place">
									
									</i> <?= $pelanggan['pelanggan_alamat']?>
								</span>
							</div>
						</div>
						<div class="row section center">
							<a href="#"  class="col s12 btn-flat blue waves-effect waves-light white-text">
								buat pesanan <i class="mdi-content-content-paste"></i>
							</a>
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
						<li class="tab col s3"><a  href="#riwayat-pesan">riwayat pesan</a></li>
					</ul>
				</div>
				<div id="detail" class="col s12">
					<div class="white card-panel z-depth-0 no-margin scrolled-tab-content" >
						<div class="row">
							<div class="input-field col s12 m6">
								<i class="mdi-maps-store-mall-directory prefix grey-text text-lighten-1"></i>
								<input id="nama" type="text" class="validate teal-text text-darken-3" value="<?= $pelanggan['pelanggan_nama']?>" disabled>
								<label for="nama">Nama Pelanggan</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-communication-phone prefix grey-text text-lighten-1"></i>
								<input id="telepon" type="number" class="validate teal-text text-darken-3" value="<?= $pelanggan['pelanggan_telepon']?>" disabled>
								<label for="telepon">Telepon</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-maps-place prefix grey-text text-lighten-1"></i>
								<textarea id="alamat" class="materialize-textarea teal-text text-darken-3" disabled>
									<?= $pelanggan['pelanggan_alamat']?>
								</textarea>
								<label for="alamat">Alamat</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-communication-business prefix grey-text text-lighten-1"></i>
								<input id="kota" type="text" class="validate teal-text text-darken-3" value="<?= $pelanggan['pelanggan_kota']?>" disabled>
								<label for="kota">Kota</label>
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