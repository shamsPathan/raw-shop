<table class="table table-striped table-hover table-condensed text-center align-middle">
<thead class="bg-primary">
    <th>SL</th>
    <th>Code</th>
    <th>Name</th>
    <th>Brand</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Image</th>
    <th>Published</th>
    <th></th>
</thead>

<tbody class="align-center">
<?php foreach($products as $product): ?>
<tr>
    <td><?=$product->id?></td>
    <td><?=$product->model?></td>
    <td><?=$product->name?></td>
    <td><?=$product->model?></td>
    <td><?=$product->price?></td>
    <td><?=$product->stock?></td>
    <td> <img width="80px" height="80px" src="<?=SITE_URL.$product->thumb?>" alt=""> </td>
    <td><?=(int)$product->active?'Yes':'No'?></td>
    <td>
    <?=(int)$product->active?
    '<a href="/admin/makeProductDeactive/'.$product->id.'" class="btn btn-sm btn-danger">Deactive</a>':
    '<a href="/admin/makeProductActive/'.$product->id.'" class="btn btn-sm btn-danger">Active</a><a href="#" class="btn btn-sm btn-info">Edit</a>'?>
    </td>
</tr>
<?php endforeach;?>
</tbody>


</table>
