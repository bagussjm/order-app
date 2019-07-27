	<div class="row show-on-large hide-on-med-and-down">
		<div class="col l12 ">
			<div class="card">
				<div class="card-content margin" style="margin: 12px;">
					<h4 class="cardbox-text light left margin">Daftar Seluruh Pesanan</h4>
				</div>
				<br>
				<div class="divider"></div>
				<table class="bordered" id="pesanan-table">
					<thead>
						<tr>
							<th>No Pemesanan</th>
							<th>Nama Pemesan</th>
							<th>Barang</th>
							<th>Jumlah Pesan</th>
							<th>Total Tagihan</th>
							<th>Tanggal Pesan</th>
                            <th>Status Pemesanan</th>
							<th>Tanggal Tagihan</th>
							<th>Status Tagihan</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($pemesanans as $row => $i):?>
						<tr>
							<td><?= $i['pemesanan_no']?></td>
							<td>
								<a href="<?= base_url('pelanggan/'.$i['pelanggan_id'])?>" style="text-decoration: underline">
									<?= $i['pelanggan_nama']?>
								</a>
							</td>
							<td>
								<a href="<?= base_url('barang/'.$i['barang_id'])?>" style="text-decoration: underline">
									<?= $i['barang_nama']?>
								</a>
							</td>
							<td>
								<?= number_format($i['pemesanan_jumlah'],0,'',".")?>
							</td>
							<td>
								<?= number_format($i['pemesanan_total'],2,",",".")?>
							</td>
							<td>
								<?php
									$tglPesan = new DateTime($i['pemesanan_tgl_pesan']);
									echo $tglPesan->format('m-d-Y');
								?>
							</td>
                            <td>
                                <?php if ($i['pemesanan_status_pesan'] === 'konfirmasi'):?>
                                    <span class="green-text"><?= $i['pemesanan_status_pesan']?></span>
                                <?php else: ?>
                                    <span class="orange-text"><?= $i['pemesanan_status_pesan']?></span>
                                <?php endif;?>
                            </td>
							<td>
								<?php if ($i['pemesanan_tgl_tagihan'] !== null):?>
									<?= date('m-d-Y',$i['pemesanan_tgl_tagihan'])?>
								<?php else:?>
									<?= 'belum ada tagihan'?>
								<?php endif?>
							</td>
							<td>
								<?= $i['pemesanan_status_tagihan']?>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>