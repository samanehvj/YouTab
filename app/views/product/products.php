<?php include VIEW . 'layouts/header.php' ?>

    <div class="container"> <!--start container-->

        <div class="row my-5 product-title"> <!--start row-->

            <form class="form-inline col-12 mr-2" method="get" action="/product/products/">
                <select name="category" class="form-control  custom-select mb-2 mr-sm-2">
                    <option class="" value="">Filter by category</option>
                    <?php foreach ($this->viewData['categories'] as $category): ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="color" class="custom-select form-control mb-2 mr-sm-2">
                    <option value="">Filter by color</option>
                    <?php foreach ($this->viewData['colors'] as $color): ?>
                        <option value="<?= $color->id ?>"><?= $color->name ?></option>
                    <?php endforeach; ?>
                </select>



                <button type="submit" class="btn btn-dark text-light mb-2">Filter</button>
            </form>

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