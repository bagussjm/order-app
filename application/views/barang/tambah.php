		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s12 m12">
					<div class="card-panel">
						<h4 class="login-form-text center">tambahkan data barang</h4>
						
						<form action="<?= base_url('BarangController/add')?>" method="post" autocomplete="off">
							<div class="row margin">
								<div class="input-field col s12 m6">
									<i class="mdi-content-add-box prefix grey-text text-lighten-1"></i>
									<input id="nama" type="text" name="nama" required>
									<label for="nama">Nama Barang</label>
								</div>
                                <div class="input-field col s12 m6">
                                    <i class="mdi-action-shopping-cart prefix grey-text text-lighten-1"></i>
                                    <input id="harga" type="number" name="harga" required>
                                    <label for="harga">Harga Barang</label>
                                </div>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-action-view-list prefix grey-text text-lighten-1"></i>
								<input id="satuan" type="text" class="validate " name="satuan" required>
								<label for="satuan">Satuan</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-action-dns prefix grey-text text-lighten-1"></i>
								<input id="stok" type="number" minlength="1" class="validate " name="stok" required>
								<label for="stok">Stok</label>
							</div>
							<div class="input-field col s12 ">
								<select name="kategori" id="kategori-barang">
									<option value="all-category" disabled selected>Semua Barang</option>
									<?php foreach ($kategoris as $row => $index):?>
										<option value="<?= $index['kategori_id']?>"><?= $index['kategori_nama']?></option>
									<?php endforeach;?>
								</select>
							</div>
							
							<div class="row">
								<div class="input-field col s12 m6">
									<button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue">tambahkan</button>
								</div>
								<div class="input-field col s12 m6">
									<a href="<?= base_url('barang')?>" class="btn waves-effect waves-light col s12 grey ">batalkan</a>
								</div>
							</div>
						
						</form>
					</div>
				</div>
			</div>
		</div>
