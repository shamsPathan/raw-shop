<div class="htc__login__register bg__white ptb--20">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="login__register__menu" role="tablist">
                    <li role="presentation" class="register active"><a href="#register" role="tab" data-toggle="tab">Register (Patient)</a></li>
                </ul>
            </div>
        </div>
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <div class="login">
                            <form id="regForm" action="<?= PATH ?>users/goreg" method="post">
                                <input type="text" placeholder="First Name*" name="fname">
                                <input type="text" placeholder="Last Name*" name="lname">
                                <input type="email" placeholder="Email*" name="email">
                                <input type="number" placeholder="Mobile*" name="mobile">
                                <input type="password" placeholder="Password*" name="password">
                                <input type="password" placeholder="Comfirm Password*" name="password_confirm">
                                <input type="hidden" name="type" value="patient">
                        </div>
                        </form>
                        <div class="htc__login__btn mt--30">
                            <a id="regButton" href="#">Register</a>
                        </div>
                        <div class="htc__social__connect">
                            <!-- <h2>Or Login With</h2> -->
                            <!-- <ul class="htc__soaial__list">
                                <li><a class="bg--twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a class="bg--instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                <li><a class="bg--facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a class="bg--googleplus" href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                            </ul> -->
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>


