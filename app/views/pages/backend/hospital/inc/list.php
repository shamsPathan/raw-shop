<table class="table table-striped table-hover table-condensed  align-middle">
<thead class="bg-primary">
    <th>SL</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
</thead>

<tbody>
<?php foreach($hospitals as $hospital): ?>
<tr>
    <td><?=$hospital->id?></td>
    <td><?=$hospital->name?></td>
    <td><?=$hospital->email?></td>
    <td><?=$hospital->phone?></td>
    <td><?=$hospital->address?></td>
</tr>
<?php endforeach;?>
</tbody>


</table>
