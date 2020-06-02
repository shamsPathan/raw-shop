<div class="htc__login__register bg__white ptb--50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <div class="login">
                            <form action="<?= PATH ?>users/auth" id="loginForm" method="post">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="User Email*" autofocus>
                                    <input class="form-control" type="password" name="password" placeholder="Password*">
                                </div>
                        </div>

                        <!-- <div class="tabs__checkbox" style="text-align:left">
                            You Are :
                            <input type="radio" name="user-type" value="doctor" id="doctor">
                            <label for="doctor" class="btn" style="background:#dddddd;color:black">Doctor</label>
                            <input type="radio" id="patient" name="user-type" value="patient">
                            <label for="patient" class="btn" style="background:#dddddd;color:black">Patient</label>
                            <input type="radio" id="user" checked name="user-type" value="user">
                            <label for="user" class="btn" style="background:#dddddd;color:black">User</label>
                        </div> -->

                        <div class="tabs__checkbox">
                            <input type="checkbox" name="rememberMe">
                            <span> Remember me</span>
                            <span class="forget"><a href="#">Forget Pasword?</a></span>
                        </div>
                        </form>

                        <div class="htc__login__btn mt--30">
                            <a id="loginButton" href="#">Login</a>
                        </div>

                        <div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <li><a class="bg--facebook" href="/ui/logi/facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                                <li><a class="bg--googleplus" href="/ui/logi/google"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                        <form id="regForm" class="login" method="post">
                            <input type="text" placeholder="Name*">
                            <input type="email" placeholder="Email*">
                            <input type="password" placeholder="Password*">
                        </form>
                        <div class="tabs__checkbox">
                            <input type="checkbox">
                            <span> Remember me</span>
                        </div>
                        <div class="htc__login__btn">
                            <a id="regButton">register</a>
                        </div>
                        <div class="htc__social__connect">
                            <h2>Or Login With</h2>
                            <ul class="htc__soaial__list">
                                <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>