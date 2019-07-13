		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s12 m12">
					<div class="card-panel">
						<h4 class="login-form-text center">tambahkan data pelanggan</h4>
						
						<form action="<?= base_url('PelangganController/add')?>" method="post" autocomplete="off">
							<div class="row margin">
								<div class="input-field col s12 m6">
									<i class="mdi-action-credit-card prefix grey-text text-lighten-1"></i>
									<input id="nama" type="text" name="nama">
									<label for="nama">Nama Pelanggan</label>
								</div>
							</div>
							<div class="row margin">
								<div class="input-field col s12 m6">
									<i class="mdi-communication-phone prefix grey-text text-lighten-1"></i>
									<input id="telepon" type="number" name="telepon" >
									<label for="telepon">No Telepon</label>
								</div>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-maps-place prefix grey-text text-lighten-1"></i>
								<textarea id="alamat" class="materialize-textarea " name="alamat"></textarea>
								<label for="alamat">Alamat</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-communication-business prefix grey-text text-lighten-1"></i>
								<input id="kota" type="text" class="validate " name="kota">
								<label for="kota">Kota</label>
							</div>
							<div class="row">
								<div class="input-field col s12 m6">
									<button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue">tambahkan</button>
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
