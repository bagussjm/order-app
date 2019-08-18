<div class="row">
	<div class="col s12 m12 l12">
		<div class="card-panel" >
			<div class="row">
				<div class="col s12 m12 l12 ">
					<button class="btn blue right waves-effect waves-light" id="btn-cetak-surat-keluar">
						<i class="mdi-action-print"></i>
					</button>
				</div>
				
				<div class="col l12 no-padding" id="surat-keluar-barang" style="padding: 12px;box-sizing: border-box">
					<h4 class="divider" ></h4>
					<div class="row">
						<div class="col m6 l2" style="width: 20%; display: inline">
							<img src="<?= base_url('assets/images/favicon/order-app-logo.png')?>" alt="" width="110px" height="110px">
						</div>
						<div class="col m10 l10" style="width: 80%; display: inline">
							<h5 class="cardbox-text ">PT. Pekanbaru Distribusindo Raya</h5>
							<h6 class="light ">Jl. HR. Soebrantas Panam No.58 kel, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28289</h6>
							<div class="row">
								<div class="col m6 l6" style="width: 50%;display: inline;text-align: left">
									<h6 class="light margin"> Telepon :  (0761) 566784</h6>
								</div>
								<div class="col m6 l6" style="width: 50%;display: inline;text-align: left">
									<h6 class="light margin"> Fax : 021-45854282</h6>
								</div>
							</div>
							<h5 class="divider"></h5>
						</div>
						
						<div class="divider"></div>
						
						<div class="col m12 l12 " style="width: 100%;display: block;text-align: center">
							<h5 class="cardbox-text center">
								invoice <br> <br>
								no : <?= $request['request_id']?>
							</h5>
						</div>
						
						<div class="col m12 l12 ">
							<div class="row">
								<div class="col m6 l6">
									<h6 class="cardbox-text">No Bukti : <?= $request['request_id']?> </h6>
									<h6 class="cardbox-text">Ditujukan Untuk : <?= $request['pelanggan_nama']?></h6>
								</div>
								<div class="col m6 l6">
									<h6 class="cardbox-text">Tanggal : <?= date('d/m/Y',time());?></h6>
									<h6 class="cardbox-text">PO Customer : </h6>
								</div>
							</div>
							<h5 class="divider"></h5>
						</div>
						<br>
						<div class="col m12 l12" style="display: block; width: 100%">
							<table class="bordered">
								<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Jumlah</th>
									<th>Harga</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								$total = 0;
								foreach ($pesanans as $row => $i):
									?>
									<tr>
										<td><?= $no;?></td>
										<td><?= $i['barang_nama']?></td>
										<td><?= number_format($i['pemesanan_jumlah'],0,'',".")?> <?= $i['barang_satuan']?></td>
										<td>Rp <?= number_format($i['barang_harga'],2,",",".")?></td>
									</tr>
									<?php
									$no++;
									$total += $i['barang_harga'];
								endforeach;?>
									<tr>
										<td colspan="3">Total</td>
										<td >Rp <?= number_format($total,2,",",".")?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<br>
						<br>
						<div class="col m12 l12" style="width: 100%;display: block">
							<!--                                <h3 class="divider"></h3>-->
							<div class="row" style="margin-top: 40px">
								<div class="col m4 l4 right">
									<h6 class="cardbox-text margin center">Yang Mengeluarkan,</h6>
									<h6 class="cardbox-text margin center">Mengetahui</h6>
									<br>
									<br>
									<br>
									<h6 class="cardbox-text center"><?= $this->session->userdata('name');?></h6>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>


