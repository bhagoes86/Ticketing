
        <div class="detail-box">
            <div class="text-center">
                <div>
                    <h3>Pilih jumlah tiket</h3>
                    <p>Silahkan memilih berapa banyak tiket yang ingin Anda beli.<br> Harga 1 tiket <?php echo $nama_acara; ?> adalah sebesar Rp. <?php echo convertIntToHarga($harga_acara); ?> + kode voucher. <br>Minimal pembelian adalah <?php echo $min ?> tiket</p>
                </div>
                    <div class="tab-content">
                    <div class="tab-pane active in" id="login">
                        <div class="row" style="margin-top:20px; padding:20px">
                            <div class="col-md-6 col-md-offset-3">
                                <?php if ($this->input->get('error')=="null_tiket"): ?>
                                    <div class="alert alert-danger" role="alert">
                                        Maaf Anda belum memilih jumlah tiket yang akan Anda beli
                                    </div>
                                <?php endif ?>
                                <form class="form-horizontal" action="<?php echo base_url() ?>dashboard/validasi_tiket" method="post" style="text-align:left">
                                    <div class="form-group">
                                        <label for="inputticket" style="text-align:left" class="col-sm-4 control-label">Jumlah Tiket</label>
                                        <div class="col-sm-8">
                                            <select name="tiket" class="form-control">
                                                <option value="0">Banyak Tiket</option>
                                                <?php for ($i=$min; $i <= $max; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row-fluid">
                                            <div class="col-sm-8 col-sm-offset-4">
                                                <button type="submit" name="beli" value="beli" class="btn btn-success">Beli Tiket</button>
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
                                Untuk mengirim konfirmasi pembayaran silahkan login di sistem ticketing dengan akun yang pernah yang Anda buat
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        