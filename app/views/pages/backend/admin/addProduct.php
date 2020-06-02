<?php
include($path . '/layouts/head.php');
include($path . '/layouts/sidebar/admin.php');
$_SESSION['redirect'] = "/patient/appointments/new";
?>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <!-- Website Overview -->
            <div class="container">
                <div class="row">
                    <div style="width: 100%;">
                        <?php
                        if ($_SESSION['success'] ?? null) {
                        ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong><?= $_SESSION['success'] ?>
                            </div>
                        <?php $_SESSION['success'] = null;
                        } ?>
                        <?php

                        if ($_SESSION['error']['path'] ?? null) {
                        ?>
                            <div class="alert alert-danger">
                                <?php foreach ($_SESSION['error'] as $error) : ?>
                                    <strong>ERROR!</strong><?= $error ?>
                                <?php endforeach; ?>
                            </div>
                        <?php $_SESSION['error'] = null;
                        } ?>

                        <form action="<?= PATH ?>admin/saveProduct" method="POST" enctype="multipart/form-data">

                            <label class="mt-2" for="department">Select Department</label>

                            <select class="form-control" id="department" name="department">
                                <option value="0">Select Department</option>
                                <?php
                                foreach ($_SESSION['website']['dpt'] as $index => $dpt) {
                                ?>
                                    <option value="<?= $dpt->id ?>"><?= $dpt->nameEN ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <label class="mt-2" for="category">Select Category</label>

                            <select class="form-control" id="category" name="category">
                            </select>


                            <label class="mt-2" for="subcategory">Select Subcategory</label>

                            <select class="form-control" id="subcategory" name="subcategory">

                            </select>

                            <label class="mt-2" for="pname">Products Name</label>
                            <input class="form-control" type="text" id="pname" name="name" placeholder="Product Name..">

                            <label class="mt-2" for="pmodel">Product Model</label>
                            <input class="form-control" type="text" id="pmodel" name="model" placeholder="Product Model..">

                            <label class="mt-2" for="price"> Product Price</label>
                            <input class="form-control" type="text" id="pname" name="price" placeholder="Price(in Tk.)">

                            <label class="mt-2" for="pstock">Product Stock</label>
                            <select class="form-control" id="pstock" name="stock">
                                <option value="1">In Stock</option>
                                <option value="0">No Stock</option>
                            </select>

                            <label class="mt-2" for="rating">Product Rating</label>
                            <select class="form-control" id="rating" name="rating">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>


                            <div class="form-group">
                                <label>Product Short Discription</label>
                                <textarea name="psd" id="psd" class="form-control summernote" placeholder="Page Body"></textarea>
                            </div>


                            <!-- Create the editor container -->
                            <div class="form-group">
                                <label>Product "Full Discription</label>
                                <textarea name="pfd" rows="10" id="editor" class="form-control summernote">
                    </textarea>


                            </div>
                            <!-- Create the editor container -->




                            <div class="form-group">
                                <label>Product Feture & Sepcification</label>
                                <textarea id="summernote" name="pfs" id="pfs" class="form-control summernote" placeholder="Page Body"></textarea>
                            </div>

                            <!-- File Button -->
                            <div class="form-group">
                                <label class="mt-2" for="pi1">Add product Image-1</label>
                                <div>
                                    <input class="form-control" id="pi1" name="pi1" class="input-file" type="file">
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="mt-2" for="pi2">Add Product Image-2</label>
                                <div>
                                    <input class="form-control" id="pi2" name="pi2" class="input-file" type="file">
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="mt-2" for="pi3">Add Product Image-3</label>
                                <div>
                                    <input class="form-control" id="pi3" name="pi3" class="input-file" type="file">
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="mt-2" for="pi4">Add Product Image-4</label>
                                <div>
                                    <input class="form-control" id="pi4" name="pi4" class="input-file" type="file">
                                </div>
                            </div>
                            <!-- File Button -->
                            <div class="form-group">
                                <label class="mt-2" for="pi5">Add Product Image-5</label>
                                <div>
                                    <input class="form-control" id="pi5" name="pi5" class="input-file" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mt-2" for="pc">Product Cataloge</label>
                                <div>
                                    <input class="form-control" id="pc" name="pc" class="input-file" type="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mt-2" for="pm">Upload Manual</label>
                                <div>
                                    <input class="form-control" id="pm" name="pm" class="input-file" type="file">
                                </div>
                            </div>


                            <input class="form-control" type="submit" value="Add Product">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include($path . '/layouts/foot.php');
?>