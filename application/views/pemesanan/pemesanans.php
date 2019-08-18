	<div class="row ">
		<div class="col m12 l12">
			<ul class="collection with-header card">
				<li class="collection-header">
					<div class="row">
						<div class="col m8 l8">
							<h5 class="cardbox-text">Pesanan Barang Untuk
								<a href="<?= base_url('pelanggan/'.$request['pelanggan_id'])?>" class="black-text" >
									<?= $request['pelanggan_nama']?>
								</a>
							</h5>
							<p class="grey-text">
								oleh sales <span class="teal-text"><?= $request['pengguna_fullname']?></span> pada tanggal
								<span class="yellow-text text-darken-3">
									<?php
									$tglRequest = new DateTime($request['request_date_created']);
									echo $tglRequest->format('d/m/Y');
									?>
								</span>
							</p>
                            <?php if ($this->session->userdata('level') === 'adminSales'):?>
							<h6 >
								Pesan : <p class="grey-text"> <?= $request['request_pesan']?></p>
							</h6>
                            <?php endif;?>
						</div>
						<div class="col m4 l4">
							<?php if ($request['request_status'] === 'terkirim'):?>
                                <?php if ($this->session->userdata('level') === 'adminSales'):?>
                                <h6 class="right">
                                    <button type="button" class="btn green" id="btn-konfirmasi-pesanan" data-request="<?= $request['request_id']?>">setujui</button>
                                </h6>
                                <?php endif;?>
							<?php else:?>
							<h6 class="right">
								<button type="button" class="btn green disabled" >telah disetujui</button>
							</h6>
							<?php endif;?>
						</div>
					</div>
				</li>
				<?php foreach ($pesanans as $row => $i):?>
				<li class="collection-item pesanan-list" id="<?= $i['pemesanan_id']?>">
					<div class="grey-text">
						<i class="mdi-content-content-paste teal-text"></i>
						<i class="mdi-hardware-keyboard-arrow-right"></i>
						Memesan
						<a href="<?= base_url('barang/'.$i['barang_id'])?>" class="grey-text" style="text-decoration: underline">
							<?= $i['barang_nama']?>
						</a>
						sebanyak <span class="orange-text"><?= number_format($i['pemesanan_jumlah'],0,'',".")?>  <?= $i['barang_satuan']?></span>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		
		</div>
	</div>