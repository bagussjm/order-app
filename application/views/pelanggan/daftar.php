		<div id="sales-top-home-page" class="hide-on-large-only">
			<div class="row">
				<div class="col s12 m12">
					<input type="text" placeholder="cari pelanggan" class="white z-depth-3 grey-text text-darken-1" id="box-search">
				</div>
			</div>
		</div>
		
		<div id="sales-main-home-page" class="hide-on-large-only">
			<div class="row">
                <?php foreach ($pelanggans as $row => $i):?>
				<div class="col s12 m6 l4">
					<a href="<?= base_url('pelanggan/'.$i['pelanggan_id'])?>">
						<div class="card-panel grey lighten-5">
							<div class="row valign-wrapper">
								<div class="col s3">
									<img src="<?= base_url('assets/images/admin.png')?>" alt="" class="circle responsive-img valign">
								</div>
								<div class="col s9">
									<h5 class="teal-text text-lighten-1 light">
										<?= $i['pelanggan_nama']?>
									</h5>
									<span class="grey-text text-lighten-1"><i class="mdi-maps-place"></i> <?= $i['pelanggan_alamat']?></span>
								</div>
							</div>
						</div>
					</a>
				</div>
                <?php endforeach;?>
			</div>
		</div>

        <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large teal" href="<?= base_url('pemesanan')?>">
                <i class="mdi-av-playlist-add"></i>
            </a>
        </div>
        <!-- Floating Action Button -->
