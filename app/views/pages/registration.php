<div class="htc__login__register bg__white ptb--50">
    <div class="container">
        <!-- Start Login Register Content -->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="htc__login__register__wrap">
                    <!-- Start Single Content -->
                    <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                        <div class="login">
                            <form action="<?= PATH ?>users/register" id="regiForm" method="post">
                                <div class="form-group">
                                   <h2 style="margin-bottom:1em">Register as</h2>
                                   <input type="hidden" name="type" value="none" id="input-type">
                                   <button onclick="regiType(event,'customer')" class="btn btn-success" style="padding:1em">Customer</button>
                                   <button onclick="regiType(event,'doctor')" class="btn btn-success" style="padding:1em">Doctor</button>
                                   <button onclick="regiType(event,'patient')" class="btn btn-success" style="padding:1em">Patient</button>
                                   <button onclick="regiType(event,'hospital')" class="btn btn-success" style="padding:1em">Hospital</button>
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
                        </form>
                    </div>

                    <script>
                        function regiType(event, type){
                            event.preventDefault();
                            let inputType = document.getElementById('input-type');
                            inputType.value = type;
                            document.getElementById('regiForm').submit();
                            console.log(inputType);
                        }
 
                    </script>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        <!-- End Login Register Content -->
    </div>
</div>