<?php
include($path . '/layouts/head.php');
include($path . '/layouts/sidebar/doctor.php');
$_SESSION['redirect'] = "/doctor/appointments";
?>

<table class="table table-striped table-hover table-condensed  align-middle">
    <thead>
        <th>Patient ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Weight</th>
        <th>Problem</th>
        <th>Report Type</th>
        <th>X-Ray</th>
        <th>Images</th>
        <th>Doctor</th>
        <th>Status</th>
    </thead>

    <tbody>
        <?php foreach ($reports as $report) : ?>
            <tr>
                <td><?= $report['patient_id'] ?></td>
                <td><?= $report['patient_name'] ?></td>
                <td><?= $report['gender'] ?></td>
                <td><?= $report['dob'] ?></td>
                <td><?= $report['weight'] ?></td>
                <td><?= $report['problem'] ?></td>
                <td><?= $report['report_type'] ?></td>
                <td><?php
                foreach($xrays as $ray){
                    if($report['report_sub_type']==$ray['id']) echo $ray['name'];
                } ?>
                </td>
                <td>Images</td>
                <th><?= $report['doctor_name']?></th>
                <th><?= $report['status']==0?'<button class="btn btn-info">See</button>':'<button class="btn btn-success">Done</button>'?></th>
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>
<?php
include($path . '/layouts/foot.php');
?>