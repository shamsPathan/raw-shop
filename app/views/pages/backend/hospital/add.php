<?php
include($path.'/layouts/head.php');
?>    



    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    

                </div>

                <div class="col-md-9">
                    <!-- Website Overview -->
                    <div class="container">
                        <div class="row">
                            <div class="column">
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
                                      <?php foreach($_SESSION['error'] as $error): ?>
                                        <strong>ERROR!</strong><?=$error?>
                                <?php endforeach; ?>
                                    </div>
                                <?php $_SESSION['error'] = null;
                                } ?>


<!-- hospital add section -->
                                <form action="<?= PATH ?>admin/storeHospital" method="POST" enctype="multipart/form-data">
                            

                                    <label for="pname">Name</label>
                                    <input type="text" id="hname" name="name" placeholder="Hospital Name..">

                                    <label for="pmodel">Email</label>
                                    <input type="text" id="hemail" name="email" placeholder="Hospital email..">
                                    
                                    <label for="pmodel">Phone</label>
                                    <input type="text" id="hphone" name="phone" placeholder="Hospital phone..">

                                    <label for="pmodel">Address</label>
                                    <textarea rows="10" type="text" id="haddress" name="address" placeholder="Hospital Address.."></textarea>
      

                                    <input type="submit" value="Add Product">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <?php
include($path.'/layouts/foot.php');
?>