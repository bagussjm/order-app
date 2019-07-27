    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card-panel" >
                <div class="row">
                    <div class="col s12 m12 l12 ">
                        <button class="btn-flat right blue-text waves-effect waves-light" onclick="printContent('surat-keluar')">
                            <i class="mdi-action-print"></i>
                        </button>
                    </div>

                    <div class="col l12">
                        <h4 class="divider"></h4>
                        <div class="row">
                            <div class="col m6 l2">
                                <img src="<?= base_url('assets/images/favicon/order-app-logo.png')?>" alt="" width="110px" height="110px">
                            </div>
                            <div class="col m10 l10">
                                <h4 class="cardbox-text margin" id="kambing">PT. Pekanbaru Distribusindo Raya</h4>
                                <h6 class="light margin">Jl. HR. Soebrantas Panam No.58 kel, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28289</h6>
                                <div class="row">
                                    <div class="col m6 l6">
                                        <h6 class="light margin"> Telepon :  (0761) 566784</h6>
                                    </div>
                                    <div class="col m6 l6">
                                        <h6 class="light margin"> Fax : 021-45854282</h6>
                                    </div>
                                </div>
                                <h5 class="divider"></h5>
                            </div>

                            <div class="divider"></div>

                            <div class="col m12 l12 ">
                                <h4 class="cardbox-text center">
                                    bukti pengeluarang barang
                                </h4>
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
                            <div class="col m12 l12">
                                <table class="bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
					                <?php
					                $no = 1;
					                foreach ($pesanans as $row => $i):
						                ?>
                                        <tr>
                                            <td><?= $no;?></td>
                                            <td><?= $i['barang_nama']?></td>
                                            <td><?= number_format($i['pemesanan_jumlah'],0,'',".")?></td>
                                        </tr>
						                <?php
						                $no++;
					                endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col m12 l12">
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
    <div class="col l12 " id="surat-keluar" style="display: none">
        <h4 class="divider"></h4>
        <div class="row">
            <div class="col m6 l2">
                <img src="<?= base_url('assets/images/favicon/order-app-logo.png')?>" alt="" width="110px" height="110px">
            </div>
            <div class="col m10 l10">
                <h4 class="cardbox-text margin" id="kambing">PT. Pekanbaru Distribusindo Raya</h4>
                <h6 class="light margin">Jl. HR. Soebrantas Panam No.58 kel, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28289</h6>
                <div class="row">
                    <div class="col m6 l6">
                        <h6 class="light margin"> Telepon :  (0761) 566784</h6>
                    </div>
                    <div class="col m6 l6">
                        <h6 class="light margin"> Fax : 021-45854282</h6>
                    </div>
                </div>
                <h5 class="divider"></h5>
            </div>

            <div class="divider"></div>

            <div class="col m12 l12 ">
                <h4 class="cardbox-text center">
                    bukti pengeluarang barang
                </h4>
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
            <div class="col m12 l12">
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
				    <?php
				    $no = 1;
				    foreach ($pesanans as $row => $i):
					    ?>
                        <tr>
                            <td><?= $no;?></td>
                            <td><?= $i['barang_nama']?></td>
                            <td><?= number_format($i['pemesanan_jumlah'],0,'',".")?></td>
                        </tr>
					    <?php
					    $no++;
				    endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="col m12 l12">
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


    <script type="text/javascript">
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
    
