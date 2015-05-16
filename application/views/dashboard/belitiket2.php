
        <div class="detail-box">
            <div class="text-center">
                <div>
                    <h3>Isi formulir pendaftaran</h3>
                    <p>Silahkan mengisi formulir pendaftaran dengan benar.</p>
                </div>
                <hr>
                    <div class="tab-content">
                        <div class="row" style="text-align:left">
                            <div class="col-md-8 col-md-offset-2">
                                <h4>Data Registrasi - <?php echo $qty ?> Tiket</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="font-weight: 100;" width="4%">No</th>
                                            <th style="font-weight: 100;">Nama</th>
                                            <th style="font-weight: 100;">Email</th>
                                            <th style="font-weight: 100;">No Telp</th>
                                            <th style="font-weight: 100;">Instansi</th>
                                            <th style="font-weight: 100;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($peserta!=null): ?>
                                        <?php $i = 0; ?>
                                        <?php foreach ($peserta->result() as $row): ?>
                                        <tr>
                                            <td><?php echo $i+1; ?></td>
                                            <td><?php echo $row->NAMA; ?></td>
                                            <td><?php echo $row->E_MAIL; ?></td>
                                            <td><?php echo $row->NO_HP; ?></td>
                                            <td><?php echo $row->ASAL_INSTANSI; ?></td>
                                            <td><a href="<?php echo base_url() ?>dashboard/regis/<?php echo $row->ID_TIKET; ?>">Edit</a></td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach ?>
                                        <?php if ($i-1!=$qty): ?>
                                            <?php for ($p=$i; $p < $qty; $p++) { ?>
                                            <tr>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                            </tr>
                                            <?php } ?>
                                        <?php endif ?>
                                    <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php if ($posisi==$qty): ?>
                    <hr>
                    <div>
                        <form action="<?php echo base_url(); ?>dashboard/goambilvoucher" method="post">
                          <div class="">
                            <button type="submit" value="voucher" class="btn btn-success btn-lg">Lanjutkan</button>
                          </div>
                        </form>
                        <br>
                    </div>
                    <?php endif ?>
                    <?php if ($posisi!=$qty): ?>
                    <!-- regis form -->
                    <div class="tab-pane active in" id="login">
                        <div class="row" style="margin-top:20px; padding:20px">
                            <div class="col-md-8 col-md-offset-2" style="text-align:left">
                                <h4>Data Peserta ke <?php echo $posisi+1; ?></h4>
                                <hr>
                                <?php if ($this->input->get('error')=="char"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Maaf Anda tidak diizinkan memasukkan simbol-simbol yang tidak diizinkan
                                    </div>
                                <?php endif ?>
                                <?php if ($this->input->get('error')=="blank"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Maaf Anda harus mengisi form registrasi ini dengan lengkap
                                    </div>
                                <?php endif ?>
                                <?php if ($this->input->get('error')=="hp"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Maaf Anda harus mengisi nomer HP Anda dengan benar
                                    </div>
                                <?php endif ?>
                                <form class="form-horizontal" action="<?php echo base_url(); ?>dashboard/validasi_regis" method="post" style="text-align:left">
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Nama Peserta</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama" value="<?php echo $this->session->flashdata('nama'); ?>" class="form-control" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" name="email" value="<?php echo $this->session->flashdata('email'); ?>" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">No Hp</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="hp" value="<?php echo $this->session->flashdata('hp'); ?>" class="form-control" placeholder="Hp" onkeypress="return isNumberKey(event)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Instansi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="instansi" value="<?php echo $this->session->flashdata('instansi'); ?>" class="form-control" placeholder="Universitas / Instansi / Sekolah">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row-fluid">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <button type="submit" name="regis" value="regis" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end of regis form -->
                    <?php endif ?>
                    <div class="tab-pane fade" id="create">
                        <div class="row" style="margin-top:20px; padding:20px">
                            <div class="alert alert-success">
                                Untuk mengirim konfirmasi pembayaran silahkan login di sistem ticketing dengan akun yang pernah yang Anda buat
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            