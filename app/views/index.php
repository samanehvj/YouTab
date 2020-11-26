<?php include VIEW . 'layouts/header.php' ?>

    <!--start hero image -->
    <div class="container-fluid  ">
        <img src="/imgs/hero-home.jpg" class="img-fluid w-100  ">
    </div> <!--end hero image -->




<!--start container-->
    <div  class="container">
        <div class="row my-5 text-home"> <!--row -->
            <div class=" col-lg-6"> <!--start left cat-->
                <div class="larg-cat d-flex flex-column justify-content-between h-100 mb-3 mb-lg-0 p-2 border border-dark">
                    <img class="img-fluid mh-50 w-100" src="<?= $this->viewData['topCategories'][2]->img ?> ">
                    <h1 class="text-center my-3 home-titile"><?= $this->viewData['topCategories'][2]->name ?></h1>
                    <p class="py-3 px-5 text-center text-lg-left text-cat">
                        <?= $this->viewData['topCategories'][2]->info ?>
                    </p>
                    <div class="text-center mt-5">
                        <a href="products/category/<?= $this->viewData['topCategories'][2]->id ?>" class="btn btn-dark  text-center collection">View collection </a>
                    </div>
                </div>
            </div> <!--end left cat-->
            <div class=" col-lg-6 d-flex flex-column justify-content-between">  <!--start right cat-->
                <div class="col-12 small-cat mb-4 p-2 border border-dark">
                    <img class="img-fluid w-100" src="<?= $this->viewData['topCategories'][1]->img ?>">
                    <h1 class="text-center my-3"><?= $this->viewData['topCategories'][1]->name ?></h1>
                    <div class="text-center">
                        <a href="products/category/<?= $this->viewData['topCategories'][0]->id ?>" class="btn btn-dark text-center">View collection </a>
                    </div>
                </div>
                <div class="col-12 small-cat p-2 border border-dark">
                    <img class="img-fluid w-100" src="<?= $this->viewData['topCategories'][0]->img ?>">
                    <h1 class="text-center my-3"><?= $this->viewData['topCategories'][0]->name ?></h1>
                    <div class="text-center btn-cat">
                        <a href="products/category/<?= $this->viewData['topCategories'][0]->id ?>" class="btn btn-dark text-center">View collection </a>
                    </div>
                </div>
            </div> <!--end right-top cat-->
        </div> <!--end of  row-->




        <h1 class="text-center my-5 display-4 popular "> Most popular products in YouTab </h1>

            <div class="row my-5"> <!-- start row of Most famous product-->
                <div class=" col-lg-6"> <!-- start row of dress left side  famous product-->
                    <div class="larg-cat d-flex flex-column justify-content-between h-100 mb-3 mb-lg-0 p-2  ">
                        <img class="img-fluid w-100" src="<?= $this->viewData['topProducts'][0]->img ?>">
                    </div>
                </div> <!-- end row of dress left side  famous product-->

                <div class="col-lg-6 row product-list">

                    <div class=" col-lg-6 ">  <!--start right cat-->
                        <div class="col-12 small-cat mb-4 p-2 k">
                            <img class="img-fluid w-100" src="<?= $this->viewData['topProducts'][1]->img ?>">
                            <h5 class="products-text mx-4 my-2">
                                <?= $this->viewData['topProducts'][1]->name ?>
                            </h5>
                            <h5 class="mx-4 my-2">
                                $<?= $this->viewData['topProducts'][1]->price ?>
                            </h5>
                        </div>
                    </div>


                    <div class=" col-lg-6 ">  <!--start right cat-->
                        <div class="col-12 small-cat mb-4 p-2 k">
                            <img class="img-fluid w-100" src="<?= $this->viewData['topProducts'][2]->img ?>">
                            <h5 class="products-text mx-4 my-2">
                                <?= $this->viewData['topProducts'][2]->name ?>
                            </h5>
                            <h5 class="mx-4 my-2">
                                $<?= $this->viewData['topProducts'][2]->price ?>
                            </h5>
                        </div>
                    </div>



                    <div class=" col-lg-6 ">  <!--start right cat-->
                        <div class="col-12 small-cat mb-4 p-2 k">
                            <img class="img-fluid w-100" src="<?= $this->viewData['topProducts'][3]->img ?>">
                            <h5 class="products-text mx-4 my-2">
                                <?= $this->viewData['topProducts'][3]->name ?>
                            </h5>
                            <h5 class="mx-4 my-2">
                                $<?= $this->viewData['topProducts'][3]->price ?>
                            </h5>
                        </div>
                    </div>


                    <div class=" col-lg-6 ">  <!--start right cat-->
                        <div class="col-12 small-cat mb-4 p-2 k">
                            <img class="img-fluid w-100" src="<?= $this->viewData['topProducts'][4]->img ?>">
                            <h5 class="products-text mx-4 my-2">
                                <?= $this->viewData['topProducts'][4]->name ?>
                            </h5>
                            <h5 class="mx-4 my-2">
                                $<?= $this->viewData['topProducts'][4]->price ?>
                            </h5>
                        </div>
                    </div>


                </div>
            </div>

        </div> <!--end container-->




<?php include VIEW . 'layouts/footer.php' ?>