		<?php if ($this->session->flashdata('alert') === 'user-welcome'):?>
			<div id="card-alert" class="card light-blue animated slideInDown user-welcome">
				<div class="card-content white-text">
					<p>selamat datang <?= $this->session->userdata('username');?></p>
				</div>
			</div>
		<?php endif;?>
		
		<div id="sales-top-home-page">
			<div class="row">
				<div class="col s6 m6 l4">
					<a href="<?= base_url('pelanggan');?>">
						<div class="card blue lighten-2">
							<div class="card-content center ">
								<img src="<?= base_url('assets/images/svg/pelanggan.svg')?>" alt="" width="100%" height="60px">
								<h5 class="white-text">
									pelanggan
								</h5>
							</div>
						</div>
					</a>
				</div>
				<div class="col s6 m6 l4">
					<a href="<?= base_url('barang')?>">
						<div class="card teal lighten-2">
							<div class="card-content center">
								<img src="<?= base_url('assets/images/svg/barang.svg')?>" alt="" width="100%" height="60px">
								<h5 class="white-text">
									barang
								</h5>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		
		<div id="sales-main-home-page">
            <div class="section">
                <div class="row">
                    <div class="col s12 m12 l12 ">
                        <div class="card-panel no-padding margin">
                            <ul id="projects-collection" class="collection margin">
                                <li class="collection-item avatar">
                                    <i class="mdi-content-content-paste circle light-blue"></i>
                                    <h5 class="collection-header margin cardbox-text">Daftar pesanan</h5>
                                    <h6 class="grey-text margin light">Hari ini tanggal : <?= date('d/m/Y',time())?></h6>
                                </li>
								<?php if ($permohonans !== null):?>
									<?php foreach ($permohonans as $row => $i ):?>
                                        <a href="<?= base_url('pemesanan/permohonan/'.$i['request_id'])?>">
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col s8">
                                                    <h5  class="collections-title margin"><?= $i['pelanggan_nama']?></h5>
                                                    <span class="collections-content grey-text margin">
                                                        <?php
                                                        $tgl = new DateTime($i['request_date_created']);
                                                        echo $tgl->format('d/m/Y');
                                                        ?>
                                                    </span>
                                                </div>
                                                <div class="col s4">
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
                                            </div>
                                        </li>
                                        </a>
									<?php endforeach;?>
                                <?php else:?>
                                    <li class="collection-item">
                                        <h5 class="light grey-text">
                                            belum ada data pesanan
                                        </h5>
                                    </li>
                                <?php endif;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
		</div>
		
		
		<!-- Floating Action Button -->
		<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
			<a class="btn-floating btn-large teal" href="<?= base_url('pemesanan/tambah')?>">
				<i class="mdi-content-content-paste"></i>
			</a>
		</div>
		<!-- Floating Action Button -->
