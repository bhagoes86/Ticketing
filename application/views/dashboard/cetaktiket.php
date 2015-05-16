
        <div class="detail-box">
            <div class="text-center">
                <div>
                    <h3>Cetak Tiket Kepesertaan Anda</h3>
                </div>
                <hr>
                    <div class="tab-content">
                    <div class="tab-pane active in" id="login">
                        <div class="row" style="margin-top:20px; padding:20px">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="alert alert-success" role="alert">
                                    Selamat! Pembayaran Anda telah di verifikasi. 
                                </div>
                              <div class="text-center">
                                <p>Silahkan simpan dan cetak tiket yang sudah Anda bayarkan. Harap membawa tiket saat menghadiri acara. Silahkan hubungi nomor telfon panitia acara yang tertera pada tiket jika terdapat pertanyaan mengenai keberlangsungan acara.</p>
                                <br>
                                <table class="table" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No Tiket</th>
                                            <th style="text-align: center;">Acara</th>
                                            <th style="text-align: center;">Nama Peserta</th>
                                            <th style="text-align: center;">Cetak Tiket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tiket as $row): ?>
                                        <tr>
                                            <th style="text-align: center;"><?php echo $row->NO_TIKET; ?> </th>
                                            <th style="text-align: center;"><?php echo $nama_acara;; ?></th>
                                            <th style="text-align: center;"><?php echo $row->NAMA; ?> </th>
                                            <th style="text-align: center;">
                                                <div class="">
                                                    <button type="submit" value="cetakpdf" class="btn btn-primary">Cetak Tiket</button>
                                                    <a class="btn btn-primary" href="http://haiunair.com/kerjasama/functions/tiketmotivpreneur.php?ida=<?php echo $row->NO_TIKET; ?>" target="_blank">Cetak</a>
                                                </div>
                                            </th>
                                        </tr>
                                        <?php endforeach ?>
                                </table>
                                <br>
                                <p>Terima kasih telah menggunakan Haiunair Ticketing!<p>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
