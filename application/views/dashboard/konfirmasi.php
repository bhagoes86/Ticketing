
        <div class="detail-box">
            <div class="text-center">
                <div>
                    <h3>Kirim konfirmasi</h3>
                    <p>Silahkan mengisi kolom konfirmasi dibawah ini dengan benar</p>
                </div>
                    <div class="tab-content">
                    <div class="tab-pane active in" id="login">
                        <div class="row" style="margin-top:20px; padding:20px">
                            <div class="col-md-8 col-md-offset-2">
                                <?php if ($this->input->get('error')=='biaya'): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Maaf Anda hanya diperbolehkan menginputkan nominal angka pada field biaya
                                    </div>
                                <?php endif ?>
                                <?php if ($this->input->get('error')=='blank'): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Anda belum mengisi dengan lengkap
                                    </div>
                                    <?php endif ?>
                                <form class="form-horizontal" style="text-align:left"  action="<?php echo base_url(); ?>dashboard/konfirmasi_validation" method="post">
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Nama Pengirim</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "namapengirim" value="<?php echo $this->session->flashdata("namapengirim"); ?>" class="form-control" placeholder="Pengirim">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Nama Bank</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "namabank" value="<?php echo $this->session->flashdata("namabank"); ?>" class="form-control" placeholder="Bank">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Tanggal Transfer</label>
                                        <div class="col-sm-9">
                                            <input type="date" name = "tanggal" value="<?php echo $this->session->flashdata("tanggal"); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input_biaya" style="text-align:left; font-weight: 100;" class="col-sm-3 control-label">Nominal Tranfer</label>
                                        <div class="col-sm-8 input-group col-sm-offset-3" style="left: 16px">
                                          <div class="input-group-addon">Rp.</div>
                                          <input type="text"name = "biaya" value="<?php echo $this->session->flashdata("biaya"); ?>" class="form-control" id="biaya" placeholder="Nominal transfer yang Anda kirim" onkeypress="return isNumberKey(event)">
                                          <div class="input-group-addon">.00</div>
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <div class="row-fluid">
                                            <div class="col-sm-9 col-sm-offset-3">
                                                <button type="submit" class="btn btn-success">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="create">
                        <div class="row" style="margin-top:20px; padding:20px">
                            <div class="alert alert-success">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            