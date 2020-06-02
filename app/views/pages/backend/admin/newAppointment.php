<?php
include($path . '/layouts/head.php');
include($path . '/layouts/sidebar/admin.php');
$_SESSION['redirect'] = "/patient/appointments/new";
?>

<table class="table table-striped table-hover table-condensed  align-middle">
    <thead>
        <th>SL</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Hospital</th>
        <th>Department</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
    </thead>

    <tbody>
        <?php foreach ($appiontments as $appiontment) : ?>
            <tr>
                <?php  $date = strtotime($appiontment['time']) ?>
                <td><?= $appiontment['id'] ?></td>
                <td><?= $appiontment['name'] ?></td>
                <td><?= $appiontment['mobile'] ?></td>
                <td><?= $appiontment['hospital_name'] ?></td>
                <td><?= $appiontment['department_name'] ?></td>
                <td><?= $appiontment['doctor_name'] ?></td>
                <td><?= date("j F Y", $date) ?></td>
                <td><?= $appiontment['date']?></td>
                <td><?= ($appiontment['status']==1)?'Accepted':'Pending' ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>


<?php
include($path . '/layouts/foot.php');
?>