<div class="cart-main-area ptb--10 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-content table-responsive">
                    <table id="cartTable">
                        <thead>
                            <tr>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody id="cartRow">
                            <tr id="productID">
                                <td class="product-thumb"><a href="#"><img style="height: 150px;width: 100%" src="<?= PATH ?>images/product/4.png" alt="product img" /></a></td>
                                <td class="product-name"><a id="productName" href="">Demo</a></td>
                                <td class="product-price">Tk <span id="productPrice" class="amount">000.00</span></td>
                                <td class="product-quantity"><input id="productQuantity" onclick="updateQt(this)" type="number" value="1" /></td>
                                <td class="product-subtotal">TK <span class="prices" id="productSubTotal">000.00</span></td>
                                <td class="product-remove"><button class=" btn btn-danger itemRemove" onclick="removeThisItem(this)">X</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="buttons-cart">
                            <a href="<?= PATH ?>">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5 col-xs-12">
                        <div class="cart_totals">
                            <h2>Cart Totals</h2>
                            <h1>
                                <span class="amount">TK. <span id="total">00.00</span>
                            </h1>
                            <div class="wc-proceed-to-checkout">
                                <a href="<?= PATH ?>ui/finalorder">Place That Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>