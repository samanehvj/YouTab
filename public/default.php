<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

</head>

<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div id="dismiss">
            <i class="fas fa-arrow-left"></i>
        </div>

        <div class="sidebar-header">
            <h3>YouTab</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Welcome</a>
            </li>
            <li>
                <a href="#">About</a>
                <a href="#">Shop</a>
<!--                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Shop</a>-->
<!--                <ul class="collapse list-unstyled" id="pageSubmenu">-->
<!--                    <li>-->
<!--                        <a href="#">Page 1</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Page 2</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Page 3</a>-->
<!--                    </li>-->
<!--                </ul>-->
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="#" class="return">Return Policy</a>
            </li>
            <li>
                <a href="#" class="Shipping">Shipping</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="min-vh-100">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-dark">
                    <i class="fas fa-align-left"></i>
                </button>
                
                <img src="./imgs/logo-black.png" class="img-fluid menu-logo-img">

<!--                <div class=" navbar-collapse" id="navbarSupportedContent">-->
                    <ul class="nav ">
                        <li class="d-inline mr-2 active">
                            <a class="d-inline" href="#"><i class="fas fa-user"></i> <span class="menu-shop"> Acount</span></a>
                        </li>
                        <li class="d-inline">
                            <a class="d-inline" href="#"><i class="fas fa-shopping-cart"></i> <span class="menu-shop">Cart</span></a>
                        </li>
                    </ul>
<!--                </div>-->
            </div>
        </nav>
        <!-- Start of body content -->



        <!-- End of body content -->

        <!--footer start-->
        <footer class="footer bg-dark py-2">
            <div class="d-flex flex-wrap justify-content-around">
                <span class="text-light ">Place sticky footer content here.</span>
                <span class="d-inline-block bg-dark text-light">
                    <a class="p-1 h4" href=""><i class="fab fa-facebook-square text-light"></i></a>
                    <a class="p-1 h4" href=""> <i class="fab fa-instagram-square text-light"></i></a>
                    <a class="p-1 h4" href=""> <i class="fab fa-twitter-square"></i></a>
                    <a class="p-1 h4" href=""> <i class="fab fa-youtube-square"></i></a>
                </span>
            </div>
        </footer>
        <!--footer end-->

    </div>
    <!-- End of Page Content -->

</div>
<!-- End of Wrapper -->


<div class="overlay"></div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
</body>

</html>