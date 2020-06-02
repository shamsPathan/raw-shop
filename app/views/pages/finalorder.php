<?php
include_once "../app/views/partial/header.php";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
// var_dump($_SESSION['user']);exit;

if(isset($_SESSION['order'])){
  if(isset($_SESSION['order']['success'])){
    $type="success";
    $message = $_SESSION['order']['success'];
  }
  else {
    $type="danger";
    $message = $_SESSION['order']['error'];
  }

?>
      <div class="container wrapper" style="margin-top: 10px">
         <div class="col-md-12 alert alert-<?=$type?>" role="alert">
            <?=ucwords($message)?>
        </div>
       </div>
<?php
}
unset($_SESSION['order']);
?>
<div class="container">    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="<?=PATH?>ui/orderemail" target="_blank">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="<?=PATH?>ui/cart">Edit Cart</a></small></div>
                        </div>
                        
                        <div class="panel-body">
                            
                            <?php
                            $products = $_SESSION['cart'];
                            //print_r($products);exit;
                            $subTotal = 0;
                            $shiping = 1000;
                            $orderTotal = 0;
                            foreach($products as $product){
                                //print_r($product['id']);
                                $pdt = new Product($product['id']);
                                //print_r($pdt->thumb) ;
                                //exit;
                                ?>
                                <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="<?=PATH.$pdt->thumb?>" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?=$pdt->name?></div>
                                    <div class="col-xs-12"><small>Quantity:<span><?=$product['qt']?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>TK </span><?=$pdt->price*$product['qt']?></h6>
                                </div>
                            </div>

                                <?php
                                $subTotal += $pdt->price*$product['qt'];
                            }
                            ?>
                            

                            <div class="form-group"><hr /></div>
                                                      <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>TK </span><span><?=$subTotal?></span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span><?=$shiping?></span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>TK </span><span><?=$subTotal+$shiping?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                	<strong>Country:</strong>
                                </div>
                                <div class="col-md-12">
                                    
                                    <select class="form-control" name="country" id="country">
                                    <option value="0">Select Your Country</option>
                                    <?php
                                    include_once('../app/class/world.class.php');
                                    $api = new World;
                                    $countries = $api->getCountry();
                                    foreach($countries as $country){
                                    ?>
                                        <option value="<?=$country->name?>" id="<?=$country->id?>"><?=$country->name?></option>
                                        <?php
                                    }

                                    ?>
                                    </select>    
                                
                              </div>
                            </div>


                           <div class="form-group">
                                <div class="col-md-12">
                                	<strong>Division:</strong>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control" name="division" id="division">
                                        <option value="" >Select Your Division</option>
                                    </select>  
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>City:</strong>
                                </div>
                                <div class="col-md-12">
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select Your City</option>
                                    </select>  
                                </div>
                            </div>

                            <script>
                            $("#country").on("change", function(){
                                $countryId = $(this).children("option:selected").attr("id");

                            jQuery.getJSON( "/api/get_states/"+$countryId).done(function(a) {
                                //console.log(a);
                                $("#division").empty();
                                $.each(a , function(index, state){
                                        //console.log(state);
                                        $("#division").append( "<option value='"+state.name+"' id='"+state.id+" '>"+state.name+"</option>" )
                                    });
                            });

                        });

                        $("#division").on("change", function(){
                                $divisionId = $(this).children("option:selected").attr("id");

                            jQuery.getJSON( "/api/get_cities/"+$divisionId).done(function(a) {
                                //console.log(a);
                                $("#city").empty();
                                $.each(a , function(index, city){
                                        //console.log(city);
                                        $("#city").append( "<option id='"+city.id+"' value='"+city.name+"'>"+city.name+"</option>" )
                                    });
                            });

                        });
                        </script>


                            <div class="form-group">
                                <div class="col-md-6 col-xs-12">
                                    <strong>First Name:</strong>
                                    <input type="text" name="first_name" class="form-control" value="<?=$user['fname']??null?>" />
                                </div>
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Last Name:</strong>
                                    <input type="text" name="last_name" class="form-control" value="<?=$user['lname']??null?>" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12"><strong>Name Of Hospital:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="hospital" class="form-control" value="<?=$user['hospital']??null?>" />
                                </div>
                            </div>
                              <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" value="<?=$user['address']??null?>" />
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="zip_code" class="form-control" value="<?=$user['zip']??null?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" value="<?=$user['phone']??null?>" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="<?=$user['personal_email']??null?>" /></div>
                            </div>
                        </div>
                    </div>
                
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Payment Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="CreditCardType" name="card_type" class="form-control">
                                        <option value="5">Cash On Delivery</option>
                                    </select>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Confram Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
            </form>
            </div>

            <div class="row cart-footer">
        
        </div>
    </div>





<?php
include_once "../app/views/partial/footer.php";
?>