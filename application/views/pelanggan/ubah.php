		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s12 m12">
					<div class="card-panel">
						<h4 class="login-form-text center">Ubah data pelanggan</h4>
						
						<form action="<?= base_url('PelangganController/edit/'.$pelanggan['pelanggan_id'])?>" method="post" autocomplete="off">
							<div class="row margin">
								<div class="input-field col s12 m6">
									<i class="mdi-action-credit-card prefix grey-text text-lighten-1"></i>
									<input id="nama" type="text" name="nama" required value="<?= $pelanggan['pelanggan_nama']?>">
									<label for="nama">Nama Pelanggan</label>
								</div>
                                <div class="input-field col s12 m6">
                                    <i class="mdi-communication-phone prefix grey-text text-lighten-1"></i>
                                    <input id="telepon" type="number" name="telepon" required value="<?= $pelanggan['pelanggan_telepon']?>">
                                    <label for="telepon">No Telepon</label>
                                </div>
							</div>
							<div class="input-field col s12 m12">
								<i class="mdi-maps-place prefix grey-text text-lighten-1"></i>
								<textarea id="alamat" class="materialize-textarea " name="alamat" required><?= $pelanggan['pelanggan_alamat']?></textarea>
								<label for="alamat">Alamat</label>
							</div>
							<div class="input-field col s12 m12">
								<i class="mdi-communication-business prefix grey-text text-lighten-1"></i>
								<input id="kota" type="text" class="validate " name="kota" required value="<?= $pelanggan['pelanggan_kota']?>">
								<label for="kota">Kota</label>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue">simpan</button>
								</div>
								<div class="input-field col s12 m6">
									<a href="<?= base_url('pelanggan')?>" class="btn waves-effect waves-light col s12 grey ">batalkan</a>
								</div>
							</div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
