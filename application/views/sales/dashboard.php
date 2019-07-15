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
			<div class="row">
				<div class="col s12 ">
					<ul class="collection with-header white">
						<li class="collection-header">
							<h5 class="grey-text text-darken-1">Daftar Pesanan</h5>
						</li>
						<li class="collection-item grey-text text-darken-2">
							<div>Alvin<a href="kambing.html" class="secondary-content"><i class="mdi-hardware-keyboard-arrow-right"></i></a></div>
						</li>
						<li class="collection-item grey-text text-darken-2">
							<div>Alvin<a href="kambing.html" class="secondary-content"><i class="mdi-hardware-keyboard-arrow-right"></i></a></div>
						</li>
						<li class="collection-item grey-text text-darken-2">
							<div>Alvin<a href="kambing.html" class="secondary-content"><i class="mdi-hardware-keyboard-arrow-right"></i></a></div>
						</li>
						<li class="collection-item grey-text text-darken-2">
							<div>Alvin<a href="kambing.html" class="secondary-content"><i class="mdi-hardware-keyboard-arrow-right"></i></a></div>
						</li>
					
					</ul>
					<a href="daftar-pesanan.html" class="btn waves-effect waves-light col s12 blue lighten-2">
						lihat semua pesanan
					</a>
				</div>
			</div>
		</div>
		
		
		<!-- Floating Action Button -->
		<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
			<a class="btn-floating btn-large teal" href="<?= base_url('pemesanan')?>">
				<i class="mdi-content-content-paste"></i>
			</a>
		</div>
		<!-- Floating Action Button -->
