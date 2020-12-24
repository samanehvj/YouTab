<?php include VIEW . 'layouts/header.php' ?>
<?php
$c = (isset($_GET['color']) && !empty($_GET['color'])) ? $_GET['color'] : 0;
?>
    <div class="container-fluid product-detail-page">

        <div class="row my-5">

            <div class="col-lg-2 order-2 order-lg-1 d-flex product-detail-thumbs ">

                <?php foreach ($this->viewData->colors[$c]->images as $img): ?>

                <img width="100%" height="auto" src="/<?= $img->img ?>" alt="">

                <?php endforeach; ?>

            </div>


            <div class=" col-lg-6 order-1 order-lg-">
                <div class="larg-cat d-flex flex-column justify-content-between h-100 mb-3 mb-lg-0 p-2  ">
                    <img class="img-fluid w-100" src="/<?= $this->viewData->colors[$c]->images[0]->img ?>">
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
                                   value="<?= $this->viewData->colors[$c]->images[0]->img ?>"
                            />

                            <div class="form-group">
                                <label for="size">Sizes</label>
                                <select name="product_color_size" class="form-control" id="size">

                                    <?php  foreach($this->viewData->colors[$c]->sizes as $size): ?>
                                        <option value="<?= $size->id . "," . $size->size_name ?>">
                                            <?= $size->size_name ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                <select onchange="ccc()" name="product_color" class="form-control" id="color" >

                                    <?php  foreach($this->viewData->colors as $ci => $color): ?>
                                        <option
                                            <?= ($c == $ci) ? 'selected' : '' ?>
                                            value="<?= $color->id . "," . $color->name . "," . $ci?>"
                                        >
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



<script>
    function ccc() {

        colorId = document.getElementById("color").value;
        colorId = colorId.split(',')[2];
        console.log(colorId);
        // Simulate a mouse click:
        window.location.href = '/product/productDetail/<?= $this->viewData->id ?>?color='+colorId;
    }
    //$('#color').on('change', function() {
    //    colorId = document.getElementById("color").value;
    //    colorId = colorId.split(',')[2]);
    //    console.log(colorId);
    //    // Simulate a mouse click:
    //    window.location.href = '/product/productDetail/<?//= $this->viewData->id ?>//?color='+colorId;
    //
    //    // var url = '/product/productDetail/<?////= $this->viewData->id ?>////?color='.$(this).val();
    //    //$(location).attr('href',url);
    //
    //});
</script>










<?php include VIEW . 'layouts/footer.php' ?>