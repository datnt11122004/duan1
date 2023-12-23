<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/background-login.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="index.php?act=login" role="form" method="post">
                                <div class="form-group">
                                    <label for="signin-email">Email</label>
                                    <input type="text" class="form-control" id="signin-email" name="signin-email">
                                    <span class="error-message"><?=$_SESSION['error']['signin-email'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="signin-password">Password *</label>
                                    <input type="password" class="form-control" id="signin-password" name="signin-password">
                                    <span class="error-message"><?=$_SESSION['error']['signin-password'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    <a class="nav-link forgot-link" id="forgotpassword-tab-2" data-toggle="tab" href="#forgotpassword-2" role="tab" aria-controls="forgotpassword-2" aria-selected="false">Forgot password</a>


                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                            <form action="index.php?act=signup" role="form" method="post">
                                <div class="form-group">
                                    <label for="register-email">Your email address *</label>
                                    <input type="email" class="form-control" id="register-email" name="register-email">
                                    <span class="error-message"><?=$_SESSION['error']['register-email'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-user-name">User name</label>
                                    <input type="text" class="form-control" id="register-user-name" name="register-user-name">
                                    <span class="error-message"><?=$_SESSION['error']['register-user-name'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-password">Password</label>
                                    <input type="password" class="form-control" id="register-password" name="register-password">
                                    <span class="error-message"><?=$_SESSION['error']['register-password'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-tel">Telephone</label>
                                    <input type="text" class="form-control" id="register-tel" name="register-tel">
                                    <span class="error-message"><?=$_SESSION['error']['register-tel'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="register-address">Address</label>
                                    <textarea  class="form-control" id="register-address" name="register-address"></textarea>
                                    <span class="error-message"><?=$_SESSION['error']['register-address'] ?? ''?></span>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2" name="signup-btn">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                        <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                    </div><!-- End .custom-checkbox -->
                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->

                        <div class="tab-pane fade" id="forgotpassword-2" role="tabpanel" aria-labelledby="forgotpassword-tab-2">
                            <form action="#">
                                <div class="form-group">
                                    <label for="register-email-2">Your email address *</label>
                                    <input type="email" class="form-control" id="register-email-2" name="register-email" required>
                                </div><!-- End .form-group -->

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                </div><!-- End .form-footer -->
                            </form>
                            <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->
</main><!-- End .main -->
<?php unset($_SESSION['error'])?>