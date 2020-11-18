<?php include VIEW . 'layouts/header.php' ?>


    <div class="box contact-page">
        <div class="container">
            <h1 class="display-4 text-center  head-text">Contact US </h1>
            <div class="row">
                <!--box 1 phone start-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center my-5 h-75 "> <i class="fas fa-phone icon"></i>
                        <div class="title">
                            <h3>Call US</h3>
                        </div>
                        <div class="text">
                            <span>+1-200-YouTab
                                <br>
                                +1-300-YouTab
                            </span> </div>
                    </div> <!--box 1 phone end-->
                </div>
                <!--box 2 email start-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center my-5 h-75"> <i class="fas fa-envelope-square icon"></i>
                        <div class="title">
                            <h3>Email US</h3>
                        </div>
                        <div class="text"> <span>Our dedicated specialists will be delighted to answer your questions</span> </div> <a class="btn btn-dark btn-lg" href="#">Email us</a>
                    </div>
                </div> <!--box 2 email end-->

                <!-- box 3 hours start-->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="box-part text-center my-5  h-75"> <i class="far fa-clock icon"></i>
                        <div class="title">
                            <h3>Hours</h3>
                        </div>
                        <div class="text"> <span>OPENING HOURS:<br>
                                Monday to Friday: 8am - 9pm PT <br>
                                Saturday: 9am - 9pm PT<br>
                                Sunday: 10am - 9pm PT</span>
                        </div>
                    </div>
                </div><!--box 3 hours end-->
            </div> <!--end of row-->
            <div class="d-flex justify-content-center pt-5">
                <h2 class="font-weight-bold">Get in touch!</h2>
            </div>
            <div class="d-flex justify-content-center text-muted">Contact us for a improve, help  and to join the team.</div>
            <!--start of contact form-->
            <div class="d-flex flex-row justify-content-center">
                <form class="w-xl-50 w-lg-75">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <div class="input-field">
<!--                                        <span class="fa fa-user-o p-2 border-right"></span>-->
                                        <input type="text" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <div class="input-field">
<!--                                        <span class="fa fa-envelope-o p-2"></span>-->
                                        <input type="email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <div class="input-field">
<!--                                        <span class="fa fa-mobile p-2"></span>-->
                                        <input type="tel" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="msg">Message</label>
                                    <div class="input-field bg-light">
                                        <textarea name="message" id="msg" cols="10" rows="9" class="form-control bg-light" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-center w-100"> <input type="button" value="Get in touch with us" class="btn-contact"> </div>
                        </div>
                    </div>
                </form>
            </div> <!--end of contact form-->
        </div><!--end of container-->
    </div><!--end of box-->

<?php include VIEW . 'layouts/footer.php' ?>