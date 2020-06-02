<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="<?=PATH?>css/orderemail.css">
    <style type="text/css">
         @page { margin: 0px 0px 0px 0px; }
        header { position: fixed; width: 100%; top: 0px;}
        footer { 
            position: fixed;
            bottom:60px;
            width: 100%;
            text-align: center;
            }
        p { page-break-after: always; }
        p:last-child { page-break-after: never; }
    </style>
</head>

<body>

<div id="inventory-invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col-md-12">
                        <a target="_blank" href="<?=PATH?>">
                            <img src="./images/logo/iheader.png" alt="" width="100%">
                            </a>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col col-md-7 invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <div class="to"><?=ucwords($_POST['first_name']??"Empty")." ".ucwords($_POST['last_name']??"Empty")?></div>
                        <div class="address"><?=ucwords($_POST['address']??"Empty")?>, <?=ucwords($_POST['city']??"Empty")?>, <?=ucwords($_POST['division']??"Empty")?> - <?=ucwords($_POST['country']??"Empty")?></div>
                        <div class="email"><a href="mailto:test@example.com"><?=ucwords($_POST['email_address']??"Empty")?></a></div>
                        <div class="mobile"><a href="tel:+88<?=(int)$_POST['phone_number']??"Empty"?>"><?=(string)$_POST['phone_number']??"Empty"?></a></div>
                    </div>
                    <div class="col col-md-5 invoice-details">
                        <div class="invoice-id">INVOICE NO:<?=$token??"***"?></div>

                    <div class="date">Date of Invoice: <?=date("d/m/Y");?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th class="text-left">Desctiption</th>
                            <th class="text-right">Unit Price</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Total Price</th>
                        </tr>
                    </thead>
                    <div id="watermark">MSB</div>
                    <tbody>
                       <?php
                            $products = $_SESSION['cart'];
                            //print_r($products);exit;
                            $subTotal = 0;
                            $shiping = 1000;
                            $orderTotal = 0;
                            foreach($products as $index=>$product){
                                //print_r($product['id']);
                                $pdt = new Product($product['id']);
                                //echo $pdt->thumb;
                                //exit;
                                ?>
                        <tr>
                            <td class="no"><?=$index+1?></td>
                            <td class="text-left"><h3><?=$pdt->name?></h3><?=$pdt->model?></td>
                            <td class="unit">TK <?=$pdt->price?></td>
                            <td class="tax"><?=$product['qt']?></td>
                            <td class="total">TK <?=$pdt->price*$product['qt']?></td>
                        </tr>
                                <?php
                                $subTotal += $pdt->price*$product['qt'];
                            }
                            ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Sub Total</td>
                            <td>TK <?=$subTotal?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 5%</td>
                            <td>TK <?=$subTotal*.25?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Grand Total =</td>
                            <td>TK <?=($subTotal*.25)+$subTotal?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">We will contact soon after completed products delivery</div>
                </div>
            </main>
            <footer>
                            <div class="row">
                                    <div class="col-md-12">
                                            <a target="_blank" href="#">
                                                    <img src="./images/logo/ifooter.png" alt="" width="100%">
                                                    </a>
                                    </div>

                            </div>
            </footer>
        </div>
        <div></div>
    </div>
</div>

</body>
</html>
