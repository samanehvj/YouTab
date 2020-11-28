<?php include VIEW . 'layouts/header.php' ?>
<?php // print_r($this); ?>
<!--Start container -->
    <div class="container cart-page ">
    <?php
    if (empty($this->viewData['cartItems'])) {
        echo "<h2 class='text-center mt-5'> Cart is empty </h2>";
    } else {
    ?>
        <div class="card">  <!--Start card -->
            <div class="row"> <!--Start row -->
                <div class="col-md-8 cart"> <!-- start left side ( product list )   -->
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h3 class="summery-title"><b>Shopping Cart</b></h3>
                            </div>
                        </div>
                    </div>

                    <?php foreach($this->viewData['cartItems'] as $i => $cartItem): ?>
                        <div class="row border-top">
                            <div class="row main align-items-center">
                                <div class="col-2">
                                    <img class="img-fluid" src="/<?= $cartItem['product_image'] ?>">
                                </div>
                                <div class="col">
                                    <div class="row text-muted"> <?= $cartItem['product_name'] ?> </div>
                                    <div class="row"> <?= $cartItem['product_color_name'] ?> </div>
                                    <div class="row"> <?= $cartItem['product_color_size_name'] ?> </div>

                                </div>
                                <div class="col">
                                    $ <?= $cartItem['product_price'] ?>
                                    <a href="/product/deleteFromCart/<?= $i ?>">
                                        <span class="close">&#10005;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>



                    <div class="back-to-shop"><a href="/product/products/">&leftarrow;<span class="text-muted">Back to shop</span></a></div>


                </div> <!-- end  left side ( product list )   -->



                <div class="col-md-4 summary"> <!-- start right side ( checkout )   -->
                    <div>
                        <h5 class=summery-title><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">TOTAL</div>
                        <div class="col text-right">$<?=  $this->viewData['totalPrice'] ?></div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select>
                            <option class="text-muted">Standard-Delivery-$20</option>
                        </select>
                    </form>
                    <div class="row">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">$<?= $this->viewData['totalPay'] ?></div>
                    </div> <a href="/home/payment" class="btn">CHECKOUT</a>
                </div>  <!-- end  right side ( checkout )   -->
            </div> <!--end of row -->
        </div> <!--end of card -->
    <?php } ?>
    </div> <!--end of  container -->

<?php include VIEW . 'layouts/footer.php' ?>