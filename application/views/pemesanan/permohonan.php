	<section class="section">
		<div class="row hide-on-small-only">
			<div class="col s12 m12 l12 card white">
				<ul class="tabs">
					<?php if ($this->session->userdata('level') === 'adminSales'):?>
                    <li class="tab col s3">
                        <a href="#test1" >semua permohonan</a>
                    </li>
                    <li class="tab col s3">
						<a  href="#test2" class="active">belum dilihat</a>
					</li>
                    <?php endif;?>
					<?php if ($this->session->userdata('level') === 'adminGudang'):?>
                    <li class="tab col s3">
                        <a  href="#test3" class="active">daftar permohonan</a>
                    </li>
                    <?php endif;?>
                </ul>
                <!-- tab content-->
                <?php if ($this->session->userdata('level') === 'adminSales'):?>
                    <div id="test1" class="col s12">
                        <div class="card-content">
                            <ul class="collection">
                                <?php foreach ($permohonans as $row => $i):?>
                                <li class="collection-item avatar ">
                                    <img src="<?= base_url('assets/images/favicon/order-app-logo.png')?>" alt="" class="circle">
                                    <div class="row">
                                        <div class="col m4 l4">
                                        <span class="title ">
                                            <a href="<?= base_url('pelanggan/'.$i['pelanggan_id'])?>" style="text-decoration: underline">
                                                <?= $i['pelanggan_nama']?>
                                            </a>
                                        </span>
                                            <br>
                                            <p class="grey-text">
                                                oleh : Sales <?= $i['pengguna_fullname']?>
                                                <br>
                                                <?php
                                                    $dateOrder = new DateTime($i['request_date_created']);
                                                    echo 'Tanggal Pesan : '.$dateOrder->format('d/m/Y');
                                                ?>
                                            </p>
                                        </div>
                                        <?php if ($i['request_status'] !== 'dilihat'):?>
                                        <div class="col m2 l2">
                                            <h5>
                                                <i class="mdi-action-history grey-text"></i>
                                            </h5>
                                            <small class="grey-text">menunggu konfirmasi</small>
                                        </div>
                                        <div class="col m6 l6">
                                            <a href="<?= base_url('pemesanan/permohonan/'.$i['request_id'])?>" class="btn right blue" type="button" style="margin: 12px 0px">periksa</a>
                                        </div>
                                        <?php else:?>
                                            <div class="col m2 l2">
                                                <h4 >
                                                    <i class="mdi-action-check-circle green-text"></i>
                                                </h4>
                                                <small class="grey-text">telah disetujui</small>
                                            </div>
                                            <div class="col m6 l6">
                                                <a href="<?= base_url('pemesanan/invoice/'.$i['request_id'])?>" class="btn-flat right  orange-text waves-effect waves-orange" type="button" style="margin: 12px 5px" title="buat invoice">
                                                    <i class="mdi-action-receipt"></i>
                                                </a>
                                            </div>
                                        
                                        <?php endif;?>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
        
                    <div id="test2" class="col s12" >
                        <div class="card-content" >
                            <ul class="collection">
                                <?php foreach ($permohonans as $row => $i):?>
                                    <?php if ($i['request_status'] === 'terkirim'):?>
                                        <li class="collection-item avatar ">
                                            <img src="<?= base_url('assets/images/favicon/order-app-logo.png')?>" alt="" class="circle">
                                            <div class="row">
                                                <div class="col m6 l6">
                                        <span class="title ">
                                            <a href="<?= base_url('pelanggan/'.$i['pelanggan_id'])?>" style="text-decoration: underline">
                                                <?= $i['pelanggan_nama']?>
                                            </a>
                                        </span>
                                                    <br>
                                                    <p class="grey-text">
                                                        oleh : Sales <?= $i['pengguna_fullname']?>
                                                        <br>
                                                        <?php
                                                        $dateOrder = new DateTime($i['request_date_created']);
                                                        echo 'Tanggal Pesan : '.$dateOrder->format('d/m/Y');
                                                        ?>
                                                    </p>
                                                </div>
                                                <?php if ($i['request_status'] !== 'dilihat'):?>
                                                    <div class="col m6 l6">
                                                        <a href="<?= base_url('pemesanan/permohonan/'.$i['request_id'])?>" class="btn right blue" type="button" style="margin: 12px 0px">periksa</a>
                                                    </div>
                                                <?php else:?>
                                                    <div class="col m6 l6">
                                                        <a href="#!" class="btn right  disabled" type="button" style="margin: 12px 0px">telah disetujui</a>
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        </li>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                <?php endif;?>
                
                <?php if ($this->session->userdata('level') === 'adminGudang'):?>
                    <div id="test3" class="col s12">
                        <div class="card-content">
                            <ul class="collection">
				                <?php foreach ($permohonans as $row => $i):?>
                                    <?php if ($i['request_status'] === 'dilihat'):?>
                                    <li class="collection-item avatar ">
                                        <img src="<?= base_url('assets/images/favicon/order-app-logo.png')?>" alt="" class="circle">
                                        <div class="row">
                                            <div class="col m4 l4">
                                        <span class="title ">
                                            <a href="<?= base_url('pelanggan/'.$i['pelanggan_id'])?>" style="text-decoration: underline">
                                                <?= $i['pelanggan_nama']?>
                                            </a>
                                        </span>
                                                <br>
                                                <p class="grey-text">
                                                    oleh : Sales <?= $i['pengguna_fullname']?>
                                                    <br>
									                <?php
									                $dateOrder = new DateTime($i['request_date_created']);
									                echo 'Tanggal Pesan : '.$dateOrder->format('d/m/Y');
									                ?>
                                                </p>
                                            </div>
							                <?php if ($i['request_status'] !== 'dilihat'):?>
                                                <div class="col m2 l2">
                                                    <h5>
                                                        <i class="mdi-action-history grey-text"></i>
                                                    </h5>
                                                    <small class="grey-text">menunggu konfirmasi</small>
                                                </div>
                                                <div class="col m6 l6">
                                                    <a href="<?= base_url('pemesanan/permohonan/'.$i['request_id'])?>" class="btn right blue" type="button" style="margin: 12px 0px">periksa</a>
                                                </div>
							                <?php else:?>
                                                <div class="col m2 l2">
                                                    <h4 >
                                                        <i class="mdi-action-check-circle green-text"></i>
                                                    </h4>
                                                    <small class="grey-text">telah disetujui</small>
                                                </div>
                                                <div class="col m6 l6">
                                                    <a href="<?= base_url(
										                'pemesanan/surat-keluar-barang/'.$i['request_id']
									                )?>" class="btn-flat waves-effect waves-light right blue-text"  style="margin: 12px 5px" title="buat surat keluar barang">
                                                        <i class="mdi-action-print"></i>
                                                    </a>
                                                </div>
							                <?php endif;?>
                                        </div>
                                    </li>
                                    <?php endif;?>
				                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                <?php endif;?>
            </div>
		</div>
	</section>

	