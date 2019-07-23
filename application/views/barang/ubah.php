		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s12 m12">
					<div class="card-panel">
						<h4 class="login-form-text center">ubah data barang</h4>
						
						<form action="<?= base_url('BarangController/edit/'.$barang['barang_id'])?>" method="post" autocomplete="off">
							<div class="row margin">
								<div class="input-field col s12 m6">
									<i class="mdi-content-add-box prefix grey-text text-lighten-1"></i>
									<input id="nama" type="text" name="nama" required value="<?= $barang['barang_nama']?>">
									<label for="nama">Nama Barang</label>
								</div>
                                <div class="input-field col s12 m6">
                                    <i class="mdi-action-shopping-cart prefix grey-text text-lighten-1"></i>
                                    <input id="harga" type="number" name="harga" required value="<?= $barang['barang_harga']?>">
                                    <label for="harga">Harga Barang</label>
                                </div>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-action-view-list prefix grey-text text-lighten-1"></i>
								<input id="satuan" type="text" class="validate " name="satuan" required value="<?= $barang['barang_satuan']?>">
								<label for="satuan">Satuan</label>
							</div>
							<div class="input-field col s12 m6">
								<i class="mdi-action-dns prefix grey-text text-lighten-1"></i>
								<input id="stok" type="number" minlength="1" class="validate " name="stok" required value="<?= $barang['barang_stok']?>">
								<label for="stok">Stok</label>
							</div>
							<div class="input-field col s12 ">
                                <label for="kategori-barang">Kategori Barang</label><br><br>
                                <select name="kategori" id="kategori-barang">
                                    <?php foreach ($kategoris as $row => $index):?>
	                                    <?php if ($index['kategori_id'] === $barang['kategori_id']): ?>
                                            <option value="<?= $index['kategori_id']?>" selected><?= $index['kategori_nama']?></option>
	                                    <?php else:?>
                                            <option value="<?= $index['kategori_id']?>" ><?= $index['kategori_nama']?></option>
	                                    <?php endif; ?>
									<?php endforeach;?>
								</select>
							</div>
							
							<div class="row">
								<div class="input-field col s12 m6">
									<button type="submit" name="tambah" class="btn waves-effect waves-light col s12 blue">simpan</button>
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
