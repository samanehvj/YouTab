<?php include VIEW . 'layouts/header.php' ?>

<div class="container auth-page">

    <div class=" d-flex justify-content-center mt-5 mb-5">
        <div class="w-100 bg my-5 d-flex justify-content-around flex-row flex-wrap">
            <div class="col-lg-5 bg login-text d-flex flex-column justify-content-around">
                <h3 class="text-center ">LOGIN TO ACCOUNT</h3>

                <form  >
                    <div class="form-group mb-3">
                        <input id="inputEmail" type="email" placeholder="Username" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                    <div class="form-group mb-3">
                        <input id="inputPassword" type="password" placeholder="Password" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <input id="customCheck1" type="checkbox" checked class="custom-control-input btn-dark">
                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                    </div>
                    <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-s btn-dark text-light">Sign in
                    </button>

                </form>
            </div>


            <div class=" col-lg-5 bg login-text d-flex flex-column justify-content-around mt-5 mt-lg-0">
                <h3 class=" text-center">RESIGTER NOW</h3>

                <form >
                    <div class="form-group mb-3">
                        <input id="FName" type="First Name" placeholder="First Name" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                    <div class="form-group mb-3">
                        <input id="lName" type="Last Name" placeholder="Last Name" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-danger"><br>
                    </div>
                    <div class="form-group mb-3">
                        <input id="inputEmail" type="email" placeholder="Email" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>
                    <div class="form-group mb-3">
                        <input id="Password" type="Password" placeholder="Password" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                    </div>

                    <button type="submit" class="btn btn-danger btn-block text-uppercase mb-2 rounded-pill shadow-s btn-dark text-light mb-4">Register
                    </button>

                </form>
            </div>

        </div>
    </div>

</div>

<?php include VIEW . 'layouts/footer.php' ?>