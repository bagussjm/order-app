        <div class="row show-on-large hide-on-small-only" >
            <div class="col s12 ">
                <div class="card">
                    <div class="card-content margin" style="margin: 12px;">
                        <h4 class="cardbox-text light left margin">daftar barang</h4>
                    </div>
                    <br>
                    <div class="divider"></div>
                    <table class="bordered" id="barang-table">
                        <thead>
                            <tr>
                                <th >Kode</th>
                                <th >Nama</th>
                                <th >Harga</th>
                                <th >Satuan</th>
                                <th >Stok</th>
                                <th >Kategori</th>
                                <th class="center ">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangs as $row => $i):?>
                            <tr>
                                <td class="grey-text text-darken-1"><?= $i['barang_kode']?></td>
                                <td class="teal-text text-darken-1">
                                    <a href="<?= base_url('barang/'.$i['barang_id'])?>" style="text-decoration: underline">
	                                    <?= $i['barang_nama']?>
                                    </a>
                                </td>
                                <td class="grey-text text-darken-1">
                                   Rp <?= number_format($i['barang_harga'],2,",",".")?>
                                </td>
                                <td class="grey-text text-darken-1"><?= $i['barang_satuan']?></td>
                                <td class="grey-text text-darken-1">
	                                <?= number_format($i['barang_stok'],0,'',".")?>
                                </td>
                                <td class="grey-text text-darken-1"><?= $i['kategori_nama']?></td>
                                <td>
                                    <div class="row">
                                        <a href="#<?= base_url('barang/ubah/'.$i['barang_id'])?>" class="btn-flat waves-effect waves-orange col l6" title="ubah data">
                                            <i class="mdi-content-create orange-text"></i>
                                        </a>
                                        <a href="#delete-<?= $i['barang_id']?>" class="btn-flat waves-effect waves-red col l6 modal-trigger" title="hapus data">
                                            <i class="mdi-action-delete red-text text-darken-3"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal delete -->
                            <div id="delete-<?=$i['barang_id']?>" class="modal">
                                <div class="modal-content">
                                    <h4 class="red-text text-lighten-1 center">
                                        <i class="mdi-action-info-outline"></i> Yakin ingin menghapus barang ?
                                    </h4>
                                    <div class="modal-content">
                                        <p class="grey-text text-lighten-1">
                                            item yang anda hapus akan tersimpan ke data arsip
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="<?= base_url('barang/hapus/'.$i['barang_id'])?>" class="modal-close waves-effect waves-green btn green lighten-1">lanjutkan</a>
                                    <a href="#!" class="modal-close waves-effect waves-red btn grey lighten-1" style="margin-right:12px">batalkan</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="sales-top-home-page" class="hide-on-large-only">
            <div class="row">
                <div class="section">
                    <div class="col s12 m12">
                        <input type="text" placeholder="cari barang" class="white z-depth-3 grey-text text-darken-1 custom-box-search" id="barang-box-search">
                    </div>
                </div>
                <div class="input-field col s12 ">
                    <select name="kategori" id="kategori-barang">
                        <?php if ($kategori_selected !== null):?>
                            <option value="all-category" >Semua Barang</option>
	                        <?php foreach ($kategoris as $row => $index):?>
                                <?php if ($index['kategori_nama'] === $kategori_selected):?>
                                    <option value="<?= $index['kategori_nama']?>" selected><?= $index['kategori_nama']?></option>
		                        <?php else:?>
                                    <option value="<?= $index['kategori_nama']?>"><?= $index['kategori_nama']?></option>
		                        <?php endif;?>
	                        <?php endforeach;?>
                        <?php else:?>
                            <option value="all-category"  selected>Semua Barang</option>
	                        <?php foreach ($kategoris as $row => $index):?>
                                <option value="<?= $index['kategori_nama']?>"><?= $index['kategori_nama']?></option>
	                        <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
            </div>
        </div>
        
        <div id="sales-main-home-page" class="hide-on-large-only">
            
            <div class="row" id="default-barang-list" >
                <?php if ($barangs !== null):?>
	                <?php foreach ($barangs as $row => $i):?>
                        <div class="col s12 m6 l4">
                            <a href="<?= base_url('barang/'.$i['barang_id'])?>">
                                <div class="card-panel grey lighten-5">
                                    <div class="row valign-wrapper">
                                        <div class="col s3">
                                            <img src="<?= base_url('assets/images/svg/barang.svg')?>" alt="" class="circle responsive-img valign">
                                        </div>
                                        <div class="col s9">
                                            <h6 class="teal-text text-lighten-1 light">
								                <?= $i['barang_nama']?>
                                            </h6>
                                            <span class="grey-text text-lighten-1">
                                        <i class="mdi-action-shopping-cart yellow-text text-darken-3"></i>
                                       Rp,  <?=  number_format($i['barang_harga'],2,",",".")?> per <?= $i['barang_satuan']?>

                                    </span>
                                            <br>
                                            <span class="grey-text text-lighten-1">
                                            <i class="mdi-action-dns blue-text"></i> <?= number_format($i['barang_stok'],0,'','.')?> tersedia
                                    </span>
                                            <br>
                                            <span class="grey-text text-lighten-1">
                                            <i class="mdi-action-label teal-text text-lighten-1"></i> <?= $i['kategori_nama']?>
                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
	                <?php endforeach;?>
                <?php else:?>
                    <div class="col s12 m6 l4">
                        <div class="card-panel grey lighten-5">
                            <div class="row valign-wrapper">
                                <div class="col s3">
                                    <img src="<?= base_url('assets/images/svg/404.svg')?>" alt="" class=" responsive-img valign">
                                </div>
                                <div class="col s9">
                                    <h6 class="red-text text-lighten-1 light">
                                        Maaf barang belum tersedia <i class="mdi-content-clear"></i>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            
        </div>
        
        <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large teal" href="<?= base_url('barang/tambah')?>">
                <i class="mdi-av-playlist-add"></i>
            </a>
        </div>
        <!-- Floating Action Button -->
