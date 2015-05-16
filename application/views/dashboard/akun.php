<!-- content -->
    <div class="container">
      <h2 style="padding-top: 40px; margin-bottom:3%; text-align:center">Online Ticketing</h2>
      <hr  style="border-top: 1px solid #5BADD7">
      

            <div class="row">
                <div class="col-md-8">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne" style="padding-left: 30px; padding-right: 30px;">
                        <h2 class="panel-title" style="text-align:center">
                          Tata cara membeli tiket Seminar Entrepreneurship!
                        </h2>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body" style="padding-left: 30px; padding-right: 30px;">
                          <div class="row" style="">
                            <div class="col-sm-11" style="text-align: justify;">
                              <p>Untuk membeli tiket melalui Haiunair, Anda diharuskan untuk melewati beberapa tahap berikut:<br>
                              1. Membuat akun pada Haiunair Ticketing<br>
                              2. Memilih banyak tiket yang akan dibeli<br>
                              3. Mengisi data diri Anda<br>
                              4. Mengambil kode voucher<br>
                              5. Melakukan pembayaran via ATM sebanyak jumlah yang tertera pada kode voucher<br>
                              6. Melakukan konfirmasi pembayaran<br>
                              7. Menyimpan dan mencetak tiket acara yang sudah Anda beli
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="well" style="padding: 50px;background-color: #fff;" id="akun">
                        <ul class="nav nav-pills">
                            <li class="<?php if($this->input->get("s")!="login"){ echo "active";} ?>"  ><a href="#buatakun" data-toggle="tab">Buat Akun</a></li>
                            <li class="<?php if($this->input->get("s")=="login"){ echo "active";} ?>"><a href="#login" data-toggle="tab">Login Akun</a></li>
                        </ul>
                        <div class="tab-content" style="border-top: #58AED7 SOLID 0.15em;margin-top: 20px;">
                            <div class="<?php if($this->input->get("s")=="login"){ echo "tab-pane fade";} else { echo "tab-pane active in";} ?>" id="buatakun">
                                <div class="row" style="margin-top:10px; padding:20px">
                                    <?php if ($this->input->get('act')=="success"): ?>
                                      <div class="alert alert-success" role="alert">
                                          Akun Anda telah berhasil dibuat. Silahkan login di tab menu login akun
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('error')=="email"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Maaf email tersebut sudah digunakan
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('error')=="lengthpass"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Minimal password yang harus Anda masukkan adalah 5 digit
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('error')=="pass"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Mohon ulangi password Anda dengan benar
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('error')=="blank"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Maaf Anda harus mengisi form registrasi ini dengan lengkap
                                      </div>
                                    <?php endif ?>
                                    <?php if (($this->input->get('error')==null && $this->input->get('act')==null)): ?>
                                      <div class="alert alert-info">
                                          Untuk membeli tiket event ini Anda harus membuat akun
                                      </div>
                                    <?php endif ?>
                                    <div class="">
                                        <form class="form-horizontal" action="" method="post">
                                          <div class="form-group">
                                            <label for="inputEmail3" style="font-weight: 100;text-align: left;" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-9">
                                              <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Masukkan email" value="<?php echo $this->session->flashdata('email'); ?>">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputPassword4" style="font-weight: 100;text-align: left;" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-9">
                                              <input type="password" class="form-control" id="inputPassword4" name="pswd" placeholder="Masukkan password">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputPassword3" style="font-weight: 100;text-align: left;" class="col-sm-3 control-label">Re - Password</label>
                                            <div class="col-sm-9">
                                              <input type="password" class="form-control" id="inputPassword3" name="repswd" placeholder="Masukkan ulang password">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                              Sudah punya akun haiunair ticketing? silahkan login <a href="<?php echo base_url(); ?>akun?s=login#akun">disini</a>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                              <input type="submit" class="btn btn-default" value="Buat Akun" name="buat">
                                            </div>
                                          </div>

                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="<?php if($this->input->get("s")!="login"){ echo "tab-pane fade";} else { echo "tab-pane active in";} ?>" id="login">
                                <div class="row" style="margin-top:10px; padding:20px">
                                    <?php if ($this->input->get('act')=="notallow"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Maaf Anda harus login terlebih dahulu
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('errorl')=="blank"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Silahkan mengisi form login berikut dengan lengkap
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('errorl')=="invalid"): ?>
                                      <div class="alert alert-danger" role="alert">
                                          Maaf email atau password yang Anda inputkan salah
                                      </div>
                                    <?php endif ?>
                                    <?php if ($this->input->get('errorl')==null): ?>
                                      <div class="alert alert-success">
                                          Silahkan login menggunakan akun ticketing yang pernah Anda buat
                                      </div>
                                    <?php endif ?>
                                    <form class="form-horizontal" method="post">
                                      <div class="form-group">
                                        <label for="inputEmail3" style="font-weight: 100;text-align: left;" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control" name="username" id="inputEmail3" placeholder="Masukkan email">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="inputPassword4" style="font-weight: 100;text-align: left;" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Masukkan password">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              Belum punya akun haiunair ticketing? silahkan buat akun <a href="<?php echo base_url(); ?>/akun#akun">disini</a>
                                            </div>
                                          </div>
                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <input type="submit" class="btn btn-default" value="login" name="login" />
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of well -->

                    <!-- well 2 -->

                    <!-- end of well 2 -->
                </div>
                <div class="col-md-4" >

                    <div class="well" style="min-height: 640px; background-color: #FFF;">
                        <br>
                        <a href="http://www.haiunair.com/assets/img/fk_dk"><img src="http://www.haiunair.com/assets/poster/Seminar201504305757.JPG" class="img img-responsive"></a>
                        <br>
                        <h4>Seminar Entrepreneurship</h4>
                        <br>Harga tiket : 12.500,- /tiket
                        <br>Min pembelian : 2 tiket
                        <br>Tanggal : 23 Mei 2015
                        <br>Tempat : ACC kampus C Unair
                    </div>
                </div>
                
            </div>
