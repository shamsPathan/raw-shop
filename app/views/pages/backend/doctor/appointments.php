<?php
include($path . '/layouts/head.php');
include($path . '/layouts/sidebar/doctor.php');
$_SESSION['redirect'] = "/doctor/appointments";
?>

<table class="table table-striped table-hover table-condensed  align-middle">
    <thead>
        <th>SL</th>
        <th>Patient</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Problem</th>
        <th>Mobile</th>
        <th>Hospital</th>
        <th>Date</th>
        <th>Time(24)</th>
        <th>Status</th>
    </thead>

    <tbody>
        <?php foreach ($appointments as $appiontment) : ?>
            <tr>
                <?php  $date = strtotime($appiontment['time'])
                ?>
                <td><?= $appiontment['id'] ?></td>
                <td><?= $appiontment['name'] ?></td>
                <td><?= (date_diff(date_create($appiontment['dob']),date_create(date("Y/m/d"))))->format("%Y years") ?></td>
                <td><?= $appiontment['gender'] ?></td>
                <td><?= $appiontment['problem'] ?></td>
                <td><?= $appiontment['mobile'] ?></td>
                <td><?= $appiontment['hospital_name'] ?></td>
                <td><?= date("j F Y", $date) ?></td>
                <td><?=$appiontment['date']?></td>
                <td><?= ($appiontment['status']==1)?"<a class='btn btn-success' href='/doctor/appointments/".$appiontment['id']."'>Accepted</a>":
                "<a class='btn btn-warning' href='/doctor/appointments/".$appiontment['id']."'>Pending</a>"?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>


<?php
include($path . '/layouts/foot.php');
?>