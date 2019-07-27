	<div class="section">
		<div class="row">
			<div class="col s12 m6 l4 hide-on-med-and-down">
				<div class="card">
					<div class="card-content  blue white-text">
						<h5 class="card-stats-title cardbox-text">
							<i class="mdi-social-group-add"></i> Pelanggan
						</h5>
						<h4 class="card-stats-number">
                            <?= number_format($total_pelanggan,0,'','.')?>
                        </h4>
					</div>
					<div class="card-action  blue darken-2">
						<div id="clients-bar" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
					</div>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card">
					<div class="card-content orange white-text">
						<h5 class="card-stats-title cardbox-text">
							<i class="mdi-action-shopping-cart"></i>Total Penjualan
						</h5>
						<h4 class="card-stats-number"><?= 'Rp '.number_format($transaksi['pemesanan_total'],2,",",".")?></h4>
					</div>
					<div class="card-action orange darken-2">
						<div id="sales-compositebar" class="center-align"><canvas width="214" height="25" style="display: inline-block; width: 214px; height: 25px; vertical-align: top;"></canvas></div>
					</div>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<div class="card">
					<div class="card-content blue-grey white-text">
						<h5 class="card-stats-title cardbox-text">
							<i class="mdi-action-assessment"></i> Stok Barang
						</h5>
						<h4 class="card-stats-number"><?= number_format($stok['barang_stok'],0,'','.')?></h4>
					</div>
					<div class="card-action blue-grey darken-2">
						<div id="profit-tristate" class="center-align"><canvas width="227" height="25" style="display: inline-block; width: 227px; height: 25px; vertical-align: top;"></canvas></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="section">
		<div class="row">
			<div class="col s12 m12 l12 ">
				<div class="card-panel no-padding margin">
					<ul id="projects-collection" class="collection margin">
						<li class="collection-item avatar">
							<i class="mdi-content-content-paste circle light-blue"></i>
							<h5 class="collection-header margin cardbox-text">Daftar pesanan</h5>
							<h6 class="grey-text margin light">Hari ini tanggal : <?= date('d/m/Y',time())?></h6>
							<div class="secondary-content">
                                <a href="<?= base_url('pemesanan/permohonan')?>" class="btn blue btn-small">daftar pesanan</a>
                            </div>
						</li>
                        <?php foreach ($permohonans as $row => $i ):?>
                            <li class="collection-item">
                                <div class="row">
                                    <div class="col s6">
                                        <h5  class="collections-title margin"><?= $i['pelanggan_nama']?></h5>
                                        <span class="collections-content grey-text margin">
                                            <?php
                                                $tgl = new DateTime($i['request_date_created']);
                                                echo $tgl->format('d/m/Y');
                                            ?>
                                        </span>
                                    </div>
                                    <div class="col s3">
                                        <?php if ($i['request_status'] === 'dilihat'):?>
                                            <span class="task-cat green">
                                                <i class="mdi-action-check-circle"></i> dikonfirmasi
                                            </span>
                                        <?php else:?>
                                            <span class="task-cat grey">
                                                <i class="mdi-action-restore"></i> menunggu
                                            </span>
                                        <?php endif?>
                                    </div>
                                    <div class="col s3">
                                        <span class="task-cat pink accent-2"><?= ucwords($i['request_id'])?></span>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
	</div>