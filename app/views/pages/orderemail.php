
<?php
include_once "../app/views/partial/header.php";
?>


<div id="inventory-invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="#">
                            <h1>COMPANY LOGO</h1>
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="#">
                            Company Name
                            </a>
                        </h2>
                        <div>26 Tower Name, City 123456, INDIA</div>
                        <div>(123) 456-789</div>
                        <div>info@company.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">Rohit Chauhan</h2>
                        <div class="address">B-56 Bulding Name, City, State - India</div>
                        <div class="email"><a href="mailto:test@example.com">test@example.com</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 121</h1>
                        <div class="date">Date of Invoice: 28/11/2018</div>
                        <div class="date">Due Date: 28/11/2018</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>SR NO.</th>
                            <th class="text-left">DESCRIPTION</th>
                            <th class="text-right">UNIT PRICE</th>
                            <th class="text-right">QUANTITY</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
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
                            <td class="total"><?=$pdt->price*$product['qt']?></td>
                        </tr>

                                <?php
                                $subTotal += $pdt->price*$product['qt'];
                            }
                            ?>

                        

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>TK <?=$subTotal?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 25%</td>
                            <td>TK <?=$subTotal*.25?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>TK <?=($subTotal*.25)+$subTotal?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">System Generated Invoice.</div>
                </div>
            </main>
            <footer>
                Invoice was generated on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <div></div>
    </div>
</div>

<script type="text/javascript">

$('#printInvoice').click(function(){
         Popup($('.invoice')[0].outerHTML);
         function Popup(data)
         {
             window.print();
             return true;
         }
     });
</script>


<?php
include_once "../app/views/partial/footer.php";
?>