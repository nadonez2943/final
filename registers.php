<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@400;600&display=swap" rel="stylesheet">
    <seta http-equiv="X-UA-Compatible" content="IE=edge">
    <mcript src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js.js" type="text/javascript"></script>
    <style>
        .avatar {
          vertical-align: middle;
          width: 200px;
          height: 200px;
          border-radius: 200%;
          }
        body{
          font-family: 'IBM Plex Sans Thai', sans-serif;
          }
    </style>
  </head>

<section class="vh-100" style="background-image: linear-gradient(125deg,#f9ca24,#f39c12);">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-7 col-xl-10">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="row">
                  <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                      <p><img src="img/Logo1.png" width= "100%" height="60%"></p>
                      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar" alt="avatar">
                      <h6>อัพโหลดรูปภาพของคุณ</h6>
                      <input type="file" class="text-center center-block file-upload">
                    </div>  
                    </hr>
                    <br>
                  </div>

                  <div class="col-sm-9">
                    <div class="tab-content">
                      <div class="tab-pane active" id="home">
            
              
                        <div class="align-items-center">
                          <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-3 mt-4">สมัครสมาชิกร้านค้าชุมชนเริงราง</p>
                        </div>
              
                        <form class="form" action="##" method="post" id="registrationForm">
                          <hr class="mt-1 mb-4">
                          <div class="row">
                            <div class="col-10 col-sm-4 mb-3">
                                <label for="first_name"><h6>ชื่อ - สกุล</h6></label>
                                <input type="text" class="form-control" name="first_name" id="first_name">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="shop_name"><h6>ชื่อร้านค้า</h6></label>
                                <input type="text" class="form-control" name="shop_name" id="shop_name">
                            </div>
                          

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="email"><h6>อีเมล</h6></label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-10 col-sm-4 mb-3">
                                <label for="password"><h6>รหัสผ่าน</h6></label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="tel"><h6>โทรศัพท์</h6></label>
                                <input type="text" class="form-control" name="tel" id="tel">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="location"><h6>ที่อยู่ปัจจุบัน</h6></label>
                                <input type="text" class="form-control" name="location" id="location">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-10 col-sm-4 mb-3">
                                <label for="road"><h6>ถนน</h6></label>
                                <input type="text" class="form-control" name="road" id="road">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="alley"><h6>ตรอก/ซอย</h6></label>
                                <input type="text" class="form-control" name="alley" id="alley">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="province"><h6>จังหวัด</h6></label>
                                <input type="text" class="form-control" name="province" id="province">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-10 col-sm-4 mb-3">
                                <label for="district"><h6>อำเภอ</h6></label>
                                <input type="text" class="form-control" name="district" id="district">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="county"><h6>ตำบล</h6></label>
                                <input type="text" class="form-control" name="county" id="county">
                            </div>

                            <div class="col-10 col-sm-4 mb-3">
                                <label for="zip_code"><h6>รหัสไปรษณีย์</h6></label>
                                <input type="text" class="form-control" name="zip_code" id="zip_code">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>&emsp;
                                <button class="btn btn-lg btn-danger" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                          </div>
            
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>