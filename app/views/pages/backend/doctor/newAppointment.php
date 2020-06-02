<?php
include($path . '/layouts/head.php');
include($path . '/layouts/sidebar/doctor.php');
$_SESSION['redirect'] = "/doctor/appointments";
?>

<div class="page-content container">
    <div class="page-header">
        <h1 class="page-title text-primary-d2">
            Make Appointment
            <small class="page-info text-secondary-d2">
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
                    unset($_SESSION['success']);
                } else {
                    echo "<i class='fa fa-angle-double-right text-80'></i>Please fill all data";
                }
                ?>
            </small>
        </h1>
    </div>


    <form id="doctor-appointment" action="/reception/updateAppointment" method="post">
        <input type="hidden" name="patient_id" value="<?=$appointment['patient_id'] ?>">
        <input type="hidden" name="id" value="<?=$appointment['id'] ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">Patient Name</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="name" value="<?= $appointment['name'] ?>" type="text" class="form-control" id="id-form-field-1">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        <label for="id-form-field-1" class="mb-0">Patient Mobile</label>
                    </div>
                    <div class="col-sm-9">
                        <input name="mobile" value="<?= $appointment['mobile'] ?>" type="text" class="form-control" id="id-form-field-1">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Date Of Birth
                    </div>

                    <div class="col-sm-9">
                        <input name="dob" value="<?= $appointment['dob'] ?>" class="datepickerAge form-control form-control-lg  d-inline-block mb-1 mb-md-0" placeholder="yy/mm/dd">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Gender
                    </div>

                    <div class="col-sm-9">

                        <select name="gender" class="form-control form-control-lg  d-inline-block mb-1 mb-md-0" id="form-field-select-1">
                            <option value=""></option>
                            <option value="Male" <?= $appointment['gender'] == 'male' ? 'selected' : null ?>>Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Weight (KG)
                    </div>

                    <div class="col-sm-9">
                        <input name="weight" value="<?= $appointment['weight'] ?>" type="number" class="form-control form-control-lg  d-inline-block mb-1 mb-md-0">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Date
                    </div>

                    <div class="col-sm-9">
                        <input name="time" value="<?= $appointment['time'] ?>" class="datepicker form-control form-control-lg  d-inline-block mb-1 mb-md-0" placeholder="yy/mm/dd">
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Guardian Name
                    </div>

                    <div class="col-sm-9">
                        <input name="guardian_name" value="<?= $appointment['guardian_name'] ?>" type="text" class="form-control form-control-lg  d-inline-block mb-1 mb-md-0">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Guardian Relation
                    </div>

                    <div class="col-sm-9">
                        <input name="guardian_relation" value="<?= $appointment['guardian_relation'] ?>" type="text" class="form-control form-control-lg  d-inline-block mb-1 mb-md-0">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Patient Problem
                    </div>

                    <div class="col-sm-9">
                        <textarea name="problem" class="form-control form-control-lg  d-inline-block mb-1 mb-md-0"><?= $appointment['problem'] ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Hospital
                    </div>

                    <div class="col-sm-9">
                        <select name="hospital" class="form-control form-control-lg  d-inline-block mb-1 mb-md-0" id="form-field-select-1">
                            <option value="">Select Hospital</option>
                            <?php
                            foreach ($hospitals as $hospital) : ?>
                                <option value="<?= $hospital['id'] ?>" <?= ($appointment['hospital'] == $hospital['id']) ? 'selected' : null ?>> <?= $hospital['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-form-label text-sm-right pr-0">
                        Select Time
                    </div>

                    <div class="col-sm-9">
                    <input name="date" value="<?= $appointment['date'] ?>" class="time-picker form-control form-control-lg  d-inline-block mb-1 mb-md-0">
                    </div>
                </div>
            </div>
        </div>



        <div class="my-5 border-t-1 brc-grey-l1 bgc-grey-l3 py-3">
            <div class="offset-md-3 col-md-9">
                <button class="btn btn-info" type="submit">
                    <i class="fa fa-check mr-1"></i>
                    Accept
                </button>

                <button class="btn btn-secondary ml-3" onclick="rejectA(event);">
                    <i class="fa fa-undo mr-1"></i>
                    Decline
                </button>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    function rejectA(event){
        event.preventDefault();
       let form = document.getElementById('doctor-appointment');
       form.action = "/reception/declineAppointment"; 
       form.submit();
    }
</script>
<?php
include($path . '/layouts/foot.php');
?>