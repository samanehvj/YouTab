<?php include VIEW . 'layouts/header.php' ?>

<!--Start container -->
    <div class="container cart-page">
        <div class="card">  <!--Start card -->
            <div class="row"> <!--Start row -->
                <div class="col-md-8 cart"> <!-- start left side ( product list )   -->
                    <div class="title">
                        <div class="row">
                            <div class="col">
                                <h4><b>Shopping Cart</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="imgs/skirts/4.jpg">
                            </div>
                            <div class="col">
                                <div class="row text-muted"> A-Line Mini Skirt</div>
                                <div class="row">Beige </div>
                                <div class="row">Small </div>

                            </div>
                            <div class="col">$3000 <span class="close">&#10005;</span></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" src="imgs/skirts/4.jpg"></div>
                            <div class="col">
                                <div class="row text-muted">Short-Sleeeved</div>
                                <div class="row">Black</div>
                                <div class="row">Small</div>
                            </div>
                            <div class="col">$3000 <span class="close">&#10005;</span></div>
                        </div>
                    </div>

                    <div class="back-to-shop"><a href="/product/products/">&leftarrow;<span class="text-muted">Back to shop</span></a></div>


                </div> <!-- end  left side ( product list )   -->



                <div class="col-md-4 summary"> <!-- start right side ( checkout )   -->
                    <div>
                        <h5><b>Summary</b></h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">TOTAL</div>
                        <div class="col text-right">$6000</div>
                    </div>
                    <form>
                        <p>SHIPPING</p>
                        <select>
                            <option class="text-muted">Standard-Delivery-$20</option>
                        </select>            </form>
                    <div class="row">
                        <div class="col">TOTAL PRICE</div>
                        <div class="col text-right">$6,020</div>
                    </div> <a href="/home/payment" class="btn">CHECKOUT</a>
                </div>  <!-- end  right side ( checkout )   -->
            </div> <!--end of row -->
        </div> <!--end of card -->
    </div> <!--end of  container -->

<?php include VIEW . 'layouts/footer.php' ?>