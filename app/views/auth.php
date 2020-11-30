<?php include VIEW . 'layouts/header.php' ?>

<div class="container auth-page">
<!--    start auth-page-->
    <div class=" d-flex justify-content-center mt-5 mb-5">
        <div class="w-100 bg my-5 d-flex justify-content-around flex-row flex-wrap">
            <div class="col-lg-5 bg login-text d-flex flex-column justify-content-around">
                <h3 class="text-center ">LOGIN TO ACCOUNT</h3>

                <form method="post" action="/user/login" >
                    <div class="form-group mb-3">
                        <input name="email" id="inputEmail" type="email" placeholder="Email" required class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" id="inputPassword" type="password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br>
                    </div>

                    <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-s btn-dark text-light">Sign in
                    </button>
                    <div class="custom-control custom-checkbox mb-3">
                        <a href="#" >Forget Password</a>

                    </div>

                </form>
            </div>


            <div class=" col-lg-5 bg login-text d-flex flex-column justify-content-around mt-5 mt-lg-0">
                <h3 class=" text-center">RESIGTER NOW</h3>

                <form method="post" action="/user/register" >
                    <div class="form-group mb-3">
                        <input name="name" id="FName" type="text" placeholder="Name" required class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>

                    <div class="form-group mb-3">
                        <input name="email" id="inputEmail" type="email" placeholder="Email" required class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                    <div class="form-group mb-3">
                        <input name="password" id="Password" type="Password" placeholder="Password" required class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>

                    <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-s btn-dark text-light mb-4">Register
                    </button>

                </form>
            </div>

        </div>
    </div>
<!--    end auth-page-->



</div>

<?php include VIEW . 'layouts/footer.php' ?>