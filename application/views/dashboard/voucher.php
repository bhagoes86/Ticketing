
        <div class="detail-box">
            <div class="" style="text-align: center;">
                <div>
                    <h3>Ambil voucher bayar Anda</h3>
                    <p>Silahkan ambil voucher bayar Anda. <br>Setelah menekan tombol ambil voucher Anda akan mengetahui total biaya yang harus Anda bayar dan rekening tujuan. </p>
                </div>
                    <div class="tab-content">
                    <div class="tab-pane active in" id="login">
                        <div>
                          <div class="row text-center" style="margin-top:20px; padding:20px">
                            <form action="<?php echo base_url(); ?>dashboard/getvoucher" method="post">
                              <div class="">
                                <button type="submit" value="voucher" class="btn btn-success btn-lg">Ambil Voucher</button>
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        
