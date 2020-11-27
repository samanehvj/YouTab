<?php include VIEW . 'layouts/header.php' ?>

    <div class="container"> <!--start container-->

        <div class="row my-5 product-title"> <!--start row-->

            <!-- start row 1  dress-->

            <?php foreach ($this->viewData['products'] as $product): ?>

            <div class="col-md-6 mt-2 col-lg-4 d-flex flex-column justify-contern-center">
               <a href="/product/productDetail/<?= $product->id ?>">
                   <img src="/<?= $product->img ?>" class="img-fluid col-12">
               </a>
                <div class="row mt-2">
                   <div class="col-7">
                       <a class="ml-3" href="/product/productDetail/<?= $product->id ?>"> <?= $product->name ?> </a><br/>
                       <span class="m-3">$<?= $product->price ?></span>
                   </div>
                   <div class="col-4 my-2">
                       <?php  foreach ($product->colors as $pc): ?>

                            <span class="py-1 px-2 ml-1 border border-dark"
                                  style="background-color:#<?= $pc->hex ?> ">
                            </span>

                        <?php endforeach; ?>
                   </div>
                </div>
            </div>

            <?php endforeach; ?>


        </div> <!--end row-->

        <div class="clearfix"></div>

   </div> <!--end container-->


<?php include VIEW . 'layouts/footer.php' ?>