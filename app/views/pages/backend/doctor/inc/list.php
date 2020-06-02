<table class="table table-striped table-hover table-condensed  align-middle">
<thead class="bg-primary">
    <th>SL</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Hospital</th>
    <th>Qualification</th>
</thead>

<tbody>
<?php foreach($doctors as $doctor): ?>
<tr>
    <td><?=$doctor->id?></td>
    <td><?=$doctor->name?></td>
    <td><?=$doctor->email?></td>
    <td><?=$doctor->phone?></td>
    <td><?=$doctor->address?></td>
    <td><?=$doctor->hospital?></td>
    <td><?=$doctor->qualification?></td>
</tr>
<?php endforeach;?>
</tbody>


</table>
