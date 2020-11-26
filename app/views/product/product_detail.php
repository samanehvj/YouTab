<?php include VIEW . 'layouts/header.php' ?>

    <div class="container-fluid product-detail-page">

        <div class="row my-5">

            <div class="col-lg-2 order-2 order-lg-1 d-flex product-detail-thumbs ">

                <?php foreach ($this->viewData->colors[0]->images as $img): ?>

                <img width="100%" height="auto" src="/<?= $img->img ?>" alt="">

                <?php endforeach; ?>

            </div>


            <div class=" col-lg-6 order-1 order-lg-">
                <div class="larg-cat d-flex flex-column justify-content-between h-100 mb-3 mb-lg-0 p-2  ">
                    <img class="img-fluid w-100" src="/<?= $this->viewData->colors[0]->images[0]->img ?>">
                </div>
            </div>


            <div class="col-lg-4 order-3 ">

                <div class="card" >
                    <div class="card-body">
                        <h3 class="card-title"><?= $this->viewData->name ?></h3>
                        <h5>$<?= $this->viewData->price ?></h5>

                        <form action="/product/addToCart" method="post">

                            <input type="hidden" name="product_id" value="<?= $this->viewData->id ?>" />
                            <input type="hidden" name="product_name" value="<?= $this->viewData->name ?>" />
                            <input type="hidden" name="product_price" value="<?= $this->viewData->price ?>" />
                            <input type="hidden" name="product_image"
                                   value="<?= $this->viewData->colors[0]->images[0]->img ?>"
                            />

                            <div class="form-group">
                                <label for="size">Size</label>
                                <select name="product_color_size" class="form-control" id="size">

                                    <?php  foreach($this->viewData->colors[0]->sizes as $size): ?>
                                        <option value="<?= $size->id . "," . $size->size_name ?>">
                                            <?= $size->size_name ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <select name="product_color" class="form-control" id="color">

                                    <?php  foreach($this->viewData->colors as $color): ?>
                                        <option value="<?= $color->id . "," . $color->name ?>">
                                            <?= $color->name ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-dark text-center w-50 "> Place to Cart  </button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>















<?php include VIEW . 'layouts/footer.php' ?>